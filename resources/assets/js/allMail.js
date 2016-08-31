$(document).ready(function() {
	(function() {
		var ele = $('#mailType');
		var type = ele.val();

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
			var box = $('.modal-body');
			box.html('\
				<h5>信息</h5>\
				<div class="clearfix">\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							邮件类型：\
						</strong>\
						<div class="col-md-8">\
							资源发放\
						</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							区服：\
						</strong>\
						<div class="col-md-8">\
							越狱1服(100101)\
						</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							标题：\
						</strong>\
						<div class="col-md-8">\
							不超过20个字符\
						</div>\
					</div>\
					<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
						<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
							内容：\
						</strong>\
						<div class="col-md-8">\
							 暂不支持换行\
						</div>\
					</div>\
				</div>');
			switch(type) {
				case '10000':
					box.append($('\
						<div class="ln_solid"></div>\
						<h5>道具</h5>\
						<div class="clearfix">\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具A：\
								</strong>\
								<div class="col-md-8">\
									 金币(501001)\
								</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具A数量：\
								</strong>\
								<div class="col-md-8">\
									 100000\
								</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具B：\
								</strong>\
								<div class="col-md-8">\
									 钻石(501002)\
								</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具B数量：\
								</strong>\
								<div class="col-md-8">\
									 50000\
								</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具组：\
								</strong>\
								<div class="col-md-8">\
									 钻石(501002)\
								</div>\
							</div>\
							<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">\
								<strong class="text-right col-md-4 col-sm-4 col-xs-12">\
									道具组数量：\
								</strong>\
								<div class="col-md-8">\
									 3000\
								</div>\
							</div>\
						</div>\
						'));
					break;
				case '10001':
					break;
			}
		}

		switchType(type);

		// 确认按钮点击事件
		$('#confirm').on('click', confirmInfo);

		// 邮件类型变动事件
		ele.on('change', switchType);
	}());

});