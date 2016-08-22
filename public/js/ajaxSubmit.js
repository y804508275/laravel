

function ajaxSubmit(ajaxUrl,method,value,type){
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

            	obj=new Function("return" + obj)();
				
            	// alert(obj.cityname);
            	// return obj.cityname;
            	loadData(obj.object,type);
            	
            }else{
                alert("失败");
                
            }
        }
  	}


}
function loadData(ob,type)
{
	switch (type)
	{
		case "addCustomerData":
			addCustomerData(ob.clientId,ob.clientName,ob.addTime,ob.clientType,ob.phoneNumber,ob.telephoneNumber);
			break;
		case "fixCustomerData":
			fixCustomerData(ob.clientId,ob.clientName,ob.addTime,ob.clientType,ob.phoneNumber,ob.telephoneNumber); 
			break;
		case "showInfo":
			showCustomerInfo(ob.clientId,ob.clientName,ob.idCard,ob.addTime,ob.clientType,ob.workPlace,ob.phoneNumber,ob.telephoneNumber,ob.email,ob.contact,ob.postCode,ob.address);
			break;
		case "showEditInfo":
			showEditInfo(ob.clientId,ob.clientName,ob.idCard,ob.addTime,ob.clientType,ob.workPlace,ob.phoneNumber,ob.telephoneNumber,ob.email,ob.contact,ob.postCode,ob.address);
			break;
		case "editFixData":
			editFixData(ob.repairId,ob.checkTime,ob.repairMan);
			break;showAdminInfo
		case "showAdminInfo":
			showAdminInfo(ob.repairId,ob.checkTime,ob.repairMan,ob.repairStatus,ob.usedDevice,ob.workLoad,ob.repairNote,ob.checkNote);
			break;
		case "login":

			break;
			
		case "reportAddInfo":
			reportAddInfo(ob.repairId,ob.clientId,ob.productType,ob.faultType);
			break;
		case "reportFixInfo":
			reportFixInfo(ob.repairId,ob.clientId,ob.productType,ob.faultType);
			break;
		case "reportShowInfo":
			reportShowInfo(ob.addTime,ob.repairId,ob.productType,ob.deviceBrands,ob.deviceModel,ob.serialNumber,ob.workPlace,ob.contact,ob.faultact,ob.missPart,ob.suiji);
			break;
		case "showAddDevice":
			showAddDevice(ob.repairId);
			break;
		case "reportEditInfo":
			reportEditInfo(ob.repairId,ob.clientId,ob.productType,ob.deviceBrands,ob.deviceModel,ob.serialNumber,ob.missPart,ob.faultact,ob.faultType,ob.outCheck,ob.openPassword,ob.importantInfo,ob.hdd,ob.ram,ob.pcCard,ob.acAdapter,ob.battery,ob.cd,ob.floppy,ob.other,ob.addTime,ob.tampPrice,ob.repairStatus,ob.submitType);
			break;
		

		case "print":

			countPrint(ob.repairId,ob.addTime,ob.checkTime,ob.productType,ob.deviceBrands,ob.deviceModel,ob.serialNumber,ob.workPlace,ob.contact,ob.sumCost,ob.repairCost,ob.partCost,ob.faultact,ob.warranty,ob.notice,ob.partName,ob.partType,ob.partNumber,ob.outPrice);
			break;
		

		case "showDeviceRecord":
			
		 	// if(ob.length==0)
		 	// 	document.getElementById("record").innerHTML="";
		 	// else
				showDeviceRecord(ob);
				break;
		default:
			break;
			
	}

}
