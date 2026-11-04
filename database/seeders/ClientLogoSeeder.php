<?php

namespace Database\Seeders;

use App\Models\ClientLogo;
use Illuminate\Database\Seeder;

class ClientLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            [
                'name' => 'Aura Beverages',
                'logo_path' => '/assets/logos/logo-aura.png',
                'website_url' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'EcoPack Global',
                'logo_path' => '/assets/logos/logo-ecopack.png',
                'website_url' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Nexus Automotive',
                'logo_path' => '/assets/logos/logo-nexus.png',
                'website_url' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Solis Homecare',
                'logo_path' => '/assets/logos/logo-solis.png',
                'website_url' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Verdia Foods',
                'logo_path' => '/assets/logos/logo-verdia.png',
                'website_url' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Metro Smart Cities',
                'logo_path' => '/assets/logos/logo-metro.png',
                'website_url' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Apex Industrial',
                'logo_path' => '/assets/logos/logo-apex.png',
                'website_url' => null,
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'TerraPak Resins',
                'logo_path' => '/assets/logos/logo-terrapak.png',
                'website_url' => null,
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($logos as $data) {
            ClientLogo::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
