<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StatusController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Status::class, 'status');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return StatusResource::collection(Status::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatusRequest $request
     * @return StatusResource
     */
    public function store(StoreStatusRequest $request): StatusResource
    {
        $name = htmlspecialchars($request->input('name'));
        $status = Status::create(['name' => $name]);
        ReviewController::create(Auth::user(), $status);
        return StatusResource::make($status);
    }

    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @return StatusResource
     */
    public function show(Status $status): StatusResource
    {
        return StatusResource::make($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatusRequest $request
     * @param Status $status
     * @return StatusResource
     */
    public function update(UpdateStatusRequest $request, Status $status): StatusResource
    {
        $name = htmlspecialchars($request->input('name'));
        $status_new = Status::create(['name' => $name]);
        ReviewController::create(Auth::user(), $status_new, $status);
        return StatusResource::make($status_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return StatusResource
     */
    public function destroy(Status $status): StatusResource
    {
        $status->delete();
        return StatusResource::make($status);
    }
}
