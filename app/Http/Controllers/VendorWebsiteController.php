<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorType;
use App\Models\VendorWebsite;

class VendorWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function build()
    {
        //
        $vendortype = VendorType::all();
        return view('users.add-vendor-website',['vendortype' =>$vendortype]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('Name '. $request->name . ' Vendor Type ' . $request->vendortype . ' Location ' . $request->location . ' business start date' .   $request->datebusinessstarted . ' state ' .  $request->state . ' country ' .  $request->country . ' aboutus ' .  $request->aboutus . ' phone number ' .  $request->phone_number . ' email ' .  $request->email . ' facebook' . $request->facebook . ' twitter ' . $request->twitter . ' linkedin' . $request->linkedin . ' ' .   $request->instagram . ' instagram ' .   $request->color . ' color  ' .  $request->vendortype . ' ' .  Auth::id() );
        // dd($request->file('logo'));
        $request->validate([
            'name' => 'required|string|max:255',
            'vendortype' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'datebusinessstarted'  => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country'  => 'required|string|max:255',
            'aboutus'  => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            // // 'images' => 'required|string|max:255',
            // // 'images.*' => 'required|image|max:2048',
            // 'logo'  => 'required|string|max:255',
            'logo' => 'image|max:2048',
            'images.*' => 'image|max:2048',
            'color'  => 'required|string|max:255',
        ]);
        $logo = $request->file('logo');
        $images = $request->file('images');

        $upload = new VendorWebsite();

        if ($logo) {
            // $logo_path = $logo->store('logos', 'logo');
            // $upload->logo = $logo->getClientOriginalName();
            $logo1 = time() . '_' . $logo->getClientOriginalName();
            $logo->storeAs('public/logo', $logo1);
            $logo_path = $logo1;
            // $upload->logo_path = $logo_path;
        }else{
           $logo_path = ' ';
        }
        $imagesname = [];
        if (is_array($images)) {
            // If multiple images, loop through each image and store them
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/vendorimages', $filename);
                // Create a new TellStories instance and save the details
                array_push($imagesname,$filename);

            }

            $vendorwebsite = new VendorWebsite([
                'images' => implode(',', $imagesname),// json_encode($imagePaths),
                'name' => $request->name,
                'vendortype' => $request->vendortype,
                'location' => $request->location,
                'businessage' => $request->datebusinessstarted,
                'state' => $request->state,
                'country' => $request->country,
                'aboutus' => $request->aboutus,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'logo' => $logo_path,//json_encode($logostore),
                'color' => $request->color,
                'addedby' => Auth::id(),
                // 'date' => now(), // Add the current date
                // Add other details as needed
            ]);
            $vendorwebsite->save();



        } else {
            // If a single image, store it
            $filename = time() . '_' . $images->getClientOriginalName();
            $images->storeAs('public/vendorimages', $filename);
            $vendorwebsiteelse = new VendorWebsite([
                'images' => $filename,// json_encode($imagePaths),
                'name' => $request->name,
                'vendortype' => $request->vendortype,
                'location' => $request->location,
                'businessage' => $request->datebusinessstarted,
                'state' => $request->state,
                'country' => $request->country,
                'aboutus' => $request->aboutus,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'logo' => $logo_path,//json_encode($logostore),
                'color' => $request->color,
                'addedby' => Auth::id(),
                // 'date' => now(), // Add the current date
                // Add other details as needed
            ]);
            $vendorwebsiteelse->save();
        }
        // $vendorwebsite = new VendorWebsite([
        //     'images' => 'ade',// json_encode($imagePaths),
        //     'name' => $request->name,
        //     'vendortype' => $request->vendortype,
        //     'location' => $request->location,
        //     'businessage' => $request->datebusinessstarted,
        //     'state' => $request->state,
        //     'country' => $request->country,
        //     'aboutus' => $request->aboutus,
        //     'phone_number' => $request->phone_number,
        //     'email' => $request->email,
        //     'facebook' => $request->facebook,
        //     'twitter' => $request->twitter,
        //     'linkedin' => $request->linkedin,
        //     'instagram' => $request->instagram,
        //     'logo' => $logo_path,//json_encode($logostore),
        //     'color' => $request->color,
        //     'addedby' => Auth::id(),
        //     // 'date' => now(), // Add the current date
        //     // Add other details as needed
        // ]);
        // $vendorwebsite->save();



        // $imagePaths = [];
        // foreach ($images as $image) {
        //     $imagePath = $image->store('public/vendor');
        //     $imagePaths[] = $imagePath;
        // }
        // $logostore = $request->file('logo')->store('public/vendor/logo');
        // // $item = new VendorWebsite;
        // // $item->name = $request->input('name');
        // // $item->description = $request->input('description');
        // // $item->images = json_encode($imagePaths);
        // // $item->save();
        // $vendorwebsite = new VendorWebsite([
        //     'images' => 'ade',// json_encode($imagePaths),
        //     'name' => $request->name,
        //     'vendortype' => $request->vendortype,
        //     'location' => $request->location,
        //     'businessage' => $request->datebusinessstarted,
        //     'state' => $request->state,
        //     'country' => $request->country,
        //     'aboutus' => $request->aboutus,
        //     'phone_number' => $request->phone_number,
        //     'email' => $request->email,
        //     'facebook' => $request->facebook,
        //     'twitter' => $request->twitter,
        //     'linkedin' => $request->linkedin,
        //     'instagram' => $request->instagram,
        //     'logo' => 'ade',//json_encode($logostore),
        //     'color' => $request->color,
        //     'addedby' => Auth::id(),
        //     // 'date' => now(), // Add the current date
        //     // Add other details as needed
        // ]);
        // $vendorwebsite->save();
        // return  redirect('vendor/build-website')->with('status','Vendor Webiste  Added Successfully');

        // return response()->json(['success' => true]);

        // $imagesname = [];

        // // Get the uploaded image(s)
        // $images = $request->file('images');

        // // Check if multiple images were uploaded
        // if (is_array($images)) {
        //     // If multiple images, loop through each image and store them
        //     foreach ($images as $image) {
        //         $filename = time() . '_' . $image->getClientOriginalName();
        //         $image->storeAs('public/eventstories', $filename);
        //         // Create a new TellStories instance and save the details
        //         array_push($imagesname,$filename);

        //     }

        //     $tellStories = new TellStory([
        //         'images' => implode(',', $imagesname),
        //         'name' => $request->name,
        //         'vendortype' => $request->vendortype,
        //         'location' => $request->location,
        //         'datebusinessstarted' => $request->datebusinessstarted,
        //         'state' => $request->state,
        //         'addedby' => Auth::id(),
        //         // 'date' => now(), // Add the current date
        //         // Add other details as needed
        //     ]);
        //     $tellStories->save();

        // } else {
        //     // If a single image, store it
        //     $filename = time() . '_' . $images->getClientOriginalName();
        //     $images->storeAs('public/eventstories', $filename);
        //     // Create a new TellStories instance and save the details
        //     $tellStories = new TellStory([
        //         'images' => $filename,
        //         'name' => $request->name,
        //         'vendortype' => $request->vendortype,
        //         'location' => $request->location,
        //         'datebusinessstarted' => $request->datebusinessstarted,
        //         'state' => $request->state,
        //         'addedby' => Auth::id(),
        //         //'date' => now(), // Add the current date
        //         // Add other details as needed
        //     ]);
        //     $tellStories->save();
        // }

        // return redirect()->back()->with('s');


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
