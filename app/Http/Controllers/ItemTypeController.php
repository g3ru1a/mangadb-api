<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Http\Requests\StoreItemTypeRequest;
use App\Http\Requests\UpdateItemTypeRequest;

class ItemTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreItemTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemType $itemType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemType $itemType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemTypeRequest  $request
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemTypeRequest $request, ItemType $itemType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemType $itemType)
    {
        //
    }
}
