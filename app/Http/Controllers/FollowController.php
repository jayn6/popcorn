<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    public function follow($id)
    {
        $user = User::findOrFail($id);

        auth()->user()
            ->following()
            ->syncWithoutDetaching([
                $user->id_user
            ]);

        return back();
    }

    public function unfollow($id)
    {
        auth()->user()
            ->following()
            ->detach($id);

        return back();
    }
}