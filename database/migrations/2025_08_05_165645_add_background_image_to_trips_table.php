<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            // ✅ إضافة العمود فقط إذا لم يكن موجوداً مسبقاً
            if (!Schema::hasColumn('trips', 'background_image')) {
                $table->string('background_image')->nullable()->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            if (Schema::hasColumn('trips', 'background_image')) {
                $table->dropColumn('background_image');
            }
        });
    }
};