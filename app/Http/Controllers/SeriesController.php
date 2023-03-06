<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeriesResource;
use App\Models\Language;
use App\Models\Media;
use App\Models\Series;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Models\SeriesName;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SeriesController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Series::class, 'series');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return SeriesResource::collection(Series::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSeriesRequest $request
     * @return SeriesResource
     */
    public function store(StoreSeriesRequest $request): SeriesResource
    {
        $names = $request->input('names');
        $languages = $request->input('name_languages');
        $cover = $request->file('cover');
        //
        $series = Series::create();
        $media = MediaController::upload($cover, 'series cover', 'series', $series->id);
        $series->media()->save($media);
        self::createNames($series, $names, $languages);
        ReviewController::create(Auth::user(), $series);
        return SeriesResource::make($series);
    }

    /**
     * Display the specified resource.
     *
     * @param Series $series
     * @return SeriesResource
     */
    public function show(Series $series): SeriesResource
    {
        return SeriesResource::make($series);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSeriesRequest $request
     * @param Series $series
     * @return SeriesResource
     */
    public function update(UpdateSeriesRequest $request, Series $series): SeriesResource
    {
        $names = $request->input('names');
        $languages = $request->input('name_languages');
        $cover = $request->file('cover');
        //
        $series_new = Series::create();
        if($cover){
            $media = MediaController::upload($cover, 'series cover', 'series', $series->id);
        }else{
            $media = $series->media->replicate();
        }
        $series_new->media()->save($media);
        self::createNames($series_new, $names, $languages);
        ReviewController::create(Auth::user(), $series_new, $series);
        return SeriesResource::make($series_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Series $series
     * @return SeriesResource
     */
    public function destroy(Series $series): SeriesResource
    {
        $series->media()->delete();
        $series->names()->delete();
        $series->types()->delete();
        $series->delete();
        return SeriesResource::make($series);
    }

    /**
     * @param Series $series
     * @param mixed $names
     * @param mixed $languages
     * @return void
     */
    private static function createNames(Series $series, mixed $names, mixed $languages): void
    {
        foreach ($names as $k => $v) {
            $name = htmlspecialchars($v);
            $lang = Language::find($languages[$k]);
            $seriesName = SeriesName::create(['name' => $name]);
            $seriesName->language()->associate($lang);
            $seriesName->series()->associate($series);
            $seriesName->save();
        }
    }
}

