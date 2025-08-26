@extends('layouts.app')

@section('title', 'Contact Us | Agolo Steelworks Ltd')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-10 items-start">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Us</h1>
            <p class="text-gray-600 mb-6">Have a project in mind? Send us a message and we’ll get back to you shortly.</p>
            <form class="space-y-4" aria-label="Contact Form">
                <input type="text" class="form-input" placeholder="Full Name" aria-label="Full Name" required>
                <input type="email" class="form-input" placeholder="Email Address" aria-label="Email Address" required>
                <input type="tel" class="form-input" placeholder="Phone" aria-label="Phone">
                <textarea class="form-input" rows="5" placeholder="How can we help?" aria-label="Message" required></textarea>
                <button type="submit" class="btn-primary">Send Message</button>
            </form>
        </div>
        <aside class="bg-gray-50 border border-gray-200 rounded-xl p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Business Info</h2>
            <p class="text-gray-700 mb-2"><strong>Phone:</strong> <a href="tel:+447397105077" class="text-blue-600">+44 7397 105077</a></p>
            <p class="text-gray-700 mb-2"><strong>Email:</strong> <a href="mailto:info@agolosteelworks.co.uk" class="text-blue-600">info@agolosteelworks.co.uk</a></p>
            <p class="text-gray-700"><strong>Address:</strong> 2 Palm Grove, Wigan, WN5 9QB, United Kingdom</p>
        </aside>
    </div>
</section>
@endsection
