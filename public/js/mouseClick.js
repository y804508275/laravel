    var num=0;
    var showtodo=1;
    var showinfo=0;
    var removeObject;
    var editObject;
    var assignObject;
    var increaseObj;
    var reduceObj;
    var showObject;
    var adminObject;
    var deviceObj;
    $(".menu-icon").click(function()
    {
        if(num==1)
        {
            $(".left-bar").animate({width:'50px'});
            $(".content").animate({left:'50px'});
            $(".item-list").animate({width:'50px'});
            $(".item").animate({opacity:'0'});
            num=0;
        }
        else
        {
            $(".left-bar").animate({width:'200px'});
            $(".content").animate({left:'200px'});
            $(".item-list").animate({width:'200px'});
            $(".item").animate({opacity:'1'});
            num=1;
        }
    });
    $('#item1').click(function()
    {
        if($('.item').css('opacity')!=0)
        {
            $(".showing").html("你点了项目1。");
        }
    });
    $('#item2').click(function()
    {
        if($('.item').css('opacity')!=0)
        {
            $(".showing").html("你点了项目2。");
        }

    });
    $('#item3').click(function()
    {
        if($('.item').css('opacity')!=0)
        {
            $(".showing").html("你点了项目3。");
        }
    });
    $('.log-info-box').hover(function()
    {   
        
        $(".log-info-box").css("background-color","rgb(66,79,99)");
        $(".log-info-text").css("color","#fff");
        $(".down").css("border-top"," 10px solid #fff");
        // $(".down").css("border-top","border-top: 10px solid #fff");
    },function()
    {
        if($('.info-menu').css("display")=="none"){
            $(".log-info-box").css("background-color","#fff");
            $(".log-info-text").css("color","rgb(66,79,99)");
            $(".down").css("border-top"," 10px solid rgb(66,79,99)");
        }       
    });
    $('body').click(function(e)
    {
        if(e.target == $(".log-info-text")[0] || e.target == $(".info-menu-top")[0] || e.target == $(".info-menu-middle")[0] || e.target == $(".info-menu-bottom")[0] || e.target == $(".down")[0] || e.target == $(".info-menu-line")[0] || e.target == $(".info-sign")[0] || e.target == $(".info-img")[0] || e.target == $(".info-name")[0] || e.target == $(".info-btn")[0]){
            
            if(showinfo==1&&e.target == $(".log-info-text")[0] ){
                $(".log-info-box").css("background-color","#fff");
                $(".log-info-text").css("color","#000");
                $(".triangle").hide();
                $(".info-menu").hide();
                $(".down").css("border-top"," 10px solid rgb(66,79,99)");
                showinfo=0;
            }else{
                $(".log-info-box").css("background-color","rgb(66,79,99)");
                $(".log-info-text").css("color","#fff");
                $(".triangle").show();
                $(".info-menu").show();
                $(".down").css("border-top"," 10px solid #fff");
                showinfo=1;
            }
            
        }
        else
        {
            $(".down").css("border-top"," 10px solid rgb(66,79,99)");
            $(".log-info-box").css("background-color","#fff");
            $(".log-info-text").css("color","#000");
            $(".triangle").hide();
            $(".info-menu").hide();
        }
    });
    $(".show-todo").hover(function()
    {
        $(".show-todo").css('background-color','rgb(109,197,163)');
    },function()
    {
        $(".show-todo").css('background-color','rgb(200,200,200)');
    });
    $(".to-do-head").click(function()
    {
        if(showtodo==1)
        {
            // $(".to-do").hide();
            $(".to-do").animate({opacity:'0'});
            $(".to-do-body").animate({height:'0'});
            showtodo=0;
        }
        else
        {
            $(".to-do-body").css('height','0');
            $(".to-do").animate({opacity:'1'});
            $(".to-do-body").animate({height:'100%'});
            showtodo=1;
        }
    });
    $("#d1").click(function()
    {
        $("#t1").hide();
    });
    $("#d2").click(function()
    {
        $("#t2").hide();
    });
    $("#d3").click(function()
    {
        $("#t3").hide();
    });
    function showFixRecord(obj)
    {
        editObject = obj;
        assignObject = obj;
        document.getElementById("black").style.display="block";
        document.getElementById("fix-record").style.display="block";
        document.getElementById("add-record").style.display="none";
    }
    function showFixInfo(obj)
    {
        adminObject = obj;
        document.getElementById("fix-info").style.display="block";
        document.getElementById("infoBlack").style.display="block";
    }
    function showCustomerInfo(clientId,clientName,idCard,addTime,clientType,workPlace,phoneNumber,telephoneNumber,email,contact,postCode,address)
    {
        document.getElementById("showClientId").innerHTML=clientId;
        document.getElementById("showClientName").innerHTML=clientName;
        document.getElementById("showIdCard").innerHTML=idCard;
        document.getElementById("showAddTime").innerHTML=addTime;
        document.getElementById("showClientType").innerHTML=clientType;
        document.getElementById("showWorkPlace").innerHTML=workPlace;
        document.getElementById("showPhoneNumber").innerHTML=phoneNumber;
        document.getElementById("showTelephoneNumber").innerHTML=telephoneNumber;
        document.getElementById("showEmail").innerHTML=email;
        document.getElementById("showContact").innerHTML=contact;
        document.getElementById("showPostCode").innerHTML=postCode;
        document.getElementById("showAddress").innerHTML=address;
    }
    function reportShowInfo(addTime,repairId,productType,deviceBrands,deviceModel,serialNumber,workPlace,contact,faultact,missPart,suiji)
    {
        document.getElementById("showAddTime").innerHTML=addTime;
        document.getElementById("showRepairId").innerHTML=repairId;
        document.getElementById("showProductType").innerHTML=productType;
        document.getElementById("showDeviceBrands").innerHTML=deviceBrands;
        document.getElementById("showDeviceModel").innerHTML=deviceModel;
        document.getElementById("showSerialNumber").innerHTML=serialNumber;
        document.getElementById("showWorkPlace").innerHTML=workPlace;
        document.getElementById("showContact").innerHTML=contact;
        document.getElementById("showFaultact").innerHTML=faultact;
        document.getElementById("showMissPart").innerHTML=missPart;
        document.getElementById("showSuiji").innerHTML=suiji;
    }
    function showEditInfo(clientId,clientName,idCard,addTime,clientType,workPlace,phoneNumber,telephoneNumber,email,contact,postCode,address)
    {
        document.getElementById("editClientId").value=clientId;
        document.getElementById("editClientName").value=clientName;
        document.getElementById("editIdCard").value=idCard;
        document.getElementById("editAddTime").value=addTime;
        // document.getElementById("editClientType").value=clientType;
        document.getElementById("editWorkPlace").value=workPlace;
        document.getElementById("editPhoneNumber").value=phoneNumber;
        document.getElementById("editTelephoneNumber").value=telephoneNumber;
        document.getElementById("editEmail").value=email;
        document.getElementById("editContact").value=contact;
        document.getElementById("editPostCode").value=postCode;
        document.getElementById("editAddress").value=address;
        var radio = document.getElementsByName("clientType");  
        for (i=0; i<radio.length; i++) {  
            if (radio[i].value == clientType) {  
                radio[i].checked=true;
            }  
        }
    }
    function showAdminInfo(repairId,checkTime,repairMan,repairStatus,usedDevice,workLoad,repairNote,checkNote)
    {
        document.getElementById("repairId1").value=repairId;
        document.getElementById("checkTime").value=checkTime;
        document.getElementById("repairMan").value=repairMan;
        // document.getElementById("repairStatus").value=repairStatus;
        // document.getElementById("editClientType").value=clientType;
        document.getElementById("checkNote").value=checkNote;
        document.getElementById("usedDevice").value=usedDevice;
        document.getElementById("workLoad").value=workLoad;
        document.getElementById("repairNote").value=repairNote;
        var radio = document.getElementsByName("repairStatus");  
        for (i=0; i<radio.length; i++) {  
            if (radio[i].value == repairStatus) {  
                radio[i].checked=true;
            }  
        }
    }
    function reportEditInfo(repairId,clientId,productType,deviceBrands,deviceModel,serialNumber,missPart,faultact,faultType,outCheck,openPassword,importantInfo,hdd,ram,pcCard,acAdapter,battery,cd,floppy,other,addTime,tampPrice,repairStatus,submitType)
    {
        document.getElementById("repairId").value=repairId;
        document.getElementById("clientId").value=clientId;
        document.getElementById("deviceBrands").value=deviceBrands;
        // document.getElementById("repairStatus").value=repairStatus;
        // document.getElementById("editClientType").value=clientType;
        document.getElementById("deviceModel").value=deviceModel;
        document.getElementById("serialNumber").value=serialNumber;
        document.getElementById("missPart").value=missPart;
        document.getElementById("faultact").value=faultact;
        document.getElementById("outCheck").value=outCheck;
        document.getElementById("openPassword").value=openPassword;
        document.getElementById("importantInfo").value=importantInfo;
        document.getElementById("hdd").value=hdd;
        document.getElementById("ram").value=ram;
        document.getElementById("pcCard").value=pcCard;
        document.getElementById("acAdapter").value=acAdapter;
        document.getElementById("battery").value=battery;
        document.getElementById("cd").value=cd;
        document.getElementById("floppy").value=floppy;
        document.getElementById("other").value=other;
        document.getElementById("addTime").value=addTime;
        document.getElementById("tampPrice").value=tampPrice;

        var type = document.getElementsByName("productType");  
        for (i=0; i<type.length; i++) {  
            if (type[i].value == productType) {  
                type[i].checked=true;
            }  
        }
        var fault = document.getElementsByName("faultType");  
        for (i=0; i<fault.length; i++) {  
            if (fault[i].value == faultType) {  
                fault[i].checked=true;
            }  
        }
        var repair = document.getElementsByName("repairStatus");  
        for (i=0; i<repair.length; i++) {  
            if (repair[i].value == repairStatus) {  

                repair[i].checked=true;
            }  
        }
    }
    function closeFixRecord()
    {
        document.getElementById("black").style.display="none";
    }
    function closeFixInfo(){
        document.getElementById("infoBlack").style.display="none";
    }
    function submitCheck(obj)
    {
        var ifnull; 
        var num=obj.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    break;
                }
            }
        }
        
        if (i==num) 
        {
            if (obj.id=="fix") 
            {               
                ifnull = 1; 
            }else
            {
                ifnull = 2;
            }
            
            closeFixRecord();
            return ifnull;  
        }

    }
    function addCustomerData(clientId,clientName,addTime,clientType,phoneNumber,telephoneNumber)
    {
        var oTest = document.getElementById("width-inh");
        var Node = document.createElement("tr");
        var numNode = document.createElement("td");
        var nameNode = document.createElement("td");
        var timeNode = document.createElement("td");
        var statusNode = document.createElement("td");
        var telNode = document.createElement("td");
        var mobileNode = document.createElement("td");
        var showA = document.createElement("a");
        var editA = document.createElement("a");
        var deleteA = document.createElement("a");
        var A = document.createElement("td");

        showA.innerHTML="信息详情";
        editA.innerHTML="编辑";
        deleteA.innerHTML="删除";
        A.appendChild(showA);
        A.appendChild(editA);
        A.appendChild(deleteA);
        showA.id=clientId;
        deleteA.id=clientId;
        showA.setAttribute("onclick","showInfo(this)");
        editA.setAttribute("onclick", "editInfo(this)");
        deleteA.setAttribute("onclick", "deleteBackUp(this)");

        var radio = document.getElementsByName("clientType");  
        for (i=0; i<radio.length; i++) {  
            if (radio[i].checked) {  
                statusNode.innerHTML = radio[i].value;
            }  
        }  

        numNode.innerHTML= clientId;
        nameNode.innerHTML=clientName;
        timeNode.innerHTML=addTime;
        telNode.innerHTML=phoneNumber;
        mobileNode.innerHTML=telephoneNumber;
        statusNode.innerHTML=clientType;
        Node.appendChild(numNode);
        Node.appendChild(nameNode);
        Node.appendChild(timeNode);
        Node.appendChild(statusNode);
        Node.appendChild(telNode);
        Node.appendChild(mobileNode);
        Node.appendChild(A);
        oTest.appendChild(Node);
    }
    function editFixData(repairId,checkTime,repairMan)
    {
        editTd = adminObject.parentNode.parentNode.getElementsByTagName("td"); 
        
        var editValue = new Array(repairId,checkTime,repairMan);
        for (var i = 0; i < editTd.length - 1; i++) {
            editTd[i].innerHTML = editValue[i];
        }
    }
    function fixCustomerData(clientId,clientName,addTime,clientType,phoneNumber,telephoneNumber)
    {
        editTd = editObject.parentNode.parentNode.getElementsByTagName("td"); 
        var radio = document.getElementsByName("editCustomerType");  
        for (i=0; i<radio.length; i++) {  
            if (radio[i].checked) {  
                status = radio[i].value;
            }  
        }
        var editValue = new Array(clientId,clientName,addTime,clientType,phoneNumber,telephoneNumber);
        for (var i = 0; i < editTd.length - 1; i++) {
            editTd[i].innerHTML = editValue[i];
        }
    }
    function reportAddInfo(repairId,clientId,productType,faultType)
    {
        var oTest = document.getElementById("width-inh");
        var Node = document.createElement("tr");
        var numNode = document.createElement("td");
        var nameNode = document.createElement("td");
        var timeNode = document.createElement("td");
        var telNode = document.createElement("td");
        var showA = document.createElement("a");
        var editA = document.createElement("a");
        var A = document.createElement("td");
        showA.innerHTML="预览";
        editA.innerHTML="编辑";
        A.appendChild(showA);
        A.appendChild(editA);

        showA.id=repairId;
        editA.id=repairId;
        showA.setAttribute("onclick","showInfo(this)");
        editA.setAttribute("onclick", "editInfo(this)");
        numNode.innerHTML= repairId;
        nameNode.innerHTML= clientId;
        timeNode.innerHTML= productType;
        telNode.innerHTML= faultType;

        Node.appendChild(numNode);
        Node.appendChild(nameNode);
        Node.appendChild(timeNode);
        Node.appendChild(telNode);
        Node.appendChild(A);
        oTest.appendChild(Node);

    }
    function reportFixInfo(repairId,clientId,productType,faultType)
    {
        editTd = editObject.parentNode.parentNode.getElementsByTagName("td"); 
        
        var editValue = new Array(repairId,clientId,productType,faultType);
        for (var i = 0; i < editTd.length - 1; i++) {
            editTd[i].innerHTML = editValue[i];
        }
    }
    function deviceCheckNull(obj)
    {
        var n = 0;
        var num=obj.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    return 0;
                    break;
                }
            }
        }

        if (i == num) 
        {
            document.getElementById("infoBlack").style.display="none";
            return 1;
        }
    }
    function submitCheckNull(obj)
    {     
        var n = 0;
        var num=obj.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    break;
                }
            }
            
        }
        var kind = document.getElementsByName("kind");  
        for (var j=0; j<kind.length; j++) {  
            if (kind[j].checked) {  
                n = 1;
            }  
        }
        var bugKind = document.getElementsByName("bugKind"); 
        for (var j=0; j<bugKind.length; j++) {  
            if (bugKind[j].checked) {  
                n = n + 1;
                break;
            }  
        } 
        var fixStatus = document.getElementsByName("fixStatus"); 
        for (var j=0; j<fixStatus.length; j++) {  
            if (fixStatus[j].checked) {  
                n = n + 1;
                break;
            }  
        } 
    
        if (i==num && n==3) 
        {
            
            closeFixRecord();
        }
        if (i==num && n < 3) 
        {
            document.getElementById("submit-warn").style.display="block";
        }

    }
    function closeWarn()
    {
        document.getElementById("submit-warn").style.display="none";
    }
    function modify()
    {
        document.getElementById("fix-record").style.display="block";
        document.getElementById("infoBlack").style.display="block";
    }
    function closeModify()
    {
        document.getElementById("fix-record").style.display="none";
        document.getElementById("infoBlack").style.display="none";
    }
    function deleteBackUp(obj)
    {
        removeObject = obj;
        document.getElementById("fix-record").style.display="none";
        document.getElementById("confirm-delete").style.display="block";
        document.getElementById("infoBlack").style.display="block";
        document.getElementById("fix-info").style.display="none";
    }
    function objectRemove()
    {
        // alert(removeObject);
        var ifdelete=0;
        removeObject.parentNode.parentNode.style.display="none";
        cancelDelete();
        ifdelete = 1;
        var returnObj = removeObject;
        removeObject="";
        return returnObj;
        

    }
    function cancelDelete()
    {
        document.getElementById("confirm-delete").style.display="none";
        document.getElementById("infoBlack").style.display="none";
    }
    function reduce(obj)
    {
        reduceObj = obj;
        document.getElementById("outTime").value=getNowFormatDate();
        document.getElementById("outpartName").value=obj.parentNode.parentNode.getElementsByTagName("td")[1].innerHTML;
        document.getElementById("outpartType").value=obj.parentNode.parentNode.getElementsByTagName("td")[4].innerHTML;
        document.getElementById("outrepairId").value=obj.parentNode.parentNode.getElementsByTagName("td")[0].innerHTML;
        document.getElementById("reduce-num").value=obj.parentNode.parentNode.getElementsByTagName("td")[5].innerHTML;
        document.getElementById("fix-record").style.display="none";
        document.getElementById("reduce").style.display="block";
        document.getElementById("infoBlack").style.position="fixed";
        document.getElementById("infoBlack").style.display="block";
        // document.getElementById("fix-info").style.display="none";
    }
    function increase(obj)
    {
        increaseObj = obj;
        document.getElementById("inTime").value=getNowFormatDate();
        document.getElementById("inpartName").value=obj.parentNode.parentNode.getElementsByTagName("td")[1].innerHTML;
        document.getElementById("inpartType").value=obj.parentNode.parentNode.getElementsByTagName("td")[2].innerHTML;
        document.getElementById("inpartPrice").value=obj.parentNode.parentNode.getElementsByTagName("td")[4].innerHTML;
        document.getElementById("fix-record").style.display="none";
        document.getElementById("increase").style.display="block";
        document.getElementById("infoBlack").style.display="block";
        document.getElementById("fix-info").style.display="none";
    }
    function cancelReduce(obj)
    {
        document.getElementById("reduce").style.display="none";
        document.getElementById("infoBlack").style.display="none";
        document.getElementById("infoBlack").style.position="absolute";
        var requiredInput=obj.parentNode.parentNode.getElementsByTagName("input");
        for (var i=0;i<requiredInput.length;i++)
        {
            requiredInput[i].style.border="1px solid rgb(109,197,163)";
            if (requiredInput[i].readOnly != true) 
            {
                requiredInput[i].value ="";
            }
            
            if(requiredInput[i].parentNode.childNodes[1].childNodes[1])
            {
                
                requiredInput[i].parentNode.childNodes[1].childNodes[1].style.visibility="hidden";
            }
        }
    }
    function cancelIncrease(obj)
    {
        document.getElementById("increase").style.display="none";
        document.getElementById("infoBlack").style.display="none";

        var requiredInput=obj.parentNode.parentNode.getElementsByTagName("input");
        for (var i=0;i<requiredInput.length;i++)
        {
            requiredInput[i].style.border="1px solid rgb(109,197,163)";
            if (requiredInput[i].readOnly != true) 
            {
                requiredInput[i].value ="";
            }
            
            if(requiredInput[i].parentNode.childNodes[1].childNodes[1])
            {
                
                requiredInput[i].parentNode.childNodes[1].childNodes[1].style.visibility="hidden";
            }
        }
    }
    function addFixRecord(obj)
    {
        deviceObj = obj;

        document.getElementById("add-record").style.display="block";

        document.getElementById("fix-record").style.display="none";
        document.getElementById("black").style.display="block";

        var radio = document.getElementsByName("productType");  
        for (i=0; i<radio.length; i++) {  
                radio[i].checked = false;
        } 
        var radio = document.getElementsByName("faultType");  
        for (i=0; i<radio.length; i++) {  
                radio[i].checked = false;
        }
        var radio = document.getElementsByName("repairStatus");  
        for (i=0; i<radio.length; i++) {  
                radio[i].checked = false;
        }

    }
    function assign()
    {
        var assign = document.getElementById("assign");
        var assignValue=assign.options[assign.selectedIndex].text; 
        
        assignObject.parentNode.parentNode.getElementsByTagName("td")[2].innerHTML=assignValue;
        closeFixRecord();
        document.getElementById("assign-warn").style.display="none";
        return assignValue;

        

    }
    function repairStatus(obj)
    {
        var ifnull;
        var sign = 0;
        var num=obj.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    break;
                }
            }
        }
        if (i == num) {
            var repairStatus = document.getElementsByName("repairStatus"); 
            for (var j=0; j<repairStatus.length; j++) 
            {  
                if (repairStatus[j].checked) 
                {  
                    sign = 1;
                    closeFixInfo();
                    ifnull = 1;
                    return ifnull;
                }  
            }
            if (sign == 0) 
            {
                document.getElementById("submit-warn").style.display="block";
            }
            
        }
        
    }
    function sumIncrease(obj)
    {
        var num=obj.parentNode.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    return i;
                    break;
                }
            }

        }
        return i;
        
    }
    function sumReduce(obj)
    {
        var num=obj.parentNode.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.parentNode.getElementsByTagName("input");
        for (var i=0;i<num;i++)
        {

            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    break;
                }
            }
        }
        return i;
        
    }
    function reduceCheck(obj)
    {
        var reduce = document.getElementById("reduce-num").value;
        var sum = reduceObj.parentNode.parentNode.getElementsByTagName("td")[2];
        var sumInt = parseInt(sum.innerHTML);
        var reduceValue = parseInt(reduce);
        if (reduceValue > sumInt) 
        {
            obj.style.border="1px solid red";
            obj.parentNode.childNodes[1].childNodes[1].style.visibility="visible";
        }
        else
        {
            obj.style.border="1px solid rgb(109,197,163)";
            obj.parentNode.childNodes[1].childNodes[1].style.visibility="hidden";
        }
    }
    var messageStatus = 0;
    function handleMessage(obj)
    {

        if (messageStatus == 0) 
        {
            document.getElementById("message-table").style.display="block";
            messageStatus = 1;
        }
        else
        {
            document.getElementById("message-table").style.display="none";
            messageStatus = 0;
        }

    }



    function showAddDevice(repairId)
    {
        document.getElementById("repairId").value=repairId;
    }
    function showDeviceRecord(obj)
    {        

            // document.getElementById("record-table").innerHTML = "暂无纪录";
        
       
            // var parentN = document.getElementById("record-table");
            // var head =  document.getElementById("tableHead");
            // parentN.innerHTML="";
            // parentN.appendChild(head);
            for (var o in obj)
            {
                alert(obj[o].repairId);
                showRecords(obj[o].repairId,obj[o].partName,obj[o].partType,obj[o].outStatus);
            }

        
    }
    function showRecords(repairId,partName,partType,outStatus)
    {
        var sonTr = document.createElement("tr");
        var repairIdTd= document.createElement("td");
        var partNameTd= document.createElement("td");
        var partTypeTd= document.createElement("td");
        var recordStatusTd= document.createElement("td");

        repairIdTd.innerHTML=repairId;
        partNameTd.innerHTML=partName;
        partTypeTd.innerHTML=partType;
        recordStatusTd.innerHTML=outStatus;

        sonTr.appendChild(repairIdTd);
        sonTr.appendChild(partNameTd);
        sonTr.appendChild(partTypeTd);
        sonTr.appendChild(recordStatusTd);

        var parentN = document.getElementById("record-table");


        
        parentN.appendChild(sonTr);
    }



    function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
    return currentdate;
    }
    function countPrint(repairId,addTime,checkTime,productType,deviceBrands,deviceModel,serialNumber,workPlace,contact,sumCost,repairCost,partCost,faultact,warranty,notice,partName,partType,partNumber,outPrice)
    {
        document.getElementById("printInfo").getElementsByTagName("td")[1].innerHTML=repairId;
        document.getElementById("printInfo").getElementsByTagName("td")[5].innerHTML=addTime;
        document.getElementById("printInfo").getElementsByTagName("td")[7].innerHTML=checkTime;
        document.getElementById("printInfo").getElementsByTagName("td")[9].innerHTML=productType;
        document.getElementById("printInfo").getElementsByTagName("td")[11].innerHTML=deviceBrands;
        document.getElementById("printInfo").getElementsByTagName("td")[13].innerHTML=deviceModel;
        document.getElementById("printInfo").getElementsByTagName("td")[15].innerHTML=serialNumber;
        document.getElementById("printInfo").getElementsByTagName("td")[17].innerHTML=workPlace;
        document.getElementById("printInfo").getElementsByTagName("td")[19].innerHTML=contact;
        document.getElementById("printInfo").getElementsByTagName("td")[21].innerHTML=sumCost;
        document.getElementById("printInfo").getElementsByTagName("td")[23].innerHTML=repairCost;
        document.getElementById("printInfo").getElementsByTagName("td")[25].innerHTML=partCost;
        document.getElementById("printInfo").getElementsByTagName("td")[27].innerHTML=faultact;
        document.getElementById("printInfo").getElementsByTagName("td")[30].innerHTML=warranty;
        document.getElementById("printInfo").getElementsByTagName("td")[31].innerHTML=notice;
        document.getElementById("printInfo").getElementsByTagName("td")[36].innerHTML=partName;
        document.getElementById("printInfo").getElementsByTagName("td")[37].innerHTML=partType;
        document.getElementById("printInfo").getElementsByTagName("td")[38].innerHTML=partNumber;
        document.getElementById("printInfo").getElementsByTagName("td")[39].innerHTML=outPrice;
    }


