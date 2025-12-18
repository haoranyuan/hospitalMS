<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->string('status')->default('available');
            $table->string('type')->default('general');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE rooms ADD CONSTRAINT rooms_status_check CHECK (status IN ('available', 'occupied', 'maintenance'))");
        DB::statement("ALTER TABLE rooms ADD CONSTRAINT rooms_type_check CHECK (type IN ('ward', 'private', 'semi-private', 'general'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
