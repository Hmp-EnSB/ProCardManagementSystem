<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('layouts.admin.user.index', compact('users'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);
    User::create($request->all());
    return redirect()->route('users.index')
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
    return redirect()->route('users.index')
      ->with('success', 'User updated successfully.');
  }

  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect()->route('users.index')
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
