function isNumber(input){
	var numbers = /^[0-9]+$/;
	if(input.match(numbers)){
		return true;
	}
	return false;
}
function isEmpty(input){
	if (input == null || input == "") {
		return true;
	}
	return false;
}