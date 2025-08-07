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
        if (!Schema::hasColumn('bookings', 'trip_id')) {
            $table->unsignedBigInteger('trip_id');
        }
        if (!Schema::hasColumn('bookings', 'phone')) {
            $table->string('phone')->nullable();
        }
        if (!Schema::hasColumn('bookings', 'notes')) {
            $table->text('notes')->nullable();
        }
    });
}

public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        if (Schema::hasColumn('bookings', 'trip_id')) {
            $table->dropColumn('trip_id');
        }
        if (Schema::hasColumn('bookings', 'phone')) {
            $table->dropColumn('phone');
        }
        if (Schema::hasColumn('bookings', 'notes')) {
            $table->dropColumn('notes');
        }
    });
}


};
