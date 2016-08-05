<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Menu;
use Artisan;
use Illuminate\Http\Request;
use Log;

class DeployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lamp.maintain.deploy',
            [
                'menus' => Menu::$menus,
                'title' => '部署',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function package(Request $request)
    {
        Artisan::call('lamp:git-pull', ['--branch' => $request->branch]);
        return;
    }

    public function deploy(Request $request)
    {
        Log::info('hello');
        return;
    }

    public function merge(Request $request)
    {
        $src_servers = [];
        $dst_server = 0;
        Log::info($src_servers . '->' . $dst_server);
        return;
        return view('lamp.maintain.deploy',
            [
                'menus' => Menu::$menus,
                'title' => '部署',
            ]);
    }
}
