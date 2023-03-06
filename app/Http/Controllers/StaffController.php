<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Status;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StaffController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Staff::class, 'staff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return StaffResource::collection(Staff::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStaffRequest $request
     * @return StaffResource
     */
    public function store(StoreStaffRequest $request): StaffResource
    {
        $data = [
            'name' => htmlspecialchars($request->input('name')),
            'native_name' => htmlspecialchars($request->input('native_name')) ?? null,
            'about' => htmlspecialchars($request->input('about')) ?? null,
            'age' => htmlspecialchars($request->input('age')) ?? null,
            'gender' => htmlspecialchars($request->input('gender')) ?? null,
            'origin' => htmlspecialchars($request->input('origin')) ?? null,
            'started_on' => htmlspecialchars($request->input('started_on')) ?? null,
            'stopped_on' => htmlspecialchars($request->input('stopped_on')) ?? null,
        ];
        $picture = $request->file('picture');
        //
        $staff = Staff::create($data);
        if($picture){
            $media = MediaController::upload($picture, 'staff picture', 'staff', $staff->id);
            $staff->media()->save($media);
        }
        ReviewController::create(Auth::user(), $staff);
        return StaffResource::make($staff);

    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @return StaffResource
     */
    public function show(Staff $staff): StaffResource
    {
        return StaffResource::make($staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStaffRequest $request
     * @param Staff $staff
     * @return StaffResource
     */
    public function update(UpdateStaffRequest $request, Staff $staff): StaffResource
    {
        $data = [
            'name' => htmlspecialchars($request->input('name')) ?? $staff->name,
            'native_name' => htmlspecialchars($request->input('native_name')) ?? $staff->native_name,
            'about' => htmlspecialchars($request->input('about')) ?? $staff->about,
            'age' => htmlspecialchars($request->input('age')) ?? $staff->age,
            'gender' => htmlspecialchars($request->input('gender')) ?? $staff->gender,
            'origin' => htmlspecialchars($request->input('origin')) ?? $staff->origin,
            'started_on' => htmlspecialchars($request->input('started_on')) ?? $staff->started_on,
            'stopped_on' => htmlspecialchars($request->input('stopped_on')) ?? $staff->stopped_on,
        ];
        $picture = $request->file('picture');
        //
        $staff_new = Staff::create($data);
        if($picture){
            $media = MediaController::upload($picture, 'staff picture', 'staff', $staff->id);
        }else{
            $media = $staff->media->replicate();
        }
        $staff_new->media()->save($media);
        ReviewController::create(Auth::user(), $staff_new, $staff);
        return StaffResource::make($staff_new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Staff $staff
     * @return StaffResource
     */
    public function destroy(Staff $staff): StaffResource
    {
        if($staff->media) $staff->media->delete();
        $staff->delete();
        return StaffResource::make($staff);
    }
}
