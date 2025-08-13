 @extends('admin.layouts.app')

@section('title', 'All Portfolios')

@section('content')
<div class="container py-4">
    <h1>All Portfolios</h1>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary mb-3">Create New Portfolio</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->title }}</td>
                <td>{{ $portfolio->subtitle }}</td>
                <td>
                    @if($portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}" width="60" alt="Portfolio Image">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn btn-sm btn-outline-primary" title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this blog?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No portfolios found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $portfolios->links() }}
</div>
@endsection
