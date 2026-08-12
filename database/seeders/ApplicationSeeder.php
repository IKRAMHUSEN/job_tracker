<?php

namespace Database\Seeders;

use App\Models\Application;
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
                'current_ctc' => 250000,
                'expected_ctc' => 300000,
                'location' => 'Ahmedabad',
                'interview_on' => now()->subDays(10),
                'notice_period' => 0,
                'notes' => 'Excited about this opportunity!',
            ],
            [
                'company' => 'InnovateX',
                'role' => 'Frontend Developer',
                'applied_at' => now()->subDays(5),
                'status' => 'interview',
                'current_ctc' => 250000,
                'expected_ctc' => 300000,
                'location' => 'Ahmedabad',
                'interview_on' => now()->subDays(10),
                'notice_period' => 0,
                'notes' => 'Interview scheduled for next week.',
            ],
            [
                'company' => 'DataSolutions',
                'role' => 'Data Analyst',
                'applied_at' => now()->subDays(15),
                'status' => 'offer',
                'current_ctc' => 250000,
                'expected_ctc' => 300000,
                'location' => 'Ahmedabad',
                'interview_on' => now()->subDays(10),
                'notice_period' => 0,
                'notes' => null,
            ],
            [
                'company' => 'WebWorks',
                'role' => 'Full Stack Developer',
                'applied_at' => now()->subDays(20),
                'status' => 'rejected',
                'current_ctc' => 250000,
                'expected_ctc' => 300000,
                'location' => 'Ahmedabad',
                'interview_on' => now()->subDays(10),
                'notice_period' => 0,
                'notes' => null,
            ],
        ];

        foreach ($applications as $application) {
            Application::create($application);
        }
    }
}
