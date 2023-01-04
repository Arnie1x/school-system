@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">Applications</p>

@if (count($applications) == 0)
<p class="fw-bold fs-large text-muted">No Applications Yet.</p>
@endif

<div class="row row-cols-1 g-2">
    @foreach ($applications as $application)
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-baseline">
                    <p class="card-title text-primary">{{$application->user->name}}</p>
                    <div>
                        <a href="/applications/{{$application['id']}}/accept"
                        class="btn btn-primary btn-sm me-2 mb-4">Accept</a>
                        <a href="/applications/{{$application['id']}}/reject"
                        class="btn btn-outline-danger btn-sm me-2 mb-4">Reject</a>
                    </div>
                </div>
                @if ($application->role == 'student')
                    {{-- <p class="card-subtitle text-black">Course: {{auth()->user()->getUser($application->user->id)->student->courseToString(auth()->user()->student->course_enrolled)}}</p> --}}
                    <p class="card-subtitle text-black">Course: {{$application->user->student->courseToString($application->user->student->course_enrolled)}}</p>                    
                @endif
                <p class="card-text text-muted mt-2">{{$application->user->email}}</p>
                <small class="text-black">{{$application->user->created_at}}</small>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection