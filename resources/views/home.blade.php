@extends('layouts.app')

@section('title', 'Home - DooparSpace Premium Real Estate')

@section('content')
<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('{{ asset('images/hero_bg_3.jpg') }}')"></div>
        <div class="img overlay" style="background-image: url('{{ asset('images/hero_bg_2.jpg') }}')"></div>
        <div class="img overlay" style="background-image: url('{{ asset('images/hero_bg_1.jpg') }}')"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
                <h1 class="heading" data-aos="fade-up">Easiest way to find your dream home</h1>
                <form action="{{ route('properties') }}" method="GET" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                    <input type="text" name="search" class="form-control px-4" placeholder="Search by city, address, or property name..." value="{{ old('search', request('search')) }}" />
                    <button type="submit" class="btn btn-primary">Search Properties</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">Popular Properties</h2>
            </div>
            <div class="col-lg-6 text-lg-end">
                <p><a href="{{ route('properties') }}" class="btn btn-primary text-white py-3 px-4">View all properties</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="property-slider-wrap">
                    <div class="property-slider">
                        @forelse($featuredProperties as $property)
                        <div class="property-item">
                            <div class="img">
                                <img src="{{ $property->first_image }}" alt="{{ $property->title }}" />
                                @if($property->featured)
                                    <div class="badge bg-warning">Featured</div>
                                @endif
                            </div>
                            <div class="property-content">
                                <div class="price">{{ $property->formatted_price }}</div>
                                <h5>{{ $property->title }}</h5>
                                <div class="location">
                                    <i class="icon-location"></i>
                                    {{ $property->city ?? 'City' }}, {{ $property->state ?? 'State' }}
                                </div>
                                <div class="specs">
                                    <span>
                                        <i class="icon-bed"></i>
                                        {{ $property->cabins ?? 0 }} cabins
                                    </span>
                                    <span>
                                        <i class="icon-bath"></i>
                                        {{ $property->bathrooms ?? 0 }} baths
                                    </span>
                                    <span>
                                        <i class="icon-home"></i>
                                        {{ $property->area }} sq ft
                                    </span>
                                </div>
                                <div class="property-actions">
                                    <button type="button" class="btn-inquire" onclick="openInquiryModal({{ $property->id }}, '{{ addslashes($property->title) }}')">Inquire Now</button>
                                    <a href="{{ route('property.show', $property->id) }}" class="btn-details">View Details</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="property-item">
                            <div class="property-content text-center d-flex flex-column justify-content-center">
                                <p class="mb-3">No featured properties available at the moment.</p>
                                <a href="{{ route('properties') }}" class="btn-inquire">View All Properties</a>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                        <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                        <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="features-1">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature">
                    <span class="flaticon-house"></span>
                    <h3 class="mb-3">Our Properties</h3>
                    <p>Discover premium residential and commercial properties in prime locations with comprehensive market analysis.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature">
                    <span class="flaticon-building"></span>
                    <h3 class="mb-3">Property for Sale</h3>
                    <p>Explore our curated selection of properties for sale, from luxury homes to investment opportunities.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature">
                    <span class="flaticon-house-3"></span>
                    <h3 class="mb-3">Property Management</h3>
                    <p>Professional property management services to maximize your investment returns and maintain property value.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="box-feature">
                    <span class="flaticon-house-1"></span>
                    <h3 class="mb-3">Premium Listings</h3>
                    <p>Discover exclusive properties in prime locations with comprehensive market analysis and pricing.</p>
                    <p><a href="#" class="learn-more">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            <p>&ldquo;DooparSpace made finding our dream home effortless. Their professional team guided us through every step, and we couldn't be happier with our new property.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">Property Owner</p>
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
                            <p>&ldquo;Exceptional service and market knowledge. The team at DooparSpace helped us secure an excellent investment property with great potential returns.&rdquo;</p>
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
                            <p>&ldquo;Professional, reliable, and results-driven. DooparSpace exceeded our expectations in both buying and selling properties. Highly recommended!&rdquo;</p>
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
                            <p>&ldquo;The market insights and personalized approach from DooparSpace helped us make informed decisions. Their expertise is truly valuable.&rdquo;</p>
                        </blockquote>
                        <p class="text-black-50">First-time Buyer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-4 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-5">
                <h2 class="font-weight-bold heading text-primary mb-4">Let's find the perfect property for you</h2>
                <p class="text-black-50">Our experienced team provides personalized service to help you find the ideal property that matches your lifestyle and investment goals.</p>
            </div>
        </div>
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
                        <h3 class="heading">2M Properties</h3>
                        <p class="text-black-50">Access to millions of verified properties across prime locations with detailed market insights.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-person"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Expert Consultants</h3>
                        <p class="text-black-50">Work with certified property consultants who understand local markets and investment trends.</p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-security"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Verified Listings</h3>
                        <p class="text-black-50">All properties are thoroughly verified with legal documentation and transparent pricing.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section-counter mt-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">3298</span></span>
                    <span class="caption text-black-50"># of Buy Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">2181</span></span>
                    <span class="caption text-black-50"># of Sell Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">9316</span></span>
                    <span class="caption text-black-50"># of All Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">7191</span></span>
                    <span class="caption text-black-50"># of Professionals</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
            <h2 class="mb-4">Join Our Professional Real Estate Network</h2>
            <p><a href="#" class="btn btn-primary text-white py-3 px-4">Become a Partner</a></p>
        </div>
    </div>
