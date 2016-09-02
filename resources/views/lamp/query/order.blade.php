@extends('layouts.master', ['widgets' => ['smart_wizard', 'select2', 'icheck', 'daterangepicker', 'datatable', 'pnotify']])
@section('page-title', $title)
@section('page-content')
@include('widgets.panel', ['title' => $title, 'description' => '', 'content' => 'lamp.query.order_form'])
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
    var num = date.indexOf(' - ');

    var database = {
      date_a: date.slice(0, num),
      date_b: date.slice(num+3)
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
      url: '/jfjh/v1/detail/orders',
      method: 'get',
      data: database
    }).success(function(data) {
      var table = $("#datatable").find("tbody");

      table.empty();
      data = data.replace(/("rid":\s*)(\d*)/g, function(match, grp1, grp2) {
        return grp1 + "\"" + grp2 + "\""
      });
      data = JSON.parse(data).order;

      if(data === null){
         new PNotify({
          title: '查询失败',
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
              + curr.id +
            '</td>\
            <td>'
              + curr.cid +
            '</td>\
            <td>'
              + curr.user +
            '</td>\
            <td>'
              + curr.rid +
            '</td>\
            <td>'
              + curr.lvl +
            '</td>\
            <td>'
              + curr.vip +
            '</td>\
            <td>'
              + curr.totaltime +
            '</td>\
            <td>'
              + curr.price +
            '</td>\
            <td>'
              + curr.idx +
            '</td>\
            <td>'
              + curr.num +
            '</td>\
            <td>'
              + curr.code +
            '</td>\
            <td>'
              + curr.server +
            '</td>\
            <td>'
              + curr.req_time_s.slice(0, curr.req_time_s.indexOf('.')) +
            '</td>\
            <td>'
              + curr.res_time_s +
            '</td>\
          </tr>'));
      }

      $("#datatable").dataTable({
        dom: "Bfrtip",
        buttons: [
          {
            extend: "copy",
            className: "btn-sm"
          },
          {
            extend: "csv",
            className: "btn-sm"
          },
          {
            extend: "excel",
            className: "btn-sm"
          },
          {
            extend: "pdfHtml5",
            className: "btn-sm"
          },
          {
            extend: "print",
            className: "btn-sm"
          },
        ],
        responsive: true
      });

      new PNotify({
          title: '查询成功',
          text: '数据已加载到表格中',
          styling: 'bootstrap3',
          type: 'success'
      });

    });

    $("#cancel").click();
  }

  $('#reservation').daterangepicker({
    startDate: stYear + '-' + stMonth + '-' + stDate,
    endDate: stYear + '-' + stMonth + '-' + stDate,
    maxDate: stYear + '-' + stMonth + '-' + stDate,
    locale: {
      "separator": " - ",
      "format": 'YYYY-MM-DD',
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