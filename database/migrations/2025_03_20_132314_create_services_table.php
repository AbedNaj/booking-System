<?php

use App\Models\Category;
use App\Models\Tenant;
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
        Schema::create('services', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(Tenant::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class)->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('duration_minutes')->nullable();
            $table->text('image')->nullable();
            $table->integer('max_bookings_per_day')->nullable();
            $table->boolean('allow_cancellation')->default(true);
            $table->integer('cancellation_hours_before')->nullable();
            $table->decimal('cancellation_fee', 10, 2)->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
