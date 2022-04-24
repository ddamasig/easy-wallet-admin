<?php

namespace Database\Seeders;

use App\Models\ReferralRequirement;
use Illuminate\Database\Seeder;

class ReferralRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requirements = [
            [
                'name' => 'Selfie Photo',
                'description' => 'A clear photo that captures your entire face. Make sure to take the photo on a well lit area.',
                'is_enabled' => true
            ],
            [
                'name' => 'ID Picture',
                'description' => 'A clear photo of your government-issued ID which includes your face. Example of these IDs are: driver\s license, passport, SSS ID/UMID, and GSIS ID.',
                'is_enabled' => true
            ],
            [
                'name' => 'Proof of Payment',
                'description' => 'A proof of transaction for the membership fee. Make sure to include the reference number provided to you upon registration.',
                'is_enabled' => true
            ],
        ];

        foreach ($requirements as $r) {
            ReferralRequirement::firstOrCreate([
                'name' => $r['name'],
                'description' => $r['description'],
                'is_enabled' => $r['is_enabled'],
            ]);
        }
    }
}
