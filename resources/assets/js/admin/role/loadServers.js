define(['jquery', 'zqLib', 'adminLib'], function($, zq, ad) {

	var obj = {
		init: function() {
			ad.sendMsg({
				url: {
					prefix: 'jfjh/v1',
					api: 'apps'
				},
				data: {
					custom: true,
					platform: '800',
					type: 'game'
				},
				method: 'get'
			})
			.success(this.success);
		},
		success: function(data) {
			data = JSON.parse(data).app;

			var len = data.length,
				options = txt = '',
				val = 0,
				i = 0;
				curr = null;

			for(i = 0; i < len; i++){
				curr = data[i];
				val = curr.idx;
				txt = curr.brief + '(' + val + ')';
				options +='<option value="' + val + '">' + txt + '</option>'
			}

			$('#inputSuccess2').append(options);

			ad.select2('.select1_single', '选择区服(可选)', true);
		},
		fail: null
	};

	return obj;
});