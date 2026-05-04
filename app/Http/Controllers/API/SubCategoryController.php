<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubCategory::with('category')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        return SubCategory::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subCategory = SubCategory::with('category')->findOrFail($id);
        return $subCategory;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $subcategory->update($request->all());
        return $subcategory;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, SubCategory $subcategory)
    {
        $subcategory->delete();
        return response()->json(['message' => 'Deleted']);
    }
}