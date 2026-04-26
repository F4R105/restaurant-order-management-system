<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::whereNot('id', Auth::user()->id)->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', User::class);

        $userData = $request->validate([
            'first_name' => ['string', 'required'],
            'last_name' => ['string'],
            'username' => ['string', 'required'],
            'phone_number' => ['string', 'required'],
            'role' => ['string', Rule::in(['admin', 'employee'])],
            'email' => ['string', 'email', 'unique:users,email'],
            'password' => ['string', 'min:4', 'confirmed']
        ]);

        $newUser = User::create($userData);

        if (!$newUser) {
            return back()->with('error', 'Failed to create new item');
        }

        return redirect()->route('users.show', $newUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view', $user);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        $rules = [
            'username' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:4', 'confirmed'],
        ];

        // Only super_admins can edit sensitive info like name, phone, email, and role
        if (Gate::allows('updateSensitiveInfo', $user)) {
            $rules['first_name'] = ['required', 'string'];
            $rules['last_name'] = ['nullable', 'string'];
            $rules['phone_number'] = ['required', 'string'];
            $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user->id)];
            $rules['role'] = ['required', Rule::in(['admin', 'employee', 'super_admin'])];
        }

        $validatedData = $request->validate($rules);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        $user->delete();
        return redirect()->route('users.index');
    }
}
