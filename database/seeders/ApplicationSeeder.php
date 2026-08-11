<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            [
                'company' => 'TechCorp',
                'role' => 'Software Engineer',
                'applied_at' => now()->subDays(10),
                'status' => 'applied',
                'job_url' => 'https://techcorp.com/jobs/123',
                'salary_range' => '$80,000 - $100,000',
                'notes' => 'Excited about this opportunity!',
            ],
            [
                'company' => 'InnovateX',
                'role' => 'Frontend Developer',
                'applied_at' => now()->subDays(5),
                'status' => 'interview',
                'job_url' => 'https://innovatex.com/careers/456',
                'salary_range' => '$70,000 - $90,000',
                'notes' => 'Interview scheduled for next week.',
            ],
            [
                'company' => 'DataSolutions',
                'role' => 'Data Analyst',
                'applied_at' => now()->subDays(15),
                'status' => 'offer',
                'job_url' => null,
                'salary_range' => '$60,000 - $80,000',
                'notes' => null,
            ],
            [
                'company' => 'WebWorks',
                'role' => 'Full Stack Developer',
                'applied_at' => now()->subDays(20),
                'status' => 'rejected',
                'job_url' => null,
                'salary_range' => null,
                'notes' => null,
            ],
        ];

        foreach ($applications as $application) {
            \App\Models\Application::create($application);
        }
    }
}
