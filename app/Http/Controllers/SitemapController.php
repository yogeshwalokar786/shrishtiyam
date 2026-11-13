<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Policy;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    /**
     * Output the raw public sitemap.xml.
     */
    public function showXml()
    {
        $xmlFile = public_path('sitemap.xml');

        if (!File::exists($xmlFile)) {
            $this->buildSitemapXml($xmlFile);
        }

        return response(File::get($xmlFile), 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }

    /**
     * Build the physical sitemap.xml file.
     */
    protected function buildSitemapXml(string $xmlFile): void
    {
        $baseUrl = rtrim(config('app.url', url('/')), '/');

        $defaults = [
            ['url' => '/', 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['url' => '/about', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['url' => '/careers', 'changefreq' => 'weekly', 'priority' => '0.8'],
            ['url' => '/solutions', 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['url' => '/products', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['url' => '/blogs', 'changefreq' => 'daily', 'priority' => '0.8'],
            ['url' => '/contact', 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($defaults as $entry) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($baseUrl . $entry['url'], ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
            $xml .= "    <changefreq>" . $entry['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $entry['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        if (class_exists(Blog::class)) {
            $blogs = Blog::where('is_published', true)->get();
            foreach ($blogs as $blog) {
                $loc = $baseUrl . '/blogs/' . $blog->slug;
                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
                $xml .= "    <lastmod>" . ($blog->updated_at ? $blog->updated_at->format('Y-m-d') : date('Y-m-d')) . "</lastmod>\n";
                $xml .= "    <changefreq>weekly</changefreq>\n";
                $xml .= "    <priority>0.7</priority>\n";
                $xml .= "  </url>\n";
            }
        }

        if (class_exists(Policy::class)) {
            $policies = Policy::where('is_published', true)->get();
            foreach ($policies as $policy) {
                $loc = $baseUrl . '/policy/' . $policy->slug;
                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
                $xml .= "    <lastmod>" . ($policy->updated_at ? $policy->updated_at->format('Y-m-d') : date('Y-m-d')) . "</lastmod>\n";
                $xml .= "    <changefreq>monthly</changefreq>\n";
                $xml .= "    <priority>0.5</priority>\n";
                $xml .= "  </url>\n";
            }
        }

        $xml .= '</urlset>';

        File::ensureDirectoryExists(dirname($xmlFile));
        File::put($xmlFile, $xml);
    }
}
