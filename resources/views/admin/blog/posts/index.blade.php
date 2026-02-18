@extends('admin.partials.Layouts.master')

@section('title', 'Blog Posts | Admin')
@section('title-sub', 'Content')
@section('pagetitle', 'Blog Posts')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Blog Posts</h5>
                        <div class="text-muted small">Posts will appear on public Blog when <strong>Published</strong>.</div>
                    </div>
                    <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-success btn-sm">Add Post</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table id="default_datatable" class="table table-striped table-bordered align-middle mb-0 w-100">
                        <thead>
                        <tr>
                            <th style="width: 80px">Hero</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th style="width: 110px">Published</th>
                            <th style="width: 160px">Published At</th>
                            <th style="width: 140px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            @php
                                $heroUrl = $post->hero_image_path
                                    ? asset('storage/' . ltrim($post->hero_image_path, '/'))
                                    : asset('assets/images/blog/blog-list-1-1.jpg');
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ $heroUrl }}" alt="" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $post->title }}</div>
                                    <div class="text-muted small">{{ $post->slug }}</div>
                                </td>
                                <td>{{ $post->blogCategory?->name ?? ($post->category ?? '-') }}</td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>{{ $post->published_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
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
                    order: [[4, 'desc']],
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
        });
    </script>
@endsection
