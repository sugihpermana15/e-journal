@extends('layouts.breadcrumbs')
@section('title', 'Distribution & Licensing')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Distribution & Licensing';
    $subtitle = 'Publishing Services';
@endphp
@section('content')
    <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">Expand reach responsibly with distribution pathways and clear licensing</h3>
                            <p class="services-details__text-1">Med Open Press supports dissemination planning for published content—helping align outputs, reuse statements, and licensing pathways with the intended channels. We focus on clarity and consistency so readers and partners understand what can be shared and how to attribute correctly.</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Service Highlights</h3>
                            <p class="services-details__text-2">Distribution works best when files, metadata, and rights statements are consistent. We help ensure publication outputs are ready for sharing across platforms and partners.</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Channel planning (digital/print)</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Consistent licensing and reuse statements</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Partner-ready publication packaging</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Metadata completeness checks</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Attribution and citation consistency</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Support for responsible sharing policies</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-share"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Distribution Planning</h3>
                                            <p class="services-details__services-text">Align formats and metadata to<br> platform needs and partner expectations<br> for broader dissemination.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-completed-task"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Licensing Clarity</h3>
                                            <p class="services-details__services-text">Support clear reuse and attribution<br> statements so content can be shared<br> responsibly.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">Distribution Workflow Summary</h3>
                            <p class="services-details__text-3">We start by understanding where content will be distributed, then align formats, metadata, and rights statements to those channels. This reduces friction during partner onboarding and improves discoverability.</p>
                            <div class="services-details__img-box-2">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ asset('assets/images/services/services-details-img-box-img-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ asset('assets/images/services/services-details-img-box-img-2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-4">Why Choose Med Open Press?</h3>
                            <p class="services-details__text-4">We help make distribution practical—by ensuring outputs are consistent and rights are clear.</p>
                            <p class="services-details__text-5">This supports better dissemination across platforms while protecting authors and maintaining attribution integrity.</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Clear reuse and attribution language</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Consistent metadata for discoverability</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Partner-ready file packaging</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Responsible dissemination support</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__points-img">
                                            <img src="{{ asset('assets/images/services/services-details-points-img.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="services-details__text-6">If you have specific partner requirements, we can review output specs and help align metadata fields and licensing statements accordingly.</p>
                            <h3 class="services-details__title-5">Formats, Metadata, and Reuse</h3>
                            <p class="services-details__text-7">We help ensure final files and metadata are consistent and include clear reuse information. This supports better distribution experiences and reduces confusion for readers and downstream platforms.</p>
                            <div class="services-details__bottom-img">
                                <img src="{{ asset('assets/images/services/services-details-bottom-img.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="services-details__right">
                            <div class="services-details__service-list-box">
                                <h3 class="services-details__service-list-title">More Services</h3>
                                <ul class="services-details__service-list list-unstyled">
                                    <li>
                                        <a href="{{ route('book-publishing') }}"><span class="icon-diagonal-arrow"></span>Book Publishing</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('journal-publication') }}"><span class="icon-diagonal-arrow"></span>Scientific Journal Publication</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ipr-management') }}"><span class="icon-diagonal-arrow"></span>IPR Management</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('custom-publishing') }}"><span class="icon-diagonal-arrow"></span>Custom Publishing Solutions</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('distribution-licensing') }}"><span class="icon-diagonal-arrow"></span>Distribution &amp; Licensing</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">Need help planning distribution?</h3>
                                <div class="project-details__get-touch-btn-box">
                                    <a href="https://wa.me/628971399093" class="thm-btn">Contact Us<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                                <div class="project-details__call-box">
                                    <div class="project-details__call-icon">
                                        <span class="icon-support"></span>
                                    </div>
                                    <div class="project-details__call-content">
                                        <p>Call us for publishing support</p>
                                        <a href="tel:+628971399093">+62 897 1399 093</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Details End-->

        <!--Faq One Start -->
        <section class="faq-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="faq-one__left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape-box">
                                        <div class="section-title__tagline-shape"></div>
                                        <div class="section-title__tagline-shape-2"></div>
                                    </div>
                                    <span class="section-title__tagline">FAQs</span>
                                </div>
                                <h2 class="section-title__title title-animation">Your Questions Answered <br>
                                    <span>Distribution &amp; Licensing FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Answers about formats, metadata, and responsible reuse.</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Make outputs partner-ready</p></div>
                                </li>
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Clarify reuse and attribution</p></div>
                                </li>
                            </ul>
                            <div class="faq-one__contact-box">
                                <div class="faq-one__contact-img">
                                    <img src="{{ asset('assets/images/resources/faq-one-contact-img.png') }}" alt="">
                                </div>
                                <div class="faq-one__contact-big-text">Get In Touch</div>
                                <h3 class="faq-one__contact-title">If you have any other <br> questions, please contact
                                    <br> our editorial office</h3>
                                <div class="faq-one__btn-box">
                                    <a href="https://wa.me/628971399093" class="thm-btn">Contact Us<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What channels can content be distributed through?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Distribution depends on your goals—digital platforms, institutional repositories, print runs, and partner channels. We help align outputs and licensing to the intended path.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Why does metadata matter for dissemination?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Good metadata helps readers find, cite, and correctly attribute work. Consistency across author names, references, and identifiers improves discoverability across systems.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How do licensing statements affect reuse?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Licensing statements clarify what others can do with the content and how to attribute it. Clear statements reduce misuse and support responsible sharing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can you align outputs to partner requirements?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes. If a partner or platform has specific format or metadata requirements, we can review and align the packaging and statements to match those expectations where applicable.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq One End -->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
