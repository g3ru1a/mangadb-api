<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Review;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublisherController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Publisher::class, 'publisher');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PublisherResource::collection(Publisher::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePublisherRequest $request
     * @return PublisherResource
     */
    public function store(StorePublisherRequest $request): PublisherResource
    {
        $name = htmlspecialchars($request->input('name'));
        $url = htmlspecialchars($request->input('url'));
        $about = htmlspecialchars($request->input('about'));
        $logo = $request->file('logo');
        //
        $publisher = Publisher::create([
            'name' => $name,
            'url' => $url,
            'about' => $about
        ]);
        $media = MediaController::upload($logo, 'publisher_logo',
            'publisher_logos', $publisher->id);
        if($media) $publisher->media()->save($media);
        ReviewController::create(Auth::user(), $publisher);
        return PublisherResource::make($publisher);
    }

    /**
     * Display the specified resource.
     *
     * @param Publisher $publisher
     * @return PublisherResource
     */
    public function show(Publisher $publisher): PublisherResource
    {
        return PublisherResource::make($publisher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePublisherRequest $request
     * @param Publisher $publisher
     * @return PublisherResource
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher): PublisherResource
    {
        $data = [
            'name' => $request->input('name') ? htmlspecialchars($request->input('name')) : $publisher->name,
            'url' => $request->input('url') ? htmlspecialchars($request->input('url')) : $publisher->url,
            'about' => $request->input('about') ? htmlspecialchars($request->input('about')) : $publisher->about,
        ];
        $logo = $request->file('logo');
        //
        $publisher_new = Publisher::create($data);
        if($logo){
            $media = MediaController::upload($logo, 'publisher_logo', 'publisher_logos', $publisher->id);
        }else{
            $media = $publisher->media->replicate();
        }
        $publisher_new->media()->save($media);
        ReviewController::create(Auth::user(), $publisher_new, $publisher);
        return PublisherResource::make($publisher_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Publisher $publisher
     * @return PublisherResource
     */
    public function destroy(Publisher $publisher): PublisherResource
    {
        $publisher->media->delete();
        $publisher->delete();
        return PublisherResource::make($publisher);
    }
}
