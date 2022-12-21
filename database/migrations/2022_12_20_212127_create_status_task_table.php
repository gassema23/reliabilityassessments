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
        Schema::create('status_task', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('task_team_id')->constrained()->on('task_team')->references('id');
            $table->foreignUuid('status_id')->constrained()->on('statuses')->references('id');
            $table->string('risk_name', 125)->nullable();
            $table->string('risk_action', 125)->nullable();
            $table->text('risk_description');
            $table->date('task_complete')->nullable();
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
        Schema::dropIfExists('status_task');
    }
};
