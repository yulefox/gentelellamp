"user strick"

$(document).ready(function() {
	(function() {
		var ele = $('#mailType');
		var type = ele.val();

		// 生成提交地址
		function concat(obj){
	      return "/" + obj.prefix + "/" + obj.api;
	    }

		// 页面加载结束时，根据邮件类型显示或隐藏资源列表
		function switchType() {
			if(this !== window) {
				type = $(this).val();
			}

			switch(type) {
				case '10000':
					$('#item').show();
					break;
				case '10001':
					$('#item').hide();
					break;
			}
		}

		// 确定信息弹窗根据邮件类型显示不同的确认信息
		function confirmInfo() {
			// 弹窗 body
			var box = $('.modal-body');
			var typeTxt = ele.find('option:checked').text();

			// 区服 select
			var serverEle = $('select[name="server_id"]')
			// 区服
			var txt = serverEle.find('option:checked').text();
			var serverId = serverEle.val();
			// 标题
			var title = $('input[name="title"]').val();
			// 内容
			var msg = $('#message').val();
			data = {
				from_name: '系统',
				type: type,
				title: title,
				data: msg,
				expired: 604800,
				server_id: serverId,
			};

			// 道具
			var itemA,
				numA,
				itemB,
				numB,
				itemGrp,
				grpNum,
				data,
				itemBox = $("#item");
			if(type === '10000') {
				itemA = itemBox.find('input[name="item_a"]').val();
				numA = itemBox.find('input[name="num_a"]').val();
				itemB = itemBox.find('input[name="item_b"]').val();
				numB = itemBox.find('input[name="num_b"]').val();
				itemGrp = itemBox.find('input[name="item_grp"]').val();
				grpNum = itemBox.find('input[name="grp_num"]').val();

				data.idx_a = itemA;
				data.num_a = numA;
				data.idx_b = itemB;
				data.num_b = numB;
				data.group_idx = itemGrp;
				data.group_num = grpNum;
			}

			function sendMsg() {
				$.ajax({
					url: concat({
						prefix: 'jfjh/v1',
                    	api: 'gm/add_mail'
					}),
					method: 'get',
					data: data,
					dataType: 'json'
				}).success(function(data) {
					new PNotify({
						title: title,
						text: '提交成功',
						type: 'success',
						styling: 'bootstrap3'
					});
                }).fail(function(data) {
					new PNotify({
						title: title,
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
							邮件类型：\
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
							标题：\
						</strong>\
						<div class="col-md-8">'
							+ title +
						'</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							内容：\
						</strong>\
						<div class="col-md-8">'
							 + msg +
						'</div>\
					</div>\
				</div>');
			switch(type) {
				case '10000':
					box.append($('\
						<div class="ln_solid"></div>\
						<div class="clearfix">\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具A：\
								</strong>\
								<div class="col-md-8">'
									 + itemA +
								'</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具A数量：\
								</strong>\
								<div class="col-md-8">'
									 + numA +
								'</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具B：\
								</strong>\
								<div class="col-md-8">'
									 + itemB +
								'</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具B数量：\
								</strong>\
								<div class="col-md-8">'
									 + numB +
								'</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具组：\
								</strong>\
								<div class="col-md-8">'
									 + itemGrp +
								'</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具组数量：\
								</strong>\
								<div class="col-md-8">'
									 + grpNum +
								'</div>\
							</div>\
						</div>\
						'));
					break;
				case '10001':
					break;
			}
		}

		switchType(type);

		// 邮件类型变动事件
		ele.on('change', switchType);

		// 确认按钮点击事件
		$('#confirm').on('click', confirmInfo);
	}());

});