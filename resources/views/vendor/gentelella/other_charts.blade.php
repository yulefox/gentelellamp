@extends('layouts.gentelella')
@section('title', 'Gentellela Alela! | ')
@section('brand', 'Gentellela Alela!')
@section('css-import')
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Other Charts</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Other Graph types <small> Assorted graph types</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row">
              <div class="col-md-6" style="padding: 30px">
                <p>USA Vector Map</p>
                <div id="usa_map" style="height:400px !important;"></div>
              </div>
              <div class="col-md-6" style="padding: 30px">
                <p>World Vector Map</p>
                <div id="world-map-gdp" style="height:400px;"></div>
              </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-body">
                  <div class="x_title">
                    <h4>Easy Pie Chart</h4>
                  </div>

                  <p>Easy pie chart is a jQuery plugin that uses the canvas element to render highly customizable, very easy to implement, simple pie charts for single values.</p>
                  <div class="row">
                    <div class="col-xs-4">
                      <span class="chart" data-percent="86">
                        <span class="percent"></span>
                      </span>
                    </div>
                    <div class="col-xs-4">
                      <span class="chart" data-percent="73">
                        <span class="percent"></span>
                      </span>
                    </div>
                    <div class="col-xs-4">
                      <span class="chart" data-percent="60">
                        <span class="percent"></span>
                      </span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="panel panel-body">
                  <div class="x_title">
                    <h4>Sparkline Inline Graphs</h4>
                  </div>

                  <p>Yet another great library for inline data visualizations</p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width:20%"></th>
                        <th style="width:50%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>
                          <span class="sparkline_line" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </th>
                        <td>Line Graph</td>
                      </tr>
                      <tr>
                        <th>
                          <span class="sparkline_area" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </th>
                        <td>Line Area Graph</td>
                      </tr>
                      <tr>
                        <th>
                          <span class="sparkline_bar" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </th>
                        <td>Bar Graph</td>
                      </tr>
                      <tr>
                        <th>
                          <span class="sparkline_pie" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </th>
                        <td>Pie Chart</td>
                      </tr>
                      <tr>
                        <th>
                          <span class="sparkline_discreet" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </th>
                        <td>Discrete chart</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
@section('extend-content')
@endsection
@section('script-import')
<!-- jQuery Sparklines -->
<script src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="/vendors/gentelella/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
<!-- easy-pie-chart -->
<script src="/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
@endsection
@section('script-custom')
<!-- jVectorMap -->
<script src="/vendors/gentelella/js/maps/gdp-data.js"></script>
<script src="/vendors/gentelella/js/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="/vendors/gentelella/js/maps/jquery-jvectormap-us-aea-en.js"></script>
<script>
  $(document).ready(function() {
    $.getJSON('/vendors/gentelella/js/maps/us-unemployment.json', function(data) {
      var val = 2009,
      statesValues = jvm.values.apply({}, jvm.values(data.states)),
      metroPopValues = Array.prototype.concat.apply([], jvm.values(data.metro.population)),
      metroUnemplValues = Array.prototype.concat.apply([], jvm.values(data.metro.unemployment));

      $('#usa_map').vectorMap({
        map: 'us_aea_en',
        markers: data.metro.coords,
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          markers: [{
            attribute: 'fill',
            scale: ['#FEE5D9', '#A50F15'],
            values: data.metro.unemployment[val],
            min: jvm.min(metroUnemplValues),
            max: jvm.max(metroUnemplValues)
          }, {
            attribute: 'r',
            scale: [5, 20],
            values: data.metro.population[val],
            min: jvm.min(metroPopValues),
            max: jvm.max(metroPopValues)
          }],
          regions: [{
            scale: ['#E6F2F0', '#149B7E'],
            attribute: 'fill',
            values: data.states[val],
            min: jvm.min(statesValues),
            max: jvm.max(statesValues)
          }]
        },
        onMarkerTipShow: function(event, label, index) {
          label.html(
            '<b>' + data.metro.names[index] + '</b><br/>' +
            '<b>Population: </b>' + data.metro.population[val][index] + '</br>' +
            '<b>Unemployment rate: </b>' + data.metro.unemployment[val][index] + '%'
            );
        },
        onRegionTipShow: function(event, label, code) {
          label.html(
            '<b>' + label.html() + '</b></br>' +
            '<b>Unemployment rate: </b>' + data.states[val][code] + '%'
            );
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#world-map-gdp').vectorMap({
      map: 'world_mill_en',
      backgroundColor: 'transparent',
      zoomOnScroll: false,
      series: {
        regions: [{
          values: gdpData,
          scale: ['#E6F2F0', '#149B7E'],
          normalizeFunction: 'polynomial'
        }]
      },
      onRegionTipShow: function(e, el, code) {
        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
      }
    });
  });
</script>
<!-- /jVectorMap -->

<!-- easy-pie-chart -->
<script>
  $(document).ready(function() {
    $('.chart').easyPieChart({
      easing: 'easeOutBounce',
      lineWidth: '6',
      barColor: '#75BCDD',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
    var chart = window.chart = $('.chart').data('easyPieChart');
    $('.js_update').on('click', function() {
      chart.update(Math.random() * 200 - 100);
    });

        //hover and retain popover when on popover content
        var originalLeave = $.fn.popover.Constructor.prototype.leave;
        $.fn.popover.Constructor.prototype.leave = function(obj) {
          var self = obj instanceof this.constructor ?
          obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);
          var container, timeout;

          originalLeave.call(this, obj);

          if (obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.popover');
            timeout = self.timeout;
            container.one('mouseenter', function() {
              //We entered the actual popover – call off the dogs
              clearTimeout(timeout);
              //Let's monitor popover content instead
              container.one('mouseleave', function() {
                $.fn.popover.Constructor.prototype.leave.call(self, self);
              });
            });
          }
        };

        $('body').popover({
          selector: '[data-popover]',
          trigger: 'click hover',
          delay: {
            show: 50,
            hide: 400
          }
        });
      });
    </script>
    <!-- easy-pie-chart -->

    <!-- jQuery Sparklines -->
    <script>
      $(document).ready(function() {
        $(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5], {
          type: 'bar',
          colorMap: {
            '7': '#a1a1a1'
          },
          barColor: '#26B99A'
        });

        $(".sparkline_area").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
          type: 'line',
          lineColor: '#26B99A',
          fillColor: '#26B99A',
          spotColor: '#4578a0',
          minSpotColor: '#728fb2',
          maxSpotColor: '#6d93c4',
          highlightSpotColor: '#ef5179',
          highlightLineColor: '#8ba8bf',
          spotRadius: 2.5,
          width: 85
        });

        $(".sparkline_line").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5], {
          type: 'line',
          lineColor: '#26B99A',
          fillColor: '#ffffff',
          width: 85,
          spotColor: '#34495E',
          minSpotColor: '#34495E'
        });

        $(".sparkline_pie").sparkline([1, 1, 2, 1], {
          type: 'pie',
          sliceColors: ['#26B99A', '#ccc', '#75BCDD', '#D66DE2']
        });

        $(".sparkline_discreet").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 2, 4, 3, 7, 8, 9, 7, 6, 4, 3], {
          type: 'discrete',
          barWidth: 3,
          lineColor: '#26B99A',
          width: '85',
        });

      });
    </script>
    <!-- /jQuery Sparklines -->
@endsection
