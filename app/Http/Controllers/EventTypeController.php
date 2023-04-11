<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function addForm(){

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(Auth::check()){
        //     return view('users.add-event-type');
        // }
        // if (Auth::guest()) {
        //     return view('auth.login');
        // }

        return view('users.add-event-type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'eventname' => 'required|string|max:255',
            'eventdescription' => 'required|string|max:255',
            'eventslug' => 'nullable',

        ]);


         $eventType = EventType::create([
             'eventname' => $request->eventname,
             'eventdescription' => $request->eventdescription,
             'eventslug' => $request->eventslug,
             'addedby' => Auth::id(),
         ]);

        if($eventType){
            return  redirect('add-event-type')->with('status','Event Type '.$eventType["eventname"].'Added Successfully');
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
