<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    protected string $storageFile;
    protected string $xmlFile;

    public function __construct()
    {
        $this->storageFile = storage_path('app/sitemap_entries.json');
        $this->xmlFile = public_path('sitemap.xml');
    }

    /**
     * Show sitemap admin management dashboard.
     */
    public function index()
    {
        $entries = $this->getEntries();

        if (!File::exists($this->xmlFile)) {
            $this->buildSitemapXml();
        }

        $fileSize = File::exists($this->xmlFile) ? round(File::size($this->xmlFile) / 1024, 2) . ' KB' : '0 KB';
        $lastModified = File::exists($this->xmlFile) ? date('Y-m-d H:i', File::lastModified($this->xmlFile)) : 'Never';
        $xmlPreview = File::exists($this->xmlFile) ? File::get($this->xmlFile) : '';

        $fileInfo = [
            'size' => $fileSize,
            'total_urls' => count($entries),
            'last_modified' => $lastModified,
        ];

        return view('admin.sitemap.index', compact('entries', 'fileInfo', 'xmlPreview'));
    }

    /**
     * Output the raw public sitemap.xml.
     */
    public function showXml()
    {
        if (!File::exists($this->xmlFile)) {
            $this->buildSitemapXml();
        }

        return response(File::get($this->xmlFile), 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }

    /**
     * Regenerate sitemap.xml file.
     */
    public function generate()
    {
        $this->buildSitemapXml();

        return redirect()->route('admin.sitemap.index')
            ->with('success', 'Sitemap has been successfully regenerated and synced!');
    }

    /**
     * Add a custom URL entry to the sitemap.
     */
    public function addUrl(Request $request)
    {
        $validated = $request->validate([
            'url' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'changefreq' => ['required', 'in:always,hourly,daily,weekly,monthly,yearly,never'],
            'priority' => ['required', 'numeric', 'min:0', 'max:1'],
        ]);

        $entries = $this->getEntries();

        $entries[] = [
            'id' => (string) Str::uuid(),
            'title' => $validated['title'],
            'url' => $validated['url'],
            'changefreq' => $validated['changefreq'],
            'priority' => number_format((float) $validated['priority'], 1),
            'lastmod' => date('Y-m-d'),
            'is_custom' => true,
        ];

        $this->saveEntries($entries);
        $this->buildSitemapXml();

        return redirect()->route('admin.sitemap.index')
            ->with('success', "Page '{$validated['title']}' added to sitemap!");
    }

    /**
     * Delete a custom entry from the sitemap.
     */
    public function deleteUrl($id)
    {
        $entries = array_filter($this->getEntries(), function ($entry) use ($id) {
            return ($entry['id'] ?? '') !== $id;
        });

        $this->saveEntries(array_values($entries));
        $this->buildSitemapXml();

        return redirect()->route('admin.sitemap.index')
            ->with('success', 'Page removed from sitemap.');
    }

    /**
     * Download the sitemap.xml file.
     */
    public function download()
    {
        if (!File::exists($this->xmlFile)) {
            $this->buildSitemapXml();
        }

        return response()->download($this->xmlFile, 'sitemap.xml', [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Load current sitemap entries, populating default corporate pages if empty.
     */
    protected function getEntries(): array
    {
        if (File::exists($this->storageFile)) {
            $data = json_decode(File::get($this->storageFile), true);
            if (is_array($data) && !empty($data)) {
                return $data;
            }
        }

        return $this->getDefaultEntries();
    }

    /**
     * Save entries to storage JSON file.
     */
    protected function saveEntries(array $entries): void
    {
        File::ensureDirectoryExists(dirname($this->storageFile));
        File::put($this->storageFile, json_encode($entries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * Default core routes for the application.
     */
    protected function getDefaultEntries(): array
    {
        $defaults = [
            ['id' => 'home', 'title' => 'Home Page', 'url' => '/', 'changefreq' => 'weekly', 'priority' => '1.0', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'about', 'title' => 'About Us', 'url' => '/about', 'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'careers', 'title' => 'Careers & Culture', 'url' => '/careers', 'changefreq' => 'weekly', 'priority' => '0.8', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'solutions', 'title' => 'Circular Solutions', 'url' => '/solutions', 'changefreq' => 'monthly', 'priority' => '0.9', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'products', 'title' => 'Product Catalog', 'url' => '/products', 'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'blogs', 'title' => 'Blogs & Knowledge Hub', 'url' => '/blogs', 'changefreq' => 'daily', 'priority' => '0.8', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
            ['id' => 'contact', 'title' => 'Contact Us', 'url' => '/contact', 'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => date('Y-m-d'), 'is_custom' => false],
        ];

        return $defaults;
    }

    /**
     * Build the physical sitemap.xml file.
     */
    protected function buildSitemapXml(): void
    {
        $entries = $this->getEntries();
        $baseUrl = rtrim(config('app.url', url('/')), '/');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. Static and custom entries
        foreach ($entries as $entry) {
            $loc = str_starts_with($entry['url'], 'http')
                ? $entry['url']
                : $baseUrl . '/' . ltrim($entry['url'], '/');

            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>" . ($entry['lastmod'] ?? date('Y-m-d')) . "</lastmod>\n";
            $xml .= "    <changefreq>" . ($entry['changefreq'] ?? 'weekly') . "</changefreq>\n";
            $xml .= "    <priority>" . ($entry['priority'] ?? '0.8') . "</priority>\n";
            $xml .= "  </url>\n";
        }

        // 2. Published blogs
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

        // 3. Published policies
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

        File::ensureDirectoryExists(dirname($this->xmlFile));
        File::put($this->xmlFile, $xml);
    }
}
