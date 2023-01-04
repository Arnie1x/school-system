@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">Hello, Admin</p>

<div class="row row-cols-1 row-cols-md-3 g-3">
    <div><a href="units/create" class="btn btn-primary w-100">New Unit</a></div>
    <div><a href="courses/create" class="btn btn-primary w-100">New Course</a></div>
    <div><a href="departments/create" class="btn btn-primary w-100">New Department</a></div>
    <div><a href="schools/create" class="btn btn-primary w-100">New School</a></div>
    <div><a href="admin/create" class="btn btn-primary w-100">New Administrator</a></div>
    <div><a href="units/manage" class="btn btn-primary w-100">Manage Units</a></div>
    <div><a href="applications/student" class="btn btn-primary w-100">View Student Applications</a></div>
    <div><a href="applications/lecturer" class="btn btn-primary w-100">View Lecturer Applications</a></div>
    <div><a href="applications/staff" class="btn btn-primary w-100">View Staff Applications</a></div>

</div>
@endsection