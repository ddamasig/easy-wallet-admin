<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Updates the password of the logged-in user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request): JsonResponse
    {
        $input = $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($input['old_password'], $user->password)) {
            return response()->json([
                'message' => 'Wrong old password provided',
            ], 403);
        }

        try {
            $user->password = bcrypt($input['new_password']);
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while updating your password.',
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated your password.',
        ], 200);
    }

    /**
     * Updates the PIN of the logged-in user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePin(Request $request): JsonResponse
    {
        $input = $request->validate([
            'old_pin' => 'required|max:4',
            'new_pin' => 'required|max:4|confirmed',
            'new_pin_confirmation' => 'required|max:4',
        ]);

        $user = Auth::user();

        if (!Hash::check($input['old_pin'], $user->pin)) {
            return response()->json([
                'message' => 'Wrong old PIN provided',
            ], 403);
        }

        try {
            $user->pin = bcrypt($input['new_pin']);
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while updating your PIN.',
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated your PIN.',
        ], 200);
    }


    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Successfully logged out.'
        ], 200);
    }
}
