@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Client Details</h3>

    <div class="card mb-3">
        <div class="row g-0">
            @if($client->logo)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $client->logo) }}" class="img-fluid rounded-start" alt="{{ $client->name }}">
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $client->name }}</h5>
                    <p class="card-text">
                        Website: 
                        @if($client->website)
                            <a href="{{ $client->website }}" target="_blank">{{ $client->website }}</a>
                        @else
                            N/A
                        @endif
                    </p>
                    <p class="card-text"><small class="text-muted">Added on {{ $client->created_at->format('d M, Y') }}</small></p>
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
