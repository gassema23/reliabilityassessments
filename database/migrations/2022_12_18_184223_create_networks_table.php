<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->constrained();
            $table->foreignUuid('city_id')->constrained();
            $table->foreignUuid('technology_id')->constrained();
            $table->string('network_no', 25)->unique();
            $table->string('network_element', 25)->unique();
            $table->string('network_name', 125);
            $table->text('network_description')->nullable();
            $table->timestamp('network_complete')->nullable();
            $table->date('network_due_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('networks');
    }
};
