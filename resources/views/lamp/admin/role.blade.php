@extends('layouts.master', ['widgets' => ['smart_wizard', 'select2', 'icheck']])
@section('page-title', $title)
@section('page-content')
@include('widgets.panel', ['title' => '角色', 'description' => '', 'content' => 'lamp.admin.role_form'])
@endsection
@section('script-custom')
<!-- jQuery Smart Wizard -->
<script>
  $(document).ready(function() {
    $('#package_wizard').smartWizard({onLeaveStep: onPackageStepCallback});
    $('#deploy_wizard').smartWizard();
    $('#merge_wizard').smartWizard();

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');

    function onPackageStepCallback(obj, context) {
      var step_num= obj.attr('rel');
      console.log(step_num);
      if (step_num == 1) {
        $.ajax({
          url: '/maintain/package',
          method: 'POST',
          data: $('#package_form').serialize(),
          dataType: 'json',
          success: function (data) {
            $('#package_wizard').smartWizard('goForward');
          },
          error: function (data) {
            console.log('error');
          }
        });
      }
      return true;
    }

    function onShowStepCallback(obj, context){
      var step_num= obj.attr('rel');
      console.log(step_num);
      if (step_num == 1) {
        return false;
      }

      if (step_num < 4) {
        $.ajax({
          url: '/maintain/deploy',
          method: 'POST',
          success: function (data) {
            $('#deploy_wizard').smartWizard('goForward');
          },
          error: function (data) {
            console.log('error');
          }
        });
      }
      return true;
    }

    function onDeployStepCallback(obj, context){
      var step_num= obj.attr('rel');
      console.log(step_num);
      if (step_num < 4) {
        $.ajax({
          url: '/maintain/deploy',
          method: 'POST',
          success: function (data) {
            //$('#deploy_wizard').smartWizard('goForward');
          },
          error: function (data) {
            console.log('error');
          }
        });
      }
      return true;
      return false;
    }

    function onDeployFinishCallback(objs, context){
      $('form').submit();
    }
  });
</script>
<!-- /jQuery Smart Wizard -->

<!-- mock.js -->
<script src="http://mockjs.com/dist/mock.js"></script>
<!-- /mock -->

<!-- btn query -->
<script>
// mock数据
Mock.mock("http://g.cn", [
      "0",
      " 2016001454403364790",
      "zq.tan",
      "红莲",
      "10001",
      "12",
      "101",
      "82",
      "android",
      "apple6s-plus",
      "1",
      "2016-02-02 16:56:04",
      "2016-03-31 10:37:34",
      "2016-03-31 10:38:40"
  ]);
// !mock数据
$(document).ready(function(){
  $("#query").on("click", function(e){
    console.log()
    // 如果已经查询过
    // 删除创建的查询结果box
    var box = $("#queryResult");
    if(box){
      box.remove();
    }
    // 找到当前按钮的父元素.row
    var row = $(this).closest(".row"),
    // 克隆该元素并添加#queryResult
        panel = row.clone(true).prop("id", "queryResult");
    // 找到.row的父元素
    box = row.parent();
    // 找到.x_content
    // 删除.x_content的子元素
    panel.find(".x_content").empty()
    // 给.x_content添加新的子元素
      .html('\
          <table id="result" class="table table-hover">\
            <thead>\
              <tr>\
                <th>区服</th>\
                <th>ID</th>\
                <th>帐号</th>\
                <th>角色名</th>\
                <th>短ID</th>\
                <th>VIP</th>\
                <th>职业</th>\
                <th>等级</th>\
                <th>渠道</th>\
                <th>上次使用设备</th>\
                <th>删除</th>\
                <th>创建时间</th>\
                <th>上次上线时间</th>\
                <th>上次下线时间</th>\
              </tr>\
            </thead>\
          </table>\
        ');

    // 查询数据ajax
    $.ajax({
      url: "http://10.10.100.233:8000/api/v1/players",
      data: {
        "role": ""
      }
      dataType: "json",
      method: "get"
    }).done(function(data){
      var len = data.length,
          tr = $("<tr></tr>");
          i = 0;
      for(var i = 0;i < len; i++){
        tr.append($("<td></td>").text(data[i]));
      }
      $("#result").append(tr);
    });
    // 找到标题
    // 修改标题
    panel.find(".x_title h2").text("查询结果");
    // 把新建的.row添加至包含元素
    box.append(panel);
  });
});
</script>
<!-- !btn query -->

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select1_single").select2({
      placeholder: "请选择区服（可选）",
      allowClear: true
    });

    $(".select2_single").select2({
      placeholder: "选择操作",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 10,
      placeholder: "选择需要合并的区服(最多 10 个)",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->
@endsection

<!-- 当前页面样式 -->
@section("css-import")
<link rel="stylesheet" href="{{ elixir('css/roleManager.css')}}">
@endsection