<?php

namespace Tests\Feature;

use App\Models\Covid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CovidCaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddNewCase()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('covid',[
            'active' => 0,
            'well' => 1000,
            'dead' => 0,
            'total' => 1000
        ]);
        $response->assertOk();
        $this->assertCount(1, Covid::all());
    }

    public function testValidateData(){
        $response = $this->post('covid',[
            'dead' => 0,
            'total' => 1000
        ]);

        $response->assertSessionHasErrors(['active','well']);
    }
}
