@extends('admin.partials.Layouts.master')

@section('title', 'Services | Admin')
@section('title-sub', 'E-Journal')
@section('pagetitle', 'Services')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title mb-0">Services (CRUD)</h5>
                <div class="text-muted small">These items power the public <code>/services</code> and <code>/services/{slug}</code> pages.</div>
            </div>
            <a href="{{ route('admin.ejournal.services.create') }}" class="btn btn-primary btn-sm">Add Service</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm align-middle">
                    <thead>
                        <tr>
                            <th style="width:80px;">Order</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th style="width:110px;">Active</th>
                            <th style="width:220px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $s)
                            <tr>
                                <td>{{ $s->sort_order }}</td>
                                <td class="fw-semibold">{{ $s->title }}</td>
                                <td><code>{{ $s->slug }}</code></td>
                                <td>
                                    @if($s->is_active)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.ejournal.services.edit', $s) }}">Edit</a>
                                    <a class="btn btn-outline-secondary btn-sm" target="_blank" href="{{ route('services-detail', ['slug' => $s->slug]) }}">Preview</a>
                                    <form class="d-inline" method="POST" action="{{ route('admin.ejournal.services.destroy', $s) }}" onsubmit="return confirm('Delete this service?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">No services yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
