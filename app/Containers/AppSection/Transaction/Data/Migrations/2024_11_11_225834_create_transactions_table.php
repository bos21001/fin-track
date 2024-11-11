<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned()->nullable(); // Parent account ID
            $table->decimal('amount', 30, 2); // max 9999999999999999999999999999.99
            $table->string('type'); // expense or income
            $table->dateTime('date')->nullable()->default(now());
            $table->text('description')->nullable(); // Optional transaction notes
            $table->string('name')->nullable(); // Optional label for the transaction
            $table->string('status')->nullable()->default('pending'); // Status, e.g., completed, pending
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
