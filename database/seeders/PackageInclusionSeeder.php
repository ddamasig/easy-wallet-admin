<?php

namespace Database\Seeders;

use App\Models\PackageInclusion;
use App\Models\ReferralRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageInclusionSeeder extends Seeder
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
                'name' => 'Alkaline Drops',
                'description' => 'Alkaline drops are tasteless and odorless and can be added to water efficiently.',
                'is_enabled' => true
            ],
        ];

        foreach ($requirements as $r) {
            PackageInclusion::firstOrCreate([
                'name' => $r['name'],
                'description' => $r['description'],
                'is_enabled' => $r['is_enabled'],
            ]);
        }
    }
}
