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
          <optgroup label="越狱">
            @for ($i = 1; $i < 50; $i++)
            <option value={{ 1000 + $i }}>越狱{{ $i }}服 ({{ 1000 + $i }})</option>
            @endfor
          </optgroup>
          <optgroup label="安卓">
            @for ($i = 1; $i < 150; $i++)
            <option value={{ 2000 + $i }}>安卓{{ $i }}服 ({{ 2000 + $i }})</option>
            @endfor
          </optgroup>
          <optgroup label="应用宝">
            @for ($i = 1; $i < 20; $i++)
            <option value={{ 3000 + $i }}>疾风{{ $i }}服 ({{ 3000 + $i }})</option>
            @endfor
          </optgroup>
          <optgroup label="IOS 正版">
            @for ($i = 1; $i < 20; $i++)
            <option value={{ 4000 + $i }}>剑魂{{ $i }}服 ({{ 4000 + $i }})</option>
            @endfor
          </optgroup>
          <optgroup label="内网测试">
            <option value="101">内网|同步 (0101)</option>
            <option value="102">内网|Tuz (0102)</option>
            <option value="103">内网|Fox (0103)</option>
            <option value="104">内网|研发 (0104)</option>
            <option value="105">内网|zyx (0105)</option>
            <option value="106">内网|Lisp (0106)</option>
            <option value="107">内网|角色测试 (0107)</option>
            <option value="201">内网|越狱4.20 (0201)</option>
            <option value="202">内网|安卓4.20 (0202)</option>
          </optgroup>
          <optgroup label="外网测试">
            <option value="115">审核(1.2.2) (0115)</option>
            <option value="116">商务稳定 (0116)</option>
            <option value="117">技术发布 (0117)</option>
            <option value="118">商务海外 (0118)</option>
            <option value="123">海外|泰国 (0123)</option>
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
