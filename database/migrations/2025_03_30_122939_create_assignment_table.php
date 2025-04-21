<?php

use App\Models\Employee;
use App\Models\Service;
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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained()->onDelete('cascade');
            $table->foreignUlid('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignIdFor(Tenant::class)->constrained()->onDelete('cascade');
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
