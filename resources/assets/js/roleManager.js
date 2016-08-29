define(function(require, exports, moudle){
	var $ = require("jquery");
	var obj = require("./dataQuery");
	var zq = require("./zqTools");

	// 页面上，需要通过 ajax 发送的数据
	// 参数为一个对象 属性为数据的字段，值为页面上元素对应的 selector
	var data = obj.requestData({
		"serve_id": "#inputSuccess2",
		"short_id": "#shortId",
		"role": "#roleId"
	});

	// 生成发送数据的地址
	// 参数为一个对象 prefix为前缀，api为后台的接口
	var url = zq.generateUrl({
		prefix: "jfjh/v1",
		api: "players"
	});

	$("#query").on("click", function(){
		var that = this;
		
		$.ajax({
			data: data,
			url: url,
			dataType: "json",
			method: "get"
		}).success(right);

		function right(data){
			var box = $("#queryResult");
			// 找到#queryResult，如果存在就删除
		    if(box){
		      box.remove();
		    }
		    // 找到当前按钮的父元素.row
		    var row = $(that).closest(".row"),
		    // 克隆该元素并添加#queryResult
		    panel = row.clone(true).prop("id", "queryResult");
		    // 找到.row的父元素	
		    box = row.parent();
		    // 找到.x_content
		    // 删除.x_content的子元素
		    panel.find(".x_content").empty()
		    // 给.x_content添加新的子元素
		    .html('\
				<table id="result" class="table table-striped table-bordered bulk_action">\
					<thead>\
					</thead>\
					<tbody>\
					</tbody>\
				</table>');

			data = data["data"];
			var thead = [],
				i = null,
				origin = data[0];

			for(i in origin){
				thead.push(i);
			}

			var len = thead.length;
			var tr = $("<tr></tr>");

			for(i = 0; i< len; i++){
				tr.append($('<th></th>').text(thead[i]));
			}

			panel.find("#result thead").append(tr);
			// 找到标题
			// 修改标题
			panel.find(".x_title h2").text("查询结果");

			len = data.length;
			for(i = 0; i< len; i++){
				var currData = data[i];
				var tr = $("<tr></tr>");

				for(n in currData){
					var td = $("<td></td>").text(currData[n]);
					tr.append(td);
				}
				panel.find("#result tbody").append(tr);
			}

		    box.append(panel);

		}

	});
});