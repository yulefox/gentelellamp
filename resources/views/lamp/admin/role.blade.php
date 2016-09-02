@extends('layouts.master', ['widgets' => ['smart_wizard', 'select2', 'icheck', 'datatable', 'pnotify']])
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

<!-- Select2 -->
<script>
  $(document).ready(function() {

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
<!-- 本页面外部脚本 -->
@section('script-import');
<!-- btn query -->
<script src="/js/btnQuery.js"></script>
<!-- <script src="/vendors/requirejs/require.min.js" data-main="/js/admin/role/main"></script> -->
@endsection
<!-- 当前页面样式 -->
@section("css-import")
<link rel="stylesheet" href="{{ elixir('css/roleManager.css')}}">
@endsection