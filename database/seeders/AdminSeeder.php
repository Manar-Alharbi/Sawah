<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // إضافة المدير الافتراضي إذا لم يكن موجود
        Admin::firstOrCreate(
            ['email' => 'admin@example.com'], // الشرط: إذا كان البريد موجود لا يضيفه مرة ثانية
            [
                'name' => 'Manager',
                'password' => '123456', // كلمة السر ستتشفّر تلقائيًا من الموديل
            ]
        );
    }
}