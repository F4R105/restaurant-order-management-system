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
        Gate::authorize('viewAny', Auth::user());

        $users = User::whereNot('id', Auth::user()->id)->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Auth::user());

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Auth::user());

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
        Gate::authorize('view', Auth::user());

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete', Auth::user());

        $user->delete();
        return redirect()->route('users.index');
    }
}
