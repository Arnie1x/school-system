@extends('layout/layout')

@section('content')

<div class="d-flex flex-row justify-content-between align-items-end">
  <p class="display-4 mt-3 text-primary">{{$department['name']}}</p>
  <div>
    <a href="/departments/{{$department['id']}}/create" class="btn btn-primary me-2 mb-4">New Activity</a>
    @if (false)
    <a href="/departments/{{$department['id']}}/delete" class="btn btn-outline-danger me-2 mb-4">Delete Department</a>
    @endif
  </div>
</div>
<p>{{$department['description']}}</p>

@if (count($activities) == 0)
    <p class="fw-bold fs-large text-muted">No Activities Yet.</p>
    @endif

<div class="row row-cols-1 g-2">
  @foreach ($activities as $activity)
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between align-items-baseline">
          <p class="card-title text-primary">{{$activity['title']}}</p>
          @if ($activity['author'] == auth()->user()->id)
          <a href="/departments/{{$department['id']}}/{{$activity['id']}}/delete" class="btn btn-outline-danger btn-sm me-2 mb-4">Delete Activity</a>
          @endif
        </div>
        <p class="card-subtitle text-black">{{auth()->user()->toString($activity['author'])}}</p>
        <p class="card-text text-muted mt-2">{{$activity['description']}}</p>
        <small class="text-black">{{$activity['created_at']}}</small>
      </div>
  </div>
  <a href="#activity" class="col">
    </div>
  </a>
  @endforeach

</div>
@endsection