<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return back();
    }
}