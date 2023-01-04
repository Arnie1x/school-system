@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">New Department</p>

<div class="card mb-4">
    <h5 class="card-header">Department Details</h5>
    <div class="card-body">
        <form action="/departments/create" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Department Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Department Name"
                        value="{{old('name')}}" autofocus />
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="description" class="form-label">Department Description</label>
                    <input class="form-control" type="text" id="description" name="description"
                        placeholder="Description..." value="{{old('description')}}" />
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                {{-- <input class="form-control d-none" type="text" id="administrator" name="administrator" value="3" />
                --}}
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Add Department</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>

</div>

@endsection