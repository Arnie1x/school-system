@extends('layout/layout')

@section('content')
    <!-- Unit -->
    <div class="d-flex flex-row justify-content-between align-items-end">
      <p class="display-4 mt-3 text-primary">{{$unit['name']}}</p>
      <div>
        <a href="/units/{{$unit['id']}}/create" class="btn btn-primary me-2 mb-4">New Activity</a>
        @if (false)
        <a href="/units/{{$unit['id']}}/delete" class="btn btn-outline-danger me-2 mb-4">Delete Unit</a>
        @endif

      </div>
    </div>
    <p>{{$unit['description']}}</p>

    @if (count($activities) == 0)
    <p class="fw-bold fs-large text-muted">No Activities Yet.</p>
    @endif

    <!-- Unit Activity -->
    <div class="row g-3">
      @foreach ($activities as $activity) 
      <div class="card">
        <div class="card-body">
          <p class="card-title fw-bold text-primary">{{$activity['title']}} - {{auth()->user()->toString($activity['author'])}}</p>
          <p class="card-text text-black mt-1">{{$activity['description']}}</p>
          <p class="card-subtitle text-muted">{{$activity['created_at']}}</p>
          @if ($activity['author'] == auth()->user()->id)
          <a href="/units/{{$unit['id']}}/{{$activity['id']}}/delete" class="btn btn-outline-danger btn-sm mt-2">Delete</a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <!-- /Unit Activity -->

    <!-- /Unit -->
@endsection