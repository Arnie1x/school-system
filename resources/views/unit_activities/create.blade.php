@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">New Activity</p>

<div class="card mb-4">
    <h5 class="card-header">Activity Details</h5>
    <div class="card-body">
        <form action="/units/{{$unit['id']}}/create" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="title" class="form-label">Activity Name</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Activity Name" value="{{old('title')}}" autofocus />
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Activity Description</label>
                    <input class="form-control" type="text" id="description" name="description"
                        placeholder="Description..." value="{{old('description')}}"/>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <input class="form-control d-none" type="text" id="author" name="author" value="3" />
                <input class="form-control d-none" type="text" id="unit" name="unit" value="{{$unit['id']}}" />
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Add Activity</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>

</div>

@endsection