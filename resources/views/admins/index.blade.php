@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Properties</h5>
                <p class="card-text">number of properties: {{ $property_count }}</p>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Galleries</h5>
                <p class="card-text">number of galleries: {{ $gallery_count }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <p class="card-text">number of requests: {{ $request_count }}</p>
            </div>
        </div>
    </div>
</div>
@endsection