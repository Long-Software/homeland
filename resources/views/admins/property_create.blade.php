@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title"
                            required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price"
                            required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="length" id="form2Example1" class="form-control" placeholder="length"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Property image</label>
                        <input name="img_url" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds"
                            required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths"
                            required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="sqaure_foot" id="form2Example1" class="form-control"
                            placeholder="SQ/FT" required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="year_built" id="form2Example1" class="form-control"
                            placeholder="Year Build" required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price_per_square" id="form2Example1" class="form-control"
                            placeholder="Price Per SQ FT" required />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="address" id="form2Example1" class="form-control" placeholder="location"
                            required />
                    </div>

                    <select name="house_type" class="form-control form-select" aria-label="Default select example"
                        required>
                        <option selected>Select Home Type</option>
                        <option value="Condo">Condo</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Land">Land</option>
                    </select>
                    <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example"
                        required>
                        <option selected>Select Type</option>
                        <option value="Buy">For Buy</option>
                        <option value="Rent">For Rent</option>
                        <option value="Lease">For Lease</option>
                    </select>
                    <select name="city" class="form-control mt-3 mb-4 form-select" aria-label="Default select example"
                        required>
                        <option selected>Select City</option>
                        <option value="New York">New York</option>
                        <option value="Brooklyn">Brooklyn</option>
                        <option value="London">London</option>
                        <option value="Tokyo">Tokyo</option>
                        <option value="Cairo">Cairo</option>
                    </select>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">More Info</label>
                        <textarea placeholder="More Info" name="info" class="form-control"
                            id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="agent_name" id="form2Example1" class="form-control"
                            placeholder="agent name" required />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection