# 管理模板

[gentelella](https://github.com/puikinsh/gentelella) 是 GitHub 上关注度最高的一个管理模板。

我用 Laravel 实现了一版。

## 初始化项目

    composer create-project laravel/laravel gentelellamp --prefer-dist "5.1.*"

## 基本配置

* [数据库](http://laravel-china.org/docs/5.1/database#configuration)
* [缓存](http://laravel-china.org/docs/5.1/cache#configuration)
* [会话](http://laravel-china.org/docs/5.1/session#configuration)

## 依赖项

Node 依赖项存在于 `package.json` 文件中：

* [gulp](http://gulpjs.com)
* [elixir](http://laravel-china.org/docs/5.1/elixir)
* [bootstrap](http://www.bootcss.com)
* [gentelella](https://github.com/puikinsh/gentelella)

注意：

如果使用 elixir 的 `browserify` 遇到异常，参照该 [issue](https://github.com/laravel/elixir/issues/354)。

    npm install babel-preset-es2015 --save
    npm install babel-preset-react --save

PHP 依赖项存在于 `composer.json` 文件中：

* [graham-campbell/markdown](https://github.com/GrahamCampbell/Laravel-Markdown)

## 导入 gentelella



