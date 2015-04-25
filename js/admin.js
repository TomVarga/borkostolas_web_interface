function validateWineFields(i, wine_name, wine_winery, wine_location, wine_year, wine_composition, wine_price){
	if (wine_name.length == 0){
		alert("Hiba a "+i+". sorszámú bornál: A bor neve hiányzik!");
		location.reload();
		return false;
	}
	if (wine_winery.length == 0){
		alert("Hiba a "+i+". sorszámú bornál: A pincészet neve hiányzik!");
		location.reload();
		return false;
	}
	if (wine_location.length == 0){
		alert("Hiba a "+i+". sorszámú bornál: A bor származási helye hiányzik!");
		location.reload();
		return false;
	}
	if (wine_composition.length == 0){
		alert("Hiba a "+i+". sorszámú bornál: A bor összetéltele hiányzik hiányzik!");
		location.reload();
		return false;
	}
	if (!isEmpty(wine_year)){
		if (!isNumber(wine_year) || wine_year.length > 4){
			alert("Hiba a " + i + ". sorszámú bornál: Az évjárat nem meglfelő formátomú (maximum 4 számjegy)!");
			location.reload();
			return false;
		}
	}
	if (!isEmpty(wine_price)){
		if (!isNumber(wine_price) || wine_price.length > 64) {
			alert("Hiba a " + i + ". sorszámú bornál: Az ár nem meglfelő formátomú (maximum 64 számjegy)!");
			location.reload();
			return false;
		}
	}
	return true;
}
function editWine(i){
	var wine_name = document.getElementById('wine_name_'+i).value.trim();
	var wine_winery = document.getElementById('wine_winery_'+i).value.trim();
	var wine_location = document.getElementById('wine_location_'+i).value.trim();
	var wine_year = document.getElementById('wine_year_'+i).value.trim();
	var wine_composition = document.getElementById('wine_composition_'+i).value.trim();
	var wine_price = document.getElementById('wine_price_'+i).value.trim();
	if (!validateWineFields(i, wine_name, wine_winery, wine_location, wine_year, wine_composition, wine_price)) return;

	var url = "phpHelpers/updateWine.php?"+
		"wine_id="+i+
		"&wine_name="+JSON.stringify(wine_name)+
		"&wine_winery="+JSON.stringify(wine_winery)+
		"&wine_location="+JSON.stringify(wine_location)+
		"&wine_composition="+JSON.stringify(wine_composition);
	if (!isEmpty(wine_year)) url = url + "&wine_year="+wine_year;
	if (!isEmpty(wine_price)) url = url + "&wine_price="+wine_price;


	var response;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			response = xmlhttp.responseText;
		} else {
			return;
		}
	}
	xmlhttp.open("POST",url,false);
	xmlhttp.send();
	//alert(response);
}
function deleteWine(index){
	alert(index);
}