<?php

namespace Tests\Feature;

use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobOpeningTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create([
            'email' => 'admin@shristiyam.com',
        ]);
    }

    public function test_public_career_page_renders_dynamic_job_openings(): void
    {
        $activeJob = JobOpening::create([
            'title' => 'Senior EPR Auditor',
            'slug' => 'senior-epr-auditor',
            'department' => 'EPR & Compliance',
            'location' => 'Nagpur HQ',
            'employment_type' => 'Full-time',
            'experience' => '3 - 6 Years',
            'overview' => 'Lead EPR compliance audits across western and central India.',
            'icon_type' => 'shield',
            'badge_text' => 'Priority Hiring',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $inactiveJob = JobOpening::create([
            'title' => 'Archived Role Spec',
            'slug' => 'archived-role-spec',
            'department' => 'R&D',
            'location' => 'Remote',
            'employment_type' => 'Part-time',
            'experience' => '1 - 2 Years',
            'overview' => 'Draft closed role specification.',
            'icon_type' => 'flame',
            'badge_text' => 'Closed',
            'is_active' => false,
            'sort_order' => 99,
        ]);

        $response = $this->get('/careers');
        $response->assertStatus(200);
        $response->assertSee('Senior EPR Auditor');
        $response->assertSee('Priority Hiring');
        $response->assertSee('Nagpur HQ');
        $response->assertDontSee('Archived Role Spec');

        // Verify position select dropdown options
        $response->assertSee('Senior EPR Auditor (Nagpur HQ)');

        // Test alias route /career
        $aliasResponse = $this->get('/career');
        $aliasResponse->assertStatus(200);
        $aliasResponse->assertSee('Senior EPR Auditor');
    }

    public function test_admin_can_view_job_openings_index(): void
    {
        JobOpening::create([
            'title' => 'Biomass Plant Head',
            'slug' => 'biomass-plant-head',
            'department' => 'BioEnergy & BioFuels',
            'location' => 'Central India Plant',
            'employment_type' => 'Full-time',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.jobs.index'));
        $response->assertStatus(200);
        $response->assertSee('Biomass Plant Head');
        $response->assertSee('Careers &amp; Job Openings', false);
    }

    public function test_admin_can_create_new_job_opening(): void
    {
        $payload = [
            'title' => 'Supply Chain Aggregation Lead',
            'department' => 'Logistics & Supply Chain',
            'location' => 'Nagpur / Pune',
            'employment_type' => 'Full-time',
            'experience' => '3 - 5 Years',
            'overview' => 'Manage material recovery center vendor networks.',
            'description' => 'Full detailed job specification goes here.',
            'icon_type' => 'truck',
            'badge_text' => 'Immediate Joining',
            'sort_order' => 5,
            'is_active' => 1,
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('admin.jobs.store'), $payload);

        $response->assertRedirect(route('admin.jobs.index'));
        $this->assertDatabaseHas('job_openings', [
            'title' => 'Supply Chain Aggregation Lead',
            'slug' => 'supply-chain-aggregation-lead',
            'icon_type' => 'truck',
            'is_active' => 1,
        ]);
    }

    public function test_admin_can_update_job_opening(): void
    {
        $job = JobOpening::create([
            'title' => 'Initial Title',
            'slug' => 'initial-title',
            'department' => 'General',
            'location' => 'Nagpur',
            'employment_type' => 'Full-time',
            'is_active' => true,
        ]);

        $updatePayload = [
            'title' => 'Updated Technical Lead',
            'department' => 'Engineering',
            'location' => 'Mumbai / Hybrid',
            'employment_type' => 'Full-time',
            'experience' => '5+ Years',
            'overview' => 'Updated overview copy.',
            'icon_type' => 'settings',
            'badge_text' => 'Lead Role',
            'sort_order' => 2,
            'is_active' => 1,
        ];

        $response = $this->actingAs($this->admin)
            ->put(route('admin.jobs.update', $job), $updatePayload);

        $response->assertRedirect(route('admin.jobs.index'));
        $this->assertDatabaseHas('job_openings', [
            'id' => $job->id,
            'title' => 'Updated Technical Lead',
            'department' => 'Engineering',
            'icon_type' => 'settings',
        ]);
    }

    public function test_admin_can_toggle_job_opening_status(): void
    {
        $job = JobOpening::create([
            'title' => 'Toggle Status Role',
            'slug' => 'toggle-status-role',
            'department' => 'Operations',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)
            ->patch(route('admin.jobs.toggle-status', $job));

        $response->assertRedirect();
        $this->assertDatabaseHas('job_openings', [
            'id' => $job->id,
            'is_active' => 0,
        ]);
    }

    public function test_admin_can_delete_job_opening(): void
    {
        $job = JobOpening::create([
            'title' => 'Role To Delete',
            'slug' => 'role-to-delete',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.jobs.destroy', $job));

        $response->assertRedirect(route('admin.jobs.index'));
        $this->assertDatabaseMissing('job_openings', [
            'id' => $job->id,
        ]);
    }
}
