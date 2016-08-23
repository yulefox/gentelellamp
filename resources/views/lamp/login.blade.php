@extends('layouts.blank')
@section('title', '至趣科技 | Lamp')
@section('body')
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="/auth/login">
            <h1>至趣科技</h1>
            <div>
              <input type="text" class="form-control" placeholder="用户名" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="密码" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">登录</a>
              <a class="reset_pass" href="#">忘记密码?</a>
            </div>

            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">尚未拥有账号?
                <a class="to_register" href="#signup"> 注册 </a>
              </p>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form method="POST" action="/auth/register">
            <h1>注册</h1>
            <div>
              <input type="text" class="form-control" placeholder="用户名" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="邮箱" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="密码" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">提交</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">已经拥有账号?
                <a class="to_register" href="#signin"> 登录 </a>
              </p>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
@endsection
