<?php

namespace App\Policies;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ScholarshipPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyScholarprovider(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Scholarship $scholarship): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->scholarprovider != null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Scholarship $scholarship): bool | Response
    {
        if ($scholarship->scholarprovider->user_id !== $user->id) {
            return false;
        }

        if ($scholarship->scholarshipApplications()->count() > 0) {
            return Response::deny('Cannot change the Scholarship with applications');
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Scholarship $scholarship): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Scholarship $scholarship): bool
    {
        return false; //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Scholarship $scholarship): bool
    {
        return false;
    }

    public function apply(User $user, Scholarship $scholarship): bool
    {
        return !$scholarship->hasUserApplied($user);
    }

}