</div>

<div class="section section-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6 mb-5">
                <h2 class="font-weight-bold heading text-primary mb-4">Our Team</h2>
                <p class="text-black-50">Meet our dedicated team of property professionals who bring years of experience and market expertise to help you achieve your real estate goals.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{ asset('images/person_1-min.jpg') }}" alt="Image" class="img-fluid" />
                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">James Doe</a></h2>
                        <span class="meta d-block mb-3">Property Consultant</span>
                        <p>With over 10 years of experience in real estate, James specializes in luxury residential properties and investment opportunities in prime locations.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{ asset('images/person_2-min.jpg') }}" alt="Image" class="img-fluid" />
                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">Jean Smith</a></h2>
                        <span class="meta d-block mb-3">Senior Property Advisor</span>
                        <p>Jean brings expertise in commercial real estate and development projects, helping clients navigate complex property transactions with confidence.</p>
                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{ asset('images/person_3-min.jpg') }}" alt="Image" class="img-fluid" />
                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">Alicia Huston</a></h2>
                        <span class="meta d-block mb-3">Investment Specialist</span>
                        <p>Alicia focuses on investment properties and portfolio management, providing strategic guidance for building wealth through real estate.</p>
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
<!-- Global Inquiry Modal -->
<div class="modal fade" id="globalInquiryModal" tabindex="-1" aria-labelledby="globalInquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="globalInquiryModalLabel">Inquire About Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <input type="hidden" name="property_id" id="modalPropertyId">
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="modalName" class="form-label">Your Name *</label>
                        <input type="text" name="name" id="modalName" class="form-control" required minlength="2" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="modalEmail" class="form-label">Your Email *</label>
                        <input type="email" name="email" id="modalEmail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalPhone" class="form-label">Your Phone *</label>
                        <input type="tel" name="phone" id="modalPhone" class="form-control" required minlength="10" maxlength="20">
                    </div>
                    <div class="mb-3">
                        <label for="modalMessage" class="form-label">Your Message *</label>
                        <textarea name="message" id="modalMessage" class="form-control" rows="4" required minlength="10" maxlength="1000">I am interested in this property. Please contact me with more details.</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Inquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openInquiryModal(propertyId, propertyTitle) {
    document.getElementById('modalPropertyId').value = propertyId;
    document.getElementById('globalInquiryModalLabel').textContent = 'Inquire About: ' + propertyTitle;
    new bootstrap.Modal(document.getElementById('globalInquiryModal')).show();
}

@if(session('success') || session('error'))
document.addEventListener('DOMContentLoaded', function() {
    // Show the last opened modal or default modal
    var modal = document.getElementById('globalInquiryModal');
    new bootstrap.Modal(modal).show();
});
@endif
</script>

@endsection