<?php

use Orchestra\Testbench\Factories\UserFactory;
use RyanChandler\Comments\Tests\TestCase;

use function Pest\Laravel\actingAs;

uses(TestCase::class)->in(__DIR__);

function login()
{
    $user = UserFactory::new()->create();

    actingAs($user);
}
