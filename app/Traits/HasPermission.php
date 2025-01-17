<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasPermission
{
    /**
     * Check if the user has the given permission.
     */
    public function hasPermission(string $permission): bool
    {
        if (! Auth::user()->can($permission)) {
            session()->flash('type', 'Error');
            session()->flash('message', 'You do not have permission to perform this action.');

            return false;
        }

        return true;
    }
}
