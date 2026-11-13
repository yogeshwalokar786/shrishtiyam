@extends('layouts.admin')

@section('title', 'Edit Blog Article')
@section('page_title', 'Edit Blog Article')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
    <div>
        <h1 class="page-title">Edit Article</h1>
    </div>
    <div style="display: flex; gap: 10px;">
        @if($blog->is_published)
            <a href="{{ $blog->url }}" target="_blank" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
                <span>View Live ↗</span>
            </a>
        @endif
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
            <span>← Back to Articles</span>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
        <!-- Left Main Column -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Article Body Details -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--text-main);">Article Content</h3>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Article Title <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="title" id="blogTitleInput" value="{{ old('title', $blog->title) }}" required
                           class="form-control" style="width: 100%; font-size: 1rem; padding: 10px 14px;">
                    @error('title')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        URL Slug <span style="color: #ef4444;">*</span>
                    </label>
                    <div style="display: flex; align-items: center; gap: 6px;">
                        <span style="font-size: 0.85rem; color: var(--text-muted); font-family: var(--font-mono);">/blog/</span>
                        <input type="text" name="slug" id="blogSlugInput" value="{{ old('slug', $blog->slug) }}" required
                               class="form-control" style="flex: 1; padding: 8px 12px; font-size: 0.88rem;">
                    </div>
                    @error('slug')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Short Excerpt / Summary
                    </label>
                    <textarea name="excerpt" rows="3" class="form-control" 
                              style="width: 100%; font-size: 0.9rem; line-height: 1.5;">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label style="font-size: 0.86rem; font-weight: 600;">
                            Full Article Content <span style="color: #ef4444;">*</span>
                        </label>
                        <div style="display: flex; gap: 8px;">
                            <button type="button" onclick="triggerEditorMediaPicker()" class="btn btn-secondary btn-sm" style="padding: 4px 10px; font-size: 0.78rem; display: flex; align-items: center; gap: 5px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span>Media Manager</span>
                            </button>
                            <button type="button" id="htmlToggleBtn" onclick="toggleHtmlMode()" class="btn btn-secondary btn-sm" style="padding: 4px 10px; font-size: 0.78rem;">
                                &lt;/&gt; HTML Source
                            </button>
                        </div>
                    </div>

                    <!-- Visual WYSIWYG Quill Editor Container -->
                    <div id="quillWrapper">
                        <div id="quillEditor" style="min-height: 340px;"></div>
                    </div>

                    <!-- Raw Code / Synchronized Textarea Container -->
                    <div id="codeEditorContainer" style="display: none;">
                        <textarea name="content" id="articleContent" rows="18" class="form-control" 
                                  placeholder="Write your article content here..." 
                                  style="width: 100%; font-size: 0.9rem; line-height: 1.6; font-family: var(--font-mono);">{{ old('content', $blog->content) }}</textarea>
                    </div>

                    @error('content')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Advanced SEO Suite Card -->
            <div class="card" style="padding: 24px; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); background: var(--bg-surface);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--border-subtle); padding-bottom: 14px;">
                    <div>
                        <h3 style="font-size: 1.18rem; font-weight: 700; color: var(--text-main); margin-bottom: 4px; display: flex; align-items: center; gap: 8px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="color: var(--primary);">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <span>Advanced SEO & Social Suite</span>
                        </h3>
                        <p style="font-size: 0.82rem; color: var(--text-muted); margin: 0;">
                            Configure Google SERP search appearance, OpenGraph social cards, JSON-LD Schema, and crawler indexing directives.
                        </p>
                    </div>
                    <span class="cert-pill" style="font-size: 0.72rem; font-weight: 700; background: rgba(5, 150, 105, 0.1); color: #059669; border: 1px solid rgba(5, 150, 105, 0.25);">
                        Search Ready
                    </span>
                </div>

                <!-- Live Google SERP Snippet Preview -->
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span style="font-size: 0.76rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                            Google Search Preview
                        </span>
                        <div style="display: inline-flex; border-radius: 6px; background: #f1f5f9; padding: 2px;">
                            <button type="button" id="serpDesktopBtn" onclick="toggleSerpDevice('desktop')" style="border: none; background: #ffffff; color: #0f172a; padding: 3px 10px; font-size: 0.72rem; font-weight: 600; border-radius: 4px; cursor: pointer; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">Desktop</button>
                            <button type="button" id="serpMobileBtn" onclick="toggleSerpDevice('mobile')" style="border: none; background: transparent; color: #64748b; padding: 3px 10px; font-size: 0.72rem; font-weight: 600; border-radius: 4px; cursor: pointer;">Mobile</button>
                        </div>
                    </div>

                    <div id="serpPreviewBox" style="max-width: 600px; font-family: arial, sans-serif;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <div style="width: 22px; height: 22px; border-radius: 50%; background: #e8f5e9; color: #166534; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700;">
                                S
                            </div>
                            <div style="line-height: 1.2;">
                                <div style="font-size: 13px; color: #202124; font-weight: 500;">SHRISTIYAM</div>
                                <div style="font-size: 11px; color: #4d5156; word-break: break-all;" id="serpUrlDisplay">
                                    {{ url('/blog') }}/<span id="serpSlugDisplay">{{ old('slug', $blog->slug) }}</span>
                                </div>
                            </div>
                        </div>
                        <h4 id="serpTitleDisplay" style="font-size: 18px; line-height: 1.3; font-weight: 400; color: #1a0dab; margin: 4px 0 6px 0; cursor: pointer; text-decoration: none;">
                            {{ old('meta_title', $blog->effective_meta_title) }}
                        </h4>
                        <p id="serpSnippetDisplay" style="font-size: 13px; line-height: 1.45; color: #4d5156; margin: 0; word-break: break-word;">
                            {{ old('meta_description', $blog->effective_meta_description) }}
                        </p>
                    </div>
                </div>

                <!-- SEO Section Sub-Tabs -->
                <div style="display: flex; gap: 8px; border-bottom: 2px solid var(--border-subtle); margin-bottom: 20px;">
                    <button type="button" class="seo-subtab-btn active" onclick="switchSeoSubTab('general', this)" style="background: none; border: none; padding: 8px 14px; font-size: 0.88rem; font-weight: 600; color: var(--primary); border-bottom: 2px solid var(--primary); margin-bottom: -2px; cursor: pointer;">
                        General Search
                    </button>
                    <button type="button" class="seo-subtab-btn" onclick="switchSeoSubTab('social', this)" style="background: none; border: none; padding: 8px 14px; font-size: 0.88rem; font-weight: 600; color: var(--text-muted); border-bottom: 2px solid transparent; margin-bottom: -2px; cursor: pointer;">
                        Social / OpenGraph
                    </button>
                    <button type="button" class="seo-subtab-btn" onclick="switchSeoSubTab('schema-robots', this)" style="background: none; border: none; padding: 8px 14px; font-size: 0.88rem; font-weight: 600; color: var(--text-muted); border-bottom: 2px solid transparent; margin-bottom: -2px; cursor: pointer;">
                        Schema & Crawlers
                    </button>
                </div>

                <!-- Sub-Tab 1: General Search -->
                <div id="seoTabGeneral" class="seo-subtab-pane">
                    <!-- Meta Title -->
                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <label for="metaTitleInput" style="font-size: 0.86rem; font-weight: 600; color: var(--text-main);">
                                Meta Title Tag
                            </label>
                            <span id="metaTitleCount" style="font-size: 0.76rem; font-weight: 600; color: var(--text-muted);">
                                0 / 60 chars
                            </span>
                        </div>
                        <input type="text" name="meta_title" id="metaTitleInput" value="{{ old('meta_title', $blog->meta_title) }}" class="form-control" 
                               placeholder="e.g. Navigating EPR Compliance Mandates | SHRISTIYAM" style="width: 100%;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 4px;">
                            <span style="font-size: 0.75rem; color: var(--text-muted);">Recommended length: 50–60 characters. Defaults to article title if blank.</span>
                        </div>
                        @error('meta_title')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <label for="metaDescInput" style="font-size: 0.86rem; font-weight: 600; color: var(--text-main);">
                                Meta Description
                            </label>
                            <span id="metaDescCount" style="font-size: 0.76rem; font-weight: 600; color: var(--text-muted);">
                                0 / 160 chars
                            </span>
                        </div>
                        <textarea name="meta_description" id="metaDescInput" rows="3" class="form-control" 
                                  placeholder="Concise, compelling summary of the article for Google search snippets..." style="width: 100%;">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Recommended length: 120–160 characters. Falls back to article excerpt if left blank.
                        </span>
                        @error('meta_description')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div style="margin-bottom: 18px;">
                        <label for="metaKeywordsInput" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            Meta Keywords (Comma separated)
                        </label>
                        <input type="text" name="meta_keywords" id="metaKeywordsInput" value="{{ old('meta_keywords', $blog->meta_keywords) }}" class="form-control" 
                               placeholder="e.g. EPR compliance, circular economy, plastic waste recycling, CPCB guidelines" style="width: 100%;">
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Enter relevant keywords or search phrases separated by commas.
                        </span>
                        @error('meta_keywords')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Canonical URL -->
                    <div style="margin-bottom: 6px;">
                        <label for="canonicalUrlInput" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            Custom Canonical URL (Optional)
                        </label>
                        <input type="url" name="canonical_url" id="canonicalUrlInput" value="{{ old('canonical_url', $blog->canonical_url) }}" class="form-control" 
                               placeholder="https://..." style="width: 100%;">
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Leave blank to automatically default to this article's own permalink URL.
                        </span>
                        @error('canonical_url')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sub-Tab 2: Social / OpenGraph -->
                <div id="seoTabSocial" class="seo-subtab-pane" style="display: none;">
                    <!-- OG Title -->
                    <div style="margin-bottom: 18px;">
                        <label for="ogTitleInput" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            OpenGraph / Social Title
                        </label>
                        <input type="text" name="og_title" id="ogTitleInput" value="{{ old('og_title', $blog->og_title) }}" class="form-control" 
                               placeholder="Title shown when shared on LinkedIn, WhatsApp, Facebook..." style="width: 100%;">
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Leave blank to automatically inherit the Meta Title or Article Title.
                        </span>
                        @error('og_title')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- OG Description -->
                    <div style="margin-bottom: 18px;">
                        <label for="ogDescInput" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            OpenGraph / Social Description
                        </label>
                        <textarea name="og_description" id="ogDescInput" rows="3" class="form-control" 
                                  placeholder="Summary card text displayed on social media feeds..." style="width: 100%;">{{ old('og_description', $blog->og_description) }}</textarea>
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Leave blank to automatically inherit the Meta Description.
                        </span>
                        @error('og_description')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- OG Image -->
                    <div style="margin-bottom: 6px;">
                        <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            Social Share Preview Image (OG Image)
                        </label>
                        <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                            <input type="text" name="og_image" id="ogImageInput" value="{{ old('og_image', $blog->og_image) }}" class="form-control" 
                                   placeholder="e.g. /storage/media/social-banner.jpg or https://..." style="flex: 1;">
                            <button type="button" onclick="chooseOgImageFromMedia()" class="btn btn-secondary" style="font-size: 0.82rem; padding: 6px 12px; display: inline-flex; align-items: center; gap: 6px; white-space: nowrap;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                <span>Media Manager</span>
                            </button>
                        </div>
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block;">
                            Optimal dimensions: 1200 x 630 px. If empty, the Featured Image will be used automatically.
                        </span>
                        @error('og_image')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sub-Tab 3: Schema & Crawlers -->
                <div id="seoTabSchema" class="seo-subtab-pane" style="display: none;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                        <!-- Schema Structured Data Type -->
                        <div>
                            <label for="schemaTypeSelect" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                                Schema.org Structured Type
                            </label>
                            <select name="schema_type" id="schemaTypeSelect" class="form-control" style="width: 100%;">
                                <option value="Article" {{ old('schema_type', $blog->schema_type ?? 'Article') === 'Article' ? 'selected' : '' }}>Article (Standard Content)</option>
                                <option value="BlogPosting" {{ old('schema_type', $blog->schema_type) === 'BlogPosting' ? 'selected' : '' }}>BlogPosting (Editorial / Blog)</option>
                                <option value="NewsArticle" {{ old('schema_type', $blog->schema_type) === 'NewsArticle' ? 'selected' : '' }}>NewsArticle (Press / Corporate News)</option>
                            </select>
                            <span style="font-size: 0.74rem; color: var(--text-muted); display: block; margin-top: 4px;">
                                Generates JSON-LD rich snippet schema for Google.
                            </span>
                        </div>

                        <!-- Robots Indexing -->
                        <div>
                            <label for="robotsIndexSelect" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                                Search Engine Indexing (Robots)
                            </label>
                            <select name="robots_index" id="robotsIndexSelect" class="form-control" style="width: 100%;">
                                <option value="index" {{ old('robots_index', $blog->robots_index ?? 'index') === 'index' ? 'selected' : '' }}>index (Allow search engines to index)</option>
                                <option value="noindex" {{ old('robots_index', $blog->robots_index) === 'noindex' ? 'selected' : '' }}>noindex (Prevent page from appearing in search)</option>
                            </select>
                            <span style="font-size: 0.74rem; color: var(--text-muted); display: block; margin-top: 4px;">
                                Instructs Googlebot whether to index this page.
                            </span>
                        </div>
                    </div>

                    <!-- Robots Follow -->
                    <div style="margin-bottom: 6px;">
                        <label for="robotsFollowSelect" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px; color: var(--text-main);">
                            Link Following (Robots)
                        </label>
                        <select name="robots_follow" id="robotsFollowSelect" class="form-control" style="width: 100%; max-width: 480px;">
                            <option value="follow" {{ old('robots_follow', $blog->robots_follow ?? 'follow') === 'follow' ? 'selected' : '' }}>follow (Allow search engines to crawl outbound links)</option>
                            <option value="nofollow" {{ old('robots_follow', $blog->robots_follow) === 'nofollow' ? 'selected' : '' }}>nofollow (Instruct search engines not to endorse/follow links)</option>
                        </select>
                        <span style="font-size: 0.74rem; color: var(--text-muted); display: block; margin-top: 4px;">
                            Sets the robots &lt;meta name="robots" content="..."&gt; header tag.
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar Settings -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Publishing & Status -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 18px; color: var(--text-main);">Publishing</h3>

                <div style="margin-bottom: 18px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: var(--primary);">
                        <span>Published (Visible on site)</span>
                    </label>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: #8b5cf6;">
                        <span>Featured Lead Article</span>
                    </label>
                </div>

                <div style="border-top: 1px solid var(--border-medium); padding-top: 18px; display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 10px;">
                        Update Article
                    </button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Category Assignment -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <h3 style="font-size: 1.05rem; color: var(--text-main); margin: 0;">Category</h3>
                    <a href="{{ route('admin.blog-categories.index') }}" target="_blank" style="font-size: 0.8rem; color: var(--primary); text-decoration: none;">
                        + Manage
                    </a>
                </div>

                <div>
                    <select name="category_id" class="form-control" style="width: 100%; padding: 9px 12px; font-size: 0.88rem;">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $blog->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Featured Image (Unified Media Manager Integration) -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <h3 style="font-size: 1.05rem; margin: 0; color: var(--text-main);">Featured Image</h3>
                    <span id="featuredImageBadge" class="badge badge-primary" style="display: {{ ($blog->image || old('image_url')) ? 'inline-flex' : 'none' }}; font-size: 0.72rem;">Current</span>
                </div>

                <!-- Live Preview & Display Box -->
                <div id="featuredImagePreviewBox" style="position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1.5px {{ ($blog->image || old('image_url')) ? 'solid' : 'dashed' }} var(--border-medium); background: var(--bg-surface-elevated); margin-bottom: 14px; min-height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; transition: all 0.2s ease;">
                    
                    <!-- Image container when image is set -->
                    <div id="featuredImageContainer" style="display: {{ ($blog->image || old('image_url')) ? 'block' : 'none' }}; width: 100%; position: relative;">
                        <img id="featuredImagePreview" src="{{ old('image_url', $blog->image_url) }}" alt="{{ $blog->title }}" style="width: 100%; height: 180px; object-fit: cover; display: block;">
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.7) 0%, transparent 60%); display: flex; align-items: flex-end; justify-content: space-between; padding: 12px 14px;">
                            <span id="featuredImageFilename" style="color: #ffffff; font-size: 0.78rem; font-family: var(--font-mono); text-shadow: 0 1px 2px rgba(0,0,0,0.6); max-width: 70%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ basename($blog->image ?? '') }}
                            </span>
                            <button type="button" onclick="removeFeaturedImage()" class="btn btn-sm btn-danger" style="padding: 4px 8px; font-size: 0.75rem; border-radius: 6px;">
                                ✕ Remove
                            </button>
                        </div>
                    </div>

                    <!-- Empty state placeholder when no image is set -->
                    <div id="featuredImagePlaceholder" style="display: {{ ($blog->image || old('image_url')) ? 'none' : 'flex' }}; flex-direction: column; align-items: center; justify-content: center; padding: 24px 16px; width: 100%; gap: 10px;">
                        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div style="font-size: 0.88rem; font-weight: 600; color: var(--text-main);">No featured image chosen</div>
                    </div>
                </div>

                <!-- Primary Action Buttons -->
                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                    <button type="button" onclick="chooseFeaturedImageFromMedia()" class="btn btn-secondary" style="flex: 1; justify-content: center; font-size: 0.82rem; padding: 8px 12px; gap: 6px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Choose from Media Manager</span>
                    </button>
                    <button type="button" onclick="document.getElementById('featuredImageFileInput').click()" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.82rem;" title="Upload new image from your computer">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </button>
                </div>

                <!-- Hidden inputs maintaining complete form submission compatibility -->
                <input type="file" name="image_file" id="featuredImageFileInput" accept="image/*" style="display: none;" onchange="handleFeaturedFileUpload(this)">
                <input type="hidden" name="image_url" id="featuredImageUrlInput" value="{{ old('image_url', $blog->image) }}">

                @error('image_file')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
                @error('image_url')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror

                <!-- Collapsible manual path/URL accordion for advanced users -->
                <div style="margin-top: 10px; border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                    <details style="font-size: 0.78rem; color: var(--text-muted);">
                        <summary style="cursor: pointer; user-select: none; font-weight: 500;">Direct Image URL / Path (Advanced)</summary>
                        <div style="margin-top: 8px;">
                            <input type="text" id="manualImageUrlInput" value="{{ old('image_url', $blog->image) }}" class="form-control form-control-sm" 
                                   placeholder="e.g. /assets/images/blog-cpcb-epr.jpg or /storage/media/..." 
                                   oninput="handleManualUrlChange(this.value)" style="font-size: 0.78rem;">
                        </div>
                    </details>
                </div>
            </div>

            <!-- Author & Attribution -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 16px; color: var(--text-main);">Author & Attribution</h3>

                <div style="margin-bottom: 16px;">
                    <label class="form-label">
                        <span>Author Name</span>
                    </label>
                    <input type="text" name="author_name" value="{{ old('author_name', $blog->author_name ?: (Auth::user()->name ?? 'Admin')) }}" 
                           class="form-control" style="width: 100%;">
                </div>

                <div style="margin-bottom: 0;">
                    <label class="form-label">
                        <span>Author Role / Title</span>
                    </label>
                    <input type="text" name="author_role" value="{{ old('author_role', $blog->author_role ?: (Auth::user()->job_title ?? 'Admin')) }}" 
                           placeholder="Role / Title" class="form-control" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Include Reusable Internal Media Manager Modal -->
