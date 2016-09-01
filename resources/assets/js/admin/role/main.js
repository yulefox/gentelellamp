require.config({
	baseUrl: '',
	paths: {
		'jquery': '/vendors/jquery/distjquery.min',
		'table': '/vendor/datatable.net/js/jquery.dataTables.min',
	}
});
require('jquery', 'zq', 'table',  function($, zq) {
	$("#query").on('click', function() {});

	function(e) {
		var that  = this;

		function(data) {
			var box = $("#queryResult"),
				row = null,
				panel = null,
				data = data["role"] || data['data'];
			if(box){
				box.remove();
			}
			row = $(that).closest(".row");
			panel = row.clone(true).prop("id", "queryResult");
			box = row.parent();
			panel.find(".x_content").empty()
        		.html('\
	            <table id="result" class="table table-striped table-bordered bulk_action dt-responsive nowrap" cellspacing="0" width="100%">\
	              <thead>\
	              </thead>\
	              <tbody>\
	              </tbody>\
	            </table>');
		}

		$.ajax({
			url: zq.generateUrl({
				prefix: "jfjh/v1",
				api: "players"
			}),
			data: zq.requestData({
				"serve_id": "#inputSuccess2",
				"role": "#roleId"
			}),
			dataType: "json",
			method: "get"
		}).success(function() {});
	}
});