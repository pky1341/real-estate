@extends('layouts.app')

@section('title', 'About - Property Real Estate')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ asset('images/hero_bg_3.jpg') }}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">About</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row text-left mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4">About Us</h2>
            </div>
            <div class="col-lg-6">
                <p class="text-black-50">DooparSpace is a premier real estate company dedicated to connecting clients with their perfect properties. With over a decade of experience in the market, we specialize in luxury residential and commercial real estate across prime locations.</p>
                <p class="text-black-50">Our team of certified property consultants brings deep market knowledge and personalized service to every transaction. We understand that buying or selling property is one of life's most significant decisions, which is why we're committed to making the process seamless and rewarding.</p>
                <p class="text-black-50">From first-time homebuyers to seasoned investors, we provide comprehensive real estate solutions including property management, market analysis, and investment consulting to help our clients achieve their real estate goals.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-black-50">We pride ourselves on maintaining the highest standards of professionalism and integrity in all our dealings. Our extensive portfolio includes luxury homes, investment properties, commercial spaces, and exclusive developments in the most sought-after neighborhoods.</p>
                <p class="text-black-50">At DooparSpace, we leverage cutting-edge technology and market insights to provide our clients with accurate valuations, comprehensive property reports, and strategic investment advice that maximizes returns and minimizes risks.</p>
            </div>
        </div>
    </div>
</div>

<div class="section pt-0">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                <div class="img-about dots">
                    <img src="{{ asset('images/hero_bg_3.jpg') }}" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-home2"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Premium Properties</h3>
                        <p class="text-black-50">Curated selection of luxury homes and investment properties in prime locations with verified documentation.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-person"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Expert Consultants</h3>
                        <p class="text-black-50">Certified real estate professionals with deep market knowledge and proven track records.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-security"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Secure Transactions</h3>
                        <p class="text-black-50">Transparent processes with legal compliance and comprehensive property verification.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section pt-0">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="img-about dots">
                    <img src="{{ asset('images/hero_bg_2.jpg') }}" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-home2"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Market Analysis</h3>
                        <p class="text-black-50">Comprehensive market research and property valuations using advanced analytics and local expertise.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-person"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Personalized Service</h3>
                        <p class="text-black-50">Tailored real estate solutions that match your lifestyle, budget, and investment objectives.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-security"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Legal Compliance</h3>
                        <p class="text-black-50">Full legal support and documentation review to ensure smooth and compliant transactions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4 mt-lg-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('images/img_3.jpg') }}" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('images/img_2.jpg') }}" alt="Image" class="img-fluid" />
            </div>
        </div>
        <div class="row section-counter mt-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">2917</span></span>
                    <span class="caption text-black-50"># of Buy Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">3918</span></span>
                    <span class="caption text-black-50"># of Sell Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">38928</span></span>
                    <span class="caption text-black-50"># of All Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">1291</span></span>
                    <span class="caption text-black-50"># of Agents</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-testimonials bg-light">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">The Team</h2>
            </div>
            <div class="col-md-6 text-md-end">
                <div id="testimonial-nav">
                    <span class="prev" data-controls="prev">Prev</span>
                    <span class="next" data-controls="next">Next</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
            <div class="testimonial-slider">
                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_1-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <h3 class="h5 text-primary">James Smith</h3>
                        <p class="text-black-50">Senior Property Consultant</p>
                        <p>With over 15 years in luxury real estate, James specializes in high-end residential properties and commercial investments. His expertise in market analysis and negotiation has helped clients secure premium properties worth over $500M.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_2-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <h3 class="h5 text-primary">Carol Houston</h3>
                        <p class="text-black-50">Investment Specialist</p>
                        <p>Carol brings 12 years of experience in real estate investment and portfolio management. She helps clients build wealth through strategic property acquisitions and has a proven track record in identifying high-growth markets.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_3-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <h3 class="h5 text-primary">Synthia Cameron</h3>
                        <p class="text-black-50">Commercial Real Estate Director</p>
                        <p>Synthia leads our commercial division with expertise in office buildings, retail spaces, and industrial properties. Her strategic approach to commercial real estate has facilitated major corporate relocations and expansions.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_4-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <h3 class="h5 text-primary">Davin Smith</h3>
                        <p class="text-black-50">Property Management Director</p>
                        <p>Davin oversees our property management services, ensuring maximum returns for property owners. His comprehensive approach to maintenance, tenant relations, and market positioning has consistently delivered above-market performance.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection