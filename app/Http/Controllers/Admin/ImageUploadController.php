<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    
    function upload_image($request, $storeLocation = 'images')
    {
            // Get the uploaded file
        $imageFile = $request->file('image');

        // Get the original file name
        $originalName = $imageFile->getClientOriginalName();

        $i = 1;
        while (Storage::disk('public')->exists($storeLocation.'/' . $originalName)) {
            $originalName = pathinfo($originalName, PATHINFO_FILENAME) . "_{$i}" . '.'. $imageFile->getClientOriginalExtension();
            $i++;
        }

        // Store the uploaded image with the new name
        $imagePath = $imageFile->storeAs($storeLocation, $originalName, 'public');
        return "storage/".$imagePath;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $imagePath = $this->upload_image($request,'images');
        echo "/$imagePath";
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $image_name)
    {
        Storage::delete('public/images/'.$image_name);
        echo "success";
    }
}
