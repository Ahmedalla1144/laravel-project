<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Traits\Policy;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    use Policy;
    /**
     * Determine whether the user can view any models.
     */
    public function index (User $user): bool
    {
        $ability = ['stuff'];

        return $this->checkUserAbilitis($ability);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return false;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;

    }
}
