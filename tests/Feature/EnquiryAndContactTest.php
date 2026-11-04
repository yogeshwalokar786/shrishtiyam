<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EnquiryAndContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_loads_successfully()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Connect with');
        $response->assertSee('Send Inquiry / Request Proposal');
        $response->assertSee('SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED');
        $response->assertSee('U74900ME2026PTC473633');
        $response->assertSee('PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra');
        $response->assertSee('7020784898');
        $response->assertSee('9112327953');
        $response->assertSeeText('Corporate Inquiries');
        $response->assertSeeText('EPR Statutory Compliance Desk');
        $response->assertSeeText('Industrial Fuels & Off-Take Desk');
        $response->assertSee('admin@shristiyam.com');
    }

    public function test_contact_page_renders_all_three_configured_desk_emails(): void
    {
        \App\Models\Setting::setMany([
            'contact_email' => 'corporate@custom-domain.com',
            'epr_desk_email' => 'epr-compliance@custom-domain.com',
            'polymer_sales_email' => 'materials-supply@custom-domain.com',
        ]);

        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('corporate@custom-domain.com');
        $response->assertSee('epr-compliance@custom-domain.com');
        $response->assertSee('materials-supply@custom-domain.com');
        $response->assertSeeText('Corporate Inquiries');
        $response->assertSeeText('EPR Statutory Compliance Desk');
        $response->assertSeeText('Industrial Fuels & Off-Take Desk');
    }

    public function test_client_can_submit_contact_form()
    {
        $response = $this->post('/contact/submit', [
            'name' => 'John Doe',
            'email' => 'john@acme-corp.com',
            'phone' => '+1 555 987 6543',
            'subject' => 'Procure PCR Polymer Granules',
            'message' => 'We need 500 MT of rPET food-grade natural granules monthly.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('enquiries', [
            'name' => 'John Doe',
            'email' => 'john@acme-corp.com',
            'source' => 'contact_page',
            'status' => 'new',
        ]);
    }

    public function test_client_can_submit_consultation_modal_via_json()
    {
        $response = $this->postJson('/consultation/submit', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@skynet-recycling.com',
            'company' => 'Cyberdyne Packaging',
            'requirement' => 'EPR Statutory Compliance',
            'projected_volume' => '3,500 MT / year',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('enquiries', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@skynet-recycling.com',
            'company' => 'Cyberdyne Packaging',
            'source' => 'consultation_modal',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_validation()
    {
        $response = $this->post('/contact/submit', [
            'name' => '',
            'email' => 'invalid-email-address',
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }

    public function test_guest_cannot_access_admin_enquiries()
    {
        $response = $this->get('/admin/enquiries');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_view_enquiries_list()
    {
        $user = User::factory()->create();

        Enquiry::create([
            'name' => 'Robert Vance',
            'email' => 'bob@vance-refrigeration.com',
            'company' => 'Vance Refrigeration',
            'subject' => 'Industrial RDF Alternative Fuel',
            'message' => 'Interested in boiler co-processing briquettes.',
            'source' => 'contact_page',
            'status' => 'new',
        ]);

        $response = $this->actingAs($user)->get('/admin/enquiries');
        $response->assertStatus(200);
        $response->assertSee('Robert Vance');
        $response->assertSee('bob@vance-refrigeration.com');
        $response->assertSee('Vance Refrigeration');
    }

    public function test_admin_can_update_enquiry_status()
    {
        $user = User::factory()->create();

        $enquiry = Enquiry::create([
            'name' => 'Michael Scott',
            'email' => 'michael@dunder-mifflin.com',
            'subject' => 'Paper and PCR Plastic packaging',
            'source' => 'contact_page',
            'status' => 'new',
        ]);

        $response = $this->actingAs($user)->patch("/admin/enquiries/{$enquiry->id}/status", [
            'status' => 'in_progress',
            'admin_notes' => 'Sent introductory polymer pricing sheet.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('enquiries', [
            'id' => $enquiry->id,
            'status' => 'in_progress',
            'admin_notes' => 'Sent introductory polymer pricing sheet.',
        ]);
    }

    public function test_admin_can_delete_enquiry()
    {
        $user = User::factory()->create();

        $enquiry = Enquiry::create([
            'name' => 'Spam Bot',
            'email' => 'spam@test.com',
            'source' => 'contact_page',
            'status' => 'new',
        ]);

        $response = $this->actingAs($user)->delete("/admin/enquiries/{$enquiry->id}");
        $response->assertRedirect('/admin/enquiries');

        $this->assertDatabaseMissing('enquiries', [
            'id' => $enquiry->id,
        ]);
    }

    public function test_careers_page_loads_with_resume_application_form(): void
    {
        $response = $this->get('/careers');
        $response->assertStatus(200);
        $response->assertSee('Submit Your Resume & Profile');
        $response->assertSee('Direct Talent Portal');
        $response->assertSee('Upload CV / Resume');
        $response->assertSee(route('careers.apply'));
    }

    public function test_candidate_can_submit_resume_via_career_form(): void
    {
        Storage::fake('public');

        $resumeFile = UploadedFile::fake()->create('sarthak_resume.pdf', 500, 'application/pdf');

        $response = $this->post('/careers/apply', [
            'name' => 'Sarthak Walokar',
            'email' => 'sarthak.test@example.com',
            'phone' => '+91 7020784898',
            'position' => 'EPR & Compliance Advisory',
            'experience' => '3 - 5 Years',
            'current_role' => 'Senior Compliance Analyst',
            'message' => 'Passionate about circularity frameworks and CPCB portal automation.',
            'resume' => $resumeFile,
        ]);

        $response->assertRedirect(route('careers') . '#apply-form');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('enquiries', [
            'name' => 'Sarthak Walokar',
            'email' => 'sarthak.test@example.com',
            'phone' => '+91 7020784898',
            'source' => 'careers_page',
            'status' => 'new',
        ]);

        $enquiry = Enquiry::where('email', 'sarthak.test@example.com')->first();
        $this->assertNotNull($enquiry);
        $this->assertNotNull($enquiry->resume_path);
        Storage::disk('public')->assertExists($enquiry->resume_path);
    }

    public function test_career_form_requires_mandatory_fields_and_valid_resume(): void
    {
        $response = $this->post('/careers/apply', [
            'name' => '',
            'email' => 'not-an-email',
            'phone' => '',
            'position' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'phone', 'position', 'resume']);
    }
}
