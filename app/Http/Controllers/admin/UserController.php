<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    protected $api_url;

    public function __construct()
    {
        $this->api_url = env('API_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Http::get($this->api_url.'/ticketing')->json();
        return view('admin.user.index')->with(compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Http::get($this->api_url."/ticketing/$id")->json()['data'];
        return view('admin.user.show')->with(compact('user'));
    }

}
