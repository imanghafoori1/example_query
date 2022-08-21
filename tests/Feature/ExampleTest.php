<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Modules\Posts\Repos\ActiveBloggersRepo;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Artisan::call('migrate:fresh');
        $users = ActiveBloggersRepo::getActiveUsers();

        $this->assertInstanceOf(Collection::class, $users);
    }
}
