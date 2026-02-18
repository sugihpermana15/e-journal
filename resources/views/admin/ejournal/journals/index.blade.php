@extends('admin.partials.Layouts.master')

@section('title', 'Journals | Admin')
@section('title-sub', 'E-Journal')
@section('pagetitle', 'Journals')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Journals</h5>
                        <div class="text-muted small">Home “Featured Publications” will show journals that are <strong>Featured</strong> + <strong>Published</strong>.</div>
                        <div class="text-muted small">If cover images don't show, ensure storage link exists: <code>php artisan storage:link</code>.</div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addJournalModal">
                        Add Journal
                    </button>
                </div>

                <div class="card-body">
                    <table id="default_datatable" class="table table-striped table-bordered align-middle mb-0 w-100">
                        <thead>
                            <tr>
                                <th style="width: 80px">Cover</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th style="width: 110px">Featured</th>
                                <th style="width: 110px">Published</th>
                                <th style="width: 160px">Published At</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($journals as $journal)
                                @php
                                    $coverUrl = $journal->cover_path
                                        ? asset('storage/' . ltrim($journal->cover_path, '/'))
                                        : asset('assets/images/project/project-1-1.jpg');
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $coverUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $journal->title }}</div>
                                        <div class="text-muted small">{{ $journal->slug }}</div>
                                    </td>
                                    <td>{{ $journal->category ?? '-' }}</td>
                                    <td>
                                        @if($journal->is_featured)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($journal->is_published)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $journal->published_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <button
                                                type="button"
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editJournalModal"
                                                data-id="{{ $journal->id }}"
                                                data-title="{{ $journal->title }}"
                                                data-category="{{ $journal->category }}"
                                                data-short-description="{{ $journal->short_description }}"
                                                data-is-featured="{{ $journal->is_featured ? 1 : 0 }}"
                                                data-is-published="{{ $journal->is_published ? 1 : 0 }}"
                                                data-published-at="{{ $journal->published_at?->format('Y-m-d\TH:i') }}"
                                                data-cover-url="{{ $coverUrl }}"
                                            >
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('admin.ejournal.journals.destroy', $journal) }}" onsubmit="return confirm('Delete this journal?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Journal Modal -->
    <div class="modal fade" id="addJournalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Journal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.ejournal.journals.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_modal" value="add">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="add-title">Title</label>
                            <input type="text" id="add-title" name="title" value="{{ old('_modal') === 'add' ? old('title') : '' }}"
                                class="form-control @if (old('_modal') === 'add') @error('title') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'add')
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-category">Category (tag)</label>
                            <input type="text" id="add-category" name="category" value="{{ old('_modal') === 'add' ? old('category') : '' }}"
                                class="form-control @if (old('_modal') === 'add') @error('category') is-invalid @enderror @endif" placeholder="e.g. Original Research">
                            <div class="form-text">Shown as the small category/tag text on the journal card.</div>
                            @if (old('_modal') === 'add')
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-short">Short Description</label>
                            <textarea id="add-short" name="short_description" rows="3"
                                class="form-control @if (old('_modal') === 'add') @error('short_description') is-invalid @enderror @endif">{{ old('_modal') === 'add' ? old('short_description') : '' }}</textarea>
                            @if (old('_modal') === 'add')
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-cover">Cover Image</label>
                            <input type="file" id="add-cover" name="cover_file"
                                class="form-control @if (old('_modal') === 'add') @error('cover_file') is-invalid @enderror @endif" accept="image/*">
                            <div class="form-text">Recommended: square/portrait image. Stored in public storage.</div>
                            @if (old('_modal') === 'add')
                                @error('cover_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="is_featured" value="0">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="add-featured" name="is_featured"
                                        @checked(old('_modal') === 'add' ? (bool) old('is_featured', 1) : true)>
                                    <label class="form-check-label" for="add-featured">Featured on Home</label>
                                    <div class="form-text">If checked (and Published), it appears on Home Featured section.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="hidden" name="is_published" value="0">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="add-published" name="is_published"
                                        @checked(old('_modal') === 'add' ? (bool) old('is_published', 1) : true)>
                                    <label class="form-check-label" for="add-published">Published</label>
                                    <div class="form-text">If unchecked, it won't show on public listing.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label" for="add-published-at">Published At</label>
                            <input type="datetime-local" id="add-published-at" name="published_at" value="{{ old('_modal') === 'add' ? old('published_at') : '' }}"
                                class="form-control @if (old('_modal') === 'add') @error('published_at') is-invalid @enderror @endif">
                            @if (old('_modal') === 'add')
                                @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Journal Modal -->
    <div class="modal fade" id="editJournalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Journal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="editJournalForm" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit">

                    <div class="modal-body">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <img id="edit-cover-preview" src="" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                            <div class="text-muted small">Cover preview</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-title">Title</label>
                            <input type="text" id="edit-title" name="title" value="{{ old('_modal') === 'edit' ? old('title') : '' }}"
                                class="form-control @if (old('_modal') === 'edit') @error('title') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'edit')
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-category">Category (tag)</label>
                            <input type="text" id="edit-category" name="category" value="{{ old('_modal') === 'edit' ? old('category') : '' }}"
                                class="form-control @if (old('_modal') === 'edit') @error('category') is-invalid @enderror @endif" placeholder="e.g. Original Research">
                            @if (old('_modal') === 'edit')
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-short">Short Description</label>
                            <textarea id="edit-short" name="short_description" rows="3"
                                class="form-control @if (old('_modal') === 'edit') @error('short_description') is-invalid @enderror @endif">{{ old('_modal') === 'edit' ? old('short_description') : '' }}</textarea>
                            @if (old('_modal') === 'edit')
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-cover">Replace Cover Image</label>
                            <input type="file" id="edit-cover" name="cover_file"
                                class="form-control @if (old('_modal') === 'edit') @error('cover_file') is-invalid @enderror @endif" accept="image/*">
                            @if (old('_modal') === 'edit')
                                @error('cover_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="is_featured" value="0">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="edit-featured" name="is_featured">
                                    <label class="form-check-label" for="edit-featured">Featured on Home</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="hidden" name="is_published" value="0">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="edit-published" name="is_published">
                                    <label class="form-check-label" for="edit-published">Published</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label" for="edit-published-at">Published At</label>
                            <input type="datetime-local" id="edit-published-at" name="published_at" value="{{ old('_modal') === 'edit' ? old('published_at') : '' }}"
                                class="form-control @if (old('_modal') === 'edit') @error('published_at') is-invalid @enderror @endif">
                            @if (old('_modal') === 'edit')
                                @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: @json(session('success')),
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: @json(session('error')),
                        timer: 2500,
                        showConfirmButton: false
                    });
                @endif

                // DataTables
                if (window.jQuery && $.fn.DataTable) {
                    $('#default_datatable').DataTable({
                        pageLength: 10,
                        order: [],
                    });
                }

                // Edit modal fill
                var editModal = document.getElementById('editJournalModal');
                if (editModal) {
                    editModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget;
                        if (!button) return;

                        var id = button.getAttribute('data-id');
                        var title = button.getAttribute('data-title') || '';
                        var category = button.getAttribute('data-category') || '';
                        var shortDescription = button.getAttribute('data-short-description') || '';
                        var isFeatured = button.getAttribute('data-is-featured') === '1';
                        var isPublished = button.getAttribute('data-is-published') === '1';
                        var publishedAt = button.getAttribute('data-published-at') || '';
                        var coverUrl = button.getAttribute('data-cover-url') || '';

                        var form = document.getElementById('editJournalForm');
                        form.action = @json(route('admin.ejournal.journals.update', ':id')).replace(':id', id);

                        document.getElementById('edit-title').value = title;
                        document.getElementById('edit-category').value = category;
                        document.getElementById('edit-short').value = shortDescription;
                        document.getElementById('edit-featured').checked = isFeatured;
                        document.getElementById('edit-published').checked = isPublished;
                        document.getElementById('edit-published-at').value = publishedAt;
                        document.getElementById('edit-cover-preview').src = coverUrl;
                    });
                }

                // Auto open modal on validation error
                @if ($errors->any() && old('_modal') === 'add')
                    var addModal = new bootstrap.Modal(document.getElementById('addJournalModal'));
                    addModal.show();
                @endif
            });
        })();
    </script>
@endsection
