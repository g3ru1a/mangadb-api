<?php

namespace App\Http\Controllers;

use App\Models\SeriesName;
use App\Http\Requests\StoreSeriesNameRequest;
use App\Http\Requests\UpdateSeriesNameRequest;

class SeriesNameController extends Controller
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
     * @param  \App\Http\Requests\StoreSeriesNameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeriesNameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeriesName  $seriesName
     * @return \Illuminate\Http\Response
     */
    public function show(SeriesName $seriesName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeriesName  $seriesName
     * @return \Illuminate\Http\Response
     */
    public function edit(SeriesName $seriesName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeriesNameRequest  $request
     * @param  \App\Models\SeriesName  $seriesName
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeriesNameRequest $request, SeriesName $seriesName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeriesName  $seriesName
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeriesName $seriesName)
    {
        //
    }
}
