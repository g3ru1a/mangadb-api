<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeriesTypeResource;
use App\Models\ItemType;
use App\Models\Review;
use App\Models\Series;
use App\Models\SeriesType;
use App\Http\Requests\StoreSeriesTypeRequest;
use App\Http\Requests\UpdateSeriesTypeRequest;
use App\Models\Status;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SeriesTypeController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(SeriesType::class, 'seriesType');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return SeriesTypeResource::collection(SeriesType::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSeriesTypeRequest $request
     * @return SeriesTypeResource
     */
    public function store(StoreSeriesTypeRequest $request): SeriesTypeResource
    {
        $data = [
            'series_id' => $request->input('series_id'),
            'item_type_id' => $request->input('item_type_id'),
            'status_id' => $request->input('status_id'),
        ];
        $seriesType = SeriesType::create($data);
        ReviewController::create(Auth::user(), $seriesType);
        return SeriesTypeResource::make($seriesType);
    }

    /**
     * Display the specified resource.
     *
     * @param SeriesType $seriesType
     * @return SeriesTypeResource
     */
    public function show(SeriesType $seriesType): SeriesTypeResource
    {
        return SeriesTypeResource::make($seriesType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSeriesTypeRequest $request
     * @param SeriesType $seriesType
     * @return SeriesTypeResource
     */
    public function update(UpdateSeriesTypeRequest $request, SeriesType $seriesType): SeriesTypeResource
    {
        $data = [
            'series_id' => $request->input('series_id'),
            'item_type_id' => $request->input('item_type_id'),
            'status_id' => $request->input('status_id'),
        ];
        $seriesType_new = SeriesType::create($data);
        ReviewController::create(Auth::user(), $seriesType_new, $seriesType);
        return SeriesTypeResource::make($seriesType_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SeriesType $seriesType
     * @return SeriesTypeResource
     */
    public function destroy(SeriesType $seriesType): SeriesTypeResource
    {
        $seriesType->delete();
        return SeriesTypeResource::make($seriesType);
    }
}
