{{-- <section class="hero-section mb-2 rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>{{ $heroTitle ?? 'Welcome' }}</h1>
            <p>
                @if (!empty($breadcrumbs) && is_array($breadcrumbs))
                    @foreach ($breadcrumbs as $label => $url)
                        <a href="{{ $url }}">{{ $label }}</a>@if (!$loop->last) / @endif
                    @endforeach
                @else
                    <a href="{{ url('/') }}">Home</a>
                @endif
            </p>
        </div>
    </div>
</section> --}}
