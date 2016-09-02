@extends('layouts.master', ['widgets' => ['smart_wizard', 'select2', 'icheck', 'daterangepicker', 'datatable', 'pnotify']])
@section('page-title', $title)
@section('page-content')
@include('widgets.panel', ['title' => '基础数据', 'description' => '', 'content' => 'lamp.stat.summary_form'])
@endsection
@section('script-custom')
<!-- jQuery Smart Wizard -->
<script>
  var st = new Date();
  var stYear = st.getFullYear();
  var stMonth = st.getMonth() + 1;
  var stDate = st.getDate();

  var ed = new Date(Number(st) - 604800000);
  var edYear = ed.getFullYear();
  var edMonth = ed.getMonth() + 1;
  var edDate = ed.getDate();



  function sendMsg() {
    var date = $("#reservation").val();
    var num = date.indexOf('-');

    var database = {
      date_a: date.slice(0, num-1).replace(/\//g, '-'),
      date_b: date.slice(num+2).replace(/\//g, '-')
    };
    
    var serverId = $("select[name='server_id']").val();
    var platform = $("select[name='platform']").val();
    var channel = $("select[name='channel']").val();

    if(serverId !== '-1'){
      database.server_id = serverId;
    }
    if(platform !== '-1'){
      database.platform = platform;
    }
    if(channel !== '-1'){
      database.channel = channel;
    }


    $.ajax({
      url: '/jfjh/v1/stat/retention',
      method: 'get',
      data: database,  
      dataType: 'json'
    }).success(function(data) {
      var table = $("#datatable").find("tbody");

      table.empty();

      data = data.stat;

      if(data === null){
         new PNotify({
          title: '警告',
          text: '当前时间范围内没有数据',
          styling: 'bootstrap3'
        });

        return ;
      }

      var len = data.length;
      var i,
          curr = null,
          retain = null;
      for(i = 0; i < len; i++) {
        curr = data[i];
        retain = curr.retain;
        table.append($('\
          <tr>\
            <td>'
              + curr.date +
            '</td>\
            <td>'
              + curr.reg +
            '</td>\
            <td>'
              + curr.act +
            '</td>\
            <td>\
            </td>\
            <td>\
            </td>\
            <td>\
            </td>\
            <td>'
              + (retain[1] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[1] + ')' +
            '</td>\
            <td>'
              + (retain[2] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[2] + ')' +
            '</td>\
            <td>'
              + (retain[3] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[3] + ')' +
            '</td>\
            <td>'
              + (retain[4] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[4] + ')' +
            '</td>\
            <td>'
              + (retain[5] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[5] + ')' +
            '</td>\
            <td>'
              + (retain[6] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[6] + ')' +
            '</td>\
            <td>'
              + (retain[13] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[13] + ')' +
            '</td>\
            <td>'
              + (retain[29] / curr.reg * 100).toFixed(2) + '%' + ' (' + retain[29] + ')' +
            '</td>\
          </tr>'));
      }

      $("#datatable").dataTable();

    });

    $("#cancel").click();
  }

  $('#reservation').daterangepicker({
    startDate: edYear + '/' + edMonth + '/' + edDate,
    endDate: stYear + '/' + stMonth + '/' + stDate,
    maxDate: stYear + '/' + stMonth + '/' + stDate,
    locale: {
      "format": 'YYYY/MM/DD',
      "daysOfWeek": ["日", "一", "二", "三", "四", "五", "六"],
      "monthNames": ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
      "firstDay": 1,
      "applyLabel": "确定",
      "cancelLabel": "取消",
    }
  }, function(start, end, label) {
  });

  sendMsg();


  $(".select2_single").select2({
    placeholder: "所有",
    allowClear: true
  });

  $("#done").on('click', sendMsg);




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

<!-- custrom Css -->
@section('css-import')
<link rel="stylesheet" href="{{ elixir('css/summary.css')}}">
@endsection