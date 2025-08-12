@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="container py-4">
    <h1>Category Details</h1>

    <table class="table table-bordered w-50">
        <tr>
            <th>Type</th>
            <td>{{ $category->type }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $category->description ?? '-' }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $category->created_at->format('F d, Y h:i A') }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $category->updated_at->format('F d, Y h:i A') }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
