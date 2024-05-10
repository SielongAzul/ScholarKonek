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
        Schema::create('scholarproviders', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name')->nullable();
            $table->foreignIdFor(\App\Models\User::class)
            ->nullable()->contstrained();
            
            $table->timestamps();
        });
        Schema::table('scholarships', function(Blueprint $table){
            $table->foreignIdFor(App\Models\Scholarprovider::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table){
            $table->dropForeignIdFor(\App\Models\Scholarprovider::class);
        });
     
    }
};
