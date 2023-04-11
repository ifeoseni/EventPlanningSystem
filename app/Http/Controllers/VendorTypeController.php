<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\VendorType;

class VendorTypeController extends Controller
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
        return view('users.add-vendor-type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'servicename' => 'required|string|max:255',
            'servicedescription' => 'required|string|max:255',
            'serviceslug' => 'required|string|max:255',

        ]);



         $vendorType = VendorType::create([
             'servicename' => $request->servicename,
             'servicedescription' => $request->servicedescription,
             'serviceslug' => $request->serviceslug,
             'addedby' => Auth::id(),
         ]);

        if($vendorType){
            return  redirect('add-vendor-type')->with('status','Vendor Type '. $vendorType["servicename"].' Added Successfully');
        }
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
