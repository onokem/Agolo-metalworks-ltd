@extends('layouts.app')

@section('title', 'Privacy Policy | Agolo Steelworks Ltd')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Privacy Policy</h1>
        <p class="text-gray-700 leading-relaxed">Our full GDPR-compliant privacy policy will be published here. We respect your privacy and only use your data to provide and improve our services.</p>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('services') }}" class="btn-secondary">View Services</a>
            <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
        </div>
    </div>
</section>
@endsection
