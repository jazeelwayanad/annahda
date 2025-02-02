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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->json('plan_ids')->nullable();
            $table->enum('type', ['flat','percentage'])->default('flat');
            $table->decimal('discount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status');
            $table->integer('max_usage');
            $table->integer('total_usage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};