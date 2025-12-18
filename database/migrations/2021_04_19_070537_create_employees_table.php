<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->string("salary")->nullable();
            $table->string("address")->nullable();
            $table->string("qualification")->nullable();
            $table->string("position")->default("other");
            $table->string("status")->default("active");
            $table->string("image")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE employees ADD CONSTRAINT employees_position_check CHECK (position IN ('nurse', 'doctor', 'accountant', 'pharmacist', 'receptionist', 'cleaner', 'security', 'other'))");
        DB::statement("ALTER TABLE employees ADD CONSTRAINT employees_status_check CHECK (status IN ('active', 'inactive'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
