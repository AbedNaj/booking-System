<?php

use App\Models\Employees;
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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employees::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Services::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tenants::class)->constrained()->onDelete('cascade');
            $table->integer('duration_override')->nullable();
            $table->decimal('custom_price', 10, 2)->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('priority')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_service');
    }
};
