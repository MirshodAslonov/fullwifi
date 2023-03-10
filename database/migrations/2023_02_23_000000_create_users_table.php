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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('senior_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->foreign('senior_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('warehouse_id')
                ->references('id')
                ->on('ware_houses')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    // $table->rememberToken();
    //    $table->timestamp('email_verified_at')->nullable();
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
