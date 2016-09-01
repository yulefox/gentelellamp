$(document).ready(function() {
	(function() {
		var ele = $("#evtType");
		var type = ele.val();

		// 生成提交地址
		function concat(obj){
	      return "/" + obj.prefix + "/" + obj.api;
	    }

	    function confirmInfo() {
	    	// 弹窗 body
			var box = $('.modal-body');
			var typeTxt = ele.find('option:checked').text();

			// 区服 select
			var serverEle = $('select[name="server_id"]')
			// 区服
			var txt = serverEle.find('option:checked').text();
			var serverId = serverEle.val();
			// 跑马灯内容
			var arg_a = $("input[name='arg_a']").val();

			var data = {
				event: $("#evtType").val(),
				server_id: serverId,
				str_a: arg_a
			}

			function sendMsg() {
				$.ajax({
					url: concat({
						prefix: 'jfjh/v1',
                    	api: 'gm/trigger_event'
					}),
					method: 'get',
					data: data,
					dataType: 'json'
				}).success(function(data) {
					new PNotify({
						title: typeTxt,
						text: '提交成功',
						type: 'success',
						styling: 'bootstrap3'
					});
                }).fail(function(data) {
					new PNotify({
						title: typeTxt,
						text: '提交失败',
						type: 'error',
						styling: 'bootstrap3'
					});
                });

                $('#cancel').click();
			}

			var sendBtn = $("#done");
			var isReady = sendBtn.hasClass('eventReady');
			// 发送按钮点击事件
			if(!isReady) {
				sendBtn.addClass('eventReady');
				sendBtn.on('click', sendMsg);
			}

			box.html('\
				<div class="clearfix">\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							事件类型：\
						</strong>\
						<div class="col-md-8">'
							+ typeTxt +
						'</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							区服：\
						</strong>\
						<div class="col-md-8">'
							+ txt +
						'</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							跑马灯内容：\
						</strong>\
						<div class="col-md-8">'
							+ arg_a +
						'</div>\
					</div>\
				</div>');
	    }


	    // 确认按钮点击事件
		$('#confirm').on('click', confirmInfo);
	}());
});