<?php

namespace App\Http\Controllers;

use App\Models\ReferralSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReferralSettingController extends Controller
{
    /**
     * Returns the ReferralSetting object.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            // Only one referral setting should exist.
            $referral_setting = ReferralSetting::first();
            return response()->json([
                'referral_setting' => $referral_setting
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while getting your referral settings. Please contact your admin.'
            ], 500);
        }
    }

    /**
     * Update the referral setting object.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->validate([
            'duration' => 'required|min:1',
            'is_transfer_enabled' => 'required|boolean',
            'is_eloading_enabled' => 'required|boolean',
            'is_ticketing_enabled' => 'required|boolean',
            'is_bills_payment_enabled' => 'required|boolean',
        ]);
        try {
            // Only one referral setting should exist.
            $referral_setting = ReferralSetting::first();
            $referral_setting->update($input);
            $referral_setting->save();

            return response()->json([
                'referral_setting' => $referral_setting,
                'message' => 'Successfully updated the referral settings',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while updating your referral settings.',
            ], 500);
        }
    }
}
