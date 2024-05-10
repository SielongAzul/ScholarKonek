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
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->string('grades_doc')->nullable();
            $table->string('itr_doc')->nullable();
            $table->string('letter_doc')->nullable();
            $table->string('essay_doc')->nullable();
            $table->string('birthcert_doc')->nullable();
            $table->string('others_doc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->dropColumn('grades_doc');
            $table->dropColumn('itr_doc');
            $table->dropColumn('letter_doc');
            $table->dropColumn('essay_doc');
            $table->dropColumn('birthcert_doc');
            $table->dropColumn('others_doc');

        });
    }
};
