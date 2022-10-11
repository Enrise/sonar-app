<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        $data = [
            'transactions' => [
                [
                    'name' => 'Transaction 1',
                    'created_at' => Carbon::now()->subtract('minutes', random_int(0, 29)),
                    'status' => 'failed',
                    'retries' => 5
                ],
                [
                    'name' => 'Transaction 1',
                    'created_at' => Carbon::now()->subtract('minutes', random_int(30, 59)),
                    'status' => 'started',
                    'retries' => null
                ],
                [
                    'name' => 'Transaction 2',
                    'created_at' => Carbon::now()->subtract('minutes', random_int(60, 89)),
                    'status' => 'done',
                    'retries' => 2
                ],
                [
                    'name' => 'Transaction 2',
                    'created_at' => Carbon::now()->subtract('minutes', random_int(90, 119)),
                    'status' => 'started',
                    'retries' => null
                ],
            ]
        ];

        return view('welcome', $data);
    }
}
