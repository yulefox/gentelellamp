define(['jquery', 'zqLib'], function($, zq) {
	function AdminTool() {}
	AdminTool.prototype = {
		generateUrl: function(obj) {
			if(zq.isObject(obj)){
				return "/" + obj.prefix + "/" + obj.api;
			}else{
				throw new Error("AdminTool.generateUrl()的实参不是对象");
			}	
		},
		requestData: function(obj) {
			if (zq.isObject(obj)) {
				var dataObj = {};
            	var i = null;

            	for(i in obj){
                	dataObj[i] = $(obj[i]).val();
            	}
            	return dataObj;
			} else {
				throw new Error("AdminTool.requestData()的实参不是对象");
			}
		}
	};

	return new AdminTool();
});