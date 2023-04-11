<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TellStory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File; //validate file
use Illuminate\Http\UploadedFile;


class TellStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function accessStoryForm(){
        return view('users.tell-your-story');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store1(Request $request)//1 file
    // {
    //     //

    //     $request->validate([
    //         'storytitle' => 'required|string|max:255',
    //         'storydescription' => 'required|string|max:255',
    //         'whereithappened' => 'required|string|max:255',
    //         'dateithappened'  => 'required|string|max:255',
    //         'estimatedattendees' => 'required|Integer|max:255',
    //         'images' => 'required|image|mimes:jpg,jpeg,webp,png,gif|max:2048'

    //     ]);

    //     // save image to storage
    //     $imagePath = $request->file('images')->store('public/eventstories');

    //     // create new TellStories model instance
    //     $tellStory = new TellStory();
    //     $tellStory->images = $imagePath;
    //     // add any additional data fields here
    //     $tellStory->storytitle = $request->storytitle;
    //     $tellStory->storydescription = $request->storydescription;
    //     $tellStory->whereithappened = $request->whereithappened;
    //     $tellStory->dateithappened = $request->dateithappened;
    //     $tellStory->estimatedattendees = $request->estimatedattendees;

    //     $tellStory->addedby = Auth::id();
    //     //$tellStory->date = $request->input('date');
    //     // ...

    //     // save model instance to database
    //     $tellStory->save();

    //     return redirect()->back()->with('status', 'Story uploaded successfully!');


    // }
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'storytitle' => 'required|string|max:255',
            'storydescription' => 'required|string|max:255',
            'whereithappened' => 'required|string|max:255',
            'dateithappened'  => 'required|string|max:255',
            'estimatedattendees' => 'required|Integer|max:255',
            'images.*' => 'required|image|max:2048', // max size of 2MB
            // Add more validation rules for other fields as needed
        ]);
        $imagesname = [];

        // Get the uploaded image(s)
        $images = $request->file('images');

        // Check if multiple images were uploaded
        if (is_array($images)) {
            // If multiple images, loop through each image and store them
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/eventstories', $filename);
                // Create a new TellStories instance and save the details
                array_push($imagesname,$filename);

            }

            $tellStories = new TellStory([
                'images' => implode(',', $imagesname),
                'storytitle' => $request->storytitle,
                'storydescription' => $request->storydescription,
                'whereithappened' => $request->whereithappened,
                'dateithappened' => $request->dateithappened,
                'estimatedattendees' => $request->estimatedattendees,
                'addedby' => Auth::id(),
                // 'date' => now(), // Add the current date
                // Add other details as needed
            ]);
            $tellStories->save();

        } else {
            // If a single image, store it
            $filename = time() . '_' . $images->getClientOriginalName();
            $images->storeAs('public/eventstories', $filename);
            // Create a new TellStories instance and save the details
            $tellStories = new TellStory([
                'images' => $filename,
                'storytitle' => $request->storytitle,
                'storydescription' => $request->storydescription,
                'whereithappened' => $request->whereithappened,
                'dateithappened' => $request->dateithappened,
                'estimatedattendees' => $request->estimatedattendees,
                'addedby' => Auth::id(),
                //'date' => now(), // Add the current date
                // Add other details as needed
            ]);
            $tellStories->save();
        }

        return redirect()->back()->with('status', 'Images uploaded successfully.'.$tellStories["images"]);
    }

    // public function storeBad(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'storytitle' => 'required|string|max:255',
    //         'storydescription' => 'required|string|max:255',
    //         'whereithappened' => 'required|string|max:255',
    //         'dateithappened'  => 'required|string|max:255',
    //         'estimatedattendees' => 'required|Integer|max:255',
    //         'images' => 'required|image|max:2048', // max size of 2MB
    //         // Add more validation rules for other fields as needed
    //     ]);

    //     // Store the files and get their names
    //     $filenames = [];
    //     if ($request->hasfile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $filename = time() . '_' . $image->getClientOriginalName();
    //             $image->storeAs('public/eventstories', $filename);
    //             $filenames[] .= $filename;
    //         }
    //     }


    //     // Save the filenames to the database
    //     $tellStory = new TellStory();
    //     $tellStory->images = implode(',', $filenames);
    //     $tellStory->storytitle = $request->storytitle;
    //     $tellStory->storydescription = $request->storydescription;
    //     $tellStory->whereithappened = $request->whereithappened;
    //     $tellStory->dateithappened = $request->dateithappened;
    //     $tellStory->estimatedattendees = $request->estimatedattendees;
    //     $tellStory->addedby = Auth::id();
    //     // Add other fields to the model as needed
    //     $tellStory->save();
    //     dd($filenames);


    //     return redirect()->back()->with('status', 'Images uploaded successfully.');
    // }


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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
