function checkNull(obj)
{
	if (obj.value=="")
	{
		obj.style.border="1px solid red";
		obj.parentNode.childNodes[1].childNodes[1].style.visibility="visible";
	}else
	{
		obj.style.border="1px solid rgb(109,197,163)";
		obj.parentNode.childNodes[1].childNodes[1].style.visibility="hidden";
	}
}