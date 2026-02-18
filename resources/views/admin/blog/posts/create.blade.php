@extends('admin.partials.Layouts.master')

@section('title', 'Add Blog Post | Admin')
@section('title-sub', 'Content')
@section('pagetitle', 'Add Blog Post')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                @include('admin.blog.posts._form')

                <div class="d-flex align-items-center justify-content-end mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
