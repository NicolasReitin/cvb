<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Post $post): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Post $post): bool
    {
        return false;
    }

    public function delete(User $user, Post $post): bool
    {
        return false;
    }

    public function restore(User $user, Post $post): bool
    {
        return false;
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}
