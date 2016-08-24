<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left">
    <div class="form-group">
      <div class="col-sm-offset-3 col-md-offset-3 col-sm-6 col-md-6 col-xs-12">
        <select type="text" class="select1_single form-control" id="inputSuccess2">
          <optgroup label="越狱">
            <option value="1">越狱1服（100101）</option>
            <option value="2">越狱2服（100201）</option>
            <option value="3">越狱3服（100301）</option>
            <option value="4">越狱4服（100401）</option>
            <option value="5">越狱5服（100501）</option>
            <option value="6">越狱6服（100601）</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-md-offset-3 col-sm-6 col-md-6 col-xs-12">
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="single-tab">
            <input type="text" class="form-control" placeholder="角色名|账号名|短ID|长ID">
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
    <div class="form-group">
      <div class="col-sm-offset-3 col-md-offset-3 col-sm-6 col-md-6 col-xs-12">
        <select id="options" class="select2_single form-control" tabindex="-1">
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
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-md-offset-3 col-sm-6 col-md-6 col-xs-12">
        <button id="query" type="submit" class="btn btn-primary">执行</button>
      </div>
    </div>
  </form>
</div>
<!-- End SmartWizard Content -->
