@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                <div class="container">
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
                @endif
                <h5 class="card-title mb-4 d-inline">Properties</h5>
                <a href="{{ route('admin.property.create') }}"
                    class="btn btn-primary mb-4 text-center float-right ">Create
                    Properties</a>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-4 text-center float-right mr-5">Create
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
                            <td>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-center">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection