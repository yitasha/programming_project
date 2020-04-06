function navigate()
{
	//get a reference to the select object
	var menu = document.getElementById("menu");

	//what is the value of the selected option
	var url = menu.value;
	
	//go there
	if(url != "")
	location.href = url;
}
