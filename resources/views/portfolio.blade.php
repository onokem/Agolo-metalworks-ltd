@extends('layouts.app')

@section('title', 'Portfolio | Agolo Steelworks Ltd')

@section('content')
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-gray-900 mb-3">Our Portfolio</h1>
      <p class="text-gray-600">A selection of recent projects showcasing our steel fabrication and welding expertise.</p>
    </div>

    @if(empty($portfolioItems))
      <p class="text-center text-gray-500">No portfolio images found yet. Add images to <code>public/images/portfolio</code>.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($portfolioItems as $item)
        <div class="card-hover bg-gray-50 border border-gray-200 rounded-xl overflow-hidden group">
          <div class="relative aspect-w-16 aspect-h-9">
            <img src="{{ $item['url'] }}" alt="{{ $item['alt'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy" decoding="async">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-6 group-hover:translate-y-0 transition-transform">
              <span class="inline-block bg-blue-600 text-white text-xs font-medium px-2 py-0.5 rounded mb-2">{{ $item['category'] }}</span>
              <h3 class="text-white font-semibold text-lg">{{ $item['title'] }}</h3>
            </div>
          </div>
          <div class="p-5">
            <p class="text-sm text-gray-600">Professional fabrication & installation.</p>
          </div>
        </div>
      @endforeach
    </div>
    @endif

    <div class="text-center mt-12">
      <a href="{{ route('quote') }}" class="btn-primary">Start Your Project</a>
    </div>
  </div>
</section>
@endsection
