@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">All Units</p>

@if (count($units) == 0)
<p class="fw-bold fs-large text-muted">No Units Registered</p>
@endif

<div class="row row-cols-1 row-cols-md-3 g-3 p-0">
    @foreach ($units as $unit)
    <div class="card" style="height: 250px">
        <div class="card-body d-flex flex-column">
            <p class="card-title text-primary">{{$unit['name']}}</p>
            <p class="card-text fw-light text-black">Lecturer Name</p>
            <p class="card-subtitle text-muted">{{$unit['description']}}</p>
            <a href="/units/register/{{$unit['id']}}" class="mt-auto btn btn-outline-primary me-2">Register</a>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5">
    {!! $units->links() !!}
</div>
@endsection