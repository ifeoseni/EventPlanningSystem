<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EventCenter;

class EventCenterController extends Controller
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
        return view('admin.eventcenter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'eventcenterslug' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'state' => 'required',
            'country' => 'required|string|max:255',

        ]);

         $eventCenter = EventCenter::create([
             'name' =>$request->name,
             'description' =>$request->description,
             'eventcenterslug' =>$request->eventcenterslug,
             'location' =>$request->location,
             'latitude' =>$request->latitude,
             'longitude' =>$request->longitude,
             'lga' =>$request->lga,
             'state' =>$request->state,
             'country' =>$request->country,
             'addedby' =>Auth::id(),
         ]);
         //dd($eventCenter["addedby"]);

        if($eventCenter){
            return  redirect('add-event-type')->with('status','Event Center '.$eventCenter["name"].' Added Successfully');
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
