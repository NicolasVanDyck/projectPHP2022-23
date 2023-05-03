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
    public Activity $activity;

    /**
     * Seed the database before each test.
     * So we can test the database and the controller.
     * @return void
     */
    private function seedDatabase(): void
    {
        $this->seed(ActivitySeeder::class);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->seedDatabase();
        $this->activityController = new ActivityController();
        $this->activity = Activity::firstOrNew([
            'name' => 'test',
            'description' => 'test but a description',
            'start_date' => '2021-04-25 14:42:27',
            'end_date' => '2021-04-27 14:42:27',
        ]);
    }

    /**
     * Test the setup of the test.
     */
    public function test_setup(): void
    {
        $this->assertNotNull($this->activityController);
        $this->assertNotNull($this->activity);
    }

    /**
     * Counts and returns the activity count in the database.
     *
     * @return int
     */
    public function test_countActivities(): int
    {
        $count = Activity::all()->count();
        $this->assertIsInt($count);

        return $count;
    }


    /**
     * Add a test to check if the index() method returns a view with the correct data.
     * @return void
     * @depends test_countActivities
     */
    public function test_index(int $count): void
    {
        $data = $this->activityController->index();
        $this->assertCount($count, $data);

    }

    // Add a test to check if the create() method returns a view with the correct data.
    public function test_create(): void
    {
        $createdActivity = $this->activityController->create();

        $this->assertNotNull($createdActivity);
    }

    // Add a test to check if the store() method stores the correct data in the database.
    public function test_store(): void
    {
        $this->assertTrue(true);
    }

    // Add a test to check if the show() method returns a view with the correct data.
    public function test_show(): void
    {
        $this->assertEquals('test', $this->activity->name);
        $this->assertEquals('test but a description', $this->activity->description);
        $this->assertEquals('2021-04-25 14:42:27', $this->activity->start_date);
        $this->assertEquals('2021-04-27 14:42:27', $this->activity->end_date);

        $this->assertTrue(true);
    }

    // Add a test to check if the edit() method returns a view with the correct data.
    public function test_edit(): void
    {
        $this->assertTrue(true);
    }
}
