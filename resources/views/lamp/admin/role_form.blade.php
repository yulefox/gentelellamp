<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left">
    <div class="form-group">
      <div class="col-md-offset-3 col-sm-offset-3 col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" id="inputSuccess2" placeholder="角色 ID">
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12">
        <select class="select2_single form-control" tabindex="-1">
          <option value="1">强制下线</option>
          <option value="2">封停账号</option>
          <option value="3">角色禁言</option>
          <option value="4">角色改名</option>
          <option value="5">角色恢复</option>
          <option value="6">修改邮箱</option>
          <option value="7">设置特权</option>
          <option value="8">重置密码</option>
          <option value="9">重置安全锁</option>
        </select>
      </div>
      <div>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="single-tab">
            <input type="text" class="form-control" placeholder="请输入角色 ID">
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="multiple-tab">
            <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="30" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
            data-parsley-validation-threshold="10" placeholder="多个角色 ID 用 , 分割开"></textarea>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="filter-tab">
          </div>
        </div>
      </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary">执行</button>
      </div>
    </div>
  </form>
</div>
<!-- End SmartWizard Content -->
