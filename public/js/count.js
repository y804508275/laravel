    function countsubmitCheck(obj)
    {   
        var num=obj.parentNode.getElementsByTagName("input").length;
        var requiredInput=obj.parentNode.getElementsByTagName("input");
        var numfill=0;
        for (var i=0;i<num;i++)
        {
            if(requiredInput[i].className=="required-input")
            {
                if (requiredInput[i].value=="") 
                {
                    document.getElementById("submit-warn").style.display="block";
                    break;
                }
                else
                {
                    numfill=numfill+1;
                }
            }
        }
        if (3==numfill)
        {     
            closeFixRecord();
        }
    }