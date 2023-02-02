<?php

namespace App\Http\Controllers;

use App\Models\SeriesType;
use App\Http\Requests\StoreSeriesTypeRequest;
use App\Http\Requests\UpdateSeriesTypeRequest;

class SeriesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeriesTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeriesTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeriesType  $seriesType
     * @return \Illuminate\Http\Response
     */
    public function show(SeriesType $seriesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeriesType  $seriesType
     * @return \Illuminate\Http\Response
     */
    public function edit(SeriesType $seriesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeriesTypeRequest  $request
     * @param  \App\Models\SeriesType  $seriesType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeriesTypeRequest $request, SeriesType $seriesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeriesType  $seriesType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeriesType $seriesType)
    {
        //
    }
}
