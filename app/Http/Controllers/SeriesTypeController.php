<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeriesTypeResource;
use App\Models\ItemType;
use App\Models\Review;
use App\Models\Series;
use App\Models\SeriesType;
use App\Http\Requests\StoreSeriesTypeRequest;
use App\Http\Requests\UpdateSeriesTypeRequest;
use App\Models\Staff;
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
        // Staff
        $staff = $request->input('staff');
        $roles = $request->input('roles');
        foreach ($staff as $key => $value){
            $_staff = Staff::find($value);
            $_role = htmlspecialchars($roles[$key]);
            $seriesType->staff()->attach($_staff, ['role' => $_role]);
        }
        $seriesType->save();
        // .\Staff
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
            'series_id' => $request->input('series_id') ?? $seriesType->series_id,
            'item_type_id' => $request->input('item_type_id') ?? $seriesType->item_type_id,
            'status_id' => $request->input('status_id') ?? $seriesType->status_id,
        ];
        $seriesType_new = SeriesType::create($data);
        // Staff
        $staff = $request->input('staff');
        if ($staff){
            $roles = $request->input('roles');
            foreach ($staff as $key => $value){
                $_staff = Staff::find($value);
                $_role = htmlspecialchars($roles[$key]);
                $seriesType_new->staff()->attach($_staff, ['role' => $_role]);
            }
        }else{
            foreach ($seriesType->staff as $_staff){
                $seriesType_new->staff()->attach($_staff, ['role' => $_staff->pivot->role]);
            }
        }
        $seriesType_new->save();
        // .\Staff
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
        $seriesType->staff()->detach();
        $seriesType->delete();
        return SeriesTypeResource::make($seriesType);
    }
}
