<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index(Request $request)
  {
      $search = $request->input('search');
      $users = User::when($search, function ($query) use ($search) {
          return $query->where('name', 'like', "%{$search}%")
                       ->orWhere('email', 'like', "%{$search}%");
      })
      ->latest()
      ->get()
      ->fresh();
  
      return view('layouts.admin.user.index', compact('users'));
  }
  

  public function store(Request $request)
    {
        // Updated validation rules to allow reuse of soft-deleted user emails
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user logic
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|unique:users,email,'.$id,
    ]);
    $user = User::find($id);
    $user->update($request->all());
    return redirect()->route('user.index')
      ->with('success', 'User updated successfully.');
  }

  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect()->route('user.index')
      ->with('success', 'User deleted successfully');
  }

  public function create()
  {
    return view('layouts.admin.user.create');
  }

  public function show($id)
  {
    $user = User::find($id);
    return view('admin.user.show', compact('user'));
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('layouts.admin.user.edit', compact('user'));
  }
}
