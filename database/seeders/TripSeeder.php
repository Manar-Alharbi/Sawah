<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('trips')->insert([
            [
                'title' => 'رحلة دبي',
                'description' => 'استمتع برحلة سياحية رائعة في دبي',
                'price' => 5000,
                'location' => 'الإمارات - دبي',
                'image' => 'dubai.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة باريس',
                'description' => 'زيارة برج إيفل ومعالم باريس السياحية',
                'price' => 12000,
                'location' => 'فرنسا - باريس',
                'image' => 'paris.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة تركيا',
                'description' => 'رحلة ممتعة إلى إسطنبول',
                'price' => 7000,
                'location' => 'تركيا - إسطنبول',
                'image' => 'istanbul.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة روما',
                'description' => 'استكشف تاريخ روما وآثارها العريقة',
                'price' => 10000,
                'location' => 'إيطاليا - روما',
                'image' => 'rome.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رحلة الرياض',
                'description' => 'اكتشف معالم الرياض الحديثة والتقليدية',
                'price' => 3000,
                'location' => 'السعودية - الرياض',
                'image' => 'riyadh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}