<!-- Smart Wizard -->
<div id="deploy_form">
  <form class="form-horizontal form-label-left">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">版本</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        @if (count($versions) > 0)
        <select class="select2_group form-control">
          @foreach ($versions as $plat)
          <optgroup label= {{ $plat->name }}>
            @foreach ($plat->versions as $ver)
            <option value={{ $plat->platform . "_" . $ver->name }}>{{ $ver->name }}</option>
            @endforeach
          </optgroup>
          @endforeach
        </select>
        @else
          <p>尚无版本</p>
        @endif
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
