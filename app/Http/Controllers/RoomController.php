<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function index()
    {
        // $rooms = Room::take(10)->get();

        // return $rooms;
        return inertia::render('Room/index', [
            'rooms' => Room::all()->map(function ($room) {
                return [
                    'room_id' => $room->room_id,
                    'name' => $room->name,
                    'description' => $room->description,
                    'status' => $room->status,
                    'capacity' => $room->capacity,
                    'user_id' => auth()->user()->id,

                ];
            })
        ]);
    }

    public function create()
    {
        return inertia('Room/Create');
    }



    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|unique:rooms,name',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'status' => 'required|in:active,maintenance',
        ]);

        $roomId = $request->input('name');
        Room::create([
            'room_id' => $roomId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'capacity' => $request->input('capacity'),
            'user_id' => auth()->user()->id,
        ]);
    }
    public function edit(string $id)
    {
        return Room::query()
            ->where('room_id', $id)
            ->firstOrFail();
        // $room = Room::find($id));
        // if (!$room) {
        //     abort(404);
        // }
        // return $room;
    }
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $room = Room::query()
            ->where('room_id', $id)
            ->firstOrFail();
        // dd($room);
        $roomId = $request->input('name');
        $room->update([
            'room_id' => $roomId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'capacity' => $request->input('capacity'),
            'status' => $request->input('status')
        ]);
    }
    public function destroy(string $id)
    {
        $room = Room::find($id);
        if (!$room) {
            abort(404);
        }
        $room->delete();
    }
}
