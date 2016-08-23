@include('vendor/autoload.php')

@setup
    $servers = [
        'git' => 'fox@192.168.1.111 -p 20202',
        'dev' => 'juice@192.168.1.111 -p 20202',
        'god' => 'juice@god.91juice.com -p 20202',
        'xulingfeng' => 'root@112.126.84.172',
    ];
    $hosts = ['god'];
    $host = isset($host) ? $host : "dev";

@endsetup

@servers($servers)

@macro('patch-all')
编译更新
完整打包
@endmacro

@macro('patch-cfg')
配置打包
@endmacro

@macro('update-all')
获取整包
挂起区服
更新整包
恢复区服
@endmacro

@macro('update-cfg')
更新配置
重读配置
@endmacro

@macro('update-servers')
更新服务器列表
@endmacro

@macro('version-log')
获取版本列表
@endmacro

@macro('merge-servers')
合服
@endmacro

@macro('git-pull')
更新公共库
更新分支
@endmacro

@task('获取版本列表', ['on' => 'god'])
    ls -al /juice/www/download/packages
@endtask

@task('编译更新', ['on' => 'dev'])
cd dev/agame_release/server
make
@endtask

@task('完整打包', ['on' => 'dev'])
cd dev/agame_release/sh
sed -i "s/^\(patch=.*\)$/patch=all/g" setup.conf
sed -i "s/^\(version=.*\)$/version=1.3.0/g" setup.conf
./release.sh -r
./release.sh -p
@endtask

@task('配置打包', ['on' => 'dev'])
cd dev/agame_dev/sh
sed -i "s/^\(patch=.*\)$/patch=sql/g" setup.conf
sed -i "s/^\(version=.*\)$/version=1.2.1/g" setup.conf
./release.sh -k db_cfg
./release.sh -p
@endtask

@task('获取整包', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab get:idx=11600
@endtask

@task('挂起区服', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab maintain:idx=117
@endtask

@task('恢复区服', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab restore:idx=117
@endtask

@task('更新整包', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab deploy:idx=117
@endtask

@task('更新配置', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab update:idx=117
@endtask

@task('重读配置', ['on' => 'xulingfeng'])
cd oh-my-deploy
fab reload:idx=117
@endtask

@task('更新服务器列表', ['on' => 'god'])
mysqldump -ujuice -pJuice@2015 agame_god cfg_app_base cfg_app_db > /tmp/cfg_app.sql
@endtask

@task('移除非本服数据', ['on' => 'dev'])
@endtask

@task('更新公共库', ['on' => 'git'])
cd $HOME/dev/elfox
git pull
make
@endtask

@task('更新分支', ['on' => 'git'])
cd $HOME/dev/agame_{{ $branch }}
git pull
cd server
make
@endtask

@task('合服', ['on' => 'dev'])
/juice/sh/cfg/clean_user_data.sh 104
/juice/sh/cfg/clean_user_data.sh 201
/juice/sh/cfg/clean_user_data.sh 202

cd oh-my-deploy

setting='./merge_server/setting.py'
rm -f $setting
touch $setting
echo '#!/usr/bin/env python' > $setting
echo '#-*- coding: utf8 -*-' >> $setting
echo '' >> $setting
echo 'server_idx = {' >> $setting
echo '    10401: 1,' >> $setting
echo '    20101: 2,' >> $setting
echo '    20201: 3,' >> $setting
echo '}' >> $setting

fab merge:src='104;202',dst=201

mysql -ujuice -pJuice@2015 agame_god -e 'INSERT INTO `dat_command` (`cmd`, `server`) VALUES (\'res_code = Game.TriggerEvent(102528, 2032, 1, '', '')\', 20101);'

@endtask

@after
@slack('https://hooks.slack.com/services/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', '#general', "`{$task}` 完成")
@endafter
