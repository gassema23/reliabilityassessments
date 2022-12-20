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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('planner_id')->constrained()->on('users')->references('id');
            $table->foreignUuid('prime_id')->constrained()->on('users')->references('id');
            $table->string('project_no', 25)->unique();
            $table->string('project_name', 125);
            $table->text('project_description')->nullable();
            $table->timestamp('project_complete')->nullable();
            $table->date('project_due_date');
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
        Schema::dropIfExists('projects');
    }
};
