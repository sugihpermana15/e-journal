@extends('admin.partials.Layouts.master')

@section('title', 'Add Blog Category | Admin')
@section('title-sub', 'Content')
@section('pagetitle', 'Add Blog Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.blog.categories.store') }}">
                @csrf
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

                @include('admin.blog.categories._form')
            </form>
        </div>
    </div>
@endsection
