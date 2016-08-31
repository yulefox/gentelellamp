<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left" method="POST" action="{{ url('/admin/mail') }}">
<!--     <div class="form-group">
      <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12" role="tabpanel" data-example-id="togglable-tabs" style="height: 160px">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> 单人</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">多人</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">全服(过滤)</a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="single-tab">
            <input type="text" class="form-control" name="role" placeholder="请输入角色 ID">
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="multiple-tab">
            <textarea id="message" required="required" class="form-control" name="roles" data-parsley-trigger="keyup" data-parsley-minlength="30" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
            data-parsley-validation-threshold="10" placeholder="多个角色 ID 用 , 分割开"></textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="filter-tab">
          </div>
        </div>
      </div>
    </div> -->
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">邮件类型</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="mailType" class="select2_group form-control" name="type">
          <option value="10000">资源发放</option>
          <option value="10001">系统公告</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">区服</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="select2_group form-control" name="server_id">
          <optgroup label="越狱">
            @for ($i = 1; $i < 50; $i++)
            <option value={{ (1000 + $i) * 100 + 1 }}>越狱{{ $i }}服 ({{ (1000 + $i) * 100 + 1 }})</option>
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
            <option value="10101">内网|同步 (0101)</option>
            <option value="10201">内网|Tuz (0102)</option>
            <option value="10301">内网|Fox (0103)</option>
            <option value="10401">内网|研发 (0104)</option>
            <option value="10501">内网|zyx (0105)</option>
            <option value="10601">内网|Lisp (0106)</option>
            <option value="10701">内网|角色测试 (0107)</option>
            <option value="20101">内网|越狱4.20 (0201)</option>
            <option value="20201">内网|安卓4.20 (0202)</option>
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
      <label class="control-label col-md-3 col-sm-3 col-xs-12">标题</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" class="form-control" name="title" placeholder="不超过20个字符">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">内容</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="message" required="required" class="form-control" name="data" data-parsley-trigger="keyup" data-parsley-minlength="30" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
        data-parsley-validation-threshold="10" placeholder="暂不支持换行 :-("></textarea>
      </div>
    </div>
    <div class="ln_solid"></div>
    <div id="item">
      <div class="form-group">
        <div class="col-md-offset-3 col-md-4 col-sm-4 col-xs-12">
          <input type="text" class="form-control" placeholder="道具 A 编码" name="item_a">
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
          <input type="text" class="form-control" name="num_a" id="inputSuccess3" placeholder="道具 A 数量">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-3 col-md-4 col-sm-4 col-xs-12">
          <input type="text" class="form-control" placeholder="道具 B 编码" name="item_b">
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
          <input type="text" class="form-control" name="num_b" id="inputSuccess3" placeholder="道具 B 数量">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-3 col-md-4 col-sm-4 col-xs-12">
          <input type="text" class="form-control" placeholder="道具组编码" name="item_grp">
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
          <input type="text" class="form-control" name="grp_num" id="inputSuccess3" placeholder="道具组数量">
        </div>
      </div>
      <div class="ln_solid"></div>
    </div>
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
