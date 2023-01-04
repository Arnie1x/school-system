@extends('layout/layout')

@section('content')

<div class="d-flex flex-row justify-content-between align-items-end">
    <p class="display-4 mt-3 text-primary">My Units</p>
    <div>
        @if (false)
        <a href="units/create" class="btn btn-primary me-2 mb-4">New Unit</a>
        @endif
        <a href="units/register" class="btn btn-primary me-2 mb-4">Register for Unit</a>
    </div>
</div>

@if (count($units) == 0)
    <p class="fw-bold fs-large text-muted">No Units Registered</p>
@endif
<div class="row row-cols-1 row-cols-md-3 g-3 p-0">
    @foreach ($units as $unit)
    <a href="/units/{{$unit['id']}}" class="col">
        <div class="card" style="height: 200px">
            <div class="card-body">
                <p class="card-title">{{$unit['name']}}</p>
                <p class="card-text fw-light text-black">Lecturer Name</p>
                <p class="card-subtitle text-muted">{{$unit['description']}}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>
@if (count($units) > 0)
<div class="d-flex justify-content-center mt-5">
    {!! $units->links() !!}
</div>
@endif
@endsection