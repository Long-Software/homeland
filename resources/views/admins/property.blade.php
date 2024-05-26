@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Properties</h5>
                <a href="create-properties.html" class="btn btn-primary mb-4 text-center float-right ">Create
                    Properties</a>
                <a href="create-Gallery.html" class="btn btn-primary mb-4 text-center float-right mr-5">Create
                    Gallery</a>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">home type</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                        <tr>
                            <th scope="row">{{ $property->id }}</th>
                            <td>{{ $property->title }}</td>
                            <td>@currency($property->price)</td>
                            <td>{{ $property->house_type }}</td>
                            <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection