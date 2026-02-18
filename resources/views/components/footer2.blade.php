<!--Newsletter Two Start-->
<section class="newsletter-two">
    <div class="newsletter-two__big-text">NEWSLETTER</div>
    <div class="container">
        <div class="newsletter-two__inner">
            <div class="newsletter-two__left">
                <div class="newsletter-two__title-box">
                    <h2 class="newsletter-two__title">Subscribe <span>Newsletter</span></h2>
                    <p class="newsletter-two__text">By Subscribing you agree to the <a href="{{ route('about') }}">Terms
                            of use</a> & <a href="{{ route('about') }}">Privacy Policy</a></p>
                </div>
            </div>
            <div class="newsletter-two__form-box">
                <form class="newsletter-two__form">
                    <div class="newsletter-two__input">
                        <input type="email" placeholder="Email Address">
                    </div>
                    <button type="submit" class="newsletter-two__btn">
                        Subscribe Now <span class="icon-send"></span></button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Newsletter Two End-->


<!--Site Footer Two Start-->
<footer class="site-footer-two">
    <div class="container">
        <div class="site-footer-two__inner">
            <div class="site-footer-two__top">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="site-footer-two__top-left">
                            <div class="site-footer-two__logo-box">
                                <div class="site-footer-two__logo">
                                    <a href="{{ route('index') }}"><img
                                            src="{{ asset('assets/images/resources/logoMed.png') }}" alt="" style="width: 100%; max-width: 172px; height: auto; object-fit: contain; display: block;"></a>
                                </div>
                                <p class="site-footer-two__text-1">Med Open Press supports clinicians,
                                    researchers, and educators with rigorous peer review and ethical publishing <br>
                                    services—helping medical research reach the audiences who need it.</p>
                            </div>
                            <div class="site-footer-two__social-box">
                                <h4 class="site-footer-two__social-title">Follow Us</h4>
                                <div class="site-footer-two__social">
                                    <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                    <a href="#"><span class="icon-pinterest"></span></a>
                                    <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </div>
                            </div>
                            <p class="site-footer-two__copyright-text">Copyright © {{ date('Y') }} by Med Open Press.
                                All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="site-footer-two__top-right">
                            <div class="site-footer-two__widget-box">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                        <div class="footer-widget-two__quick-links">
                                            <h4 class="footer-widget-two__title">Quick Links</h4>
                                            <ul class="footer-widget-two__quick-links-list list-unstyled">
                                                <li><a href="{{ route('index') }}"> <span class="icon-next"></span>
                                                        Home</a>
                                                </li>
                                                <li><a href="{{ route('about') }}"> <span class="icon-next"></span> About
                                                        Us</a></li>
                                                <li><a href="{{ route('contact') }}"> <span class="icon-next"></span>
                                                        Contact</a></li>
                                                <li><a href="{{ route('faq') }}"> <span class="icon-next"></span> FAQs
                                                        Page</a>
                                                </li>
                                                <li><a href="{{ route('blog-list') }}"> <span class="icon-next"></span>
                                                        Our Blogs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                        <div class="footer-widget-two__services-links">
                                            <h4 class="footer-widget-two__title">Our Services</h4>
                                            <ul class="footer-widget-two__quick-links-list list-unstyled">
                                            <li><a href="{{ route('services') }}"> <span class="icon-next"></span>
                                                Scientific Journal Publication</a></li>
                                            <li><a href="{{ route('services') }}"> <span class="icon-next"></span>
                                                Book Publishing</a></li>
                                            <li><a href="{{ route('services') }}"> <span class="icon-next"></span>
                                                Peer Review & Editorial Support</a></li>
                                            <li><a href="{{ route('services') }}"> <span class="icon-next"></span>
                                                Open Access & Compliance</a></li>
                                            <li><a href="{{ route('services') }}"> <span class="icon-next"></span>
                                                Distribution & Licensing</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer-two__bottom">
        <div class="container">
            <ul class="list-unstyled site-footer-two__contact-info">
                <li>
                    <div class="site-footer__contact-info-icon">
                        <span class="icon-envelope"></span>
                    </div>
                    <div class="site-footer__contact-info-content">
                        <p>Email Address:</p>
                        <h5><a href="mailto:medopenpress@outlook.com">medopenpress@outlook.com</a></h5>
                    </div>
                </li>
                <li>
                    <div class="site-footer__contact-info-icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <div class="site-footer__contact-info-content">
                        <p>Phone Number:</p>
                        <h5><a href="tel:+628971399093">+62 897 1399 093</a></h5>
                    </div>
                </li>
                <li>
                    <div class="site-footer__contact-info-icon">
                        <span class="icon-pin"></span>
                    </div>
                    <div class="site-footer__contact-info-content">
                        <p>Address:</p>
                        <h5>Jakarta, Indonesia</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!--Site Footer Two End-->
</div><!-- /.page-wrapper -->
