@extends('layouts.app')

@section('title', 'Terms of Service | Agolo Steelworks Ltd')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Terms of Service</h1>
        <p class="text-gray-700 leading-relaxed">Our standard terms of service will be published here, covering quotations, timelines, payments, and warranties.</p>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('quote') }}" class="btn-secondary">Request a Quote</a>
            <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
        </div>
    </div>
</section>
@endsection
