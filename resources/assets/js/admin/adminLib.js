define(['jquery', 'zqLib', 'select2'], function($, zq) {

	function AdminTool() {}

	AdminTool.prototype = {
		generateUrl: function(obj) {
			this.assert(zq.isObject(obj), "generateUrl() 的第一个参数不是对象");

			return "/" + obj.prefix + "/" + obj.api;
		},
		requestData: function(obj) {
			this.assert(zq.isObject(obj), "requestData() 的第一个参数不是对象");

			var dataObj = {};
        	var i = null;

        	if(obj.custom) {
        		return ;
        	}

        	for(i in obj){
            	dataObj[i] = $(obj[i]).val();
        	}
        	
            return dataObj;
		},
		assert: function(condition, message) {
			if(!condition){
				throw new Error(message);
			}
		},
		looper: function() {
		},
		sendMsg: function(obj) {
			this.assert(zq.isObject(obj), "sendMsg() 的第一个参数不是对象");
			var config = {
				url: this.generateUrl(obj.url),
				data: this.requestData(obj.data) || obj.data,
				method: obj.method
			};
			return $.ajax(config);
		},
		select2: function(selector, placeholder, isClear) {
			this.assert(zq.isString(selector), "selector2() 的第一个参数不是字符串");
			this.assert(zq.isString(placeholder), "selector2() 的第二个参数不是字符串");
			this.assert(zq.isBoolean(isClear), "selector2() 的第三个参数不是布尔值");
			$(selector).select2({
				placeholder: placeholder,
				allowClear: isClear
			});
		}
	};

	return new AdminTool();
});