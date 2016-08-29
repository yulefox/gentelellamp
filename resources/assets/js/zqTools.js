define(function(require, exports, module){
	function Zq(){};
	Zq.prototype = {
		isString: function(value){
			return typeof value === "string";
		},
		isNumber: function(value){
			return typeof value === "number";
		},
		isArray: Array.isArray,
		isObject: function(value){
			return value !== null && typeof value ==="object";
		},
		isFunction: function(value){
			return typeof value === "function";
		},
		generateUrl: function(obj){
			if(this.isObject(obj)){
				return "/" + obj.prefix + "/" + obj.api;
			}else{
				throw("函数generateUrl传入的参数不是对象");
			}
		}
	};

	var zq = new Zq();

	module.exports = zq;
});