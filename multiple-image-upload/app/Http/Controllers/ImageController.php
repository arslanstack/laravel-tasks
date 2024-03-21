<?php
      
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('imageUpload');
    }
         
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate incoming request data
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        // Initialize an array to store image information
        $images = [];
  
        // Process each uploaded image
        foreach($request->file('images') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
              
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
  
            // Add image information to the array
            $images[] = ['name' => $imageName];
        }
  
        // Store images in the database using create method
        foreach ($images as $imageData) {
            Image::create($imageData);
        }
          
        return back()->with('success', 'Images uploaded successfully!')
                     ->with('images', $images); 
    }
}