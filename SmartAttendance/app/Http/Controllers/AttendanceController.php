<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user exists
            'date_checkin' => 'required|date',
            'date_checkout' => 'required|date|after_or_equal:date_checkin', // Check-out must be after check-in
        ]);

        $attendance = Attendance::create($request->all());

        return response()->json($attendance, 201);
    }

    public function index()
    {
        $attendances = Attendance::with('user')->get();
        return response()->json($attendances, 200);
    }

    public function show($id)
    {
        $attendance = Attendance::with('user')->findOrFail($id);
        return response()->json($attendance, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date_checkin' => 'sometimes|required|date',
            'date_checkout' => 'sometimes|required|date|after_or_equal:date_checkin',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return response()->json($attendance, 200);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return response()->json(null, 204);
    }
}
