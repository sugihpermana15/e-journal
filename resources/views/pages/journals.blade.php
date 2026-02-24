@extends('layouts.breadcrumbs')
@section('title', 'Journals || Med Open Press')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/about.css') }}?v={{ filemtime(public_path('assets/css/module-css/about.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/project.css') }}" />
@endpush

@php
    $bodyClass = 'custom-cursor';
    $title = 'Journals';
    $subtitle = 'Journals';
@endphp

@section('content')
    <section class="about-two about-page">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">Journals</span>
                </div>
                <h2 class="section-title__title title-animation">Browse Our <span>Journals</span></h2>
            </div>

            <p class="about-two__text text-center">
                Med Open Press is devoted to advancing medical science through high-caliber books and rigorously
                peer-reviewed journals. We serve clinicians, researchers, and educators with publications that meet
                the highest standards of scientific validity and relevance.
            </p>

            <div class="about-two__points-and-mission-box">
                <ul class="about-two__points list-unstyled">
                    <li>
                        <div class="icon"><span class="icon-check"></span></div>
                        <p>Excellence in publishing</p>
                    </li>
                    <li>
                        <div class="icon"><span class="icon-check"></span></div>
                        <p>Global accessibility</p>
                    </li>
                    <li>
                        <div class="icon"><span class="icon-check"></span></div>
                        <p>Innovation & collaboration</p>
                    </li>
                    <li>
                        <div class="icon"><span class="icon-check"></span></div>
                        <p>Ethics, transparency, integrity</p>
                    </li>
                </ul>
            </div>

            @if(isset($journals) && $journals->count())
                <div class="section-title text-center sec-title-animation animation-style1 mt-5">
                    <h2 class="section-title__title title-animation">Latest <span>Journals</span></h2>
                </div>

                <div class="row filter-layout">
                    @foreach($journals as $journal)
                        @php
                            $coverUrl = $journal->cover_path
                                ? asset('storage/' . ltrim($journal->cover_path, '/'))
                                : asset('assets/images/project/project-1-1.jpg');
                            $tagText = $journal->category ?: 'Journal';
                            $dateText = $journal->published_at?->format('M d')
                                ?? $journal->created_at?->format('M d')
                                ?? '';
                        @endphp
                        <div class="col-xl-4 col-lg-4 col-md-6 filter-item mb-4">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ $coverUrl }}" alt="">
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">{{ $tagText }}<span class="icon-right-arrow"></span>{{ $dateText }}</p>
                                    <h3 class="project-one__title">{{ $journal->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
