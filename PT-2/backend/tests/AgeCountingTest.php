<?php

namespace Tests;

class AgeCountingTest extends TestCase
{
    /**
     * Test case for success response.
     */
    public function test_success()
    {
        $this->get('/age-counting')
            ->assertResponseStatus(200);
    }
}
