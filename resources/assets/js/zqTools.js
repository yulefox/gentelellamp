define(['jquery'], function($){
	function Zq() {}
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
		}
	};

	return new Zq();
});