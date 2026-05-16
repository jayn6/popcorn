<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|string|max:30',
        ]);

        $user->fill($data);
        $user->save();

        return redirect('/');
    }
}