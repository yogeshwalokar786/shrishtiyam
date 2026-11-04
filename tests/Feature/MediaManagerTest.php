<?php

namespace Tests\Feature;

use App\Models\Media;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaManagerTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    public function test_admin_can_view_media_manager_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/media');
        $response->assertStatus(200);
        $response->assertSee('Media Library');
        $response->assertSee('Total Storage Used');
        $response->assertSee('Photos');
        $response->assertSee('Videos');
        $response->assertSee('Documents');
    }

    public function test_admin_can_upload_photo(): void
    {
        $file = UploadedFile::fake()->image('nature-wallpaper.jpg', 640, 480);

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'files' => [$file],
        ]);

        $response->assertRedirect('/admin/media');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('media', [
            'original_name' => 'nature-wallpaper.jpg',
            'file_type' => 'image',
        ]);

        $media = Media::where('original_name', 'nature-wallpaper.jpg')->first();
        Storage::disk('public')->assertExists($media->path);
    }

    public function test_admin_can_upload_video(): void
    {
        $videoFile = UploadedFile::fake()->create('demo-clip.mp4', 4096, 'video/mp4');

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'files' => [$videoFile],
        ]);

        $response->assertRedirect('/admin/media');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('media', [
            'original_name' => 'demo-clip.mp4',
            'file_type' => 'video',
        ]);

        $media = Media::where('original_name', 'demo-clip.mp4')->first();
        Storage::disk('public')->assertExists($media->path);
    }

    public function test_admin_can_upload_document(): void
    {
        $docFile = UploadedFile::fake()->create('financial-report.pdf', 1024, 'application/pdf');

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'files' => [$docFile],
        ]);

        $response->assertRedirect('/admin/media');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('media', [
            'original_name' => 'financial-report.pdf',
            'file_type' => 'document',
        ]);

        $media = Media::where('original_name', 'financial-report.pdf')->first();
        Storage::disk('public')->assertExists($media->path);
    }

    public function test_media_filtering_by_category(): void
    {
        Media::create([
            'user_id' => $this->admin->id,
            'filename' => 'image1.jpg',
            'original_name' => 'photo1.jpg',
            'mime_type' => 'image/jpeg',
            'file_type' => 'image',
            'file_size' => 2048,
            'path' => 'media/image1.jpg',
        ]);

        Media::create([
            'user_id' => $this->admin->id,
            'filename' => 'video1.mp4',
            'original_name' => 'movie1.mp4',
            'mime_type' => 'video/mp4',
            'file_type' => 'video',
            'file_size' => 10240,
            'path' => 'media/video1.mp4',
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/media?type=image');
        $response->assertStatus(200);
        $response->assertSee('photo1.jpg');
        $response->assertDontSee('movie1.mp4');

        $videoResponse = $this->actingAs($this->admin)->get('/admin/media?type=video');
        $videoResponse->assertStatus(200);
        $videoResponse->assertSee('movie1.mp4');
        $videoResponse->assertDontSee('photo1.jpg');
    }

    public function test_admin_can_download_media_file(): void
    {
        $file = UploadedFile::fake()->create('test-doc.pdf', 500, 'application/pdf');
        $path = $file->storeAs('media', 'test-doc.pdf', 'public');

        $media = Media::create([
            'user_id' => $this->admin->id,
            'filename' => 'test-doc.pdf',
            'original_name' => 'My-Document.pdf',
            'mime_type' => 'application/pdf',
            'file_type' => 'document',
            'file_size' => 512000,
            'path' => $path,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.media.download', $media));
        $response->assertStatus(200);
    }

    public function test_admin_can_delete_media(): void
    {
        $file = UploadedFile::fake()->image('delete-me.png');
        $path = $file->storeAs('media', 'delete-me.png', 'public');

        $media = Media::create([
            'user_id' => $this->admin->id,
            'filename' => 'delete-me.png',
            'original_name' => 'delete-me.png',
            'mime_type' => 'image/png',
            'file_type' => 'image',
            'file_size' => 1024,
            'path' => $path,
        ]);

        // Create a blog that references this image
        $blog = \App\Models\Blog::create([
            'title' => 'Article With Soon To Be Deleted Image',
            'slug' => 'article-with-deleted-image',
            'content' => '<p>Some text</p>',
            'image' => $path,
            'author_name' => 'Alexander Vance',
            'is_published' => true,
        ]);

        $this->assertDatabaseHas('media', ['id' => $media->id]);
        Storage::disk('public')->assertExists($path);
        $this->assertEquals($path, $blog->fresh()->image);

        // Delete via AJAX (as done in picker modal or preview modal)
        $response = $this->actingAs($this->admin)->deleteJson(route('admin.media.destroy', $media));
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'deleted_id' => $media->id,
        ]);

        // Verify deleted from database and storage
        $this->assertDatabaseMissing('media', ['id' => $media->id]);
        Storage::disk('public')->assertMissing($path);

        // Verify blog reference was automatically cleared
        $this->assertNull($blog->fresh()->image);

        // Verify it is NOT returned in the picker list
        $pickerResponse = $this->actingAs($this->admin)->getJson(route('admin.media.picker'));
        $pickerResponse->assertStatus(200);
        $pickerFilenames = collect($pickerResponse->json('media'))->pluck('filename')->toArray();
        $this->assertNotContains('delete-me.png', $pickerFilenames);
    }

    public function test_admin_can_fetch_media_picker_list(): void
    {
        $file = UploadedFile::fake()->image('picker-sample.jpg');
        $path = $file->storeAs('media', 'picker-sample.jpg', 'public');

        Media::create([
            'user_id' => $this->admin->id,
            'filename' => 'picker-sample.jpg',
            'original_name' => 'picker-sample.jpg',
            'mime_type' => 'image/jpeg',
            'file_type' => 'image',
            'file_size' => 2048,
            'path' => $path,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/media/picker');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $json = $response->json();
        $this->assertArrayHasKey('media', $json);
        $this->assertNotEmpty($json['media']);
    }

    public function test_admin_can_upload_via_media_picker_ajax(): void
    {
        $file = UploadedFile::fake()->image('ajax-upload.png', 800, 600);

        $response = $this->actingAs($this->admin)->post('/admin/media/picker-upload', [
            'file' => $file,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('media', [
            'original_name' => 'ajax-upload.png',
            'file_type' => 'image',
        ]);
    }

    public function test_media_preview_modal_is_rendered_in_modals_portal_outside_admin_wrapper(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/media');
        $response->assertStatus(200);
        $content = $response->getContent();

        $this->assertStringContainsString('id="mediaPreviewModal"', $content);
        $this->assertStringContainsString('class="media-modal-backdrop"', $content);

        $footerPos = strrpos($content, 'class="footer"');
        $modalPos = strpos($content, 'id="mediaPreviewModal"');
        $this->assertTrue($modalPos > $footerPos, 'mediaPreviewModal must be rendered in root @stack("modals") outside .admin-wrapper');
    }

    public function test_blog_editor_renders_media_picker_modal_in_modals_portal(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/blogs/create');
        $response->assertStatus(200);
        $content = $response->getContent();

        $this->assertStringContainsString('id="mediaPickerModal"', $content);

        $footerPos = strrpos($content, 'class="footer"');
        $modalPos = strpos($content, 'id="mediaPickerModal"');
        $this->assertTrue($modalPos > $footerPos, 'mediaPickerModal must be rendered in root @stack("modals") outside .admin-wrapper');
    }

    public function test_admin_pages_render_modern_pagination_component(): void
    {
        // Media library has 15 items and paginates at 12
        $response = $this->actingAs($this->admin)->get('/admin/media');
        $response->assertStatus(200);
        $content = $response->getContent();

        $this->assertStringContainsString('admin-pagination-wrapper', $content);
        $this->assertStringContainsString('pagination-summary', $content);
        $this->assertStringContainsString('admin-pagination-list', $content);
        $this->assertStringContainsString('page-btn-next', $content);
    }

    public function test_admin_layout_contains_csrf_token_meta_tag(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/blogs/create');
        $response->assertStatus(200);
        $content = $response->getContent();

        $this->assertStringContainsString('<meta name="csrf-token" content="', $content);
    }
}
