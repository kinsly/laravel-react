<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FdCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\FdItem;
use App\Models\FdPicture;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
       
        return view('pages.items.index',[
            'items' => FdItem::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $categories = FdCategory::all();
        return view('pages.items.create',[
            'categories' => $categories
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:70',
            'card_tag'=>'max:50',
            'card_info'=>'required|max:100',
            'unit_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'ratings'=>'required|integer|max:5',
            'summary' =>'required|string|max:255',
            'description'=>'required|string|min:10',
            'isAvailable' =>'required|integer|max:255|in:0,1',
            'status' =>'required|in:0,1|max:255',
            'fd_category_id' => '',
            'imagePath'=>'required|string|min:5'
        ]);

        $item = new FdItem();
        $item->title = $request->title;
        $item->card_tag = $request->card_tag;
        $item->card_info = $request->card_info;
        $item->unit_price = $request->unit_price;
        $item->ratings = $request->ratings;
        $item->summary  = $request->summary;
        $item->description = $request->description;
        $item->isAvailable = $request->isAvailable;
        $item->status  = $request->status;
        if($request->fd_category_id != 0) $item->fd_category_id  = $request->fd_category_id;
        $item->save();
        
        // Save image
        if(!empty($request->imagePath)){ 
            $image = FdPicture::where('url',$request->imagePath)->first();
            if(!$image){ 
                $image = new FdPicture();
                $image->url = $request->imagePath;
                $image->thumbnail_url = "";
                $image->alt = "";
                $image->fd_item_id =  $item->id;
                $image->save();
            }
            
        }
        

        return redirect()->route('items.index')->withSuccess('New item created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(FdItem $item):View
    {
        
        return view('pages.items.show',[
            'item' => $item
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FdItem $item):View
    {
        $categories = FdCategory::all();
        return view('pages.items.edit',[
            'item' => $item,
            'categories'=>$categories
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FdItem $item)
    {
        $request->validate([
            'title' => 'required|max:70',
            'card_tag'=>'max:50',
            'card_info'=>'required|max:100',
            'unit_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'ratings'=>'required|integer|max:5',
            'summary' =>'required|string|max:255',
            'description'=>'required|string|min:10',
            'isAvailable' =>'required|integer|max:255|in:0,1',
            'status' =>'required|in:0,1|max:255',
            'fd_category_id' => '',
            'imagePath'=>'required|string|min:5'
        ]);

        $item->title = $request->title;
        $item->card_tag = $request->card_tag;
        $item->card_info = $request->card_info;
        $item->unit_price = $request->unit_price;
        $item->ratings = $request->ratings;
        $item->summary  = $request->summary;
        $item->description = $request->description;
        $item->isAvailable = $request->isAvailable;
        $item->status  = $request->status;
        if($request->fd_category_id != 0) $item->fd_category_id  = $request->fd_category_id;
        $item->save();
        
        // Save image
        if($request->imagePath){
            $image = FdPicture::where('url',$request->imagePath)->first();
            
            if(empty($image)){
                //Delete other images if available
                $itemImages = FdPicture::where('fd_item_id', $item->id)->delete();
                $image = new FdPicture();
                $image->url = $request->imagePath;
                $image->thumbnail_url = "";
                $image->alt = "";
                $image->fd_item_id =  $item->id;
                $image->save();
            }
        }
        
        
        return redirect()->route('items.edit',[$item->id])
                ->withSuccess('Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FdItem $item)
    {
        $name = $item->title;
        $item->delete();
        return redirect()->route('items.index')->withSuccess("Item - $name deleted successfully.");
    }
}
