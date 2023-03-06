<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemTypeResource;
use App\Models\ItemType;
use App\Http\Requests\StoreItemTypeRequest;
use App\Http\Requests\UpdateItemTypeRequest;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemTypeController extends Controller
{

    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(ItemType::class, 'itemType');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ItemTypeResource::collection(ItemType::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreItemTypeRequest $request
     * @return ItemTypeResource
     */
    public function store(StoreItemTypeRequest $request): ItemTypeResource
    {
        $name = htmlspecialchars($request->input('name'));
        $itemType = ItemType::create(['name' => $name]);
        ReviewController::create(Auth::user(), $itemType);
        return ItemTypeResource::make($itemType);
    }

    /**
     * Display the specified resource.
     *
     * @param ItemType $itemType
     * @return ItemTypeResource
     */
    public function show(ItemType $itemType): ItemTypeResource
    {
        return ItemTypeResource::make($itemType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateItemTypeRequest $request
     * @param ItemType $itemType
     * @return ItemTypeResource
     */
    public function update(UpdateItemTypeRequest $request, ItemType $itemType): ItemTypeResource
    {
        $name = htmlspecialchars($request->input('name'));
        $itemType_new = ItemType::create(['name' => $name]);
        ReviewController::create(Auth::user(), $itemType_new, $itemType);
        return ItemTypeResource::make($itemType_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ItemType $itemType
     * @return ItemTypeResource
     */
    public function destroy(ItemType $itemType): ItemTypeResource
    {
        $itemType->delete();
        return ItemTypeResource::make($itemType);
    }
}
