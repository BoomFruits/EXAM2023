<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.index',['rooms' => Room::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'RoomNumber' => 'required|integer',
            'RoomType' => 'required',
            'Availability' => 'required'
        ]);
        $RoomNumber = $request->input('RoomNumber');
        $roomType = $request->input('RoomType');
        $availability = $request->input('Availability');
        DB::table('rooms')->insert([
            'RoomNumber' => $RoomNumber,
            'RoomType' => $roomType,
            'Availability' => $availability,
        ]);
        return redirect()->route('rooms.index')->with('success','Room Added Successfully');
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
        $room = Room::find($id);
        return view('rooms.edit')->with('room',$room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $request->validate([
            'RoomNumber' => 'required|integer',
            'RoomType' => 'required',
            'Availability' => 'required'
        ]);
        $room->RoomNumber = $request->input('RoomNumber');
        $room->roomType = $request->input('RoomType');
        $room->availability = $request->input('Availability');
        $room->update();
        return redirect()->route('rooms.index')->with('success','Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        try{
            $room->delete();
            return redirect()->route('rooms.index')->with('success','Room Deleted Successfully');
        }catch(Exception $e){
            echo $e;        
        }
    }
}
