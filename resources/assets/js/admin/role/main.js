require.config({
	paths: {
		'jquery': '/vendors/jquery/dist/jquery.min',
		'table': '/vendors/datatable.net/js/jquery.dataTables.min',
		'select2': '/vendors/select2/dist/js/select2.full.min',
		'zqLib': '/js/zqLib',
		'adminLib': '/js/admin/adminLib'
	}
});

require(['loadServers', 'loadTable'], function(sr, tb) {
	$(document).ready(function() {
		sr.init();
		tb.init();
	});
});