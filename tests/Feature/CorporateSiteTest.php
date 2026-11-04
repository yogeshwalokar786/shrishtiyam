<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CorporateSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_corporate_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_about_page_loads()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_solutions_page_loads()
    {
        $response = $this->get('/solutions');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_products_catalog_loads()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_single_product_page_loads()
    {
        $response = $this->get('/product-single');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_single_service_page_loads()
    {
        $response = $this->get('/service-single');
        $response->assertStatus(200);
        $response->assertSeeText('Blogs of');
        $response->assertDontSeeText('Explore Ecosystem');
        $response->assertDontSeeText('Related Circular Solutions');
        $response->assertDontSeeText("Complementary solutions to complete your brand's sustainability roadmap");
    }

    public function test_corporate_blogs_page_loads()
    {
        $response = $this->get('/blogs');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_single_blog_page_loads()
    {
        $response = $this->get('/blog-single');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_corporate_contact_page_loads()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('CircuFlow');
    }

    public function test_sitemap_xml_remains_valid()
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    }
}
