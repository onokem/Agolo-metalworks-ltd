<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with all sections according to PRD requirements
     */
    public function index()
    {
        // Sample data for portfolio projects (in production, this would come from database)
        $featuredProjects = [
            [
                'id' => 1,
                'title' => 'Structural Welding On Site',
                'description' => 'Precision structural welding carried out on-site ensuring integrity and compliance.',
                'image' => '/agolomage/structural welding.jpeg',
                'category' => 'Structural Welding',
                'location' => 'Wigan Industrial Estate'
            ],
            [
                'id' => 2,
                'title' => 'Custom Gate Fabrication',
                'description' => 'Laser cut and hand‑finished premium gate with intricate modern pattern.',
                'image' => '/agolomage/laser cut designed gate.jpg',
                'category' => 'Custom Fabrication',
                'location' => 'Manchester City Centre'
            ],
            [
                'id' => 3,
                'title' => 'Fabrication Workshop Operations',
                'description' => 'In‑house fabrication workflow delivering consistent quality and fast turnaround.',
                'image' => '/agolomage/fabrication workshop.jpg',
                'category' => 'Workshop Fabrication',
                'location' => 'Liverpool Facility'
            ]
        ];

        // Sample services data
        $services = [
            [
                'title' => 'Structural Welding',
                'description' => 'Professional structural welding services for construction and industrial projects',
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'features' => ['MIG Welding', 'TIG Welding', 'Arc Welding', 'Site Work Available']
            ],
            [
                'title' => 'Custom Metal Fabrication',
                'description' => 'Bespoke metalwork designed and manufactured to your exact specifications',
                'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547L3 17l4 4h14l-1.572-1.572z',
                'features' => ['Design Service', 'Precision Cutting', 'Complex Assemblies', 'Quality Finish']
            ],
            [
                'title' => 'Repair Services',
                'description' => 'Expert repair and restoration services for all types of metal components',
                'icon' => 'M19 21V9l-7-5-7 5v12h5v-7h4v7h5z',
                'features' => ['Damage Assessment', 'Structural Repairs', 'Restoration', 'Emergency Service']
            ],
            [
                'title' => 'Mobile Welding',
                'description' => 'On-site welding services bringing professional expertise to your location',
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'features' => ['On-Site Service', '24/7 Emergency', 'All Weather', 'Full Equipment']
            ]
        ];

        // Sample testimonials
        $testimonials = [
            [
                'name' => 'John Mitchell',
                'position' => 'Project Manager',
                'company' => 'Mitchell Construction Ltd',
                'content' => 'Outstanding quality workmanship and professional service. Agolo Steelworks delivered our structural steel project on time and to the highest standards.',
                'rating' => 5,
                'project_image' => '/images/testimonials/mitchell-project.jpg'
            ],
            [
                'name' => 'Sarah Thompson',
                'position' => 'Senior Architect',
                'company' => 'Thompson Architects',
                'content' => 'Excellent collaboration on our architectural metalwork project. The attention to detail and craftsmanship exceeded our expectations.',
                'rating' => 5,
                'project_image' => '/images/testimonials/thompson-project.jpg'
            ],
            [
                'name' => 'David Wilson',
                'position' => 'Operations Director',
                'company' => 'Wilson Manufacturing',
                'content' => 'Reliable emergency repair service saved our production line. Professional, efficient, and reasonably priced.',
                'rating' => 5,
                'project_image' => '/images/testimonials/wilson-project.jpg'
            ]
        ];

        // Company stats
        $stats = [
            ['label' => 'Projects Completed', 'value' => '500+'],
            ['label' => 'Years Experience', 'value' => '15+'],
            ['label' => 'Client Satisfaction', 'value' => '98%'],
            ['label' => 'Service Area', 'value' => 'Northwest UK']
        ];

    // Use the enhanced home_new view (with real images & new sections)
    return view('home_new', compact('featuredProjects', 'services', 'testimonials', 'stats'));
    }
}
