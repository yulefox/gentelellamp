<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">角色</a>
      </li>
<!--       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">邮件</a>
      </li>
      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">事件</a>
      </li> -->
    </ul>
  <div class="col-sm-offset-3 col-md-offset-3 col-sm-6 col-md-6 col-xs-12">
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        <!-- Smart Wizard -->
        <div id="deploy_form">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <select type="text" class="select1_single form-control" id="inputSuccess2">
              </select>
            </div>
            <div class="form-group">
              <input id="shortId" type="text" class="form-control" placeholder="角色短ID(推荐)" style="display:none;">
            </div>
            <div class="form-group">
              <input id="roleId" type="text" class="form-control" placeholder="角色名|账号名|短ID|长ID">
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <button id="query" type="button" class="btn btn-primary">执行</button>
            </div>
          </form>
        </div>
      <!-- End SmartWizard Content -->
      </div>
<!--       <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
          booth letterpress, commodo enim craft beer mlkshk aliquip</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
          booth letterpress, commodo enim craft beer mlkshk </p>
      </div> -->
    </div>
  </div>
</div>
