
  $(document).ready(function() {
    function concat(obj){
      return "/" + obj.prefix + "/" + obj.api;
    }
    $.ajax({
      url: concat({
        prefix: 'jfjh/v1',
        api: 'apps'
      }),
      method: 'get',
      data: {
        platform: '800',
        type: 'game'
      },
      dataType: 'json'
    }).success(function(data) {
      data = data.app;
      var len = data.length;
      var val = 0;
      var txt = '';
      var curr = null;
      var options = '';
      for(var i = 0; i < len; i++){
        curr = data[i];
        val = curr.idx;
        txt = curr.brief + '(' + val + ')';
        options +='<option value="' + val + '">' + txt + '</option>'
      }

      $('.select1_single').append(options);

      $(".select1_single").select2({
        placeholder: "请选择区服（可选）",
        allowClear: true
      });

    });
  });

  $("#query").on("click", function(e){

    // 取请求data;
    var data = {
      "serve_id": $("#inputSuccess2").val(),
      "role": $("#roleId").val()
    };

    var that = this;

    // 合成请求url
    function concat(obj){
      return "/" + obj.prefix + "/" + obj.api;
    }
    // 查询数据ajax
    $.ajax({
      url: concat({
        prefix: "jfjh/v1",
        api: "players"
      }),
      data: data,
      dataType: "json",
      method: "get"
    }).success(function(data){
      // 如果已经查询过
      // 删除创建的查询结果box
      var box = $("#queryResult");
      if(box){
        box.remove();
      }
      // 找到当前按钮的父元素.row
      var row = $(that).closest(".row");
      // 克隆该元素并添加#queryResult
      var panel = row.clone(true).prop("id", "queryResult");
      // 找到.row的父元素
      box = row.parent();
      // 找到.x_content
      // 删除.x_content的子元素
      panel.find(".x_content").empty()
      // 给.x_content添加新的子元素
        .html('\
            <table id="result" class="table table-striped table-bordered bulk_action dt-responsive nowrap" cellspacing="0" width="100%">\
              <thead>\
              </thead>\
              <tbody>\
              </tbody>\
            </table>');


      data = data["role"] || data['data'];
      var thead = [],
          i = null,
          origin = data[0];
      for(i in origin){
        thead.push(i);
      }
      var len = thead.length;
      var tr = $("<tr id='result_head'></tr>");
      tr.html('\
        <th>\
          <input type="checkbox" id="check-all" class="flat">\
        </th>\
      ');
      for(i = 0; i< len; i++){
        tr.append($('<th></th>').text(thead[i]));
      }
      panel.find("#result thead").append(tr);
      // 找到标题
      // 修改标题
      panel.find(".x_title h2").text("查询结果");

      len = data.length;
      for(i = 0; i< len; i++){
        var currData = data[i];
        var tr = $("<tr></tr>");
        tr.html('\
          <td>\
            <input type="checkbox" class="flat" name="table_records">\
          </td>\
        ');
        for(n in currData){
          var td = $("<td></td>").text(currData[n]);
          tr.append(td);
        }
        panel.find("#result tbody").append(tr);
      }

      // 把新建的.row添加至包含元素
      box.append(panel);

      $("#result").dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
          { orderable: false, targets: [0] }
        ]
      });
      $("#result").on('draw.dt', function() {
        $('input').iCheck({
          checkboxClass: 'icheckbox_flat-green'
        });
      });

      var label = $('<label style="width:200px;"></label>');
      label.html('\
              <select id="options" class="select2_single form-control" name="event" tabindex="-1">\
                <option value="900002">黑白名单(900002)</option>\
                <option value="103001">发送邮件(103001)</option>\
                <option value="200101">添加道具(200101)</option>\
                <option value="600103">修改计数器(600103)</option>\
                <option value="210101">添加任务(210101)</option>\
                <option value="210103">设置任务状态(210103)</option>\
                <option value="900101">重新加载角色(900101)</option>\
                <option value="900202">恢复角色(900202)</option>\
                <option value="900010">清除通天塔数据(900010)</option>\
              </select>');
      $("#result_length").append(label);

      label = $('\
        <button id="confirm" type="button" style="margin-bottom:0;margin-right:0;" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">执行</button>\
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">\
          <div class="modal-dialog modal-lg">\
            <div class="modal-content">\
              <div class="modal-header">\
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>\
                </button>\
                <h4 class="modal-title" id="myModalLabel"></h4>\
              </div>\
              <div class="modal-body">\
              </div>\
              <div class="modal-footer">\
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">取消</button>\
                <button id="done" type="button" class="btn btn-primary">确定</button>\
              </div>\
            </div>\
          </div>\
        </div>');
      $("#result_length").append(label);

      $("#confirm").on("click", function(e){
        var select = $("#options");
        var val = select.val();
        var title = select.find("option[value='" + val + "']").text();
        var body = $(".modal-body");
        var bodyContent = null;

        body.empty();

        $("#myModalLabel").text(title);
        switch(val){
          case "900002":
            bodyContent = $('\
              <h4>请选择操作类型(可多选)</h4>\
              <form class="form-horizontal form-label-left">\
                <div style="width:100%;" class="form-group">\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">特权帐号\
                      <input value="1" name="privilege" type="checkbox" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">调试登陆\
                      <input value="2" name="privilege" type="checkbox" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">开放登录\
                      <input value="3" name="privilege" type="checkbox" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">封停登陆\
                      <input value="4096" name="privilege" type="checkbox" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">禁言账号\
                      <input value="8192" name="privilege" type="checkbox" class="flat">\
                  </label>\
                </div>\
                <h4>请选择操作时间</h4>\
                <div style="width:100%;" class="form-group">\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">永久\
                      <input value="0" name="times" type="radio" class="flat" checked="checked">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">5分钟\
                      <input value="300" name="times" type="radio" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">30分钟\
                      <input value="1800" name="times" type="radio" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">6小时\
                      <input value="21600" name="times" type="radio" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">一天\
                      <input value="86400" name="times" type="radio" class="flat">\
                  </label>\
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">一周\
                      <input value="604800" name="times" type="radio" class="flat">\
                  </label>\
                </div>\
              </form>');
            break;
          case '900003':
            bodyContent = $('\
              <h4>正在开发</h4>\
              <p>...</p>');
            break;
          case '900004':
            bodyContent = $('\
              <h4>正在开发</h4>\
              <p>...</p>');
            break;

        }

        body.append(bodyContent);

        if ($("input.flat")[0]) {
          $(document).ready(function () {
              $('input.flat').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass: 'iradio_flat-green'
              });
          });
        }
        
      });

      // 查询结果 执行/确定 按钮点击事件
      $("#done").on("click", function(e){
        var oid = null;
        // 事件类型
        var event = $("#options").val();
        var body = $(".modal-body");

        // 事件类型分支
        var arg_a_arr = body.find("input[name='privilege']");
        var arg_a = [];
        $(arg_a_arr).each(function(index, ele){
          var curr = $(ele);
          if(curr.prop("checked") === true){
            arg_a.push(curr.val());
          }
        });

        // 操作时间
        var arg_b_arr = body.find("input[name='times']");
        var arg_b = 300;
        $(arg_b_arr).each(function(index, ele){
          var curr = $(ele);
          if(curr.prop("checked") === true){
            arg_b = $(ele).val();
          }
        });

        // 被操作用户SID
        var str_b_arr = $("#result input[name='table_records']");
        var str_b = [];
        var col_num = 0;
        $("#result_head th").each(function(index, ele) {
          var curr = $(ele);
          var txt = curr.text();
          if(txt === 'sid'){
            col_num = curr.index();
            return ;
          }
        });
        $(str_b_arr).each(function(index,ele) {
          var curr = $(ele);
          if(curr.prop("checked") === true){
            str_b.push(curr.closest('tr').find('td').eq(col_num).text());
          }
        });

        var data = {
          oid: oid,
          event: event,
          arg_a: arg_a,
          arg_b: arg_b,
          str_b: str_b
        }

        var select = $("#options");
        var val = select.val();
        var title = select.find("option[value='" + val + "']").text();


        $.ajax({
          url: concat({
            prefix: 'jfjh/v1',
            api: 'gm/trigger_event'
          }),
          method: 'get',
          data: data,
          dataType: 'json'
        }).success(function(data) {
          new PNotify({
            title: title,
            text: '提交成功',
            type: 'success',
            styling: 'bootstrap3'
          });
        }).fail(function(data) {
          new PNotify({
            title: title,
            text: '提交失败',
            type: 'error',
            styling: 'bootstrap3'
          });
        });

        $("#cancel").click();
      });

      $(".select2_single").select2({
        placeholder: "选择操作",
        allowClear: true
      });

      // Table
      (function(){
        $('table input').on('ifChecked', function () {
            checkState = '';
            $(this).parent().parent().parent().addClass('selected');
            countChecked();
        });
        $('table input').on('ifUnchecked', function () {
            checkState = '';
            $(this).parent().parent().parent().removeClass('selected');
            countChecked();
        });

        var checkState = '';

        $('.bulk_action input').on('ifChecked', function () {
            checkState = '';
            $(this).parent().parent().parent().addClass('selected');
            countChecked();
        });
        $('.bulk_action input').on('ifUnchecked', function () {
            checkState = '';
            $(this).parent().parent().parent().removeClass('selected');
            countChecked();
        });
        $('.bulk_action input#check-all').on('ifChecked', function () {
            checkState = 'all';
            countChecked();
        });
        $('.bulk_action input#check-all').on('ifUnchecked', function () {
            checkState = 'none';
            countChecked();
        });

        function countChecked() {
            if (checkState === 'all') {
                $(".bulk_action input[name='table_records']").iCheck('check');
            }
            if (checkState === 'none') {
                $(".bulk_action input[name='table_records']").iCheck('uncheck');
            }

            var checkCount = $(".bulk_action input[name='table_records']:checked").length;

            if (checkCount) {
                $('.column-title').hide();
                $('.bulk-actions').show();
                $('.action-cnt').html(checkCount + ' Records Selected');
            } else {
                $('.column-title').show();
                $('.bulk-actions').hide();
            }
        }

        if ($("input.flat")[0]) {
          $(document).ready(function () {
              $('input.flat').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass: 'iradio_flat-green'
              });
          });
        }
      }());
      // end table
      
    });
  });