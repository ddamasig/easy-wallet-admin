<?php

namespace App\Http\Controllers;

use App\Models\ReferralRequirement;
use App\Models\ReferralSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ReferralRequirementController extends Controller
{
    /**
     * Returns a list of referral requirements.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $requirements = ReferralRequirement::orderBy('created_at', 'asc')->all();
            return response()->json([
                'referral_requirements' => $requirements
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while getting your referral requirements.'
            ], 500);
        }
    }

    /**
     * Create a new referral requirement.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->validate([
            'name' => 'required|string|max:128',
            'description' => 'required|string|max:512',
            'is_enabled' => 'required|boolean',
        ]);
        try {
            $requirement = ReferralRequirement::firstOrCreate($input);
            return response()->json([
                'referral_requirement' => $requirement
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while creating the new referral requirement.'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ReferralRequirement $referral_requirement
     * @return JsonResponse
     */
    public function update(Request $request, ReferralRequirement $referral_requirement): JsonResponse
    {
        $input = $request->validate([
            'name' => 'required|string|max:128',
            'description' => 'required|string|max:512',
            'is_enabled' => 'required|boolean',
        ]);
        try {
            $requirement = ReferralRequirement::update($input);
            return response()->json([
                'referral_requirement' => $requirement
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while updating the new referral requirement.'
            ], 500);
        }
    }
}
