<!-- Smart Wizard -->
<div id="package_wizard" class="form_wizard wizard_horizontal">
  <ul class="wizard_steps">
    <li>
      <a href="#step-1">
        <span class="step_no">1</span>
        <span class="step_descr">
          更新
        </span>
      </a>
    </li>
    <li>
      <a href="#step-2">
        <span class="step_no">2</span>
        <span class="step_descr">
          编译
        </span>
      </a>
    </li>
    <li>
      <a href="#step-3">
        <span class="step_no">3</span>
        <span class="step_descr">
          打包
        </span>
      </a>
    </li>
    <li>
      <a href="#step-4">
        <span class="step_no">4</span>
        <span class="step_descr">
          上传
        </span>
      </a>
    </li>
  </ul>
  <div id="step-1">
    <form id="package_form" class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">代码分支</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="branch" class="select2_single form-control">
            <option value="release">发布</option>
            <option value="dev">研发</option>
            <option value="fox">泰文</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">版本</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="version" class="select2_single form-control">
            <option value="1.2.1">1.2.1</option>
            <option value="1.3.0">1.3.0</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">生成号(build)</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="build" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
    </form>
  </div>
  <div id="step-2">
  </div>
  <div id="step-3">
    <h2 class="StepTitle">Step 3 Content</h2>
  </div>
  <div id="step-4">
    <h2 class="StepTitle">Step 4 Content</h2>
  </div>
</div>
<!-- End SmartWizard Content -->
