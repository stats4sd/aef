<?php

namespace App\Policies;

use App\Models\StudyCase;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudyCasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        ray('viewAny');
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudyCase $studyCase): bool
    {
        ray('view');
        return true;
        // return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        ray('create');
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudyCase $studyCase): bool
    {
        ray('update');
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudyCase $studyCase): bool
    {
        ray('delete');
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudyCase $studyCase): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudyCase $studyCase): bool
    {
        return true;
    }
}
