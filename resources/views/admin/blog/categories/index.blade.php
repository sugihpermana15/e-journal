@extends('admin.partials.Layouts.master')

@section('title', 'Scientific News Categories | Admin')
@section('title-sub', 'Content')
@section('pagetitle', 'Scientific News Categories')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Scientific News Categories</h5>
                        <div class="text-muted small">Used as master categories for Scientific News posts.</div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        Add Category
                    </button>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table id="default_datatable" class="table table-striped table-bordered align-middle mb-0 w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 220px">Slug</th>
                            <th style="width: 120px">Active</th>
                            <th style="width: 140px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal-{{ $category->id }}"
                                        >
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('admin.blog.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category? Posts will be set to no category.')">
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

    @foreach($categories as $category)
        <div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.blog.categories.update', $category) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="_modal" value="edit_category">
                        <input type="hidden" name="_category_id" value="{{ $category->id }}">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">Edit Scientific News Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_name_{{ $category->id }}">Name</label>
                                        <input
                                            id="edit_name_{{ $category->id }}"
                                            name="name"
                                            type="text"
                                            value="{{ old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id ? old('name') : $category->name }}"
                                            class="form-control @error('name') {{ old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id ? 'is-invalid' : '' }} @enderror"
                                            placeholder="e.g. Cardiology"
                                            required
                                        >
                                        @if (old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id)
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="edit_slug_{{ $category->id }}">Slug (optional)</label>
                                        <input
                                            id="edit_slug_{{ $category->id }}"
                                            name="slug"
                                            type="text"
                                            value="{{ old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id ? old('slug') : $category->slug }}"
                                            class="form-control @error('slug') {{ old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id ? 'is-invalid' : '' }} @enderror"
                                            placeholder="leave blank to keep or auto-generate"
                                        >
                                        @if (old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id)
                                            @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="form-check">
                                        <input
                                            id="edit_is_active_{{ $category->id }}"
                                            name="is_active"
                                            type="checkbox"
                                            value="1"
                                            class="form-check-input"
                                            {{ (
                                                old('_modal') === 'edit_category' && (string) old('_category_id') === (string) $category->id
                                                    ? old('is_active', (int) $category->is_active)
                                                    : (int) $category->is_active
                                            ) ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="edit_is_active_{{ $category->id }}">Active</label>
                                    </div>
                                </div>
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
    @endforeach

    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.blog.categories.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_category">

                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add Scientific News Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="modal_name">Name</label>
                                    <input
                                        id="modal_name"
                                        name="name"
                                        type="text"
                                        value="{{ old('_modal') === 'add_category' ? old('name') : '' }}"
                                        class="form-control @error('name') {{ old('_modal') === 'add_category' ? 'is-invalid' : '' }} @enderror"
                                        placeholder="e.g. Cardiology"
                                        required
                                    >
                                    @if (old('_modal') === 'add_category')
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="modal_slug">Slug (optional)</label>
                                    <input
                                        id="modal_slug"
                                        name="slug"
                                        type="text"
                                        value="{{ old('_modal') === 'add_category' ? old('slug') : '' }}"
                                        class="form-control @error('slug') {{ old('_modal') === 'add_category' ? 'is-invalid' : '' }} @enderror"
                                        placeholder="leave blank to auto-generate"
                                    >
                                    @if (old('_modal') === 'add_category')
                                        @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>

                                <div class="form-check">
                                    <input
                                        id="modal_is_active"
                                        name="is_active"
                                        type="checkbox"
                                        value="1"
                                        class="form-check-input"
                                        {{ (old('_modal') === 'add_category' ? old('is_active', 1) : 1) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="modal_is_active">Active</label>
                                </div>
                            </div>
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
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.jQuery && jQuery.fn.dataTable) {
                const $table = jQuery('#default_datatable');

                if (jQuery.fn.dataTable.isDataTable($table)) {
                    $table.DataTable().destroy();
                }

                $table.DataTable({
                    pageLength: 10,
                    lengthMenu: [10, 25, 50, 100],
                    order: [[0, 'asc']],
                    autoWidth: false,
                    pagingType: 'simple_numbers',
                    language: {
                        search: 'Search:',
                        searchPlaceholder: 'Type to filter...',
                        paginate: {
                            previous: '<i class="ri-arrow-left-s-line"></i>',
                            next: '<i class="ri-arrow-right-s-line"></i>'
                        }
                    },
                    dom:
                        "<'row align-items-center'<'col-sm-12 col-md-6 mb-3'l><'col-sm-12 col-md-6 mb-3'f>>" +
                        "<'table-responsive'tr>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    initComplete: function () {
                        jQuery('.dataTables_length select').addClass('form-select form-select-sm');
                        jQuery('.dataTables_filter input').addClass('form-control form-control-sm');
                        jQuery('.dataTables_filter label').addClass('d-flex align-items-center gap-2 justify-content-md-end');
                    }
                });
            }

            @if (old('_modal') === 'add_category' && $errors->any())
                const addModalEl = document.getElementById('addCategoryModal');
                if (addModalEl && window.bootstrap?.Modal) {
                    new bootstrap.Modal(addModalEl).show();
                }
            @endif

            const oldModal = @json(old('_modal'));
            const oldCategoryId = @json(old('_category_id'));
            if (oldModal === 'edit_category' && oldCategoryId && window.bootstrap?.Modal) {
                const editModalEl = document.getElementById(`editCategoryModal-${oldCategoryId}`);
                if (editModalEl) {
                    new bootstrap.Modal(editModalEl).show();
                }
            }

            const openEditCategoryId = @json(session('open_edit_category_id'));
            if (openEditCategoryId && window.bootstrap?.Modal) {
                const editModalEl = document.getElementById(`editCategoryModal-${openEditCategoryId}`);
                if (editModalEl) {
                    new bootstrap.Modal(editModalEl).show();
                }
            }
        });
    </script>
@endsection
