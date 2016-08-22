function ajaxSubmit(ajaxUrl,method,value){
// var cont = getValue($(this));
    // alert(ajaxUrl);
    // $.ajax({
    // 	type: method,
    // 	url: ajaxUrl,
    // 	data: value,
    // 	// dataType: 'json',
    // 	// contentType: 'application/json;charset=utf-8',
    // 	success: function (data) {
    // 	    alert(data);
    //     },
    // 	error: function () {
    // 	    alert(0);
    // 	}
    // });
    if (window.ActiveXObject)
    {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if (window.XMLHttpRequest)
    {
        var request=new XMLHttpRequest();

    }
    if (method == 'GET' || method == 'get')
    {
        request.open(method,ajaxUrl+"?"+value,true);
        request.send();
    }
    else
    {
        // xmlHttp.open("POST",url); false
        request.open('POST',ajaxUrl);
        request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        request.send(value);
    }
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status===200){
                // alert(request.responseText);
                // alert(request.responseText);
                var obj=request.responseText;

                // obj=JSON.parse(request.responseText);

                //obj=new Function("return" + obj)();

                // alert(obj.cityname);
                // return obj.cityname;
                //loadData(obj.object,type);
                alert(obj);
            }else{
                alert("失败");

            }
        }
    }


}