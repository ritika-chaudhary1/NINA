@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>➕ Add Client</h2>

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Website</label>
            <input type="url" name="website" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
