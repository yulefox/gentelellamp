<form class="form-horizontal">
  <div class="control-group">
    <div class="controls">
      <div class="input-prepend input-group">
        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
        <input style="width: 200px" name="reservation" id="reservation" class="form-control" readonly type="text">
        <button id="query" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">查询</button>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">筛选</h4>
              </div>
              <div class="modal-body clearfix">
                <div class="clearfix">
                  <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12">
                    <select name="server_id" class='select2_single form-control'>
                      <option value="-1">服务器</option>
                      <option value="800101">泰服</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="clearfix">
                  <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12">
                    <select name="platform" class='select2_single form-control'> 
                      <option value="-1">平台</option>
                      <option value="800">泰文</option>
                      <option value="100">越狱</option>
                      <option value="200">安卓</option>
                      <option value="400">IOS正版</option>
                      <option value="600">BT</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="clearfix">
                  <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12">
                    <select name="channel" class='select2_single form-control'>
                      <option value="-1">渠道</option>
                      <option value="facebook">脸书</option>
                      <option value="tsixi">千行</option>
                      <option value="zq">至趣</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button id="done" type="button" class="btn btn-primary">发送</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="ln_solid"></div>
<table class='table table-striped table-bordered dataTable no-footer' id='datatable'>
  <thead>
    <tr>
      <th>日期</th>
      <th>注册人数</th>
      <th>活跃人数</th>
      <th>付费账户</th>
      <th>付费率</th>
      <th>收入</th>
      <th>次日留存</th>
      <th>3日留存</th>
      <th>4日留存</th>
      <th>5日留存</th>
      <th>6日留存</th>
      <th>7日留存</th>
      <th>14日留存</th>
      <th>30日留存</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>