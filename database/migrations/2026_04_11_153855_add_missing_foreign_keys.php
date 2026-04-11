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
        Schema::table('committee_members', function (Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->restrictOnDelete();
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('document_category_id')->references('id')->on('document_categories')->cascadeOnDelete();
        });

        Schema::table('payment_assignments', function (Blueprint $table) {
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->cascadeOnDelete();
            $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_assignments', function (Blueprint $table) {
            $table->dropForeign(['payment_type_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['document_category_id']);
        });

        Schema::table('committee_members', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['position_id']);
        });
    }
};
