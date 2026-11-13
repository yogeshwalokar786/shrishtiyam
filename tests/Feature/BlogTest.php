<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected BlogCategory $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin Tester',
                'password' => bcrypt('password123'),
            ]
        );

        $this->category = BlogCategory::firstOrCreate(
            ['slug' => 'test-category'],
            [
                'name' => 'Test Category',
                'description' => 'Test Category Description',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }

    public function test_public_can_view_blogs_page(): void
    {
        $response = $this->get('/blogs');

        $response->assertStatus(200);
        $response->assertSee('Knowledge Hub');
    }

    public function test_public_can_filter_blogs_by_category(): void
    {
        $response = $this->get('/blogs?category=' . $this->category->slug);

        $response->assertStatus(200);
        $response->assertSee($this->category->name);
    }

    public function test_public_can_search_blogs(): void
    {
        $response = $this->get('/blogs?search=Strategic');

        $response->assertStatus(200);
    }

    public function test_public_can_view_single_published_blog(): void
    {
        $blog = Blog::create([
            'category_id' => $this->category->id,
            'title' => 'Sample Test Blog Article',
            'slug' => 'sample-test-blog-article',
            'excerpt' => 'This is a test excerpt.',
            'content' => '<p>This is the test content of the article.</p>',
            'author_name' => 'Tester',
            'read_time' => '3 Min Read',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $response = $this->get('/blog/' . $blog->slug);

        $response->assertStatus(200);
        $response->assertSee('Sample Test Blog Article');
        $response->assertSee('This is the test content of the article.');

        $blog->delete();
    }

    public function test_unpublished_blog_returns_404_for_guest(): void
    {
        $blog = Blog::create([
            'category_id' => $this->category->id,
            'title' => 'Draft Unpublished Article',
            'slug' => 'draft-unpublished-article',
            'content' => '<p>Draft content</p>',
            'is_published' => false,
        ]);

        $response = $this->get('/blog/' . $blog->slug);

        $response->assertStatus(404);

        $blog->delete();
    }

    public function test_legacy_blog_single_route_loads(): void
    {
        $response = $this->get('/blog-single');

        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_admin_blogs_or_categories(): void
    {
        $response1 = $this->get('/admin/blogs');
        $response1->assertRedirect('/login');

        $response2 = $this->get('/admin/blog-categories');
        $response2->assertRedirect('/login');
    }

    public function test_admin_can_view_blogs_list(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/blogs');

        $response->assertStatus(200);
        $response->assertSee('Blog Articles');
        $response->assertSee('nav-item-dropdown');
        $response->assertSee('nav-submenu');
        $response->assertSee('All Articles');
        $response->assertSee('Categories');
    }

    public function test_admin_can_view_create_blog_page_with_editor(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/blogs/create');

        $response->assertStatus(200);
        $response->assertSee('quillEditor');
        $response->assertSee('HTML Source');
    }

    public function test_admin_can_view_edit_blog_page_with_editor(): void
    {
        $blog = Blog::create([
            'category_id' => $this->category->id,
            'title' => 'Article With Editor View',
            'slug' => 'article-with-editor-view',
            'content' => '<p>Editor content preview.</p>',
            'author_name' => 'Editor Tester',
            'is_published' => true,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/blogs/' . $blog->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee('quillEditor');
        $response->assertSee('HTML Source');
        $response->assertSee('Editor content preview.');

        $blog->delete();
    }

    public function test_admin_can_create_new_blog_article(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/blogs', [
            'title' => 'New Automated Testing Post',
            'category_id' => $this->category->id,
            'excerpt' => 'Automated test excerpt.',
            'content' => '<p>Automated test body content.</p>',
            'author_name' => 'Quality Assurance',
            'read_time' => '4 Min Read',
            'is_published' => 1,
            'is_featured' => 1,
        ]);

        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('blogs', [
            'title' => 'New Automated Testing Post',
            'slug' => 'new-automated-testing-post',
            'is_featured' => true,
        ]);
    }

    public function test_admin_can_edit_and_update_blog_article(): void
    {
        $blog = Blog::create([
            'category_id' => $this->category->id,
            'title' => 'Original Testing Post Title',
            'slug' => 'original-testing-post-title',
            'content' => '<p>Original content body.</p>',
            'author_name' => 'Quality Assurance',
            'read_time' => '4 Min Read',
            'is_published' => true,
        ]);

        $response = $this->actingAs($this->admin)->put('/admin/blogs/' . $blog->id, [
            'title' => 'Updated Testing Post Title',
            'slug' => 'updated-testing-post-title',
            'category_id' => $this->category->id,
            'excerpt' => 'Updated excerpt text.',
            'content' => '<p>Updated content body.</p>',
            'author_name' => 'Quality Assurance',
            'read_time' => '5 Min Read',
            'is_published' => 1,
            'is_featured' => 0,
        ]);

        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Testing Post Title',
            'slug' => 'updated-testing-post-title',
            'is_featured' => false,
        ]);
    }

    public function test_admin_can_delete_blog_article(): void
    {
        $blog = Blog::create([
            'category_id' => $this->category->id,
            'title' => 'Post To Delete',
            'slug' => 'post-to-delete',
            'content' => '<p>Delete me.</p>',
            'author_name' => 'Quality Assurance',
            'is_published' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete('/admin/blogs/' . $blog->id);

        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('blogs', [
            'id' => $blog->id,
        ]);
    }

    public function test_admin_can_manage_blog_categories(): void
    {
        // 1. Create Category
        $response = $this->actingAs($this->admin)->post('/admin/blog-categories', [
            'name' => 'Brand New Topic',
            'slug' => 'brand-new-topic',
            'description' => 'A topic for automated tests.',
            'is_active' => 1,
            'sort_order' => 10,
        ]);

        $response->assertRedirect('/admin/blog-categories');
        $response->assertSessionHas('success');

        $category = BlogCategory::where('slug', 'brand-new-topic')->first();
        $this->assertNotNull($category);

        // 2. Update Category
        $response2 = $this->actingAs($this->admin)->put('/admin/blog-categories/' . $category->id, [
            'name' => 'Brand New Topic Updated',
            'slug' => 'brand-new-topic-updated',
            'description' => 'Updated topic description.',
            'is_active' => 1,
            'sort_order' => 15,
        ]);

        $response2->assertRedirect('/admin/blog-categories');
        $response2->assertSessionHas('success');

        $this->assertDatabaseHas('blog_categories', [
            'id' => $category->id,
            'name' => 'Brand New Topic Updated',
        ]);

        // 3. Delete Category
        $response3 = $this->actingAs($this->admin)->delete('/admin/blog-categories/' . $category->id);
        $response3->assertRedirect('/admin/blog-categories');
        $response3->assertSessionHas('success');

        $this->assertDatabaseMissing('blog_categories', [
            'id' => $category->id,
        ]);
    }

    public function test_blog_author_and_read_time_auto_calculation(): void
    {
        $this->admin->update([
            'name' => 'Alexander Vance',
            'job_title' => 'Chief Sustainability Officer',
        ]);

        // Create blog without manual author_name, author_role, read_time, or meta_title
        // Provide 450 words in content -> should auto-calculate to 3 Min Read (450 / 200 = 2.25 -> 3)
        $wordsContent = str_repeat('polymer recycling sustainability circular economy ', 90);

        $response = $this->actingAs($this->admin)->post('/admin/blogs', [
            'title' => 'Enterprise Carbon Offsets Guide',
            'category_id' => $this->category->id,
            'content' => '<p>' . $wordsContent . '</p>',
            'is_published' => 1,
        ]);

        $response->assertRedirect('/admin/blogs');

        $blog = Blog::where('slug', 'enterprise-carbon-offsets-guide')->first();
        $this->assertNotNull($blog);

        // Verify author name comes from current logged-in admin
        $this->assertEquals('Alexander Vance', $blog->author_name);

        // Verify author role/title comes from current logged-in admin job_title
        $this->assertEquals('Chief Sustainability Officer', $blog->author_role);

        // Verify read time is automatically calculated
        $this->assertEquals('3 Min Read', $blog->read_time);

        // Verify meta_title is automatically set to article title
        $this->assertEquals('Enterprise Carbon Offsets Guide', $blog->meta_title);
    }

    public function test_blog_image_file_upload_stores_in_common_storage_and_registers_in_media_library(): void
    {
        $file = UploadedFile::fake()->image('custom-feature-art.jpg', 800, 600);

        $response = $this->actingAs($this->admin)->post('/admin/blogs', [
            'title' => 'Article With Direct Uploaded Image',
            'category_id' => $this->category->id,
            'content' => '<p>Article body with image upload.</p>',
            'image_file' => $file,
            'is_published' => 1,
        ]);

        $response->assertRedirect('/admin/blogs');

        $blog = Blog::where('title', 'Article With Direct Uploaded Image')->first();
        $this->assertNotNull($blog);
        $this->assertStringStartsWith('media/', $blog->image);

        // Verify it was registered in common Media table
        $this->assertDatabaseHas('media', [
            'original_name' => 'custom-feature-art.jpg',
            'file_type' => 'image',
            'path' => $blog->image,
        ]);

        // Verify blog getImageUrlAttribute resolves correctly
        $this->assertStringContainsString('storage/media/', $blog->image_url);
    }

    public function test_admin_can_manage_blog_advanced_seo_and_public_page_renders_meta_tags(): void
    {
        // 1. Create blog with full advanced SEO suite
        $createResponse = $this->actingAs($this->admin)->post('/admin/blogs', [
            'title' => 'Advanced Circular Analytics and EPR Reporting',
            'slug' => 'advanced-circular-analytics-epr-reporting',
            'category_id' => $this->category->id,
            'excerpt' => 'A comprehensive analysis of EPR reporting methodologies.',
            'content' => '<p>Detailed breakdown of recycling frameworks and digital audit systems.</p>',
            'meta_title' => 'Advanced EPR Reporting & Circular Analytics 2026',
            'meta_description' => 'Custom search engine snippet detailing digital EPR audit ledgers and compliance tools.',
            'meta_keywords' => 'EPR reporting, circular analytics, CPCB audit, plastic credits',
            'canonical_url' => 'https://shristiyam.com/blog/advanced-circular-analytics-epr-reporting',
            'og_title' => 'Social Card: Advanced EPR Reporting & Circular Analytics',
            'og_description' => 'Preview card on LinkedIn and WhatsApp for circular analytics.',
            'og_image' => 'https://shristiyam.com/assets/images/og-share-sample.jpg',
            'schema_type' => 'NewsArticle',
            'robots_index' => 'noindex',
            'robots_follow' => 'nofollow',
            'is_published' => 1,
        ]);

        $createResponse->assertRedirect('/admin/blogs');

        $blog = Blog::where('slug', 'advanced-circular-analytics-epr-reporting')->first();
        $this->assertNotNull($blog);
        $this->assertEquals('Advanced EPR Reporting & Circular Analytics 2026', $blog->meta_title);
        $this->assertEquals('EPR reporting, circular analytics, CPCB audit, plastic credits', $blog->meta_keywords);
        $this->assertEquals('https://shristiyam.com/blog/advanced-circular-analytics-epr-reporting', $blog->canonical_url);
        $this->assertEquals('Social Card: Advanced EPR Reporting & Circular Analytics', $blog->og_title);
        $this->assertEquals('NewsArticle', $blog->schema_type);
        $this->assertEquals('noindex', $blog->robots_index);
        $this->assertEquals('nofollow', $blog->robots_follow);

        // 2. Edit & Update Blog SEO fields
        $updateResponse = $this->actingAs($this->admin)->put("/admin/blogs/{$blog->id}", [
            'title' => 'Advanced Circular Analytics and EPR Reporting Updated',
            'slug' => 'advanced-circular-analytics-epr-reporting',
            'category_id' => $this->category->id,
            'content' => '<p>Updated content body.</p>',
            'meta_title' => 'Updated Meta Title for EPR Analytics',
            'meta_description' => 'Updated meta description for search results.',
            'meta_keywords' => 'updated, epr, keywords',
            'canonical_url' => 'https://shristiyam.com/blog/updated-canonical',
            'og_title' => 'Updated Social Card Title',
            'og_description' => 'Updated social card description.',
            'og_image' => 'https://shristiyam.com/assets/images/updated-og.jpg',
            'schema_type' => 'BlogPosting',
            'robots_index' => 'index',
            'robots_follow' => 'follow',
            'is_published' => 1,
        ]);

        $updateResponse->assertRedirect('/admin/blogs');

        $blog->refresh();
        $this->assertEquals('Updated Meta Title for EPR Analytics', $blog->meta_title);
        $this->assertEquals('BlogPosting', $blog->schema_type);
        $this->assertEquals('index', $blog->robots_index);
        $this->assertEquals('follow', $blog->robots_follow);

        // 3. Verify public blog page renders advanced SEO tags, OpenGraph, and JSON-LD schema
        $publicResponse = $this->get('/blog/' . $blog->slug);
        $publicResponse->assertStatus(200);

        // Meta title & description
        $publicResponse->assertSee('<title>Updated Meta Title for EPR Analytics | SHRISTIYAM</title>', false);
        $publicResponse->assertSee('content="Updated meta description for search results."', false);
        $publicResponse->assertSee('content="updated, epr, keywords"', false);

        // Canonical & Robots
        $publicResponse->assertSee('<link rel="canonical" href="https://shristiyam.com/blog/updated-canonical">', false);
        $publicResponse->assertSee('<meta name="robots" content="index, follow">', false);

        // OpenGraph & Twitter
        $publicResponse->assertSee('property="og:title" content="Updated Social Card Title"', false);
        $publicResponse->assertSee('property="og:description" content="Updated social card description."', false);
        $publicResponse->assertSee('property="og:image" content="https://shristiyam.com/assets/images/updated-og.jpg"', false);
        $publicResponse->assertSee('name="twitter:card" content="summary_large_image"', false);

        // JSON-LD Structured Data Schema
        $publicResponse->assertSee('"@type": "BlogPosting"', false);
        $publicResponse->assertSee('"headline": "Advanced Circular Analytics and EPR Reporting Updated"', false);
    }
}
