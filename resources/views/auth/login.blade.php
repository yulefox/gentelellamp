@extends('layouts.blank')
@section('title', '至趣科技 | Lamp')
@section('body')
<body class="login">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="{{ url('/auth/login') }}">
            <h1>至趣科技</h1>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input type="text" class="form-control" name="email" placeholder="邮箱" value="{{ old('email') }}" required="" />
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
            <div>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> 登录
              </button>
              <a class="reset_pass" href="#">忘记密码?</a>
            </div>

            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">尚未拥有账号?
                <a class="to_register" href="{{ url('/auth/register') }}"> 注册 </a>
              </p>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
