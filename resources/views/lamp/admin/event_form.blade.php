<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left" method="POST" action="{{ url('/admin/event') }}">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">事件类型</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="evtType" class="select2_group form-control" name="event">
          <option value="900003">跑马灯公告</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">区服</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="select2_group form-control" name="server_id">
          <optgroup label="泰文">
            @for ($i = 1; $i < 2; $i++)
            <option value={{ (8000 + $i) * 100 + 1 }}>泰文{{ $i }}服 ({{ (8000 + $i) * 100 + 1 }})</option>
            @endfor
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">跑马灯内容</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" class="form-control" name="arg_a" placeholder="任务/道具/计数器的索引号">
      </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button id="confirm" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">确认</button>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">信息确认</h4>
              </div>
              <div class="modal-body">
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
  </form>
</div>
<!-- End SmartWizard Content -->
