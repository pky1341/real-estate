@extends('layouts.app')

@section('title', $property->title . ' - Property Details')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ asset($property->first_image) }}')">
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
                    <div class="property-single-slider">
                        @foreach($property->all_images as $image)
                        <div class="property-single-item">
                            <img src="{{ asset($image) }}" alt="{{ $property->title }}" class="img-fluid">
                        </div>
                        @endforeach
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
                                <strong class="text-black">Bedrooms:</strong>
                                <span class="text-black-50">{{ $property->bedrooms }}</span>
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
                        </div>
                        
                        <div class="mb-4">
                            <h4 class="text-black mb-3">Description</h4>
                            <p class="text-black-50">{{ $property->description }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <button type="button" class="btn btn-primary btn-lg" onclick="inquireProperty({{ $property->id }}, '{{ $property->title }}')">
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
                            <li><strong>{{ $property->bedrooms }}</strong> Bedrooms</li>
                            <li><strong>{{ $property->bathrooms }}</strong> Bathrooms</li>
                            <li><strong>{{ number_format($property->area) }}</strong> Square Feet</li>
                            <li><strong>{{ $property->propertyType->name }}</strong> Property Type</li>
                        </ul>
                    </div>
                    
                    <div class="widget">
                        <h3 class="widget-title">Contact Agent</h3>
                        <div class="agent-contact">
                            <p>Interested in this property? Get in touch with us!</p>
                            <button type="button" class="btn btn-outline-primary w-100" onclick="inquireProperty({{ $property->id }}, '{{ $property->title }}')">
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
                    <a href="{{ route('property.details', $related) }}" class="img">
                        <img src="{{ asset($related->first_image) }}" alt="{{ $related->title }}" class="img-fluid">
                    </a>
                    <div class="property-content">
                        <div class="price mb-2"><span>{{ $related->formatted_price }}</span></div>
                        <div>
                            <span class="d-block mb-2 text-black-50">{{ $related->address }}</span>
                            <span class="city d-block mb-3">{{ $related->city }}, {{ $related->state }}</span>
                            <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                    <span class="icon-bed me-2"></span>
                                    <span class="caption">{{ $related->bedrooms }} beds</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                    <span class="icon-bath me-2"></span>
                                    <span class="caption">{{ $related->bathrooms }} baths</span>
                                </span>
                            </div>
                            <a href="{{ route('property.details', $related) }}" class="btn btn-primary py-2 px-3">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection