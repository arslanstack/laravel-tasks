<?php
  
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\File;
      
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('fileUpload');
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
            'files' => 'required|array',
            'files.*' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
 
        // Initialize an array to store file information
        $files = [];
  
        // Process each uploaded file
        foreach($request->file('files') as $file) {
            // Generate a unique name for the file
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
              
            // Move the file to the desired location
            $file->move(public_path('uploads'), $fileName);
  
            // Add file information to the array
            $files[] = ['name' => $fileName];
        }
  
        // Store files in the database using create method
        foreach ($files as $fileData) {
            File::create($fileData);
        }
          
        return back()->with('success', 'Files uploaded successfully!')
                     ->with('files', $files); 
   
    }
}