<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Gate;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', ItemCategory::class);

        $itemCategories = ItemCategory::all();

        return view('item-categories.index', ['itemCategories' => $itemCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', ItemCategory::class);

        return view('item-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', ItemCategory::class);

        $itemCategoryData = $request->validate([
            'name' => ['required'],
            'is_active' => ['boolean'],
        ]);

        $newItemCategory = ItemCategory::create($itemCategoryData);

        if (! $newItemCategory) {
            return back()->withErrors(['is_active' => 'Failed to create new item category']);
        }

        return redirect()->route('item-categories.index', $newItemCategory);
    }

    /**
     * Display the specified resource.
     */
    // public function show(ItemCategory $itemCategory)
    // {
    //     Gate::authorize('view', $itemCategory);

    //     return view('item-categories.show', ['itemCategory' => $itemCategory]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $itemCategory)
    {
        Gate::authorize('update', $itemCategory);

        return view('item-categories.edit', ['itemCategory' => $itemCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        Gate::authorize('update', $itemCategory);

        $itemCategoryData = $request->validate([
            'name' => ['required'],
            'unit_price' => ['required', 'integer', 'min:0', 'max:10000'],
        ]);

        $itemCategory->update($itemCategoryData);

        return redirect()->route('item-categories.show', $itemCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCategory $itemCategory)
    {
        Gate::authorize('delete', $itemCategory);

        $itemCategory->delete();

        return redirect()->route('item-categories.index');
    }
}
