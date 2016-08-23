<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left">
    <div class="form-group">
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
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">指令</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="select2_group form-control">
          <optgroup label="版本">
            <option value="1.1.0">发送道具</option>
            <option value="1.2.0">1.2.0</option>
          </optgroup>
          <optgroup label="分支">
            <option value="release">release</option>
            <option value="dev">dev</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">区服</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="select2_group form-control">
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
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary">部署</button>
      </div>
    </div>
  </form>
</div>
<!-- End SmartWizard Content -->
