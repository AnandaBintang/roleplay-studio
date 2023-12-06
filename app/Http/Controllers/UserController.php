<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(): View
    {
        $user = User::orderBy('users.id', 'asc')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id', 'name', 'email', 'role_name', 'last_login')
            ->get();
        return view('user.list', ['users' => $user]);
    }

    public function add()
    {
        $role = Role::orderBy('id', 'asc')->get();
        return view('user.add', ['roles' => $role]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => "required",
            'email' => "required|email",
            'password' => "required",
            'role' => "required"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role
        ]);

        event(new Registered($user));

        return Redirect::route('user.add')->with('status', 'user-added');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return abort(404);
        }

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $id = $request->input('id');

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return Redirect::route('user.edit', ['id' => $request->input('id')])
            ->with('status', 'user-updated');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validateWithBag('userResetPassword', [
            'id' => 'required',
            'confirmation' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'RESET PASSWORD') {
                    $fail("The $attribute must be 'RESET PASSWORD'.");
                }
            }],
        ]);

        $id = $request->input('id');

        $user = User::find($id);
        $user->password = Hash::make("password");

        $user->save();

        return Redirect::route('user.edit', ['id' => $request->input('id')])
            ->with('status', 'password-reset');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'id' => 'required',
            'confirmation' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'DELETE ACCOUNT') {
                    $fail("The $attribute must be 'DELETE ACCOUNT'.");
                }
            }],
        ]);

        $user = User::find($request->input('id'));

        $user->delete();

        return Redirect::route('user.list');
    }
}
