<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->string('timeline')->nullable();
            $table->string('budget')->nullable();
            $table->string('location');
            $table->string('access')->nullable();
            $table->text('details');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->boolean('subscribe')->default(false);
            $table->string('status')->default('new');
            $table->timestamps();
            $table->index(['email','created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
