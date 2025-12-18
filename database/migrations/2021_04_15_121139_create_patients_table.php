<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("gender")->nullable();
            $table->string("age")->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string("photo_path")->nullable();
            $table->string("status")->default("pending");
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->string("disease")->nullable();
            $table->string("doctor")->nullable();
            $table->string("admit_date")->nullable();
            $table->string("discharge_date")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE patients ADD CONSTRAINT patients_status_check CHECK (status IN ('admitted', 'discharged', 'pending'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
