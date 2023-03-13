<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewCommentResource;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\ReviewComment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    /**
     * Create a new review model for creating items or updating items.
     *
     * @param User $user user
     * @param mixed $item item
     * @param mixed|null $item_to_be_replaced item_to_be_replaced
     * @return Review
     */
    public static function create(User $user, mixed $item, mixed $item_to_be_replaced = null): Review
    {
        $review = new Review();
        $review->submitter()->associate($user);
        $review->item()->associate($item);
        if($item_to_be_replaced != null){
            $review->replace_item()->associate($item_to_be_replaced);
        }
        $review->save();
        if($user->editor){
            ReviewController::approve($review);
        }
        return $review;
    }

    public function comments(Review $review): AnonymousResourceCollection
    {
        $comments = $review->comments->sortByDesc('created_at');
        return ReviewCommentResource::collection($comments);
    }

    public static function comment(Request $request, Review $review): Response|ReviewCommentResource|Application|ResponseFactory
    {
        $user = Auth::user();
        if($review->submitter->id != $user->id && $review->reviewer->id != $user->id){
            return response('Unauthorized', 422);
        }
        $message = $request->input('message');
        $message = htmlspecialchars($message);
        $rc = new ReviewComment(['message'=>$message]);
        $rc->user()->associate($user);
        $rc->review()->associate($review);
        $rc->save();
        return ReviewCommentResource::make($rc);
    }

    public static function assign(Review $review, User $user = null): ReviewResource
    {
        if(!$user) $user = Auth::user();
        $review->reviewer()->associate($user);
        $review->status = 'pending';
        $review->save();
        return ReviewResource::make($review);
    }

    public static function approve(Review $review): ReviewResource
    {
        if($review->reviewer == null){
            $review->reviewer()->associate(Auth::user());
        }
        $review->status = 'approved';
        if($review->replace_item){
            $props = \Arr::except($review->item->attributesToArray(), ['id']);
            $review->replace_item->update($props);

            //Replace media if available
            if($review->item->media){
                if($review->replace_item->media){
                    $review->replace_item->media->delete();
                }
                $review->replace_item->media()->save($review->item->media);
            }
            //Replace names if item is a series
            if($review->item->names){
                $review->replace_item->names()->delete();
                $review->replace_item->names()->saveMany($review->item->names);
                $review->item->names()->delete();
            }
            //Replace staff if item is a series type
            if($review->item->staff){
                $review->replace_item->staff()->detach();
                foreach ($review->item->staff as $_staff){
                    $review->replace_item->staff()->attach($_staff, ['role' => $_staff->pivot->role]);
                }
                $review->item->staff()->detach();
            }

            $review->item->delete();
        }
        $review->save();
        return ReviewResource::make($review);
    }

    public static function reject(Review $review): ReviewResource
    {
        if($review->reviewer == null){
            $review->reviewer()->associate(Auth::user());
        }
        //Remove media if available
        if($review->item->media){
            $review->item->media->delete();
        }
        $review->status = 'rejected';
        $review->item->delete();
        $review->save();
        return ReviewResource::make($review);
    }

}

