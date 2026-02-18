@php
    /** @var \App\Models\BlogCategory|null $category */
    $isEdit = isset($category) && $category;
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $isEdit ? $category->name : '') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="e.g. Cardiology"
                        required
                    >
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="slug">Slug (optional)</label>
                    <input
                        id="slug"
                        name="slug"
                        type="text"
                        value="{{ old('slug', $isEdit ? $category->slug : '') }}"
                        class="form-control @error('slug') is-invalid @enderror"
                        placeholder="leave blank to auto-generate"
                    >
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input
                        id="is_active"
                        name="is_active"
                        type="checkbox"
                        value="1"
                        class="form-check-input"
                        {{ old('is_active', $isEdit ? (int) $category->is_active : 1) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
</div>
