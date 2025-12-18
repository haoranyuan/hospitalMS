<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOperationreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationreports', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")->constrained()->cascadeOnDelete();
            $table->text("description");
            $table->foreignId("doctor_id")->constrained()->cascadeOnDelete();
            $table->string("status")->default("pending");
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE operationreports ADD CONSTRAINT operationreports_status_check CHECK (status IN ('pending', 'completed'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operationreports');
    }
}
