<?php

namespace App\Http\Controllers;

use App\Models\PackageInclusion;
use App\Models\ReferralRequirement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PackageInclusionController extends Controller
{
    /**
     * Returns a list of referral package inclusions.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $package_inclusions = PackageInclusion::orderBy('created_at', 'asc')->get();
            return response()->json([
                'package_inclusions' => $package_inclusions
            ], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => 'An error has occurred while getting the package inclusions.'
            ], 500);
        }
    }

    /**
     * Create a new package inclusion.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->validate([
            'name' => 'required|string|max:128',
            'photo' => 'required|mimes:jpg,bmp,png|size:10240',
            'description' => 'required|string|max:512',
            'is_enabled' => 'required|boolean',
        ]);

        try {
            $package_inclusion = DB::transaction(function () {
                $package_inclusion = PackageInclusion::firstOrCreate($input);
                $package_inclusion->addMediaFromRequest('photo')
                    ->toMediaCollection();

                return $package_inclusion;
            });

            return response()->json([
                'package_inclusion' => $package_inclusion
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while creating the new package inclusion.'
            ], 500);
        }
    }

    /**
     * Update the specified package inclusion in storage.
     *
     * @param Request $request
     * @param PackageInclusion $package_inclusion
     * @return JsonResponse
     */
    public function update(Request $request, PackageInclusion $package_inclusion): JsonResponse
    {
        $input = $request->validate([
            'name' => 'required|string|max:128',
            'file_size_limit' => 'required|int',
            'description' => 'required|string|max:512',
            'is_enabled' => 'required|boolean',
        ]);
        try {
            $package_inclusion = $package_inclusion->update($input);
            return response()->json([
                'package_inclusion' => $package_inclusion
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred while updating the new referral requirement.'
            ], 500);
        }
    }
}
