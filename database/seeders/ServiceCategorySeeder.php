<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'WordPress',
                'description' => 'WordPress development and customization services',
                'status' => true
            ],
            [
                'name' => 'Laravel',
                'description' => 'Laravel framework development services',
                'status' => true
            ],
            [
                'name' => 'Brand',
                'description' => 'Brand development and strategy services',
                'status' => true
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'User interface and user experience design services',
                'status' => true
            ],
            [
                'name' => 'Landing',
                'description' => 'Landing page design and development services',
                'status' => true
            ],
            [
                'name' => 'Mobile & Web App',
                'description' => 'Mobile and web application development services',
                'status' => true
            ],
            [
                'name' => 'Stationery',
                'description' => 'Stationery design and branding services',
                'status' => true
            ],
            [
                'name' => 'Brand Design',
                'description' => 'Comprehensive brand design services',
                'status' => true
            ],
            [
                'name' => 'Card Design',
                'description' => 'Business card and card design services',
                'status' => true
            ],
            [
                'name' => 'Social Media',
                'description' => 'Social media marketing and management services',
                'status' => true
            ],
            [
                'name' => 'Youtube',
                'description' => 'YouTube content creation and optimization services',
                'status' => true
            ],
            [
                'name' => 'SEO Analytics',
                'description' => 'Search engine optimization and analytics services',
                'status' => true
            ],
            [
                'name' => 'Mockup Design',
                'description' => 'Product mockup and presentation design services',
                'status' => true
            ],
            [
                'name' => 'Flyer Design',
                'description' => 'Flyer and promotional material design services',
                'status' => true
            ]
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
