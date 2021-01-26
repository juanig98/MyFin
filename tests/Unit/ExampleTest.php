<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Factories\UserFactory;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = UserFactory::new()->create();

        dump($user->toArray());
    }
}
