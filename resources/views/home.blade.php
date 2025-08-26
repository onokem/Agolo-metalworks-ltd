@extends('layouts.app')

@section('title', 'Agolo Steelworks - Premium Steel Fabrication & Construction Services')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" id="hero" aria-label="Hero">
    <!-- Background Carousel -->
    <div class="absolute inset-0 z-0" aria-hidden="true">
        <div class="relative w-full h-full" role="region" aria-roledescription="carousel" aria-label="Showcase">
            <div class="carousel-track w-full h-full">
                <picture class="carousel-slide block w-full h-full">
                    <source srcset="{{ asset('agolomage/welding work shop.webp') }}" type="image/webp">
                    <img src="{{ asset('agolomage/fabrication workshop.jpg') }}" alt="Fabrication workshop with welding in progress" class="w-full h-full object-cover" width="1600" height="900" decoding="async" fetchpriority="high">
                </picture>
                <picture class="carousel-slide hidden w-full h-full">
                    <source srcset="{{ asset('agolomage/silo welding work.jpeg') }}" type="image/jpeg">
                    <img src="{{ asset('agolomage/structural welding.jpeg') }}" alt="Structural welding team working on steel framework" class="w-full h-full object-cover" width="1600" height="900" loading="lazy" decoding="async">
                </picture>
                <picture class="carousel-slide hidden w-full h-full">
                    <source srcset="{{ asset('agolomage/laser cut gate .jpeg') }}" type="image/jpeg">
                    <img src="{{ asset('agolomage/stylish gate fabrication.jpeg') }}" alt="Stylish custom gate fabrication with intricate metal patterns" class="w-full h-full object-cover" width="1600" height="900" loading="lazy" decoding="async">
                </picture>
            </div>
            <div class="hero-overlay absolute inset-0"></div>
            <div class="absolute inset-x-0 bottom-6 flex items-center justify-center gap-2" aria-label="Slides">
                <button type="button" class="carousel-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white focus:ring-2 focus:ring-white" aria-label="Go to slide 1" aria-current="true"></button>
                <button type="button" class="carousel-dot w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-white focus:ring-2 focus:ring-white" aria-label="Go to slide 2"></button>
                <button type="button" class="carousel-dot w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-white focus:ring-2 focus:ring-white" aria-label="Go to slide 3"></button>
            </div>
        </div>
    </div>
    <!-- Hero Content -->
    <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="animate-fade-in">
            <h1 class="hero-title text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold mb-6 leading-tight">
                <span class="block">Premium Steel</span>
                <span class="block text-blue-400">Fabrication & Construction</span>
            </h1>
            <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed">
                With over {{ $stats['years_experience'] ?? 15 }} years of expertise, we deliver exceptional steel fabrication, 
                construction services, and innovative solutions for industrial, commercial, and residential projects.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#services" class="btn-primary group">
                    <span>Explore Our Services</span>
                    <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="#contact" class="btn-secondary group">
                    <span>Get Free Quote</span>
                    <svg class="ml-2 w-5 h-5 transform group-hover:scale-110 transition-transform" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce-slow">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-gradient-to-r from-blue-50 to-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="animate-slide-in-left" style="animation-delay: 0.1s;">
                <div class="stats-number">{{ $stats['years_experience'] ?? 15 }}+</div>
                <p class="text-gray-600 font-medium">Years Experience</p>
            </div>
            <div class="animate-slide-in-left" style="animation-delay: 0.2s;">
                <div class="stats-number">{{ $stats['projects_completed'] ?? 500 }}+</div>
                <p class="text-gray-600 font-medium">Projects Completed</p>
            </div>
            <div class="animate-slide-in-left" style="animation-delay: 0.3s;">
                <div class="stats-number">{{ $stats['happy_clients'] ?? 200 }}+</div>
                <p class="text-gray-600 font-medium">Happy Clients</p>
            </div>
            <div class="animate-slide-in-left" style="animation-delay: 0.4s;">
                <div class="stats-number">{{ $stats['team_members'] ?? 25 }}+</div>
                <p class="text-gray-600 font-medium">Expert Team</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-white" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Our <span class="gradient-text">Expert Services</span>
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                From precision steel fabrication to comprehensive construction solutions, 
                we bring your vision to life with unmatched quality and expertise.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            @php
            $defaultServices = [
                [
                    'title' => 'Steel Fabrication',
                    'description' => 'Custom steel fabrication services for industrial, commercial, and residential projects with precision and quality.',
                    'features' => ['Custom Design', 'Precision Cutting', 'Quality Welding', 'Professional Finishing'],
                    'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547L3 17l4 4h14l-1.572-1.572z'
                ],
                [
                    'title' => 'Structural Welding',
                    'description' => 'Professional structural welding services meeting industry standards for construction and infrastructure projects.',
                    'features' => ['Certified Welders', 'Code Compliance', 'Quality Testing', 'On-site Services'],
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                ],
                [
                    'title' => 'Construction Services',
                    'description' => 'Complete construction solutions from planning to completion, specializing in steel structure projects.',
                    'features' => ['Project Management', 'Site Preparation', 'Installation', 'Quality Assurance'],
                    'icon' => 'M19 21V9l-7-5-7 5v12h5v-7h4v7h5z'
                ]
            ];
            $servicesList = $services ?? $defaultServices;
            @endphp
            
            @foreach($servicesList as $index => $service)
            <div class="service-card animate-fade-in" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                <div class="p-6 sm:p-8">
                    <div class="service-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="{{ $service['icon'] ?? 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547L3 17l4 4h14l-1.572-1.572z' }}">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $service['description'] }}</p>
                    <ul class="space-y-2 mb-6">
                        @foreach($service['features'] as $feature)
                        <li class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="#contact" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium group">
                        <span>Learn More</span>
                        <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="py-20 bg-gray-50" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Featured <span class="gradient-text">Projects</span>
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Discover our portfolio of successful projects that showcase our commitment to excellence, 
                innovation, and quality craftsmanship in steel fabrication and construction.
            </p>
        </div>
        
        @php
        $defaultProjects = [
            [
                'title' => 'Industrial Warehouse Construction',
                'description' => 'Complete steel structure fabrication and construction for a 10,000 sq ft industrial warehouse facility.',
                'category' => 'Industrial',
                'year' => '2023',
                'duration' => '3 months',
                'size' => '10,000 sq ft',
                'image' => 'https://images.unsplash.com/photo-1565031491910-e57fac031c41?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Commercial Office Building',
                'description' => 'Structural steel framework for modern 5-story commercial office building in downtown area.',
                'category' => 'Commercial',
                'year' => '2023',
                'duration' => '6 months',
                'size' => '25,000 sq ft',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Custom Residential Gate',
                'description' => 'Artistic custom steel gate with intricate design for luxury residential property.',
                'category' => 'Residential',
                'year' => '2023',
                'duration' => '2 weeks',
                'size' => '20 ft wide',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ]
        ];
        $projectsList = $projects ?? $defaultProjects;
        @endphp
        
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 lg:gap-10">
            @foreach($projectsList as $index => $project)
            <div class="card-hover bg-white rounded-xl overflow-hidden shadow-lg animate-fade-in" 
                 style="animation-delay: {{ ($index + 1) * 0.15 }}s;">
                <div class="aspect-w-16">
                    <img src="{{ $project['image'] }}" 
                         alt="{{ $project['title'] }}" 
                         class="w-full h-full object-cover" loading="lazy" decoding="async"
                         sizes="(min-width: 1280px) 380px, (min-width: 1024px) 45vw, (min-width: 640px) 50vw, 100vw"
                         @if(strpos($project['image'], 'images.unsplash.com') !== false)
                            srcset="{{ preg_replace('/w=\d+/', 'w=480', $project['image']) }} 480w,
                                    {{ preg_replace('/w=\d+/', 'w=768', $project['image']) }} 768w,
                                    {{ preg_replace('/w=\d+/', 'w=1000', $project['image']) }} 1000w,
                                    {{ preg_replace('/w=\d+/', 'w=1280', $project['image']) }} 1280w,
                                    {{ preg_replace('/w=\d+/', 'w=1600', $project['image']) }} 1600w"
                         @endif
                    >
                </div>
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded-full">
                            {{ $project['category'] }}
                        </span>
                        <span class="text-sm text-gray-500">{{ $project['year'] }}</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">{{ $project['title'] }}</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $project['description'] }}</p>
                    
                    <!-- Project highlights -->
                    <div class="border-t pt-4">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Duration:</span>
                                <span class="font-medium text-gray-900 ml-1">{{ $project['duration'] ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Size:</span>
                                <span class="font-medium text-gray-900 ml-1">{{ $project['size'] ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="#contact" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium group">
                            <span>View Project Details</span>
                            <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="#contact" class="btn-primary">
                <span>View All Projects</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white" id="testimonials">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                What Our <span class="gradient-text">Clients Say</span>
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Don't just take our word for it. Here's what our satisfied clients have to say 
                about our steel fabrication and construction services.
            </p>
        </div>
        
        @php
        $defaultTestimonials = [
            [
                'name' => 'John Smith',
                'position' => 'Project Manager',
                'company' => 'ABC Construction',
                'content' => 'Agolo Steelworks delivered exceptional quality on our warehouse project. Their attention to detail and professional approach made the entire process smooth and efficient.'
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Facility Director',
                'company' => 'Industrial Solutions Inc.',
                'content' => 'Outstanding workmanship and timely delivery. The team at Agolo Steelworks exceeded our expectations and completed the project ahead of schedule.'
            ],
            [
                'name' => 'Mike Davis',
                'position' => 'Property Owner',
                'company' => 'Davis Estates',
                'content' => 'The custom steel gate they fabricated for our property is absolutely beautiful. High-quality craftsmanship and excellent customer service throughout the project.'
            ]
        ];
        $testimonialsList = $testimonials ?? $defaultTestimonials;
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 overflow-hidden">
            @foreach($testimonialsList as $index => $testimonial)
            <div class="testimonial-card animate-slide-in-right" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 leading-relaxed text-lg">
                    "{{ $testimonial['content'] }}"
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mr-4">
                        <span class="text-blue-600 font-bold text-lg">
                            {{ substr($testimonial['name'], 0, 1) }}
                        </span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">{{ $testimonial['name'] }}</div>
                        <div class="text-sm text-gray-600">{{ $testimonial['position'] }}</div>
                        <div class="text-sm text-blue-600">{{ $testimonial['company'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 text-white" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="section-title text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">
                Ready to Start Your <span class="text-blue-300">Project?</span>
            </h2>
            <p class="text-lg sm:text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                Get in touch with our expert team today for a free consultation and quote. 
                We're here to bring your steel fabrication and construction vision to life.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl p-6 sm:p-8 text-gray-900 shadow-2xl">
                <h3 class="text-2xl font-bold mb-6">Get Your Free Quote</h3>
                <form class="space-y-6" id="contact-form">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" id="first-name" name="first-name" required
                                   class="form-input focus-ring" placeholder="John">
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" id="last-name" name="last-name" required
                                   class="form-input focus-ring" placeholder="Smith">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                               class="form-input focus-ring" placeholder="john@example.com">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone"
                               class="form-input focus-ring" placeholder="+1 (555) 123-4567">
                    </div>
                    
                    <div>
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Service Needed</label>
                        <select id="service" name="service" required class="form-input focus-ring">
                            <option value="">Select a service</option>
                            <option value="Steel Fabrication">Steel Fabrication</option>
                            <option value="Structural Welding">Structural Welding</option>
                            <option value="Construction Services">Construction Services</option>
                            <option value="Repairs & Maintenance">Repairs & Maintenance</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Project Details</label>
                        <textarea id="message" name="message" rows="4" required
                                  class="form-input focus-ring resize-vertical" 
                                  placeholder="Tell us about your project requirements..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full btn-primary">
                        <span>Send Message</span>
                        <div class="spinner hidden ml-2"></div>
                    </button>
                </form>
            </div>
            
<!-- Contact Information -->
<aside class="space-y-8" aria-label="Contact Information">
    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 sm:p-8">
        <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
        <div class="space-y-6">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold mb-1">Our Location</h4>
                    <address class="not-italic text-blue-100">123 Industrial Avenue<br>Steel City, SC 12345</address>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold mb-1">Phone</h4>
                    <p class="text-blue-100"><a href="tel:+15551237833" class="hover:underline">+1 (555) 123-STEEL</a><br><a href="tel:+15551237833" class="hover:underline">+1 (555) 123-7833</a></p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold mb-1">Email</h4>
                    <p class="text-blue-100"><a href="mailto:info@agolosteelworks.com" class="hover:underline">info@agolosteelworks.com</a><br><a href="mailto:quotes@agolosteelworks.com" class="hover:underline">quotes@agolosteelworks.com</a></p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold mb-1">Business Hours</h4>
                    <p class="text-blue-100">Monday - Friday: 7:00 AM - 6:00 PM<br>Saturday: 8:00 AM - 4:00 PM<br>Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency Contact -->
    <div class="bg-red-600/90 backdrop-blur-sm rounded-xl p-6 border border-red-400" aria-label="Emergency Contact">
        <h3 class="text-xl font-bold mb-3 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            Emergency Services
        </h3>
        <p class="text-red-100 mb-2">24/7 Emergency Repairs & Support</p>
        <p class="text-white font-semibold"><a href="tel:+1555911STEEL" class="hover:underline">+1 (555) 911-STEEL</a></p>
    </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Lightweight carousel for hero background with swipe & visibility handling
    document.addEventListener('DOMContentLoaded', () => {
        const slides = Array.from(document.querySelectorAll('#hero .carousel-slide'));
        const dots = Array.from(document.querySelectorAll('#hero .carousel-dot'));
        if (slides.length === 0) return;

        let index = 0;
        const show = (i) => {
            slides.forEach((el, idx) => el.classList.toggle('hidden', idx !== i));
            dots.forEach((d, idx) => {
                d.setAttribute('aria-current', idx === i ? 'true' : 'false');
                d.classList.toggle('bg-white/50', idx === i);
                d.classList.toggle('bg-white/30', idx !== i);
            });
            index = i;
        };

        dots.forEach((d, i) => d.addEventListener('click', () => show(i)));

        // Auto-rotate every 7s
        let timer = setInterval(() => show((index + 1) % slides.length), 7000);
        const hero = document.getElementById('hero');
        hero.addEventListener('mouseenter', () => clearInterval(timer));
        hero.addEventListener('mouseleave', () => timer = setInterval(() => show((index + 1) % slides.length), 7000));

        // Pause when tab is hidden
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                clearInterval(timer);
            } else {
                timer = setInterval(() => show((index + 1) % slides.length), 7000);
            }
        });

        // Basic swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        const threshold = 40; // px
        const onTouchStart = (e) => {
            touchStartX = e.changedTouches[0].clientX;
        };
        const onTouchEnd = (e) => {
            touchEndX = e.changedTouches[0].clientX;
            const dx = touchEndX - touchStartX;
            if (Math.abs(dx) > threshold) {
                if (dx < 0) {
                    show((index + 1) % slides.length);
                } else {
                    show((index - 1 + slides.length) % slides.length);
                }
            }
        };
        hero.addEventListener('touchstart', onTouchStart, { passive: true });
        hero.addEventListener('touchend', onTouchEnd, { passive: true });

        // Initialize
        show(0);

        // Testimonials light slider for small screens
        const testWrap = document.querySelector('#testimonials .grid');
        if (testWrap && window.innerWidth < 768) {
            let startX = 0; let scrollLeft = 0; let isDown = false;
            testWrap.style.scrollBehavior = 'smooth';
            testWrap.style.display = 'flex';
            testWrap.style.overflowX = 'auto';
            testWrap.querySelectorAll('.testimonial-card').forEach(card => {
                card.style.minWidth = '85%';
                card.style.marginRight = '16px';
            });
            testWrap.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - testWrap.offsetLeft; scrollLeft = testWrap.scrollLeft; });
            testWrap.addEventListener('mouseleave', () => isDown = false);
            testWrap.addEventListener('mouseup', () => isDown = false);
            testWrap.addEventListener('mousemove', (e) => { if(!isDown) return; e.preventDefault(); const x = e.pageX - testWrap.offsetLeft; const walk = (x - startX); testWrap.scrollLeft = scrollLeft - walk; });
            let tStart = 0; let tScroll = 0;
            testWrap.addEventListener('touchstart', (e)=>{ tStart = e.changedTouches[0].clientX; tScroll = testWrap.scrollLeft; }, {passive:true});
            testWrap.addEventListener('touchmove', (e)=>{ const dx = e.changedTouches[0].clientX - tStart; testWrap.scrollLeft = tScroll - dx; }, {passive:true});
        }
    });
</script>
@endpush
