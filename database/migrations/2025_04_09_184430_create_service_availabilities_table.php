<?php

use App\Models\Services;
use App\Models\Tenants;
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
        Schema::create('service_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenants::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Services::class)->constrained()->cascadeOnDelete();
            $table->tinyInteger('day_of_week')->comment('0 = Sunday, 1 = Monday, ..., 6 = Saturday');
            $table->time('start_time')->comment('Start time of the service availability');
            $table->time('end_time')->comment('End time of the service availability');
            $table->boolean('is_available')->default(true);
            $table->unsignedSmallInteger('slot_duration_minutes')->nullable()->comment('Optional: override slot duration for this day');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->index(['services_id', 'day_of_week']);
            $table->index(['tenant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_availabilities');
    }
};
