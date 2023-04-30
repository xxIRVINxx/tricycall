<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('is_available', 1)->where('role', '2')->get(['users.*', 'users.plate# AS plateno', 'users.phone# AS phone']);
        return view ("availability", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $driver_id = $request->input("driver_id");
        $data = Array(
            "customer_id" => Auth::id(),
            "driver_id" => $driver_id,
            "book_datetime" => date("Y-m-d H:i:s"),
        );
        if(Availability::create($data)){
            User::where('id', $driver_id)->update(["is_booked" => 1]);
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function responseBooking(Request $request, Availability $availability)
    {
        $response = $request->input('status');
        $driver_id = Auth::user()->role == '2' ? Auth::id() : $request->input('driver');
        $id = $request->input('bookingId');
        if($response == 'Cancelled' || $response == 'Declined' || $response == 'Completed')
            User::find($driver_id)->update(['is_booked' => 0]);
        if(Availability::find($id)->update(['status' => $response]))
            echo 1;
        else
            echo 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Availability $availability)
    {
        //
    }
}
