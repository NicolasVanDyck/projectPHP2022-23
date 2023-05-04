<?php

namespace Tests\Unit;

use App\Models\Activity;
use Database\Seeders\ActivitySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ActivityController;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    public ActivityController $activityController;

    /**
     * Runs the ActivitySeeder before each test.
     */
    public function create_hundred_activities(): void
    {
        $this->seed(ActivitySeeder::class);
    }

    /**
     * Set up the test environment.
     * Runs the ActivitySeeder before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->create_hundred_activities();
        $this->activityController = new ActivityController();
    }

    public function testShowAllActivities()
    {
        $activities = Activity::all();
        $view = $this->activityController->showAllActivities();
        $this->assertEquals($view->activities, $activities);
    }

    public function testUpdateActivity()
    {
        $activities = Activity::all();
        $view = $this->activityController->showAllActivities();
        $this->assertEquals($view->activities, $activities);
    }
}
