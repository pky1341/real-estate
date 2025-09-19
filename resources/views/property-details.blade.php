@extends('layouts.app')

@section('title', $property->title . ' - DooparSpace Premium Real Estate')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ $property->first_image }}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">{{ $property->title }}</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('properties') }}">Properties</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">{{ $property->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="property-single-wrap">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            @foreach($property->all_images as $image)
                                <img src="{{ $image }}" alt="{{ $property->title }}" class="img-fluid" />
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="property-single-content">
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <h2 class="heading text-primary">{{ $property->title }}</h2>
                                <p class="text-black-50 mb-2">{{ $property->address }}</p>
                                <p class="text-black-50">{{ $property->city }}, {{ $property->state }}</p>
                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <h3 class="text-primary">{{ $property->formatted_price }}</h3>
                                <span class="badge bg-{{ $property->status === 'available' ? 'success' : ($property->status === 'sold' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($property->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-sm-6 col-md-3 mb-3">
                                <strong class="text-black">Cabins:</strong>
                                <span class="text-black-50">{{ $property->cabins }}</span>
                            </div>
                            <div class="col-sm-6 col-md-3 mb-3">
                                <strong class="text-black">Bathrooms:</strong>
                                <span class="text-black-50">{{ $property->bathrooms }}</span>
                            </div>
                            <div class="col-sm-6 col-md-3 mb-3">
                                <strong class="text-black">Area:</strong>
                                <span class="text-black-50">{{ number_format($property->area) }} sq ft</span>
                            </div>
                            <div class="col-sm-6 col-md-3 mb-3">
                                <strong class="text-black">Type:</strong>
                                <span class="text-black-50">{{ $property->propertyType->name }}</span>
                            </div>
                            <div class="col-sm-6 col-md-3 mb-3">
                                <strong class="text-black">Work Station:</strong>
                                <span class="text-black-50">{{ $property->work_station }}</span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h4 class="text-black mb-3">Description</h4>
                            <p class="text-black-50">{{ $property->description }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                                Inquire About This Property
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget">
                        <h3 class="widget-title">Property Features</h3>
                        <ul class="list-unstyled">
                            <li><strong>{{ $property->cabins }}</strong> Cabins</li>
                            <li><strong>{{ $property->bathrooms }}</strong> Bathrooms</li>
                            <li><strong>{{ number_format($property->area) }}</strong> Square Feet</li>
                            <li><strong>{{ $property->propertyType->name }}</strong> Property Type</li>
                            <li><strong>{{ $property->work_station }}</strong> Work Station</li>
                        </ul>
                    </div>
                    
                    <div class="widget">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="contact-info">
                            <p>Interested in this property? Get in touch with our team!</p>
                            <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                                Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($relatedProperties->count() > 0)
<div class="section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="font-weight-bold heading text-primary mb-4">Related Properties</h2>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProperties as $related)
            <div class="col-lg-4 mb-4">
                <div class="property-item">
                    <div class="img">
                        <img src="{{ $related->first_image }}" alt="{{ $related->title }}">
                        @if($related->featured)
                            <div class="badge bg-warning">Featured</div>
                        @endif
                    </div>
                    <div class="property-content">
                        <div class="price">{{ $related->formatted_price }}</div>
                        <h5>{{ $related->title }}</h5>
                        <div class="location">
                            <i class="icon-location"></i>
                            {{ $related->city }}, {{ $related->state }}
                        </div>
                        <div class="specs">
                            <span>
                                <i class="icon-bed"></i>
                                {{ $related->cabins }} cabins
                            </span>
                            <span>
                                <i class="icon-bath"></i>
                                {{ $related->bathrooms }} baths
                            </span>
                            <span>
                                <i class="icon-home"></i>
                                {{ $related->area }} sq ft
                            </span>
                        </div>
                        <div class="property-actions">
                            <button type="button" class="btn-inquire" onclick="openInquiryModal({{ $related->id }}, '{{ addslashes($related->title) }}')">Inquire Now</button>
                            <a href="{{ route('property.show', $related->id) }}" class="btn-details">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Inquiry Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inquiryModalLabel">Inquire About: {{ $property->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name *</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" required minlength="2" maxlength="255">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email *</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Your Phone *</label>
                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                               value="{{ old('phone') }}" required minlength="10" maxlength="20" pattern="[0-9+\-\s()]+">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message *</label>
                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" 
                                  rows="4" required minlength="10" maxlength="1000">{{ old('message', 'I am interested in this property. Please contact me with more details.') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

<!-- Global Inquiry Modal for Related Properties -->
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
</script>

@if($errors->any() || session('success') || session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inquiryModal = new bootstrap.Modal(document.getElementById('inquiryModal'));
        inquiryModal.show();
        
        @if(session('success'))
        // Clear form on success
        setTimeout(function() {
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('message').value = 'I am interested in this property. Please contact me with more details.';
        }, 2000);
        @endif
    });
</script>
@endif

@endsection