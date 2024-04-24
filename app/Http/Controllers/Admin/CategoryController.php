<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FdCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.categories.index',[
            'categories' => FdCategory::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        
        $parents =  FdCategory::whereNull('parent_id')->get();
        return view('pages.categories.create', ['parents' => $parents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:fd_categories|max:255',
        ]);
        if($request->parent_id == 0){
            FdCategory::create(['name' => $request->name]);
        }else{
            FdCategory::create(['name' => $request->name, 'parent_id' => $request->parent_id]);
        }

        

        return redirect()->route('categories.index')
                ->withSuccess('New category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FdCategory $category)
    {
        
        $parents =  FdCategory::whereNull('parent_id')->get();
        
        return view('pages.categories.edit', [
            'parents' => $parents,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FdCategory $category)
    {
        $request->validate([
            'name' => 'required|unique:fd_categories,name,' . $category->id . '|max:255'
        ]);

        if($request->parent_id == 0){
            $category->name = $request->name;
        }else{
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
        }
        $category->save();

        return redirect()->route('categories.edit',[$category->id])
                ->withSuccess('Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FdCategory $category)
    {
         /** @var \App\Models\User */
         
         $category->delete();
         return redirect()->route('categories.index')
                 ->withSuccess('category is deleted successfully.');
    }
}
