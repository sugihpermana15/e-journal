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

    $gallery2Url = $isEdit && $post->detail_gallery_image_2_path
        ? asset('storage/' . ltrim($post->detail_gallery_image_2_path, '/'))
        : asset('assets/images/blog/blog-details-img-box-img-2.jpg');

    $quoteAuthorImageUrl = $isEdit && $post->detail_quote_author_image_path
        ? asset('storage/' . ltrim($post->detail_quote_author_image_path, '/'))
        : asset('assets/images/blog/blog-details-quote-client-img-1.jpg');

    $featureImageUrl = $isEdit && $post->detail_feature_image_path
        ? asset('storage/' . ltrim($post->detail_feature_image_path, '/'))
        : asset('assets/images/blog/blog-details-points-img-1.jpg');

    $tagsLines = $isEdit ? implode("|", (array) ($post->tags ?? [])) : '';

    $detailPointsLines = $isEdit ? implode("\n", (array) ($post->detail_points ?? [])) : '';
    $detailFeaturePointsLines = $isEdit ? implode("\n", (array) ($post->detail_feature_points ?? [])) : '';
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
            <div class="card-header">
                <div class="fw-semibold">Blog Details Template</div>
                <div class="text-muted small">Optional. Fill to match the existing blog-details design.</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <img src="{{ $gallery1Url }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                            <div>
                                <div class="fw-semibold">Gallery image 1</div>
                                <div class="text-muted small">Left image in the 2-image block.</div>
                            </div>
                        </div>
                        <label class="form-label" for="detail_gallery_image_1_file">Upload Gallery Image 1</label>
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

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <img src="{{ $gallery2Url }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                            <div>
                                <div class="fw-semibold">Gallery image 2</div>
                                <div class="text-muted small">Right image in the 2-image block.</div>
                            </div>
                        </div>
                        <label class="form-label" for="detail_gallery_image_2_file">Upload Gallery Image 2</label>
                        <input
                            id="detail_gallery_image_2_file"
                            name="detail_gallery_image_2_file"
                            type="file"
                            class="form-control @error('detail_gallery_image_2_file') is-invalid @enderror"
                            accept="image/*"
                        >
                        @error('detail_gallery_image_2_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_title_2">Section Title 2</label>
                        <input
                            id="detail_title_2"
                            name="detail_title_2"
                            type="text"
                            value="{{ old('detail_title_2', $isEdit ? $post->detail_title_2 : '') }}"
                            class="form-control @error('detail_title_2') is-invalid @enderror"
                        >
                        @error('detail_title_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_title_3">Section Title 3</label>
                        <input
                            id="detail_title_3"
                            name="detail_title_3"
                            type="text"
                            value="{{ old('detail_title_3', $isEdit ? $post->detail_title_3 : '') }}"
                            class="form-control @error('detail_title_3') is-invalid @enderror"
                        >
                        @error('detail_title_3')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_title_4">Section Title 4</label>
                        <input
                            id="detail_title_4"
                            name="detail_title_4"
                            type="text"
                            value="{{ old('detail_title_4', $isEdit ? $post->detail_title_4 : '') }}"
                            class="form-control @error('detail_title_4') is-invalid @enderror"
                        >
                        @error('detail_title_4')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_title_5">Section Title 5</label>
                        <input
                            id="detail_title_5"
                            name="detail_title_5"
                            type="text"
                            value="{{ old('detail_title_5', $isEdit ? $post->detail_title_5 : '') }}"
                            class="form-control @error('detail_title_5') is-invalid @enderror"
                        >
                        @error('detail_title_5')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_2">Text 2</label>
                        <textarea
                            id="detail_text_2"
                            name="detail_text_2"
                            rows="3"
                            class="form-control @error('detail_text_2') is-invalid @enderror"
                        >{{ old('detail_text_2', $isEdit ? $post->detail_text_2 : '') }}</textarea>
                        @error('detail_text_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_5">Text 5</label>
                        <textarea
                            id="detail_text_5"
                            name="detail_text_5"
                            rows="3"
                            class="form-control @error('detail_text_5') is-invalid @enderror"
                        >{{ old('detail_text_5', $isEdit ? $post->detail_text_5 : '') }}</textarea>
                        @error('detail_text_5')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_3">Text 3</label>
                        <textarea
                            id="detail_text_3"
                            name="detail_text_3"
                            rows="3"
                            class="form-control @error('detail_text_3') is-invalid @enderror"
                        >{{ old('detail_text_3', $isEdit ? $post->detail_text_3 : '') }}</textarea>
                        @error('detail_text_3')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_4">Text 4</label>
                        <textarea
                            id="detail_text_4"
                            name="detail_text_4"
                            rows="3"
                            class="form-control @error('detail_text_4') is-invalid @enderror"
                        >{{ old('detail_text_4', $isEdit ? $post->detail_text_4 : '') }}</textarea>
                        @error('detail_text_4')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="detail_points_lines">Points list (one per line)</label>
                    <textarea
                        id="detail_points_lines"
                        name="detail_points_lines"
                        rows="3"
                        class="form-control @error('detail_points_lines') is-invalid @enderror"
                        placeholder="Scenario testing\nRisk anticipation\nTeam alignment"
                    >{{ old('detail_points_lines', $detailPointsLines) }}</textarea>
                    @error('detail_points_lines')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label" for="detail_quote_text">Quote text</label>
                        <textarea
                            id="detail_quote_text"
                            name="detail_quote_text"
                            rows="2"
                            class="form-control @error('detail_quote_text') is-invalid @enderror"
                        >{{ old('detail_quote_text', $isEdit ? $post->detail_quote_text : '') }}</textarea>
                        @error('detail_quote_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="detail_quote_author_name">Quote author</label>
                        <input
                            id="detail_quote_author_name"
                            name="detail_quote_author_name"
                            type="text"
                            value="{{ old('detail_quote_author_name', $isEdit ? $post->detail_quote_author_name : '') }}"
                            class="form-control @error('detail_quote_author_name') is-invalid @enderror"
                        >
                        @error('detail_quote_author_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ $quoteAuthorImageUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 50%;">
                        <div>
                            <div class="fw-semibold">Quote author image</div>
                            <div class="text-muted small">Shown inside the quote box.</div>
                        </div>
                    </div>
                    <label class="form-label" for="detail_quote_author_image_file">Upload Quote Author Image</label>
                    <input
                        id="detail_quote_author_image_file"
                        name="detail_quote_author_image_file"
                        type="file"
                        class="form-control @error('detail_quote_author_image_file') is-invalid @enderror"
                        accept="image/*"
                    >
                    @error('detail_quote_author_image_file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_6">Text 6</label>
                        <textarea
                            id="detail_text_6"
                            name="detail_text_6"
                            rows="3"
                            class="form-control @error('detail_text_6') is-invalid @enderror"
                        >{{ old('detail_text_6', $isEdit ? $post->detail_text_6 : '') }}</textarea>
                        @error('detail_text_6')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_text_7">Text 7</label>
                        <textarea
                            id="detail_text_7"
                            name="detail_text_7"
                            rows="3"
                            class="form-control @error('detail_text_7') is-invalid @enderror"
                        >{{ old('detail_text_7', $isEdit ? $post->detail_text_7 : '') }}</textarea>
                        @error('detail_text_7')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <img src="{{ $featureImageUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                            <div>
                                <div class="fw-semibold">Points image</div>
                                <div class="text-muted small">Image next to the checklist.</div>
                            </div>
                        </div>
                        <label class="form-label" for="detail_feature_image_file">Upload Points Image</label>
                        <input
                            id="detail_feature_image_file"
                            name="detail_feature_image_file"
                            type="file"
                            class="form-control @error('detail_feature_image_file') is-invalid @enderror"
                            accept="image/*"
                        >
                        @error('detail_feature_image_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="detail_feature_points_lines">Checklist points (one per line)</label>
                        <textarea
                            id="detail_feature_points_lines"
                            name="detail_feature_points_lines"
                            rows="5"
                            class="form-control @error('detail_feature_points_lines') is-invalid @enderror"
                            placeholder="Scenario comparisons\nRisk stratification\nShared planning assumptions"
                        >{{ old('detail_feature_points_lines', $detailFeaturePointsLines) }}</textarea>
                        @error('detail_feature_points_lines')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
                            <div class="text-muted small">Shown on blog detail page.</div>
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
