function getValue(obj)
{
	//$("#result").html(" ");
    var inputValue=obj.parent().find('input').serialize();
    // alert(inputValue);
    return inputValue;
}