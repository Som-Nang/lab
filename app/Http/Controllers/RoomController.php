<?php



namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::take(10)->get();

        return $rooms;
    }

    public function create()
    {
        return inertia('Room/Create');
    }



    public function store(Request $request, $id = null)
    {
        $request->validate([
            'roomName' => 'required|unique:rooms,name',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'status' => 'required|in:active,maintenance',
        ]);

        $roomId = $request->input('roomName');
        Room::create([
            'room_id' => $roomId,
            'name' => $request->input('roomName'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'capacity' => $request->input('capacity'),
            'user_id' => 1,
        ]);
    }
}
