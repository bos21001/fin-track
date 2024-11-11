<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('finance_group_id')->unsigned()->nullable(); // Parent finance group ID
            $table->string('name');
            $table->string('type'); // e.g., cash, card, etc.
            $table->decimal('balance', 30, 2)->nullable(); // max 9999999999999999999999999999.99
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
