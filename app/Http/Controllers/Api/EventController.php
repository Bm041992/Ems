<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Validator;

class EventController extends Controller
{
    public function index() {
        $events = Event::where('status', 'published')->get();
        return response()->json(['message' => 'Success', 'events' => $events], 200);
    }

    public function show($id) {
        $event = Event::find($id);
        return response()->json(['message' => 'Success', 'event' => $event], 200);
    }

    public function store(Request $request) {
        if(!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if(auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'max_seats' => 'required|integer',
            'location' => 'required|string',
            'event_date' => 'required|date',
            'status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $event = Event::create($request->all());
        return response()->json(['message' => 'Success', 'event' => $event], 201);
    }

    public function update(Request $request, $id) {
        
        if(!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if(auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json(['message' => 'Success', 'event' => $event], 200);
    }

    public function destroy($id) {
        if(!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if(auth()->user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $event = Event::find($id);
        $event->delete();
        return response()->json(['message' => 'Success', 'event' => $event], 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        $user->currentAccessToken()->delete();
       //$request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
