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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('billing_address')->constrained('addresses')->cascadeOnDelete();
            $table->foreignId('shipping_address')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->string('razorpay_subscription_id')->unique();
            $table->enum('status', ['created','authenticated','active','pending','halted','cancelled','pause','expired','completed'])->default("created");
            $table->date('expiry_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total_count')->nullable();
            $table->integer('paid_count')->nullable();
            $table->text('short_url')->nullable();
            $table->string('razorpay_offer_id')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('tax', 10, 2)->default(0.00);
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('expired_date')->nullable();
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