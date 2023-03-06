<?php

namespace App\Http\Controllers;

use App\Http\Resources\BindingResource;
use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;
use App\Models\Review;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class BindingController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Binding::class, 'binding');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BindingResource::collection(Binding::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBindingRequest $request
     * @return BindingResource
     */
    public function store(StoreBindingRequest $request): BindingResource
    {
        $name = htmlspecialchars($request->input('name'));
        $binding = Binding::create(['name' => $name]);
        ReviewController::create(Auth::user(), $binding);
        return BindingResource::make($binding);
    }

    /**
     * Display the specified resource.
     *
     * @param Binding $binding
     * @return BindingResource
     */
    public function show(Binding $binding): BindingResource
    {
        return BindingResource::make($binding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBindingRequest $request
     * @param Binding $binding
     * @return BindingResource
     */
    public function update(UpdateBindingRequest $request, Binding $binding): BindingResource
    {
        $name = htmlspecialchars($request->input('name'));
        $binding_new = Binding::create(['name' => $name]);
        ReviewController::create(Auth::user(), $binding_new, $binding);
        return BindingResource::make($binding_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Binding $binding
     * @return BindingResource
     */
    public function destroy(Binding $binding): BindingResource
    {
        $binding->delete();
        return BindingResource::make($binding);
    }
}
