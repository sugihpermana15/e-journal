@extends('admin.partials.Layouts.master')

@section('title', 'Edit Scientific News Category | Admin')
@section('title-sub', 'Content')
@section('pagetitle', 'Edit Scientific News Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.blog.categories.update', $category) }}">
                @csrf
                @method('PUT')

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                @include('admin.blog.categories._form', ['category' => $category])
            </form>
        </div>
    </div>
@endsection
