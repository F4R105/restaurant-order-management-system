<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Auth::user());

        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Auth::user());

        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Auth::user());

        $itemData = $request->validate([
            'name' => ['required'],
            'unit_price' => ['required', 'integer', 'min:0', 'max:10000']
        ]);

        $newItem = Item::create($itemData);

        if (!$newItem) {
            return back()->withErrors(['unit_price' => 'Failed to create new item']);
        }

        return redirect()->route('items.show', $newItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        Gate::authorize('view', Auth::user());

        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        Gate::authorize('update', Auth::user());

        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        Gate::authorize('update', Auth::user());

        $itemData = $request->validate([
            'name' => ['required'],
            'unit_price' => ['required', 'integer', 'min:0', 'max:10000']
        ]);

        $item->update($itemData);

        return redirect()->route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        Gate::authorize('delete', Auth::user());

        $item->delete();
        return redirect()->route('items.index');
    }
}
