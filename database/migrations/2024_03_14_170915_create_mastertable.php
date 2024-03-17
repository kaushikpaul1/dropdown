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
        Schema::create('mastertable', function (Blueprint $table) {
            $table->id();
            $table->integer('state');
            $table->integer('dist');
            $table->integer('subdiv');
            $table->integer('muni');
            $table->integer('block');
            $table->integer('gp');
            $table->integer('ward');



            $table->string('sc');
            $table->string('st');
            $table->string('obc');
            $table->string('obca');
            $table->string('obcb');
            $table->string('subcaste');

            
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->string('mobile');
            $table->string('email');
            $table->json('presentaddress');
            $table->string('permanentaddress');
            $table->string('epic');
            $table->string('aadhar');
            $table->string('epicfile');
            $table->string('aadharfile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mastertable');
    }
};
