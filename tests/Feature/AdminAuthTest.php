<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
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

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('NovaAdmin Portal');
        $response->assertSee('Sign In');
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($this->admin);

        // Access dashboard
        $dashResponse = $this->actingAs($this->admin)->get('/admin/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Welcome back');
        $dashResponse->assertSee('Messages');
        $dashResponse->assertSee('Media');
        $dashResponse->assertSee('Sitemap');
        $dashResponse->assertSee('Quick Shortcuts');
    }

    public function test_change_password_page_and_update(): void
    {
        // View change password form
        $response = $this->actingAs($this->admin)->get('/admin/change-password');
        $response->assertStatus(200);
        $response->assertSee('Update Your Password');

        // Update password with validation
        $updateResponse = $this->actingAs($this->admin)->post('/admin/change-password', [
            'current_password' => 'admin123',
            'password' => 'NewSecurePassword123!',
            'password_confirmation' => 'NewSecurePassword123!',
        ]);

        $updateResponse->assertRedirect('/admin/change-password');
        $updateResponse->assertSessionHas('success');

        // Verify updated password in database
        $this->admin->refresh();
        $this->assertTrue(Hash::check('NewSecurePassword123!', $this->admin->password));
    }

    public function test_admin_can_view_profile_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/profile');
        $response->assertStatus(200);
        $response->assertSee('Edit Profile Details');
        $response->assertSee('Alexander Vance');
        $response->assertSee('admin@admin.com');
    }

    public function test_admin_can_update_profile_details(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/profile', [
            'name' => 'Alexander Vance Updated',
            'email' => 'admin.updated@admin.com',
            'phone' => '+1 (555) 999-8888',
            'job_title' => 'Chief Technology Officer',
            'bio' => 'Overseeing all architectural infrastructure.',
        ]);

        $response->assertRedirect('/admin/profile');
        $response->assertSessionHas('success');

        $this->admin->refresh();
        $this->assertEquals('Alexander Vance Updated', $this->admin->name);
        $this->assertEquals('admin.updated@admin.com', $this->admin->email);
        $this->assertEquals('+1 (555) 999-8888', $this->admin->phone);
        $this->assertEquals('Chief Technology Officer', $this->admin->job_title);
        $this->assertEquals('Overseeing all architectural infrastructure.', $this->admin->bio);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->admin)->post('/logout');
        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_admin_panel_displays_work_started_date(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Work Started: 26 Sept 2026');
    }
}

