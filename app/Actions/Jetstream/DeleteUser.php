<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use \Illuminate\Foundation\Auth\User as AuthenticatableUser;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(AuthenticatableUser $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
