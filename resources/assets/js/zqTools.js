define(['jquery'], function($){
	function Zq(){};
	Zq.prototype = {
		isString: function(value) {
			return typeof value === "string";
		},
		isNumber: function(value) {
			return typeof value === "number";
		},
		isArray: Array.isArray,
		isObject: function(value) {
			return value !== null && typeof value ==="object";
		},
		isFunction: function(value) {
			return typeof value === "function";
		},
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

	return new Zq();
});