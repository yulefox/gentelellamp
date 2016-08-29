define(function(require, exports, module){
    var $ = require("jquery");
    var zq = require("./zqTools");

    // 请求数据函数
    function requestData(obj){
        if(zq.isObject(obj)){
            var dataObj = {};
            var i = null;

            for(i in obj){
                dataObj[i] = $(obj[i]).val();
            }

            return dataObj;
            
        }else{
            throw("函数requestData，传入的参数不是对象");
        }
    }

    module.exports = {
        requestData: requestData
    };
});