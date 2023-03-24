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

        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->timestamps();
            $table->string('mime_type');
            $table->string('name');
            $table->boolean("is_deleted")->default(0);
            $table->string("printer_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
