<?php

namespace App\Http\Controllers;

use App\Menu;
use DB;
use Illuminate\Http\Request;

class LampController extends Controller
{
    protected static $fields = [
        'users' => [
            'name' => '用户',
            'email' => '邮箱',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ],
        'roles' => [
            'name' => '角色',
            'display_name' => '显示',
            'description' => '描述',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ],
        'permissions' => [
            'name' => '权限',
            'display_name' => '显示',
            'description' => '描述',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ],
        'hosts' => [
            'id' => 'ID',
            'name' => '名称',
            'display_name' => '显示',
            'description' => '描述',
            'lan_ip' => '内网 IP',
            'wan_ip' => '外网 IP',
        ],
        'servers' => [
            'id' => 'ID',
            'display_name' => '名称',
            'host_id' => '主机',
            'version' => '版本',
            'platform' => '平台',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ],
    ];

    public function __construct()
    {
    }

    public function home()
    {
        return view('welcome');
    }

    public function index(Request $request, $sector, $page)
    {
        $data = $this->query($request, $page);
        return view('templates.datatable',
            [
                'menus' => Menu::$menus,
                'fields' => LampController::$fields[$page],
                'data' => $data,
                'title' => $page,
            ]);
    }

    public function summary(Request $request)
    {
        return view('lamp.stat.summary',
            [
                'menus' => Menu::$menus,
                'title' => '概况',
            ]);
    }

    public function order(Request $request)
    {
        return view('lamp.query.order',
            [
                'menus' => Menu::$menus,
                'title' => '充值明细',
            ]);
    }

    public function getServers(Request $request)
    {
        return $this->invokeAPI('GET', 'apps', $request->all());
    }

    public function addNamelist(Request $request)
    {
        return $this->invokeAPI('GET', 'gm/add_namelist', $request->all());
    }

    public function triggerEvent(Request $request)
    {
        return $this->invokeAPI('GET', 'gm/trigger_event', $request->all());
    }

    public function addMail(Request $request)
    {
        return $this->invokeAPI('GET', 'gm/add_mail', $request->all());
    }

    public function retention(Request $request)
    {
        return $this->invokeAPI('GET', 'stat/retention', $request->all());
    }

    public function orderDetail(Request $request)
    {
        return $this->invokeAPI('GET', 'detail/orders', $request->all());
    }

    public function doc($page)
    {
        return view($page);
    }

    public function gentelella($page)
    {
        return view('vendor.gentelella.' . $page);
    }

    public function queryAgame(Request $req, $table)
    {
        $query = DB::connection('agame')->table($table);
        $input = $req->all();
        foreach ($input as $key => $value) {
            $query = $query->where($key, $value);
        }
        $data = $query->get();
        return $data;
    }

    public function query(Request $req, $table)
    {
        $query = DB::table($table);
        $input = $req->all();
        foreach ($input as $key => $value) {
            $query = $query->where($key, $value);
        }
        $data = $query->get();
        return $data;
    }

    public function prettyQuery(Request $req, $table)
    {
        $data = $this->query($req, $table);
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return response($json)
            ->header('Content-Type', 'application/json;charset=utf-8');
    }
}
