@extends('layouts.app')
@section('content')
{{-- {{ dd(asset('assets/images/'.$prop->img_url)) }} --}}
<div class="site-blocks-cover inner-page-cover overlay"
    style="background-image: url('{{ asset('assets/images/'.$prop->img_url) }}');" data-aos="fade"
    data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                <h1 class="mb-2">{{ $prop->title }}</h1>
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">@currency($prop->price)</strong></p>
            </div>
        </div>
    </div>
</div>
@if (session()->has('make request'))
<div class="container">
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
</div>
@endif
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div>
                    <div class="slide-one-item home-slider owl-carousel">
                        @foreach ($propImgs as $img)
                        <div><img src="{{ asset('assets/images/'.$img->img_url) }}" alt="Image" class="img-fluid"></div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white property-body border-bottom border-left border-right">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">@currency($prop->price)</strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">{{ $prop->beds }} <sup>+</sup></span>
                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">{{ $prop->baths }}</span>
                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">{{ $prop->sqaure_foot }}</span>
                                </li>
                                <li>
                                    <a href="{{ route('properties.save.store', $prop->id) }}"
                                        class="property-favorite"><button
                                            class="btn {{ $prop->isSaved(1) ? 'btn-danger': 'btn-primary' }}"><span
                                                class="icon-heart-o"></span></button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                            <strong class="d-block">{{ $prop->house_type }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                            <strong class="d-block">{{ $prop->year_built }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                            <strong class="d-block">${{ $prop->price_per_square }}</strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black">More Info</h2>
                    <p>{{ $prop->info }}</p>
                    <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Gallery</h2>
                        </div>
                        @foreach ($propImgs as $img)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ asset('assets/images/'.$img->img_url) }}" class="image-popup gal-item"><img
                                    src="{{ asset('assets/images/'.$img->img_url) }}" alt="Image" class="img-fluid"></a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                    <form action="{{ route('properties.request.store', $prop->id) }}" method="POST"
                        class="form-contact-agent">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="agent_name" id="name" class="form-control">
                            @error('agent_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                        </div>
                    </form>
                </div>

                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                    <div class="px-3" style="margin-left: -15px;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('properties.show', $prop->id) }}&quote={{ $prop->title }}"
                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                        <a href="https://twitter.com/intent/tweet?url={{ route('properties.show', $prop->id) }}&text={{ $prop->title }}"
                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('properties.show', $prop->id) }}"
                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Related Properties</h2>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            @if(count($relProps))
            @foreach ($relProps as $prop)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="{{ route('properties.show', $prop->id) }}" class="property-thumbnail">
                        <div class="offer-type-wrap">
                            <span class="offer-type bg-success">{{ $prop->type }}</span>
                        </div>
                        <img src="{{ asset('assets/images/'.$prop->img_url) }}" alt="{{ $prop->img_url }}"
                            class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <a href="{{ route('properties.save.store', $prop->id) }}" class="property-favorite"><span
                                class="icon-heart-o"></span></a>
                        <h2 class="property-title"><a href="{{ route('properties.show', $prop->id) }}">{{ $prop->title
                                }}</a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{
                            $prop->location }}</span>
                        <strong
                            class="property-price text-primary mb-3 d-block text-success">@currency($prop->price)</strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Beds</span>
                                <span class="property-specs-number">{{ $prop->beds }}</span>
                            </li>
                            <li>
                                <span class="property-specs">Baths</span>
                                <span class="property-specs-number">{{ $prop->baths }}</span>
                            </li>
                            <li>
                                <span class="property-specs">SQ FT</span>
                                <span class="property-specs-number">{{ $prop->sqaure_foot }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3>No Related Product</h3>
            @endif
        </div>
    </div>
</div>
@endsection