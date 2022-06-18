<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RateTest extends TestCase
{
    /**
     *  check if the address is correct or not
     *
     * @return void
     */
    public function test_adderss()
    {
        $this->json('POST', 'api/v1/rate')->assertStatus(200);
    }

    /**
     *  test response is in correct format with given data.
     *
     * @return void
     */
    public function test_response()
    {
        $data = [
            "rate" => [
                "energy" => 0.3,
                "time" => 2,
                "transaction" =>  1
            ],
            "cdr" => [
                "meterStart" => 1204307,
                "timestampStart" => "2021-04-05T10:04:00Z",
                "meterStop" => 1215230,
                "timestampStop" => "2021-04-05T11:27:00Z"
            ]
        ];

        $this->json('POST', 'api/v1/rate', $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [
                    "overall",
                    "components" => [
                        "energy",
                        "time",
                        "transaction"
                    ]
                ]

            ]);
    }

    /**
     * check to get validation error if the parameters are not given or not
     * test_required_parameters
     *
     * @return void
     */
    public function test_required_parameters()
    {

        $this->json('POST', 'api/v1/rate')
            ->assertStatus(200)
            ->assertJson([
                "status" => "failed" ,
                "data" => [
                    "rate" => [
                        "The rate field is required."
                    ],
                        "rate.energy" => [
                        "The rate.energy field is required."
                    ],
                        "rate.time" => [
                        "The rate.time field is required."
                    ],
                        "rate.transaction" => [
                        "The rate.transaction field is required."
                    ],
                        "cdr" => [
                        "The cdr field is required."
                    ],
                        "cdr.meterStart" => [
                        "The cdr.meter start field is required."
                    ],
                        "cdr.timestampStart" => [
                        "The cdr.timestamp start field is required."
                    ],
                        "cdr.meterStop" => [
                        "The cdr.meter stop field is required."
                    ],
                        "cdr.timestampStop" => [
                        "The cdr.timestamp stop field is required."
                    ]
                ],
                "code" => "422"
               
            ]);
    }
}
