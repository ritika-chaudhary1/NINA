@extends('admin.layouts.app')


@section('content')
    <h1>{{ $service->title }}</h1>
    <p>{{ $service->category }}</p>
    

    <h3>Service Details</h3>
    @if($service->details->count())
        <ul>
            @foreach($service->details as $detail)
                <li>
                    <strong>{{ $detail->heading }}</strong>
                    <p>{{ $detail->content }}</p>
                    @if($detail->image)
                        <img src="{{ asset('storage/'.$detail->image) }}" alt="" width="150">
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No details available.</p>
    @endif

    <a href="{{ route('adminservices.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
