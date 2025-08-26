@extends('layouts.app')

@section('title', 'Professional Welding & Metal Fabrication Services | Agolo Steelworks Ltd - Wigan, UK')
@section('description', 'Expert welding and metal fabrication services in Wigan and Northwest UK. Structural welding, custom fabrication, repairs, and mobile welding. Call +44 7397 105077 for a free quote.')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-gray-900 overflow-hidden">
    {{-- Background Image with Overlay --}}
    <div class="absolute inset-0">
        <picture>
            <source srcset="{{ asset('images/hero/workshop-hero.webp') }}" type="image/webp">
            <img src="{{ asset('images/hero/fabrication-hero.jpg') }}" 
                 alt="Agolo Steelworks Workshop" 
                 class="w-full h-full object-cover">
        </picture>
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 to-blue-900/80"></div>
    </div>
    
    {{-- Hero Content --}}
    <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
            {{-- Text Content --}}
            <div class="max-w-md mx-auto lg:max-w-none lg:mx-0">
                <h1 class="text-4xl font-bold text-white sm:text-5xl lg:text-6xl">
                    Professional <span class="text-blue-400">Welding</span> & Metal Fabrication
                </h1>
                <p class="mt-6 text-xl text-gray-300 leading-8">
                    Expert welding and metal fabrication services serving Wigan and the Northwest UK. Quality craftsmanship with over 15 years of experience in structural welding, custom fabrication, and repair services.
                </p>
                
                {{-- CTA Buttons --}}
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('quote') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors duration-200 shadow-lg">
                        Get Free Quote
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-white bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 rounded-md transition-colors duration-200">
                        View Services
                    </a>
                </div>

                {{-- Contact Info --}}
                <div class="mt-8 flex items-center space-x-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <a href="tel:+447397105077" class="text-white hover:text-blue-400 font-medium">+44 7397 105077</a>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">Wigan & Northwest UK</span>
                    </div>
                </div>
            </div>

            {{-- Featured Project Image (updated with real workshop image) --}}
            <div class="mt-12 lg:mt-0 lg:ml-8">
                <div class="aspect-w-3 aspect-h-4 rounded-lg overflow-hidden shadow-2xl relative group">
                    <picture>
                        <source srcset="{{ asset('images/hero/workshop-hero.webp') }}" type="image/webp">
                        <img src="{{ asset('images/hero/workshop-detail.jpeg') }}" alt="Agolo Steelworks workshop detail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" loading="lazy" decoding="async">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                        <span class="inline-block px-2 py-1 text-xs bg-blue-600/90 rounded mb-2">Recent Project</span>
                        <h3 class="text-lg font-semibold leading-snug">Precision Structural Welding In Progress</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

