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
            'phone' => '0785102996',
            'BOD' => Carbon::createFromFormat('Y-m-d', '2002-11-6'),
        ]);
        DB::table('admin_extension_translations')->insert([
            'admin_extension_id' => Admin::first()->id,
            'locale' => 'en',
            'job_title' => 'software engineer',
            'location' => 'zarqa-Jordan',
            'about' => "A results-driven backend developer with hand-on experience excelling in PHP, SQL, Laravel. Innovatively design and implement robust backend solutions."
        ]);
    }
}
