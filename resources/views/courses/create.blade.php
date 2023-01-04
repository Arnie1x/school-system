@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">New Course</p>

<div class="card mb-4">
    <h5 class="card-header">Course Details</h5>
    <div class="card-body">
        <form action="/courses/create" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Course Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Unit Name" value="{{old('name')}}" autofocus />
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="description" class="form-label">Course Description</label>
                    <input class="form-control" type="text" id="description" name="description"
                        placeholder="Description..." value="{{old('description')}}" />
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="school">School</label>
                    <select id="school" name="school" class="select2 form-select">
                        <option value="">Select</option>
                        @foreach ($schools as $school)
                            <option value="{{$school['id']}}">{{$school['name']}}</option>
                        @endforeach
                    </select>
                    @error('school')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Add Course</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>

</div>

@endsection