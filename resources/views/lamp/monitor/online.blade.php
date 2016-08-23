@extends('layouts.master', ['widgets' => ['smart_wizard', 'select2']])
@section('page-title', $title)
@section('page-content')
@include('widgets.panel', ['title' => $title, 'content' => 'lamp.monitor.online_chart'])
@endsection
@section('script-custom')
<!-- jQuery Smart Wizard -->
<script>
  $(document).ready(function() {
    $('#deploy_wizard').smartWizard({onShowStep: onShowStepCallback, onLeaveStep:onDeployStepCallback, onFinishStep:onDeployFinishCallback});
    $('#merge_wizard').smartWizard({onLeaveStep:onDeployStepCallback, onFinishStep:onDeployFinishCallback});

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');

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
      return false;
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
    $(".select2_single").select2({
      placeholder: "选择合并后的区服",
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