{{-- Company Stats Section --}}
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach($stats as $stat)
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">{{ $stat['value'] }}</div>
                <div class="text-sm text-gray-600 mt-1">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Welding Services</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive welding and metal fabrication services tailored to meet your specific requirements
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Structural Welding Service --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-9">
                    <picture>
                        <source srcset="{{ asset('images/services/structural-welding.webp') }}" type="image/webp">
                        <img src="{{ asset('images/services/structural-welding.jpeg') }}" 
                             alt="Structural Welding Services" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Structural Welding</h3>
                    <p class="text-gray-600 mb-4">Expert structural welding services for commercial and industrial projects, ensuring integrity and durability.</p>
                    
                    <ul class="text-sm text-gray-500 space-y-2 mb-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Building frameworks
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Steel beams & supports
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Load-bearing components
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Metal Fabrication Service --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-9">
                    <picture>
                        <source srcset="{{ asset('images/services/metal-fabrication.webp') }}" type="image/webp">
                        <img src="{{ asset('images/services/metal-fabrication.jpeg') }}" 
                             alt="Metal Fabrication Services" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Metal Fabrication</h3>
                    <p class="text-gray-600 mb-4">Custom metal fabrication services for creating bespoke metal components to your exact specifications.</p>
                    
                    <ul class="text-sm text-gray-500 space-y-2 mb-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Custom metal parts
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Precision cutting & forming
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Specialty metal solutions
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Silo Welding Service --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-9">
                    <picture>
                        <source srcset="{{ asset('images/services/silo-welding.webp') }}" type="image/webp">
                        <img src="{{ asset('images/services/silo-welding.jpeg') }}" 
                             alt="Silo Welding Services" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Industrial Welding</h3>
                    <p class="text-gray-600 mb-4">Specialized industrial welding services for silos, tanks, and large-scale industrial equipment.</p>
                    
                    <ul class="text-sm text-gray-500 space-y-2 mb-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Storage silos & tanks
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Industrial machinery
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            High-pressure equipment
                        </li>
                    </ul>
                </div>
            </div>

            {{-- On-Site Welding Service --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-9">
                    <picture>
                        <source srcset="{{ asset('images/services/onsite-welding.webp') }}" type="image/webp">
                        <img src="{{ asset('images/services/onsite-welding.jpeg') }}" 
                             alt="On-Site Welding Services" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Mobile Welding</h3>
                    <p class="text-gray-600 mb-4">Convenient on-site welding services bringing our expertise to your location for repairs and installations.</p>
                    
                    <ul class="text-sm text-gray-500 space-y-2 mb-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Emergency repairs
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            On-site installation
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Field modifications
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- CTA Button --}}
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors duration-200">
                View All Services
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Gate Portfolio Showcase --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Premium Gate Designs</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                Explore our collection of custom-designed gates featuring elegant designs, durability, and premium craftsmanship
            </p>
        </div>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/gate-custom.jpg') }}" alt="Custom MS Gate Work" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Custom MS Gate Design</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/laser-cut-gate.jpg') }}" alt="Laser Cut Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Laser Cut Designed Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/wrought-iron-gate.jpg') }}" alt="Wrought Iron Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Classic Wrought Iron Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/white-gate.jpg') }}" alt="White Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Modern White Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/stainless-gate.jpeg') }}" alt="Stainless Steel Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Stainless Steel Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/garden-gate.jpg') }}" alt="Garden Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Short Metal Path Garden Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/aluminium-gate.jpeg') }}" alt="Aluminium Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Modern Aluminium Gate</h3>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/portfolio/composite-gate.jpg') }}" alt="Composite Gate" class="w-full h-56 object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white font-medium">Composite Material Gate</h3>
                </div>
            </div>
        </div>

        {{-- CTA Button --}}
        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="btn-primary">
                View All Gate Designs
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Featured Projects Section --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Featured Projects</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                Showcasing our expertise through completed welding and fabrication projects across the Northwest UK
            </p>
        </div>

        {{-- Projects Carousel/Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
            <div class="group cursor-pointer">
                <div class="relative aspect-w-16 aspect-h-12 rounded-lg overflow-hidden">
                    <picture>
                        @php $ext = pathinfo($project['image'], PATHINFO_EXTENSION); @endphp
                        @if(strtolower($ext) !== 'webp')
                            {{-- Attempt WebP with same basename if exists --}}
                            @php $webpCandidate = preg_replace('/\.[^.]+$/', '.webp', $project['image']); @endphp
                            <source srcset="{{ asset(ltrim($webpCandidate,'/')) }}" type="image/webp">
                        @endif
                        <img src="{{ asset(ltrim($project['image'],'/')) }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" loading="lazy" decoding="async">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 text-white translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="inline-block px-2 py-1 text-[10px] tracking-wide uppercase bg-blue-600/90 rounded mb-2">{{ $project['category'] }}</span>
                        <h3 class="text-lg font-semibold leading-snug mb-1">{{ $project['title'] }}</h3>
                        <p class="text-xs text-gray-200 line-clamp-2">{{ $project['description'] }}</p>
                        <p class="text-[11px] mt-1 text-blue-200">📍 {{ $project['location'] }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full mb-2">{{ $project['category'] }}</span>
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $project['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $project['description'] }}</p>
                    <p class="text-sm text-gray-500">📍 {{ $project['location'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA Button --}}
        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors duration-200">
                View Full Portfolio
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- About Us Preview Section --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">About Agolo Steelworks</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                Professional welding and fabrication expertise serving Wigan and Northwest UK since 2010
            </p>
        </div>

        <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">
            {{-- Image Grid Content --}}
            <div class="mb-8 lg:mb-0 grid grid-cols-2 gap-4">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('images/about/team-workshop.jpg') }}" alt="Team at Workshop" class="w-full h-full object-cover aspect-w-1 aspect-h-1">
                </div>
                <div class="grid grid-rows-2 gap-4">
                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('images/about/office-team.jpeg') }}" alt="Office Team" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('images/about/team-planning.jpg') }}" alt="Team Planning" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            
            {{-- Text Content --}}
            <div>
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-6">Why Choose Agolo Steelworks?</h2>
                <p class="text-lg text-gray-600 mb-6">
                    With over 15 years of experience serving Wigan and the Northwest UK, we've built our reputation on quality craftsmanship, reliable service, and customer satisfaction.
                </p>
                
                {{-- Key Points --}}
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Certified Professionals</h3>
                            <p class="text-gray-600">Fully qualified welders with industry certifications and extensive experience</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Modern Equipment</h3>
                            <p class="text-gray-600">State-of-the-art welding equipment and tools for precision work</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Mobile Service Available</h3>
                            <p class="text-gray-600">On-site welding services bringing our expertise to your location</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 text-base font-medium text-blue-600 bg-white border border-blue-600 hover:bg-blue-50 rounded-md transition-colors duration-200">
                        Learn More About Us
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Workshop Image --}}
            <div class="mt-12 lg:mt-0">
                <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden shadow-lg">
                    <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                        <div class="text-center text-gray-700">
                            <svg class="w-20 h-20 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-6H5.83L12 5.83 18.17 12H17v6z"/>
                            </svg>
                            <p class="text-sm">Workshop Facility</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">What Our Clients Say</h2>
            <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                Don't just take our word for it - hear from satisfied clients across the Northwest UK
            </p>
        </div>

        {{-- Testimonials Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                {{-- Stars Rating --}}
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    @endfor
                </div>

                {{-- Testimonial Content --}}
                <p class="text-gray-600 mb-4">"{{ $testimonial['content'] }}"</p>

                {{-- Client Info --}}
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr($testimonial['name'], 0, 1) }}</span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">{{ $testimonial['name'] }}</p>
                        <p class="text-sm text-gray-500">{{ $testimonial['company'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-blue-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white sm:text-4xl mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Get a free, no-obligation quote for your welding and fabrication needs. Our experienced team is ready to help bring your project to life.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('quote') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-blue-600 bg-white hover:bg-gray-50 rounded-md transition-colors duration-200 shadow-lg">
                Get Free Quote
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="tel:+447397105077" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-white bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 rounded-md transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                Call Now: +44 7397 105077
            </a>
        </div>
    </div>
</section>
@endsection

@push('head')
<style>
    .nav-link {
        @apply text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
    }
    .nav-link.active {
        @apply text-blue-600 bg-blue-50;
    }
    .mobile-nav-link {
        @apply text-gray-700 hover:text-blue-600 hover:bg-blue-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200;
    }
    .mobile-nav-link.active {
        @apply text-blue-600 bg-blue-50;
    }
    .aspect-w-16 {
        position: relative;
        padding-bottom: 75%; /* 16:12 aspect ratio */
    }
    .aspect-w-16 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .aspect-w-3 {
        position: relative;
        padding-bottom: 133.33%; /* 3:4 aspect ratio */
    }
    .aspect-w-3 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .aspect-w-4 {
        position: relative;
        padding-bottom: 75%; /* 4:3 aspect ratio */
    }
    .aspect-w-4 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add animation to stats on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe all sections for animations
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
</script>
@endpush
