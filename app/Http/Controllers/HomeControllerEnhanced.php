<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Statistics for the stats section
        $stats = [
            'years_experience' => 15,
            'projects_completed' => 500,
            'happy_clients' => 200,
            'team_members' => 25
        ];

        // Services offered
        $services = [
            [
                'title' => 'Steel Fabrication',
                'description' => 'Custom steel fabrication services for industrial, commercial, and residential projects with precision engineering and quality craftsmanship.',
                'features' => [
                    'Custom Design & Engineering',
                    'Precision CNC Cutting',
                    'Professional MIG/TIG Welding',
                    'Powder Coating & Finishing',
                    'Quality Control Testing'
                ],
                'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547L3 17l4 4h14l-1.572-1.572z'
            ],
            [
                'title' => 'Structural Welding',
                'description' => 'Professional structural welding services meeting AWS and industry standards for construction and infrastructure projects.',
                'features' => [
                    'AWS Certified Welders',
                    'Code Compliance (AWS D1.1)',
                    'Non-Destructive Testing',
                    'On-site Welding Services',
                    'Emergency Repair Services'
                ],
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
            ],
            [
                'title' => 'Construction Services',
                'description' => 'Complete construction solutions from planning to completion, specializing in steel structure buildings and infrastructure.',
                'features' => [
                    'Project Management',
                    'Site Preparation & Foundation',
                    'Steel Erection & Installation',
                    'Building Code Compliance',
                    'Post-Construction Support'
                ],
                'icon' => 'M19 21V9l-7-5-7 5v12h5v-7h4v7h5z'
            ],
            [
                'title' => 'Custom Metal Works',
                'description' => 'Artistic and functional custom metalwork including gates, railings, decorative elements, and architectural features.',
                'features' => [
                    'Artistic Design Consultation',
                    'Custom Gates & Railings',
                    'Decorative Metal Elements',
                    'Architectural Features',
                    'Restoration Services'
                ],
                'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4 4 4 0 004-4V5z'
            ],
            [
                'title' => 'Repairs & Maintenance',
                'description' => 'Comprehensive repair and maintenance services for existing steel structures, machinery, and equipment.',
                'features' => [
                    '24/7 Emergency Response',
                    'Structural Assessments',
                    'Preventive Maintenance',
                    'Equipment Refurbishment',
                    'Mobile Repair Services'
                ],
                'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'
            ],
            [
                'title' => 'Industrial Solutions',
                'description' => 'Specialized industrial steel solutions including conveyor systems, storage tanks, and heavy machinery components.',
                'features' => [
                    'Conveyor System Design',
                    'Storage Tank Fabrication',
                    'Heavy Machinery Components',
                    'Industrial Equipment Repair',
                    'Plant Maintenance Support'
                ],
                'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'
            ]
        ];

        // Featured projects portfolio
        $projects = [
            [
                'title' => 'Industrial Warehouse Complex',
                'description' => 'Complete steel structure fabrication and construction for a 25,000 sq ft industrial warehouse facility with office spaces and loading docks.',
                'category' => 'Industrial',
                'year' => '2023',
                'duration' => '4 months',
                'size' => '25,000 sq ft',
                'image' => 'https://images.unsplash.com/photo-1565031491910-e57fac031c41?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Modern Office Building Framework',
                'description' => 'Structural steel framework for modern 8-story commercial office building in downtown business district with advanced seismic design.',
                'category' => 'Commercial',
                'year' => '2023',
                'duration' => '8 months',
                'size' => '45,000 sq ft',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Luxury Residential Gates',
                'description' => 'Custom designed artistic steel gates with intricate patterns and automated opening systems for luxury residential community.',
                'category' => 'Residential',
                'year' => '2023',
                'duration' => '3 weeks',
                'size' => '24 ft wide',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Manufacturing Plant Expansion',
                'description' => 'Steel structure expansion for automotive parts manufacturing facility including crane systems and specialized equipment foundations.',
                'category' => 'Industrial',
                'year' => '2023',
                'duration' => '6 months',
                'size' => '35,000 sq ft',
                'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Bridge Infrastructure Project',
                'description' => 'Structural steel fabrication and installation for pedestrian bridge connecting two commercial buildings with weather protection.',
                'category' => 'Infrastructure',
                'year' => '2023',
                'duration' => '5 months',
                'size' => '120 ft span',
                'image' => 'https://images.unsplash.com/photo-1573165850883-9ce8ddb2b4c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ],
            [
                'title' => 'Custom Architectural Features',
                'description' => 'Artistic steel sculptures and architectural elements for corporate headquarters including lobby features and exterior art installations.',
                'category' => 'Architectural',
                'year' => '2023',
                'duration' => '2 months',
                'size' => 'Multiple pieces',
                'image' => 'https://images.unsplash.com/photo-1511818966892-d7d671e672a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
            ]
        ];

        // Client testimonials
        $testimonials = [
            [
                'name' => 'John Mitchell',
                'position' => 'Project Manager',
                'company' => 'ABC Construction Group',
                'content' => 'Agolo Steelworks exceeded our expectations with their warehouse project. The attention to detail, quality of workmanship, and professional communication throughout the entire process was outstanding. They delivered on time and within budget.'
            ],
            [
                'name' => 'Sarah Rodriguez',
                'position' => 'Facility Director',
                'company' => 'Industrial Solutions Inc.',
                'content' => 'Working with Agolo Steelworks was a pleasure. Their team demonstrated exceptional technical expertise and problem-solving skills. The structural steel work for our manufacturing expansion was completed flawlessly and ahead of schedule.'
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Property Owner',
                'company' => 'Chen Development Group',
                'content' => 'The custom steel gates and railings fabricated by Agolo Steelworks transformed our residential community. The artistic design combined with functional durability is exactly what we were looking for. Highly recommended for any custom metalwork.'
            ],
            [
                'name' => 'Emily Thompson',
                'position' => 'Operations Manager',
                'company' => 'Metro Manufacturing',
                'content' => 'Agolo Steelworks provided emergency repair services when our conveyor system failed. Their rapid response and expert welding repairs got us back in production quickly. Their 24/7 service availability is invaluable for our operations.'
            ],
            [
                'name' => 'David Park',
                'position' => 'Architect',
                'company' => 'Park & Associates',
                'content' => 'The structural steel framework for our office building project was executed with precision. Agolo Steelworks worked closely with our design team to ensure all specifications were met. Their engineering expertise added significant value to the project.'
            ],
            [
                'name' => 'Lisa Zhang',
                'position' => 'Plant Manager',
                'company' => 'Advanced Electronics Corp',
                'content' => 'The industrial solutions provided by Agolo Steelworks, including custom storage tanks and equipment supports, have improved our plant efficiency significantly. Their understanding of industrial requirements is impressive.'
            ]
        ];

        return view('home', compact('stats', 'services', 'projects', 'testimonials'));
    }
}
