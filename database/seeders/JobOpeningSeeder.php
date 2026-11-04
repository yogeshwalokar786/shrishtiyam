<?php

namespace Database\Seeders;

use App\Models\JobOpening;
use Illuminate\Database\Seeder;

class JobOpeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $openings = [
            [
                'title' => 'EPR & Compliance Advisory',
                'slug' => 'epr-compliance-advisory',
                'department' => 'EPR & Compliance Advisory',
                'location' => 'Nagpur HQ',
                'employment_type' => 'Full-time',
                'experience' => '2 - 5 Years',
                'overview' => 'Auditing, CPCB portal quota allocation, PIBO target fulfillment, and statutory environmental returns filing.',
                'icon_type' => 'shield',
                'badge_text' => 'Full-time',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'BioEnergy & Alternative Fuels',
                'slug' => 'bioenergy-alternative-fuels',
                'department' => 'BioEnergy & Alternative Fuels',
                'location' => 'Plant Operations • Central India',
                'employment_type' => 'Full-time',
                'experience' => '3 - 7 Years',
                'overview' => 'Processing agricultural and industrial solid waste into high-CV Refuse Derived Fuel (RDF) and industrial biomass pellets.',
                'icon_type' => 'flame',
                'badge_text' => 'Full-time',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Supply Chain & MRF Management',
                'slug' => 'supply-chain-mrf-management',
                'department' => 'Supply Chain & Logistics',
                'location' => 'Regional Hubs • Field Operations',
                'employment_type' => 'Full-time',
                'experience' => '2 - 5 Years',
                'overview' => 'Direct municipal material recovery facility (MRF) aggregation, waste-worker formalization, and fair pricing mechanisms.',
                'icon_type' => 'truck',
                'badge_text' => 'Full-time',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($openings as $job) {
            JobOpening::firstOrCreate(['slug' => $job['slug']], $job);
        }
    }
}

