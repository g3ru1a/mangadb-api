<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewCommentResource;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\ReviewComment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    /**
     * Create a new review model for creating items or updating items.
     *
     * @param User $user The user making the changes
     * @param $item
     * @param $replace
     * @return Review
     */
    public static function create(User $user, $item, $item_to_be_replaced = null): Review
    {
        $review = new Review();
        $review->submitter()->associate($user);
        $review->item()->associate($item);
        if($item_to_be_replaced != null){
            $review->replace_item()->associate($item_to_be_replaced);
        }
        if($user->editor){
            $review->reviewer()->associate($user);
            $review->status = 'passed';
        }

        $review->save();
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
        $review->status = 'rejected';
        $review->item->delete();
        $review->save();
        return ReviewResource::make($review);
    }

}

