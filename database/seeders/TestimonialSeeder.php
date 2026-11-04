<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'author_name' => 'Jonathan Reyes',
                'author_title' => 'VP of Sustainable Packaging',
                'company' => 'Aura Global',
                'author_avatar' => '/assets/avatars/avatar-1.png',
                'rating' => 5,
                'badge' => '18,250 MT EPR Fulfilled',
                'quote' => "CircuFlow's food-grade rPET granules and digital weighbridge integration allowed us to exceed our statutory EPR quotas 3 months ahead of schedule with zero compliance discrepancy during state audits.",
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'author_name' => 'Dr. Aris Thorne',
                'author_title' => 'Urban Infrastructure Commissioner',
                'company' => 'Metro Smart Cities',
                'author_avatar' => '/assets/avatars/avatar-2.png',
                'rating' => 5,
                'badge' => '89.4% Landfill Diversion',
                'quote' => 'The decentralized Material Recovery Facility model deployed by CircuFlow transformed our municipal waste diversion rate from 42% to 89.4% while establishing formal digital banking and safety gear for 180+ local workers.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'author_name' => 'Claire Dupont',
                'author_title' => 'Chief Materials Engineer',
                'company' => 'Nexus Automotive',
                'author_avatar' => '/assets/avatars/avatar-3.png',
                'rating' => 5,
                'badge' => '-68% Carbon Footprint',
                'quote' => "The melt flow index and structural drop-impact resilience of CircuFlow's rHDPE and rPP copolymer resins match virgin petrochemical polymers, helping us cut Scope 3 carbon emissions without sacrificing part quality.",
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'author_name' => 'Vikram Sethi',
                'author_title' => 'Global Head of ESG & Sourcing',
                'company' => 'Solis Consumer',
                'author_avatar' => '/assets/avatars/avatar-4.png',
                'rating' => 5,
                'badge' => '100% Audit Verified',
                'quote' => 'Every single consignment of PCR resin comes with verifiable batch origin data and tamper-proof portal compliance certificates. Our audit readiness and stakeholder trust have never been higher.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'author_name' => 'Monica Alvarez',
                'author_title' => 'Procurement Director',
                'company' => 'Verdia Foods & Packaging',
                'author_avatar' => '/assets/avatars/avatar-5.png',
                'rating' => 5,
                'badge' => '99.4% Batch Purity',
                'quote' => "Replacing virgin polymer with CircuFlow's decontaminated rPET flakes in our blow-molding preforms resulted in zero line stoppages and flawless optical clarity across our bottling line.",
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::updateOrCreate(
                [
                    'author_name' => $data['author_name'],
                    'company' => $data['company'],
                ],
                $data
            );
        }
    }
}
