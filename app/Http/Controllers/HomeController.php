<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        // Redis::set('user:1:first_name', 'Farooq');
        // Redis::set('user:2:first_name', 'Imran');
        // Redis::set('user:3:first_name', 'Kamran');

        //Redis::command('select', ['9']);

        $data = array('first_name' => 'Farooq', 'second_name' => 'Arshad', 'designation' => 'SSE', 'language' => 'PHP');

        // $keyName = 'user' . ''
       Redis::set('user' . 'Farooq_data12:details', json_encode($data));
        // $redisData = Redis::get('userFarooq_data:details');
        // echo '<pre>';
        // print_r(json_decode($redisData));

    }
}
