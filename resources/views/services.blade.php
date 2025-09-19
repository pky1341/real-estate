@extends('layouts.app')

@section('title', 'Services - Property Real Estate')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ asset('images/hero_bg_1.jpg') }}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Services</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature mb-4">
                    <span class="flaticon-house mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Residential Sales</h3>
                    <p class="text-black-50">Expert guidance in buying and selling luxury homes, condos, and townhouses with comprehensive market analysis and negotiation support.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature mb-4">
                    <span class="flaticon-house-2 mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Investment Consulting</h3>
                    <p class="text-black-50">Strategic investment advice for building profitable real estate portfolios with risk assessment and ROI projections.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature mb-4">
                    <span class="flaticon-building mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Commercial Real Estate</h3>
                    <p class="text-black-50">Specialized services for office buildings, retail spaces, and industrial properties including leasing and acquisition.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="box-feature mb-4">
                    <span class="flaticon-house-3 mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Property Management</h3>
                    <p class="text-black-50">Full-service property management including tenant screening, maintenance coordination, and financial reporting.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>

            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature mb-4">
                    <span class="flaticon-house-4 mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Market Analysis</h3>
                    <p class="text-black-50">Comprehensive market research and property valuations using advanced analytics to determine optimal pricing strategies.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature mb-4">
                    <span class="flaticon-building mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Relocation Services</h3>
                    <p class="text-black-50">Complete relocation assistance including area orientation, school information, and community resources for seamless transitions.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature mb-4">
                    <span class="flaticon-house mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">Luxury Properties</h3>
                    <p class="text-black-50">Exclusive access to high-end properties and luxury estates with personalized service for discerning clients.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="box-feature mb-4">
                    <span class="flaticon-house-1 mb-4 d-block"></span>
                    <h3 class="text-black mb-3 font-weight-bold">First-Time Buyers</h3>
                    <p class="text-black-50">Specialized guidance for first-time homebuyers including financing options, inspection services, and closing support.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-testimonials">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">Customer Says</h2>
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
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">James Smith</h3>
                        <blockquote>
                            <p>&ldquo;DooparSpace helped us find the perfect family home in our dream neighborhood. Their market knowledge and negotiation skills saved us thousands while ensuring we got exactly what we wanted.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">Homeowner</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_2-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Mike Houston</h3>
                        <blockquote>
                            <p>&ldquo;Outstanding investment consulting services. The team identified high-growth properties that have already appreciated 15% in just one year. Their market analysis is spot-on.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">Real Estate Investor</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_3-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Cameron Webster</h3>
                        <blockquote>
                            <p>&ldquo;Professional service from start to finish. They handled our commercial property acquisition seamlessly, managing all legal aspects and negotiations. Highly recommend for business owners.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">Business Owner</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{ asset('images/person_4-min.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Dave Smith</h3>
                        <blockquote>
                            <p>&ldquo;As first-time buyers, we were nervous about the process. DooparSpace guided us through every step, explained everything clearly, and helped us secure our dream home within budget.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">First-time Buyer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection