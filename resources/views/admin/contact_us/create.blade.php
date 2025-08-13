@extends('admin.layouts.app') {{-- or your main layout --}}

@section('content')
<section class="contact-section py-5 mb-2 rounded-bottom-3">
    <div class="container bg-black py-5">
        <h6 class="section-heading text-center">GET IN TOUCH</h6>
        <h2 class="section-title text-white text-center">
            Want To <span class="text-danger">Enrich</span> Yourself, Always Connect with Us
        </h2>

        <div class="row p-3">
            <div class="col-lg-6">
                {{-- Show success message --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Show validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.contact_us.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required />
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your email" value="{{ old('email') }}" required />
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}" />
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Send Message</button>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="form-image">
                    <img src="{{ asset('images/form.jpg') }}" alt="form-image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
