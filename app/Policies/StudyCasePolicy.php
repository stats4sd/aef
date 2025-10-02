<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StudyCase;
use App\Enums\StudyCaseStatus;

class StudyCasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudyCase $studyCase): bool
    {
        // ray('StudyCasePolicy.view()...');

        // add access control for logged in user for viewing study case content in front-end
        // 1. Admin can access study case with all status
        // 2. All teammates of study case creator can access study case with all status

        // initialse study case cannot be preview by default
        $canPreview = false;

        // a reviewed case can be viewed by everyone
        if ($studyCase->status == StudyCaseStatus::Reviewed) {
            return true;
        }

        // the logged in user is admin user
        if ($user->isAdmin()) {
            // ray('logged in user is admin user');
            // admin user can view all study cases with any status
            $canPreview = true;
        }
        // the logged in user is normal user
        else {
            // ray('logged in user is normal user');

            // ray($studyCase->team);
            // ray($user->latestTeam);

            // if the study case is created by a user who belongs to user's team, user can view it with any status
            if ($studyCase->team == $user->latestTeam) {
                $canPreview = true;
            }
        }

        return $canPreview;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudyCase $studyCase): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudyCase $studyCase): bool
    {
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
