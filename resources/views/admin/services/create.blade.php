@extends('admin.layouts.app')


@section('content')
    <h1>Add Service</h1>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>



        <div class="mb-3">
            <label>Icon</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}">
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
