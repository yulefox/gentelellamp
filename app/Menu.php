<?php
namespace App;

class Menu
{
    public static $menus = [
        /*
        [
        'name' => 'monitor',
        'display_name' => '监控',
        'icon' => "fa fa-home",
        'children' => [
        [
        'name' => 'online',
        'display_name' => '在线',
        ],
        [
        'name' => 'hosts',
        'display_name' => '主机',
        ],
        [
        'name' => 'servers',
        'display_name' => '区服',
        ],
        ],
        ],
        [
        'name' => 'operate',
        'display_name' => '维护',
        'icon' => "fa fa-home",
        'children' => [
        [
        'name' => 'hosts',
        'display_name' => '主机',
        ],
        [
        'name' => 'servers',
        'display_name' => '区服',
        ],
        [
        'name' => 'versions',
        'display_name' => '版本',
        ],
        [
        'name' => 'deploy',
        'display_name' => '部署',
        ],
        ],
        ],
         */
        [
            'name' => 'stat',
            'display_name' => '统计',
            'icon' => "fa fa-home",
            'children' => [
                [
                    'name' => 'summary',
                    'display_name' => '概况',
                ],
            ],
        ],
        [
            'name' => 'admin',
            'display_name' => '管理',
            'icon' => "fa fa-home",
            'children' => [
                [
                    'name' => 'role',
                    'display_name' => '玩家',
                ],
                [
                    'name' => 'mail',
                    'display_name' => '邮件',
                ],
                [
                    'name' => 'event',
                    'display_name' => '事件',
                ],
            ],
        ],
        /*
    [
    'name' => 'system',
    'display_name' => '系统',
    'icon' => "fa fa-home",
    'children' => [
    [
    'name' => 'users',
    'display_name' => '用户',
    ],
    [
    'name' => 'roles',
    'display_name' => '角色',
    ],
    [
    'name' => 'permissions',
    'display_name' => '功能',
    ],
    ],
    ],
     */
    ];

    protected $name;
    protected $uri;
    protected $icon;
    protected $children;
}
