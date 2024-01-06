<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminExtensionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_extensions')->insert([
            'admin_id' => Admin::first()->id,
//            'job_title' => 'software engineer',
            'phone' => '0785102996',
            'BOD' => Carbon::createFromFormat('Y-m-d', '2002-11-6'),
//            'location' => 'zarqa-Jordan',
//            'about' => "Aspiring software engineer with a passion for turning code into innovative solutions. Proficient in programming languages such as Python, and PHP, with a solid foundation in algorithms and data structures. Eager to contribute to dynamic projects, collaborate with talented teams, and continuously learn in the ever-evolving field of software engineering. Open to new opportunities and excited to bring my problem-solving skills to create efficient and scalable software. Let's connect and explore the possibilities of working together in the world of software development!"

        ]);
    }
}
