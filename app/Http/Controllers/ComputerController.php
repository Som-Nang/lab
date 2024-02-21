<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Room;
use App\Models\Status;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::join('rooms', 'rooms.room_id', '=', 'computers.room_id')
            ->join('status', 'status.id', '=', 'computers.status_id')
            ->select('computers.*', 'rooms.name as room_name', 'status.name as status_name')
            ->get();

        return Inertia::render('Computer/Index', [
            'computers' => $computers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //rooms
        $rooms = Room::query()
            ->select('room_id', 'name')
            ->orderBy('name')
            ->get();

        $statuses = Status::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return Inertia::render('Computer/Create', [
            'rooms' => $rooms,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:computers,name',
            'room_id' => 'required|exists:rooms,room_id',
            'status_id' => 'required|exists:status,id',
            'description' => 'nullable',
        ]);
        $computerID = $request->input('name');
        $data = [
            'computer_id' => $computerID,
            'name' =>  $request->input('name'),
            'room_id' => $request->input('room_id'),
            'status_id' => $request->input('status_id'),
            'description' => $request->input('description'),
        ];

        Computer::create($data);
        return redirect()->route('computer.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {

        $rooms = Room::query()
            ->select('room_id', 'name')
            ->orderBy('name')
            ->get();

        $statuses = Status::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $computerWithDetails = Computer::join('rooms', 'rooms.room_id', '=', 'computers.room_id')
            ->join('status', 'status.id', '=', 'computers.status_id')
            ->select('computers.*', 'rooms.name as room_name', 'status.name as status_name')
            ->findOrFail($computer->computer_id);

        return $computerWithDetails;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer)
    {


        $computer = Computer::findOrFail($computer->computer_id);

        $computerID = $request->input('name');
        $computer->update([
            'computer_id' => $computerID,
            'name' =>  $request->input('name'),
            'room_id' => $request->input('room_id'),
            'status_name' => $request->input('status_id'),
            'description' => $request->input('description'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        Computer::findOrFail($computer->computer_id)->delete();
        return redirect()->back();
    }
}
