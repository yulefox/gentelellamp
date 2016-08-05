<!-- Smart Wizard -->
<div id="merge_wizard" class="form_wizard wizard_horizontal">
  <ul class="wizard_steps">
    <li>
      <a href="#step-1">
        <span class="step_no">1</span>
        <span class="step_descr">
          选服
        </span>
      </a>
    </li>
    <li>
      <a href="#step-2">
        <span class="step_no">2</span>
        <span class="step_descr">
          清档
        </span>
      </a>
    </li>
    <li>
      <a href="#step-3">
        <span class="step_no">3</span>
        <span class="step_descr">
          合服
        </span>
      </a>
    </li>
  </ul>
  <div id="step-1">
    <form class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">当前服务器 <span class="required">*</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_multiple form-control" multiple="multiple">
            <option value="101">内网｜发布</option>
            <option value="104">内网｜研发</option>
            <option value="201">内网｜越狱</option>
            <option value="202">内网｜安卓</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">合并到 <span class="required">*</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1">
            <option value="101">内网｜发布</option>
            <option value="104">内网｜研发</option>
            <option value="201">内网｜越狱</option>
            <option value="202">内网｜安卓</option>
          </select>
        </div>
      </div>
    </form>
  </div>
  <div id="step-2">
  </div>
  <div id="step-3">
  </div>
</div>
<!-- End SmartWizard Content -->
