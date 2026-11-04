<?php

namespace Tests\Feature;

use App\Models\Policy;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PolicyTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    public function test_guest_cannot_access_policy_admin(): void
    {
        $response = $this->get('/admin/policies');
        $response->assertRedirect('/login');

        $createResponse = $this->get('/admin/policies/create');
        $createResponse->assertRedirect('/login');
    }

    public function test_admin_can_view_policies_list(): void
    {
        Policy::create([
            'title' => 'Environmental Policy',
            'slug' => 'environmental-policy',
            'content' => '<p>Environmental standards followed by CircuFlow.</p>',
            'is_published' => true,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/policies');
        $response->assertStatus(200);
        $response->assertSee('Policies');
        $response->assertSee('Environmental Policy');
        $response->assertSee('/policy/environmental-policy');
    }

    public function test_admin_can_create_new_policy_page(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/policies', [
            'title' => 'Return and Refund Policy',
            'content' => '<h2>Returns</h2><p>Items can be returned within 30 days.</p>',
            'meta_description' => 'Official return and refund guidelines.',
            'is_published' => '1',
            'sort_order' => 5,
        ]);

        $response->assertRedirect('/admin/policies');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('policies', [
            'title' => 'Return and Refund Policy',
            'slug' => 'return-and-refund-policy',
            'is_published' => true,
            'sort_order' => 5,
        ]);
    }

    public function test_admin_can_edit_and_update_policy(): void
    {
        $policy = Policy::create([
            'title' => 'Draft Guidelines',
            'slug' => 'draft-guidelines',
            'content' => '<p>Old draft text.</p>',
            'is_published' => false,
        ]);

        $editViewResponse = $this->actingAs($this->admin)->get("/admin/policies/{$policy->id}/edit");
        $editViewResponse->assertStatus(200);
        $editViewResponse->assertSee('Edit Policy');
        $editViewResponse->assertSee('Draft Guidelines');

        $updateResponse = $this->actingAs($this->admin)->put("/admin/policies/{$policy->id}", [
            'title' => 'Published Compliance Guidelines',
            'slug' => 'compliance-guidelines',
            'content' => '<p>Updated and published compliance requirements.</p>',
            'is_published' => '1',
            'sort_order' => 2,
        ]);

        $updateResponse->assertRedirect('/admin/policies');
        $updateResponse->assertSessionHas('success');

        $this->assertDatabaseHas('policies', [
            'id' => $policy->id,
            'title' => 'Published Compliance Guidelines',
            'slug' => 'compliance-guidelines',
            'is_published' => true,
        ]);
    }

    public function test_admin_can_delete_policy(): void
    {
        $policy = Policy::create([
            'title' => 'Obsolete Policy',
            'slug' => 'obsolete-policy',
            'content' => '<p>This will be deleted.</p>',
            'is_published' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete("/admin/policies/{$policy->id}");
        $response->assertRedirect('/admin/policies');
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('policies', [
            'id' => $policy->id,
        ]);
    }

    public function test_public_user_can_view_published_policy(): void
    {
        $policy = Policy::create([
            'title' => 'Public Sustainability Charter',
            'slug' => 'sustainability-charter',
            'content' => '<h2>Net-Zero Target</h2><p>We commit to zero landfill diversion.</p>',
            'is_published' => true,
        ]);

        $response = $this->get('/policy/sustainability-charter');
        $response->assertStatus(200);
        $response->assertSee('Public Sustainability Charter');
        $response->assertSee('Net-Zero Target');
        $response->assertSee('We commit to zero landfill diversion.');
    }

    public function test_unpublished_policy_returns_404_for_guest(): void
    {
        Policy::create([
            'title' => 'Confidential Internal Policy',
            'slug' => 'confidential-internal',
            'content' => '<p>Secret</p>',
            'is_published' => false,
        ]);

        $response = $this->get('/policy/confidential-internal');
        $response->assertStatus(404);
    }
}
