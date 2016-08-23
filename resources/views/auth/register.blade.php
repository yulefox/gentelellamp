@extends('layouts.blank')
@section('title', '至趣科技 | Lamp')
@section('body')
<body class="login">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="{{ url('/auth/register') }}">
            <h1>注册</h1>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input type="text" class="form-control" name="name" placeholder="用户名" required="" />
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input type="email" class="form-control" name="email" placeholder="邮箱" required="" />
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input type="password" class="form-control" name="password" placeholder="密码" required="" />
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码" required="" />
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-up"></i> 注册
              </button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">已经拥有账号?
                <a class="to_register" href="{{ url('/auth/login') }}"> 登录 </a>
              </p>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
