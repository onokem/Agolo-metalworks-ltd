@extends('layouts.app')

@section('title', 'About Us | Agolo Steelworks Ltd')

@section('content')
    <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
            <picture>
                <source srcset="{{ asset('images/hero/workshop-hero.webp') }}" type="image/webp">
                <img src="{{ asset('images/hero/workshop-detail.jpeg') }}" alt="Agolo Steelworks workshop facility" class="object-cover w-full h-full opacity-35" width="1600" height="600" loading="eager" decoding="async">
            </picture>
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/85 to-blue-900/70"></div>
        </div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-6">About Agolo Steelworks</h1>
            <p class="text-lg sm:text-xl text-gray-300 max-w-3xl mx-auto">Quality-driven steel fabrication & welding company proudly serving Wigan and the Northwest UK for over 15 years.</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Story</h2>
                <p class="text-gray-600 leading-relaxed">Founded in Wigan, Agolo Steelworks has grown from a small workshop to a trusted steel fabrication partner for industrial, commercial, and residential clients. Our mission is to deliver reliable, safe, and cost-effective solutions.</p>
                <ul class="mt-6 space-y-3 text-gray-700">
                    <li class="flex items-center"><svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5 13l4 4L19 7"/></svg>Certified and experienced welders</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5 13l4 4L19 7"/></svg>On-time delivery and quality assurance</li>
                    <li class="flex items-center"><svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5 13l4 4L19 7"/></svg>Serving the Northwest UK</li>
                </ul>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Company Details</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <div><dt class="font-medium">Founded</dt><dd>2010</dd></div>
                    <div><dt class="font-medium">Location</dt><dd>Wigan, UK</dd></div>
                    <div><dt class="font-medium">Specialties</dt><dd>Fabrication, Structural, Mobile</dd></div>
                    <div><dt class="font-medium">Coverage</dt><dd>Northwest England</dd></div>
                </dl>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Ready to work with us?</h2>
        <p class="text-gray-600 mb-6">Get a free consultation and project quote today.</p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('quote') }}" class="btn-primary">Get Free Quote</a>
            <a href="{{ route('contact') }}" class="btn-secondary">Contact Us</a>
        </div>
    </section>
@endsection
