<?php

namespace App\Http\Controllers;
use App\Reservation;
use App\Http\Resources\Reservation as ReservationResource;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Reservations
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of Reservations as a resource
        return ReservationResource::collection($reservations);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = $request->isMethod('put') ? Reservation::findOrFail($request->id) : new Reservation;

        $reservation->id = $request->input('id');
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->customer_id = $request->input('customer_id');
        $reservation->dining_table_id = $request->input('dining_table_id');
        $reservation->enabled = $request->input('enabled');
        $reservation->created_by = $request->input('created_by');
        $reservation->updated_by = $request->input('updated_by');
        if($reservation->save()) {
            return new ReservationResource($reservation);
        }
    }
    /**
     * Display the specified resource.
     *$
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Reservation
        $reservation = Reservation::findOrFail($id);

        // Return single Reservation as a resource
        return new ReservationResource($reservation);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Reservation
        $reservation = Reservation::findOrFail($id);

        if($reservation->delete()) {
            return new ReservationResource($reservation);
        }    
    }
}
