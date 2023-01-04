@extends('layout/layout')

@section('content')
<!-- Account Details -->
<p class="display-4 mt-3 text-primary">My Account</p>

<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->

    <hr class="my-0" />
    <div class="card-body">
        <form action="/account" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{auth()->user()->name}}" autofocus />
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{auth()->user()->email}}" autofocus />
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>

<!-- /Account Details -->


@endsection