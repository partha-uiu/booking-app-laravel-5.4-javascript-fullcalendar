<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public function index()
	{
		$users = User::with('role')
						->where('community_center_id', '=', Auth::user()->community_center_id)
						->latest()
						->paginate(10);

		return view('users.index')->with('users', $users);
	}

	public function add()
	{
		$roles = Role::all();

		return view('users.add')->with('roles', $roles);
	}

	public function store(AddUserRequest $request)
	{
		$addUser = new User;
		$addUser->name = $request->name;
		$addUser->email = $request->email;
		$addUser->password = bcrypt($request->password);
		$addUser->role_id = $request->role;
		$addUser->community_center_id = Auth::user()->community_center_id;
		$addUser->save();

		return redirect()->route('users')->with('success', 'User has been added');
	}

	public function edit($id)
	{
		$roles = Role::all();
		$user = User::find($id);

		return view('users.edit')
					->with('user', $user)
					->with('roles', $roles);
	}

	public function update($id, UpdateUserRequest $request)
	{
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role_id = $request->role;
		$user->save();

		return redirect()->route('users')->with('success', 'User has been updated');
	}

	public function delete($id)
	{
		User::find($id)->delete();

		return redirect()->back()->with('success', 'User has been deleted');
	}

}
