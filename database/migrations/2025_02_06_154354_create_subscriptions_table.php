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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->noActionOnDelete();
            $table->foreignId('plan_id')->constrained()->noActionOnDelete();
            $table->integer('billing_address')->nullable();
            $table->integer('shipping_address')->nullable();
            $table->string('plan_type');
            $table->integer('count');
            $table->date('start_date');
            $table->date('expiry_date');
            $table->decimal('amount', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};