<?php

namespace App\Policies;

use App\Models\SeriesType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SeriesTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param SeriesType $seriesType
     * @return Response|bool
     */
    public function view(User $user, SeriesType $seriesType): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param SeriesType $seriesType
     * @return Response|bool
     */
    public function update(User $user, SeriesType $seriesType): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param SeriesType $seriesType
     * @return Response|bool
     */
    public function delete(User $user, SeriesType $seriesType): Response|bool
    {
        if($user->editor) return Response::allow();
        else return Response::deny('Only Editors can alter data.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param SeriesType $seriesType
     * @return Response|bool
     */
    public function restore(User $user, SeriesType $seriesType): Response|bool
    {
        if($user->editor) return Response::allow();
        else return Response::deny('Only Editors can alter data.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param SeriesType $seriesType
     * @return Response|bool
     */
    public function forceDelete(User $user, SeriesType $seriesType): Response|bool
    {
        if($user->editor) return Response::allow();
        else return Response::deny('Only Editors can alter data.');
    }
}
