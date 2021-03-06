
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
      method: "get"
    }).success(function(data){
      data = data.replace(/("id":\s*)(\d*)/g, function(match, grp1, grp2) {
        return grp1 + "\"" + grp2 + "\""
      });
      data = JSON.parse(data);
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
        ],
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
      $("#result_filter").before(label);

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
      $("#result_filter").before(label);

      $("#confirm").on("click", function(e){
        // 没选中角色气泡提示
        var checkedRoles = $("#result input[name='table_records']:checked");
        if(!checkedRoles.length){
          new PNotify({
                title: '警告',
                text: '请勾选待操作的角色',
                styling: 'bootstrap3'
              });
          return false;
        }

        alert

        var select = $("#options");
        var val = select.val();
        var title = select.find("option[value='" + val + "']").text();
        var body = $(".modal-body");
        var bodyContent = null;

        body.empty();

        $("#done").off('click');

        $("#myModalLabel").text(title);

        switch(val){
          case "900002":
            bodyContent = $('\
              <h4>操作类型(可多选)</h4>\
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
                <div class="ln_solid"></div>\
                <h4>操作时间</h4>\
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
            // 查询结果 执行/确定 按钮点击事件
            $("#done").on("click", function(e){
              var oid = null;
              // 事件类型
              var event = $("#options").val();
              var body = $(".modal-body");

              // 事件类型分支
              var arg_a_arr = body.find("input[name='privilege']");
              var arg_a = 0;
              $(arg_a_arr).each(function(index, ele){
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  arg_a += parseInt(curr.val());
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

              // 被操作用户user
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'user'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              var data = {
                oid: oid,
                event: event,
                arg_a: arg_a,
                arg_b: arg_b,
                str_b: '',
                server_id: ''
              }

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();

              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];
                $.ajax({
                  url: concat({
                    prefix: 'jfjh/v1',
                    api: 'gm/add_namelist'
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
              }



              $("#cancel").click();
            });
            break;
          case '103001':
            bodyContent = $('\
              <h4>发送邮件</h4>\
              <form id="sendMail" class="form-horizontal form-label-left">\
                  <div class="form-group">\
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">邮件类型</label>\
                    <div class="col-md-6 col-sm-6 col-xs-12">\
                      <select id="mailType" class="select2_group form-control" name="type">\
                        <option value="10000">资源发放</option>\
                        <option value="10001">系统公告</option>\
                      </select>\
                    </div>\
                  </div>\
                  <div class="form-group">\
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">标题</label>\
                    <div class="col-md-6 col-sm-6 col-xs-12">\
                      <input id="mailTitle" type="text" class="form-control" name="title" placeholder="不超过20个字符">\
                    </div>\
                  </div>\
                  <div class="form-group">\
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">内容</label>\
                    <div class="col-md-6 col-sm-6 col-xs-12">\
                      <textarea id="mailMessage" required="required" class="form-control" name="data" data-parsley-trigger="keyup" data-parsley-minlength="30" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."\
                      data-parsley-validation-threshold="10" placeholder="暂不支持换行 :-("></textarea>\
                    </div>\
                  </div>\
                  <div class="ln_solid"></div>\
                  <div class="form-group">\
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12">\
                      <input name="item_a" class="form-control" type="text" placeholder="道具 A 的编码" />\
                    </div>\
                    <div class="col-md-2 col-sm-2 col-xs-12">\
                      <input type="text" class="form-control" name="num_a" id="inputSuccess3" placeholder="道具 A 数量">\
                    </div>\
                  </div>\
                  <div class="form-group">\
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12">\
                      <input name="item_b" class="form-control" type="text" placeholder="道具 B 的编码" />\
                    </div>\
                    <div class="col-md-2 col-sm-2 col-xs-12">\
                      <input type="text" class="form-control" name="num_b" id="inputSuccess3" placeholder="道具 B 数量">\
                    </div>\
                  </div>\
                  <div class="form-group">\
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12">\
                      <input name="item_group" class="form-control" type="text" placeholder="道具组的编码" />\
                    </div>\
                    <div class="col-md-2 col-sm-2 col-xs-12">\
                      <input type="text" class="form-control" name="grp_num" id="inputSuccess3" placeholder="道具组数量">\
                    </div>\
                  </div>\
              </form>');

            $("#done").on('click', function(e) {
              var oid = null;
              // 事件类型
              var event = $("#options").val();


              // 被操作用户name
              var to_name_arr = $("#result input[name='table_records']");
              var to_name = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(to_name_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  to_name.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              // 邮件类型
              var mailType = $("#mailType").val();

              // 邮件标题
              var mailTitle = $("#mailTitle").val();

              // 邮件信息
              var mailMessage = $("#mailMessage").val();

              // 道具A
              var idx_a = $("input[name='item_a']").val();
              var num_a = $("input[name='num_a']").val();

              // 道具B
              var idx_b = $("input[name='item_b']").val();
              var num_b = $("input[name='num_b']").val();

              // 道具组
              var group_idx = $("input[name='item_group']").val();
              var group_num = $("input[name='grp_num']").val();

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();

              var data = {
                oid: null,
                from_name: "SYSTEM",
                to_name: '',
                type: mailType,
                title: mailTitle,
                data: mailMessage,
                expired: 604800,
                idx_a: idx_a,
                num_a: num_a,
                idx_b: idx_b,
                num_b: num_b,
                group_idx: group_idx,
                group_num: group_num,
                server_id: ''
              };

              var len = to_name.length;

              for(var i = 0; i< len; i++){
                data.to_name = to_name[i];
                data.server_id = server_id[i];

                $.ajax({
                  url: concat({
                    prefix: 'jfjh/v1',
                    api: 'gm/add_mail'
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

              }

              $("#cancel").click();
            });

            break;
          case '200101':
            bodyContent = $('\
              <h4>添加道具</h4>\
              <form id="addItem" class="form-horizontal">\
                <div class="col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12">\
                  <input placeholder="道具名称" class="form-control" type="text" name="item_id" />\
                </div>\
                <div class="col-md-2 col-sm-2 col-xs-12">\
                  <input placeholder="道具数量" class="form-control" type="text" name="item_num" />\
                </div>\
              </form>');


            $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              // 道具ID
              var arg_a = $("input[name='item_id']").val();

              // 道具数量
              var arg_b = $("input[name='item_num']").val();

              var data = {
                event: event,
                arg_a: arg_a,
                arg_b: arg_b,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });


            break;
          case '600103':
            bodyContent = $('\
              <h4>修改计数器</h4>\
              <form id="addCounter" class="form-horizontal">\
                <div class="col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12">\
                  <input placeholder="计数器名称" class="form-control" type="text" name="counter_id" />\
                </div>\
                <div class="col-md-2 col-sm-2 col-xs-12">\
                  <input placeholder="计数器数值" class="form-control" type="text" name="counter_num" />\
                </div>\
              </form>');

            $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              // 修改器ID
              var arg_a = $("input[name='counter_id']").val();

              // 计数器数值
              var arg_b = $("input[name='counter_num']").val();

              var data = {
                event: event,
                arg_a: arg_a,
                arg_b: arg_b,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });

            break;

          case '210101':
            bodyContent = $('\
              <h4>添加任务</h4>\
              <form id="addTask" class="form-horizontal">\
                <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12">\
                  <input placeholder="任务名称" class="form-control" type="text" name="task_id" />\
                </div>\
              </form>');

            $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              // 任务ID
              var arg_a = $("input[name='task_id']").val();

              var data = {
                event: event,
                arg_a: arg_a,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });

            break;

          case '210103':
            bodyContent = $('\
              <h4>设置任务状态</h4>\
              <form id="setStatus" class="form-horizontal">\
                <div class="col-md-offset-1 col-sm-offset-1 col-md-4 col-sm-4 col-xs-12">\
                  <input placeholder="任务名称" class="form-control" type="text" name="task_id" />\
                </div>\
                <div class="col-md-4 col-sm-4 col-xs-12">\
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">已接\
                      <input value="2" name="task_status" type="radio" class="flat" checked="checked">\
                  </label>\
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">成功\
                      <input value="3" name="task_status" type="radio" class="flat">\
                  </label>\
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">完成\
                      <input value="5" name="task_status" type="radio" class="flat">\
                  </label>\
                </div>\
              </form>');

            $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();


              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              // 任务ID
              var arg_a = $("input[name='task_id']").val();

              // 任务状态
              var arg_b = $("input[name='task_status']:checked").val();

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();

              var data = {
                event: event,
                str_b: '',
                server_id: '',
                arg_a: arg_a,
                arg_b: arg_b,
              };

              var len = str_b.length;

              for(var i = 0; i< len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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

              }

              $("#cancel").click();
            });

            break;

          case '900101':
            bodyContent = $('\
              <h4>重新加载角色</h4>\
              <p>重新加载角色</p>');

                        $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              var data = {
                event: event,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });

            break;

          case '900202':
            bodyContent = $('\
              <h4>恢复角色</h4>\
              <p>恢复角色</p>');

                        $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              var data = {
                event: event,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });

            break;

          case '900010':
            bodyContent = $('\
              <h4>清除通天塔数据</h4>\
              <p>清除通天塔数据</p>');

                        $("#done").on('click', function(e) {
              // 事件类型
              var event = $("#options").val();

              // 被操作用户name
              var str_b_arr = $("#result input[name='table_records']");
              var str_b = [];
              var col_user = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'name'){
                  col_user = curr.index();
                  return ;
                }
              });
              $(str_b_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  str_b.push(curr.closest('tr').find('td').eq(col_user).text());
                }
              });

              //被操作用户的server_id
              var server_id_arr = $("#result input[name='table_records']");
              var server_id = [];
              var col_server_id = 0;
              $("#result_head th").each(function(index, ele) {
                var curr = $(ele);
                var txt = curr.text();
                if(txt === 'server_id'){
                  col_server_id = curr.index();
                  return ;
                }
              });
              $(server_id_arr).each(function(index,ele) {
                var curr = $(ele);
                if(curr.prop("checked") === true){
                  server_id.push(curr.closest('tr').find('td').eq(col_server_id).text());
                }
              });

              var data = {
                event: event,
                str_b: '',
                server_id: ''
              };

              var select = $("#options");
              var val = select.val();
              var title = select.find("option[value='" + val + "']").text();
              var len = str_b.length;

              for(var i = 0; i < len; i++){
                data.str_b = str_b[i];
                data.server_id = server_id[i];

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
              }

              $("#cancel").click();
            });

            break;

        }

        body.append(bodyContent);

        if($("select[name='type']")){
          $("select[name='type']").select2({
            placeholder: "资源发放",
            allowClear: true
          });
        }

        if ($("input.flat")[0]) {
          $(document).ready(function () {
              $('input.flat').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass: 'iradio_flat-green'
              });
          });
        }
        
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