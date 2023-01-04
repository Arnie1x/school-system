@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">Manage Units</p>

@if (count($units) == 0)
<p class="fw-bold fs-large text-muted">No Units</p>
@endif

<div class="row row-cols-1 row-cols-md-3 g-3 p-0">
    @foreach ($units as $unit)
    <div>
        <div class="card" style="height: 220px">
            <div class="card-body d-flex flex-column">
                <p class="card-title text-primary">{{$unit['name']}}</p>
                <p class="card-subtitle text-muted">{{$unit['description']}}</p>
                <form action="/units/manage" method="post" class="mt-auto">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$unit['id']}}">
                    <div class="d-flex flex-row justify-content-between align-items-end">
                        <div class=" flex-1">
                            <label class="form-label" for="administrator">Administrator</label>
                            <select id="administrator" name="administrator" class="select2 form-select">
                                @foreach ($lecturers as $lecturer)
                                <option value="{{$lecturer['id']}}"
                                @if ($unit['administrator'] != null && $lecturer['id'] == $unit['administrator'])
                                    selected
                                @endif
                                >{{auth()->user()->toString($lecturer['user_id'])}}</option>
                                @endforeach
                            </select>
                            @error('administrator')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">
                                <i class="bx-icons bx bx-check"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5">
    {!! $units->links() !!}
</div>
@endsection