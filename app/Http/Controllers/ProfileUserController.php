<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{
    public function edit(Request $request)
    {
        return view('profileuser.profileuser', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profileuser.edit')->with('status', 'profile-updated');
    }
    public function destroy(Request $request)
{
    $user = $request->user();
    $user->delete();

    return redirect()->route('home')->with('status', 'profile-deleted');
}

}