@include('partials.admin.media-picker-modal')

@push('styles')
<!-- Quill WYSIWYG Editor Styles -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
.ql-toolbar.ql-snow {
    background: var(--bg-surface-elevated);
    border-color: var(--border-medium);
    border-top-left-radius: var(--radius-md);
    border-top-right-radius: var(--radius-md);
    padding: 10px 14px;
}
.ql-container.ql-snow {
    border-color: var(--border-medium);
    border-bottom-left-radius: var(--radius-md);
    border-bottom-right-radius: var(--radius-md);
    background: #ffffff;
    font-family: inherit;
    font-size: 0.95rem;
}
.ql-editor {
    min-height: 340px;
    line-height: 1.7;
    color: var(--text-main);
}
.ql-editor.ql-blank::before {
    color: var(--text-muted);
    font-style: normal;
}
</style>
@endpush

@push('scripts')
<!-- Quill WYSIWYG Editor Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize Quill Editor
    const quill = new Quill('#quillEditor', {
        theme: 'snow',
        placeholder: 'Write your article content, paragraphs, headings, and quotes here...',
        modules: {
            toolbar: [
                [{ 'header': [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['blockquote', 'code-block'],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // Custom Toolbar Image Handler: click media icon to open internal media manager modal!
    const toolbar = quill.getModule('toolbar');
    toolbar.addHandler('image', function() {
        triggerEditorMediaPicker();
    });

    // Helper: open media picker and insert chosen image into Quill editor
    window.triggerEditorMediaPicker = function() {
        const range = quill.getSelection(true) || { index: quill.getLength() };
        openMediaPickerModal(function(selected) {
            quill.insertEmbed(range.index, 'image', selected.url);
            quill.setSelection(range.index + 1);
        }, {
            buttonText: 'Insert into Article',
            showAlt: true
        });
    };

    // Helper: update featured image preview and state
    function updateFeaturedPreview(url, filename) {
        const previewImg = document.getElementById('featuredImagePreview');
        const nameLabel = document.getElementById('featuredImageFilename');
        const container = document.getElementById('featuredImageContainer');
        const placeholder = document.getElementById('featuredImagePlaceholder');
        const badge = document.getElementById('featuredImageBadge');
        const manualInput = document.getElementById('manualImageUrlInput');
        const previewBox = document.getElementById('featuredImagePreviewBox');

        if (url) {
            if (previewImg) previewImg.src = url;
            if (nameLabel) nameLabel.textContent = filename || url.split('/').pop();
            if (container) container.style.display = 'block';
            if (placeholder) placeholder.style.display = 'none';
            if (badge) badge.style.display = 'inline-flex';
            if (manualInput) manualInput.value = url;
            if (previewBox) previewBox.style.borderStyle = 'solid';
        } else {
            if (previewImg) previewImg.src = '';
            if (container) container.style.display = 'none';
            if (placeholder) placeholder.style.display = 'flex';
            if (badge) badge.style.display = 'none';
            if (manualInput) manualInput.value = '';
            if (previewBox) previewBox.style.borderStyle = 'dashed';
        }
    }

    // Helper: select image from media library for featured image input
    window.chooseFeaturedImageFromMedia = function() {
        openMediaPickerModal(function(selected) {
            const featuredInput = document.getElementById('featuredImageUrlInput');
            const fileInput = document.getElementById('featuredImageFileInput');
            if (featuredInput) {
                featuredInput.value = selected.url;
            }
            if (fileInput) {
                fileInput.value = '';
            }
            updateFeaturedPreview(selected.url, selected.name || selected.filename);
        }, {
            buttonText: 'Set as Featured Image',
            showAlt: false
        });
    };

    // Helper: handle local file selection with instant preview
    window.handleFeaturedFileUpload = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const featuredInput = document.getElementById('featuredImageUrlInput');
                if (featuredInput) {
                    featuredInput.value = '';
                }
                updateFeaturedPreview(e.target.result, file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)');
            };
            reader.readAsDataURL(file);
        }
    };

    // Helper: remove selected featured image
    window.removeFeaturedImage = function() {
        const featuredInput = document.getElementById('featuredImageUrlInput');
        const fileInput = document.getElementById('featuredImageFileInput');
        if (featuredInput) featuredInput.value = '';
        if (fileInput) fileInput.value = '';
        updateFeaturedPreview('', '');
    };

    // Helper: handle manual URL typing
    window.handleManualUrlChange = function(val) {
        const featuredInput = document.getElementById('featuredImageUrlInput');
        const fileInput = document.getElementById('featuredImageFileInput');
        if (fileInput) fileInput.value = '';
        if (featuredInput) featuredInput.value = val.trim();
        if (val.trim()) {
            updateFeaturedPreview(val.trim(), val.trim());
        } else {
            updateFeaturedPreview('', '');
        }
    };

    const textarea = document.getElementById('articleContent');

    // Populate initial content from existing post
    if (textarea.value.trim().length > 0) {
        quill.root.innerHTML = textarea.value;
    }

    // Keep textarea synced on every text change
    quill.on('text-change', function() {
        textarea.value = quill.root.innerHTML;
    });

    // Ensure synced on form submission
    const form = textarea.closest('form');
    if (form) {
        form.addEventListener('submit', function() {
            const codeContainer = document.getElementById('codeEditorContainer');
            if (codeContainer && codeContainer.style.display !== 'none') {
                // Currently in raw HTML mode - use textarea content directly
            } else {
                textarea.value = quill.root.innerHTML;
            }
        });
    }

    // 2. Toggle Raw HTML Mode
    window.toggleHtmlMode = function() {
        const qContainer = document.getElementById('quillWrapper');
        const cContainer = document.getElementById('codeEditorContainer');
        const toggleBtn = document.getElementById('htmlToggleBtn');

        if (cContainer.style.display === 'none') {
            // Switch to raw HTML code mode
            textarea.value = quill.root.innerHTML;
            qContainer.style.display = 'none';
            cContainer.style.display = 'block';
            toggleBtn.textContent = '👁 Visual Editor';
            toggleBtn.classList.add('btn-primary');
            toggleBtn.classList.remove('btn-secondary');
        } else {
            // Switch back to WYSIWYG visual mode
            quill.root.innerHTML = textarea.value;
            cContainer.style.display = 'none';
            qContainer.style.display = 'block';
            toggleBtn.textContent = '</> HTML Source';
            toggleBtn.classList.remove('btn-primary');
            toggleBtn.classList.add('btn-secondary');
        }
    };

    // SEO Subtab Switcher
    window.switchSeoSubTab = function(tab, btn) {
        document.querySelectorAll('.seo-subtab-pane').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.seo-subtab-btn').forEach(el => {
            el.style.color = 'var(--text-muted)';
            el.style.borderBottomColor = 'transparent';
        });

        if (tab === 'general') {
            document.getElementById('seoTabGeneral').style.display = 'block';
        } else if (tab === 'social') {
            document.getElementById('seoTabSocial').style.display = 'block';
        } else if (tab === 'schema-robots') {
            document.getElementById('seoTabSchema').style.display = 'block';
        }

        btn.style.color = 'var(--primary)';
        btn.style.borderBottomColor = 'var(--primary)';
    };

    // SERP Device Toggle (Desktop / Mobile)
    window.toggleSerpDevice = function(mode) {
        const box = document.getElementById('serpPreviewBox');
        const dBtn = document.getElementById('serpDesktopBtn');
        const mBtn = document.getElementById('serpMobileBtn');
        if (mode === 'mobile') {
            box.style.maxWidth = '360px';
            box.style.padding = '12px';
            box.style.border = '1px solid #e2e8f0';
            box.style.borderRadius = '8px';
            box.style.background = '#fafafa';
            mBtn.style.background = '#ffffff';
            mBtn.style.color = '#0f172a';
            mBtn.style.boxShadow = '0 1px 2px rgba(0,0,0,0.05)';
            dBtn.style.background = 'transparent';
            dBtn.style.color = '#64748b';
            dBtn.style.boxShadow = 'none';
        } else {
            box.style.maxWidth = '600px';
            box.style.padding = '0';
            box.style.border = 'none';
            box.style.borderRadius = '0';
            box.style.background = 'transparent';
            dBtn.style.background = '#ffffff';
            dBtn.style.color = '#0f172a';
            dBtn.style.boxShadow = '0 1px 2px rgba(0,0,0,0.05)';
            mBtn.style.background = 'transparent';
            mBtn.style.color = '#64748b';
            mBtn.style.boxShadow = 'none';
        }
    };

    // Media Manager for OG Image
    window.chooseOgImageFromMedia = function() {
        openMediaPickerModal(function(selected) {
            const ogInput = document.getElementById('ogImageInput');
            if (ogInput) {
                ogInput.value = selected.url;
            }
        }, {
            buttonText: 'Set as Social Share Image',
            showAlt: false
        });
    };

    // Auto-fill slug, meta title, and live SERP preview updates
    const titleInput = document.getElementById('blogTitleInput');
    const slugInput = document.getElementById('blogSlugInput');
    const metaTitleInput = document.getElementById('metaTitleInput');
    const metaDescInput = document.getElementById('metaDescInput');
    const excerptInput = document.querySelector('textarea[name="excerpt"]');
    const serpTitleDisplay = document.getElementById('serpTitleDisplay');
    const serpSlugDisplay = document.getElementById('serpSlugDisplay');
    const serpSnippetDisplay = document.getElementById('serpSnippetDisplay');
    const metaTitleCount = document.getElementById('metaTitleCount');
    const metaDescCount = document.getElementById('metaDescCount');

    function updateSerpTitle() {
        const customTitle = metaTitleInput ? metaTitleInput.value.trim() : '';
        const articleTitle = titleInput ? titleInput.value.trim() : '';
        const text = customTitle || articleTitle || 'Article Title Goes Here - SHRISTIYAM';
        if (serpTitleDisplay) {
            serpTitleDisplay.textContent = text;
        }
        if (metaTitleCount && metaTitleInput) {
            const len = metaTitleInput.value.length;
            metaTitleCount.textContent = `${len} / 60 chars`;
            metaTitleCount.style.color = len > 60 ? '#ef4444' : (len >= 45 ? '#059669' : 'var(--text-muted)');
        }
    }

    function updateSerpSnippet() {
        const customDesc = metaDescInput ? metaDescInput.value.trim() : '';
        const excerpt = excerptInput ? excerptInput.value.trim() : '';
        const text = customDesc || excerpt || 'Preview of your search engine snippet description will appear here as you type. Write an engaging summary to maximize organic click-through rates.';
        if (serpSnippetDisplay) {
            serpSnippetDisplay.textContent = text;
        }
        if (metaDescCount && metaDescInput) {
            const len = metaDescInput.value.length;
            metaDescCount.textContent = `${len} / 160 chars`;
            metaDescCount.style.color = len > 160 ? '#ef4444' : (len >= 120 ? '#059669' : 'var(--text-muted)');
        }
    }

    function updateSerpSlug() {
        if (serpSlugDisplay && slugInput) {
            serpSlugDisplay.textContent = slugInput.value.trim() || 'article-slug';
        }
    }

    if (metaTitleInput) {
        metaTitleInput.addEventListener('input', updateSerpTitle);
    }

    if (metaDescInput) {
        metaDescInput.addEventListener('input', updateSerpSnippet);
    }

    if (excerptInput) {
        excerptInput.addEventListener('input', function() {
            if (!metaDescInput || metaDescInput.value.trim().length === 0) {
                updateSerpSnippet();
            }
        });
    }

    if (slugInput) {
        slugInput.addEventListener('input', updateSerpSlug);
    }

    if (titleInput) {
        titleInput.addEventListener('input', function() {
            if (metaTitleInput && metaTitleInput.value.trim().length === 0) {
                updateSerpTitle();
            }
        });
    }

    // Initial character counters and preview setup
    updateSerpTitle();
    updateSerpSnippet();
    updateSerpSlug();
});
</script>
@endpush
@endsection
