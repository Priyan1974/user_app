<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gallery;

class UserController extends Controller
{
    //function for list the users details
    public function userList(){
        $users = User::all();
        return view('dashboard',compact('users'));
    }

    //function for list the images in gallery
    public function galleryIndex(){
        $galleries = Gallery::all();
        // dd($galleries->toArray());
        return view('gallery.view-gallery',compact('galleries'));
    }

    //function for view the create gallery form
    public function createGallery(){
        return view('gallery.create-gallery');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'gallery_name' => 'required|string|max:255',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $galleryName = $request->gallery_name;
        $uploadedFiles = $request->file('file'); 
        $savedPaths = [];
    
        if (!empty($uploadedFiles)) {
            foreach ($uploadedFiles as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedFilename = preg_replace('/[^A-Za-z0-9\-_]/', '_', $originalName); // Remove special characters
                $filename = time() . '_' . $sanitizedFilename . '.' . $file->getClientOriginalExtension();
                
                $file->move(public_path('gallery'), $filename);
                
                $savedPaths[] = 'gallery/' . $filename;
            }
    
            Gallery::create([
                'gallery_name' => $galleryName,
                'images' => json_encode($savedPaths), 
            ]);
    
            return response()->json(['success' => true, 'files' => $savedPaths]);
        }
    
        return response()->json(['success' => false, 'message' => 'No files uploaded']);
    }
    
}
