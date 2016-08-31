define(['jquery'], function() {
	function RoleTool() {}
	RoleTool.prototype = {
		generateUrl: function(obj) {
			if(this.isObject(obj)){
				return "/" + obj.prefix + "/" + obj.api;
			}else{
				throw("函数generateUrl的实参不是对象");
			}	
		},
		requestData: function(obj) {
			if (this.isObject(obj)) {
				var dataObj = {};
            	var i = null;

            	for(i in obj){
                	dataObj[i] = $(obj[i]).val();
            	}
            	return dataObj;
			} else {
				throw("函数requestData的实参不是对象");
			}
		}
	};
});