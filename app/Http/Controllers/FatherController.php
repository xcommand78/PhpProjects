<?php

namespace App\Http\Controllers;

use App\Models\Father;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class FatherController extends Controller
{
    public function show(Request $request) {
        $food = [];

        $count = $request->get('rowCount',2);
        $data = Father::simplepaginate($count);
        foreach ($data as $father) {
            $food[] = explode(',', $father->food); // Split food by comma
        }
        return view('form.show',compact('data','food'));
    

}

    public function create() {
        return view('form.create');
    }
    public function store(Request $request) {
            // Validate incoming data
            $validatedData = $request->validate([
                'name' => 'required|max:24|min:5',
                'age' => 'required|numeric|between:1,150',
                'job' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,hcv,hdr,webp,tiff,avif', // Also added a max size
                'state' => 'required',
                'food' => 'required',
            ]);
            
            // Initialize $imagePath as null in case there's no image uploaded
            $imagePath = null;
        
            // Check if an image is uploaded
            if ($request->hasFile('image')) {
                // Get the uploaded image
                $image = $request->file('image');
                
                // Save the image in 'storage/app/public/image' directory and get the file path
                $imagePath = $image->store('image', 'public');
            }
            $validatedData['food'] = implode(',',$validatedData['food']);
            // Create a new Father record
            Father::create([
                'name' => $validatedData['name'],
                'age' => $validatedData['age'],
                'job' => $validatedData['job'],
                'state' => $validatedData['state'],
                'food' => $validatedData['food'],
                'image' => $imagePath, // Store the image path

            ]);
        
            // Redirect to the show page
            return redirect('/show');
        }
        
    public function  edit($id) {
        $data = Father::find($id);
        return view('form.edit',compact('data'));
    }
    public function update(Request $request, $id){
    // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:5',
            'age' => 'required|integer|min:1|max:150', // Ensure 'age' is an integer
            'image' => 'nullable|mimes:png,jpg,jpeg,hdr,hvc,webp|max:2048', // Optional image upload
        ]);

        // Fetch the user record
        $user = Father::findOrFail($id);

        if ($request->hasFile('image')) {
            // Check if the old file exists and delete it
            if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                unlink(public_path('storage/' . $user->image));
            }

            // Handle new image upload
            $file = $request->file('image');
            $imagePath = $file->store('image', 'public');
            $validatedData['image'] = $imagePath; // Update image path in validated data
        }

        // Update the user record
        $user->update($validatedData);

        // Redirect back with success message
        return redirect('/show')->with('success', "Data has been updated successfully");
    }

    public function destroy($id) {

        $user = Father::findOrFail($id);
        $user->delete();
        return redirect('/show');
    }
    public function destroySelected(Request $request) {
         // Check if there are selected IDs from the form
        if ($request->has('selectedIds')) {
            // Get the array of selected IDs
            $ids = $request->input('selectedIds');  // Correct name for the input is selectedIds  // This will dump the selected IDs array for debugging
            // Perform the deletion
            Father::whereIn('id', $ids)->delete();
                
            }
            return redirect('/show');
        }
}
