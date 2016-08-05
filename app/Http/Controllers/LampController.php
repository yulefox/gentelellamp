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

    public function index(Request $req, $sector, $page)
    {
        $data = $this->query($req, $page);
        return view('templates.datatable',
            [
                'menus' => Menu::$menus,
                'fields' => LampController::$fields[$page],
                'data' => $data,
                'title' => $page,
            ]);
    }

    public function doc($page)
    {
        return view($page);
    }

    public function gentelella($page)
    {
        return view('vendor.gentelella.' . $page);
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
