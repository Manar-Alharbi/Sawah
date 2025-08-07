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
        Schema::table('bookings', function (Blueprint $table) {
            // نجعل العمود status نص بطول 50 بدل ENUM أو نص قصير
            $table->string('status', 50)->default('بانتظار المراجعة')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // ارجعه لطبيعته السابقة (إذا كان نص قصير)
            $table->string('status', 20)->change();
        });
    }
};