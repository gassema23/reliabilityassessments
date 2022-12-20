<?php

namespace Tests\Unit;

use App\Models\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_models_can_be_instantiated()
    {
        $project = Project::factory()->create();
        $this->assertModelExists($project);
    }
}
