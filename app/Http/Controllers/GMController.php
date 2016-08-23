<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Log;

class GMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lamp.admin.gm',
            [
                'menus' => Menu::$menus,
                'title' => 'GM',
            ]);
    }

    public function event()
    {
        return view('lamp.admin.event',
            [
                'menus' => Menu::$menus,
                'title' => '事件',
            ]);
    }

    public function postEvent(Request $request)
    {
        $input = $request->all();
        $res = $this->invokeAPI('GET', 'gm/trigger_event', $input);
        return view('lamp.admin.mail',
            [
                'menus' => Menu::$menus,
                'title' => '邮件',
            ]);
    }

    public function mail()
    {
        return view('lamp.admin.mail',
            [
                'menus' => Menu::$menus,
                'title' => '邮件',
            ]);
    }

    public function postMail(Request $request)
    {
        $input = $request->all();

        if ($input['role'] != '') {
            $res = $this->invokeAPI('GET', 'gm/add_mail', $input);
        } else if ($input['roles'] != '') {
            $res = $this->invokeAPI('GET', 'gm/add_mail', $input);
        } else {
            $res = $this->invokeAPI('GET', 'gm/add_mail', $input);
        }
        return view('lamp.admin.mail',
            [
                'menus' => Menu::$menus,
                'title' => '邮件',
            ]);
    }

    public function role()
    {
        return view('lamp.admin.role',
            [
                'menus' => Menu::$menus,
                'title' => '玩家管理',
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

    public function deploy()
    {
        Log::info('hello');
        return;
    }

    public function merge()
    {
        Log::info('hello');
        return;
        return view('lamp.maintain.deploy',
            [
                'menus' => Menu::$menus,
                'title' => '部署',
            ]);
    }
}
