<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegistrationController extends Controller
{
    public function register(Request $request, $id) {
        if(!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
       
        $alreadyRegistered = Register::where('event_id', $id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($alreadyRegistered) {
            return response()->json([
                'status' => false,
                'message' => 'You have already registered for this event.'
            ], 409);
        }
        $register = new Register();
        $register->user_id = auth()->user()->id;
        $register->event_id = $id;
        $register->save();
        return response()->json(['message' => 'Registration successful', 'register' => $register], 200);

    }
}
