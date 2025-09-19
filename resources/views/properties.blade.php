@extends('layouts.app')

@section('title', 'Properties - DooparSpace Premium Real Estate')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ asset('images/hero_bg_1.jpg') }}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Properties</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Properties</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="form-search">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading mb-3 mb-lg-0">Search Properties</h2>
                </div>
                <div class="col-lg-6">
                    <form method="GET" action="{{ route('properties') }}" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Search by city, address, or property name..." value="{{ old('search', request('search')) }}">
                        <select name="type" class="form-select">
                            <option value="">All Types</option>
                            @foreach($propertyTypes as $type)
                                <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-properties">
    <div class="container">
        <div class="row">
            @forelse($properties as $property)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
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
                            {{ $property->city }}, {{ $property->state }}
                        </div>
                        <div class="specs">
                            <span>
                                <i class="icon-bed"></i>
                                {{ $property->cabins }} cabins
                            </span>
                            <span>
                                <i class="icon-bath"></i>
                                {{ $property->bathrooms }} baths
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
            </div>
            @empty
            <div class="col-12">
                <div class="property-item">
                    <div class="property-content text-center d-flex flex-column justify-content-center">
                        <h4 class="mb-3">No properties found</h4>
                        <p class="mb-3">Try adjusting your search criteria or browse all properties.</p>
                        <a href="{{ route('properties') }}" class="btn-inquire">View All Properties</a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        
        @if($properties->hasPages())
        <div class="row align-items-center py-5">
            <div class="col-lg-3">
                Showing {{ $properties->firstItem() }}-{{ $properties->lastItem() }} of {{ $properties->total() }} properties
            </div>
            <div class="col-lg-6 text-center">
                {{ $properties->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @endif
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
    var modal = document.getElementById('globalInquiryModal');
    new bootstrap.Modal(modal).show();
});
@endif
</script>

@endsection