@php
    /** @var \App\Models\BlogPost|null $post */
    $isEdit = isset($post) && $post;

    /** @var \Illuminate\Support\Collection|\App\Models\BlogCategory[] $categories */
    $categories = $categories ?? collect();

    $heroUrl = $isEdit && $post->hero_image_path
        ? asset('storage/' . ltrim($post->hero_image_path, '/'))
        : asset('assets/images/blog/blog-details-img-1.jpg');

    $authorImageUrl = $isEdit && $post->author_image_path
        ? asset('storage/' . ltrim($post->author_image_path, '/'))
        : asset('assets/images/blog/blog-details-meta-client-img-1.jpg');

    $gallery1Url = $isEdit && $post->detail_gallery_image_1_path
        ? asset('storage/' . ltrim($post->detail_gallery_image_1_path, '/'))
        : asset('assets/images/blog/blog-details-img-box-img-1.jpg');

    $tagsLines = $isEdit ? implode("|", (array) ($post->tags ?? [])) : '';

    $contentSections = old(
        'content_sections',
        $isEdit ? (array) ($post->content_sections ?? []) : []
    );
    if (!is_array($contentSections)) {
        $contentSections = [];
    }
    $contentSections = array_values(array_filter($contentSections, fn ($s) => is_array($s)));
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="{{ old('title', $isEdit ? $post->title : '') }}"
                        class="form-control @error('title') is-invalid @enderror"
                        required
                    >
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="slug">Slug (optional)</label>
                    <input
                        id="slug"
                        name="slug"
                        type="text"
                        value="{{ old('slug', $isEdit ? $post->slug : '') }}"
                        class="form-control @error('slug') is-invalid @enderror"
                        placeholder="leave blank to auto-generate"
                    >
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="category">Category</label>
                        <select
                            id="category"
                            name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror"
                        >
                            <option value="">— None —</option>
                            @foreach($categories as $cat)
                                <option
                                    value="{{ $cat->id }}"
                                    {{ (string) old('category_id', $isEdit ? (string) $post->category_id : '') === (string) $cat->id ? 'selected' : '' }}
                                >
                                    {{ $cat->name }} ({{ $cat->slug }})
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="author_name">Author Name</label>
                        <input
                            id="author_name"
                            name="author_name"
                            type="text"
                            value="{{ old('author_name', $isEdit ? $post->author_name : '') }}"
                            class="form-control @error('author_name') is-invalid @enderror"
                            placeholder="e.g. Med Open Press Editorial"
                        >
                        @error('author_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tags_lines">Tags (use | or new lines)</label>
                    <textarea
                        id="tags_lines"
                        name="tags_lines"
                        rows="2"
                        class="form-control @error('tags_lines') is-invalid @enderror"
                        placeholder="Surgery|Cardiology"
                    >{{ old('tags_lines', $tagsLines) }}</textarea>
                    @error('tags_lines')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="excerpt">Excerpt</label>
                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="3"
                        class="form-control @error('excerpt') is-invalid @enderror"
                    >{{ old('excerpt', $isEdit ? $post->excerpt : '') }}</textarea>
                    @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label class="form-label" for="content">Content (detail)</label>
                    <textarea
                        id="content"
                        name="content"
                        rows="10"
                        class="form-control @error('content') is-invalid @enderror"
                    >{{ old('content', $isEdit ? $post->content : '') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <div class="fw-semibold">Content Sections</div>
                    <div class="text-muted small">Tambah section + text sebanyak yang dibutuhkan (sesuai dokumen).</div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" id="addContentSectionBtn">Add Section</button>
            </div>
            <div class="card-body">
                @error('content_sections')
                <div class="alert alert-danger mb-3">{{ $message }}</div>
                @enderror

                <div id="contentSectionsContainer">
                    @forelse($contentSections as $i => $section)
                        @php
                            $sectionTitle = (string) ($section['title'] ?? '');
                            $sectionText = (string) ($section['text'] ?? '');
                        @endphp
                        <div class="border rounded p-3 mb-3 content-section-item" data-index="{{ $i }}">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="fw-semibold">Section {{ $i + 1 }}</div>
                                <button type="button" class="btn btn-outline-danger btn-sm removeContentSectionBtn">Remove</button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Section Title</label>
                                <input
                                    type="text"
                                    name="content_sections[{{ $i }}][title]"
                                    value="{{ old('content_sections.' . $i . '.title', $sectionTitle) }}"
                                    class="form-control @error('content_sections.' . $i . '.title') is-invalid @enderror"
                                    maxlength="255"
                                >
                                @error('content_sections.' . $i . '.title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Section Text</label>
                                <textarea
                                    name="content_sections[{{ $i }}][text]"
                                    rows="5"
                                    class="form-control @error('content_sections.' . $i . '.text') is-invalid @enderror"
                                >{{ old('content_sections.' . $i . '.text', $sectionText) }}</textarea>
                                @error('content_sections.' . $i . '.text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @empty
                        <div class="text-muted" id="noContentSectionsHint">Belum ada section. Klik “Add Section” untuk menambah.</div>
                    @endforelse
                </div>

                <template id="contentSectionTemplate">
                    <div class="border rounded p-3 mb-3 content-section-item" data-index="__INDEX__">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="fw-semibold">Section __NUMBER__</div>
                            <button type="button" class="btn btn-outline-danger btn-sm removeContentSectionBtn">Remove</button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="content_sections[__INDEX__][title]" class="form-control" maxlength="255">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Section Text</label>
                            <textarea name="content_sections[__INDEX__][text]" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="fw-semibold">Scientific News Media &amp; Share</div>
                <div class="text-muted small">Optional.</div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ $gallery1Url }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                        <div>
                            <div class="fw-semibold">Content image</div>
                            <div class="text-muted small">Shown inside the article body (single image).</div>
                        </div>
                    </div>
                    <label class="form-label" for="detail_gallery_image_1_file">Upload Content Image</label>
                    <input
                        id="detail_gallery_image_1_file"
                        name="detail_gallery_image_1_file"
                        type="file"
                        class="form-control @error('detail_gallery_image_1_file') is-invalid @enderror"
                        accept="image/*"
                    >
                    @error('detail_gallery_image_1_file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="detail_gallery_image_1_caption">Content Image Caption (Figure)</label>
                    <textarea
                        id="detail_gallery_image_1_caption"
                        name="detail_gallery_image_1_caption"
                        rows="3"
                        class="form-control @error('detail_gallery_image_1_caption') is-invalid @enderror"
                        placeholder="Figure 1. ..."
                    >{{ old('detail_gallery_image_1_caption', $isEdit ? ($post->detail_gallery_image_1_caption ?? '') : '') }}</textarea>
                    @error('detail_gallery_image_1_caption')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="share_pinterest_url">Share: Pinterest URL</label>
                        <input
                            id="share_pinterest_url"
                            name="share_pinterest_url"
                            type="text"
                            value="{{ old('share_pinterest_url', $isEdit ? $post->share_pinterest_url : '') }}"
                            class="form-control @error('share_pinterest_url') is-invalid @enderror"
                            placeholder="#"
                        >
                        @error('share_pinterest_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="share_linkedin_url">Share: LinkedIn URL</label>
                        <input
                            id="share_linkedin_url"
                            name="share_linkedin_url"
                            type="text"
                            value="{{ old('share_linkedin_url', $isEdit ? $post->share_linkedin_url : '') }}"
                            class="form-control @error('share_linkedin_url') is-invalid @enderror"
                            placeholder="#"
                        >
                        @error('share_linkedin_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-0">
                        <label class="form-label" for="share_instagram_url">Share: Instagram URL</label>
                        <input
                            id="share_instagram_url"
                            name="share_instagram_url"
                            type="text"
                            value="{{ old('share_instagram_url', $isEdit ? $post->share_instagram_url : '') }}"
                            class="form-control @error('share_instagram_url') is-invalid @enderror"
                            placeholder="#"
                        >
                        @error('share_instagram_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-0">
                        <label class="form-label" for="share_facebook_url">Share: Facebook URL</label>
                        <input
                            id="share_facebook_url"
                            name="share_facebook_url"
                            type="text"
                            value="{{ old('share_facebook_url', $isEdit ? $post->share_facebook_url : '') }}"
                            class="form-control @error('share_facebook_url') is-invalid @enderror"
                            placeholder="#"
                        >
                        @error('share_facebook_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ $heroUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                        <div>
                            <div class="fw-semibold">Hero image</div>
                            <div class="text-muted small">Shown on Scientific News detail page.</div>
                        </div>
                    </div>
                    <label class="form-label" for="hero_file">Upload Hero</label>
                    <input
                        id="hero_file"
                        name="hero_file"
                        type="file"
                        class="form-control @error('hero_file') is-invalid @enderror"
                        accept="image/*"
                    >
                    @error('hero_file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ $authorImageUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 50%;">
                        <div>
                            <div class="fw-semibold">Author image</div>
                            <div class="text-muted small">Optional.</div>
                        </div>
                    </div>
                    <label class="form-label" for="author_image_file">Upload Author Image</label>
                    <input
                        id="author_image_file"
                        name="author_image_file"
                        type="file"
                        class="form-control @error('author_image_file') is-invalid @enderror"
                        accept="image/*"
                    >
                    @error('author_image_file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="hidden" name="is_published" value="0">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            id="is_published"
                            name="is_published"
                            @checked((bool) old('is_published', $isEdit ? $post->is_published : false))
                        >
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label" for="published_at">Published At</label>
                    <input
                        id="published_at"
                        name="published_at"
                        type="datetime-local"
                        value="{{ old('published_at', $isEdit ? $post->published_at?->format('Y-m-d\TH:i') : '') }}"
                        class="form-control @error('published_at') is-invalid @enderror"
                    >
                    @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const container = document.getElementById('contentSectionsContainer');
        const addBtn = document.getElementById('addContentSectionBtn');
        const template = document.getElementById('contentSectionTemplate');

        if (!container || !addBtn || !template) return;

        function currentMaxIndex() {
            const items = container.querySelectorAll('.content-section-item');
            let max = -1;
            items.forEach((el) => {
                const idx = parseInt(el.getAttribute('data-index') || '-1', 10);
                if (!Number.isNaN(idx)) max = Math.max(max, idx);
            });
            return max;
        }

        function refreshNumbers() {
            const items = container.querySelectorAll('.content-section-item');
            items.forEach((el, i) => {
                const title = el.querySelector('.fw-semibold');
                if (title) title.textContent = `Section ${i + 1}`;
            });
        }

        function hideEmptyHint() {
            const hint = document.getElementById('noContentSectionsHint');
            if (hint) hint.remove();
        }

        addBtn.addEventListener('click', function () {
            hideEmptyHint();

            const newIndex = currentMaxIndex() + 1;
            const html = template.innerHTML
                .replaceAll('__INDEX__', String(newIndex))
                .replaceAll('__NUMBER__', String(newIndex + 1));

            const wrapper = document.createElement('div');
            wrapper.innerHTML = html.trim();
            const node = wrapper.firstElementChild;
            if (!node) return;

            container.appendChild(node);
            refreshNumbers();
        });

        container.addEventListener('click', function (e) {
            const target = e.target;
            if (!(target instanceof HTMLElement)) return;
            if (!target.classList.contains('removeContentSectionBtn')) return;

            const item = target.closest('.content-section-item');
            if (item) item.remove();

            const remaining = container.querySelectorAll('.content-section-item').length;
            if (remaining === 0) {
                const hint = document.createElement('div');
                hint.className = 'text-muted';
                hint.id = 'noContentSectionsHint';
                hint.textContent = 'Belum ada section. Klik “Add Section” untuk menambah.';
                container.appendChild(hint);
            }

            refreshNumbers();
        });
    })();
</script>
