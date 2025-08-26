@extends('layouts.app')

@section('title', 'Professional Steel Fabrication & Welding Services | Agolo Steelworks')
@section('description', 'Comprehensive steel fabrication and welding services including structural steel work, custom fabrication, mobile welding, and emergency repairs.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
            <picture>
                <source srcset="{{ asset('images/hero/workshop-hero.webp') }}" type="image/webp">
                <img src="{{ asset('images/hero/fabrication-hero.jpg') }}" alt="Agolo Steelworks team performing fabrication work" class="object-cover w-full h-full opacity-30" width="1600" height="600" loading="eager" decoding="async">
            </picture>
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/80 to-blue-900/70"></div>
        </div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-6">Our Services</h1>
                <p class="text-xl text-gray-300">
                    Comprehensive steel fabrication, structural welding & mobile welding solutions across Northwest UK.
                </p>
            </div>
        </div>
    </section>

    {{-- Services List --}}
    <section class="py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Steel Fabrication --}}
            <div id="steel-fabrication" class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="aspect-w-16 aspect-h-9 lg:order-2 overflow-hidden rounded-lg">
                        <img src="{{ asset('images/services/metal-fabrication.jpeg') }}" alt="Metal fabrication process at Agolo Steelworks" class="w-full h-full object-cover rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-700" width="1280" height="720" loading="lazy" decoding="async">
                    </div>
                    <div class="lg:order-1">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Steel Fabrication</h2>
                        <p class="text-gray-600 text-lg mb-6">
                            Our expert team provides comprehensive steel fabrication services, crafting custom solutions for your specific needs. We combine traditional craftsmanship with modern technology to deliver exceptional results.
                        </p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Custom metal fabrication for industrial and commercial projects
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Precise cutting, bending, and assembly
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                State-of-the-art equipment and techniques
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Quality control at every stage
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Structural Steel --}}
            <div id="structural-steel" class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-lg">
                        <img src="{{ asset('images/services/structural-welding.jpeg') }}" alt="Structural welding and beam installation" class="w-full h-full object-cover rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-700" width="1280" height="720" loading="lazy" decoding="async">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Structural Steel</h2>
                        <p class="text-gray-600 text-lg mb-6">
                            We specialize in structural steel work for construction projects of all sizes. Our experienced team ensures precise installation and superior structural integrity.
                        </p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Building frames and support structures
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Mezzanine floors and platforms
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Steel beams and columns
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Complete project management
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Mobile Welding --}}
            <div id="mobile-welding" class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="aspect-w-16 aspect-h-9 lg:order-2 overflow-hidden rounded-lg">
                        <img src="{{ asset('images/services/onsite-welding.jpeg') }}" alt="On-site mobile welding service in progress" class="w-full h-full object-cover rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-700" width="1280" height="720" loading="lazy" decoding="async">
                    </div>
                    <div class="lg:order-1">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Mobile Welding</h2>
                        <p class="text-gray-600 text-lg mb-6">
                            Our mobile welding service brings professional welding capabilities directly to your site. We're equipped to handle repairs and installations anywhere in Northwest UK.
                        </p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                24/7 emergency repairs
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                On-site welding and fabrication
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Fully equipped mobile workshop
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Rapid response times
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Other Services --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Service Box 1 --}}
                <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Emergency Repairs</h3>
                    <p class="text-gray-600 mb-4">24/7 emergency welding and repair services to minimize downtime.</p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Rapid response
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            On-site repairs
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Quick turnaround
                        </li>
                    </ul>
                </div>

                {{-- Service Box 2 --}}
                <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Custom Projects</h3>
                    <p class="text-gray-600 mb-4">Bespoke metal fabrication solutions for unique requirements.</p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Design consultation
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Prototype development
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Custom fabrication
                        </li>
                    </ul>
                </div>

                {{-- Service Box 3 --}}
                <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Maintenance</h3>
                    <p class="text-gray-600 mb-4">Regular maintenance and inspection services for steel structures.</p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Regular inspections
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Preventive maintenance
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Safety compliance
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Ready to Start Your Project?</h2>
                <p class="text-xl text-gray-300 mb-8">
                    Contact us today for a free consultation and quote. Our team is ready to help bring your vision to life.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('quote') }}" class="btn-primary bg-white text-blue-600 hover:bg-blue-50">
                        Get Free Quote
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-secondary border-white text-white hover:bg-gray-800">
                        Contact Us
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
