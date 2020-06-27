/*
	Helper functions
*/


/*
	Ensuring data type is set up for CORS
*/
function g_ajaxer(url_str, params, ok_cb, fail_cb){
	$.ajax({
		url: url_str,
		type: "POST",
		data: JSON.stringify(params),
		crossDomain: true,
		contentType: "application/json",
		dataType: "json",
		success: ok_cb,
		error: fail_cb,
		timeout: 6000
	});
}
/**
 * g_loadTheCitiesIntoDropDown(
 *
 * Just populates a list of cities
 *
 * @param JqueryObject $parent_drop_down_e
 * @param Function parent_cb
 *
 * return via parent_cb //always true || fail hard
*/
function g_loadTheCitiesIntoDropDown($parent_drop_down_el, parent_cb){
	$.get("cities.md", function(city_str){
		var
			html_str = '',
			city_arr = [],
			city_temp_arr = city_str.split("\n");

		city_arr = city_temp_arr.map(function(item){
		  return item.split(",")[0];
		});
		html_str += '<option value="">' + 'Choose A City' + '</option>';
		for(var i_int = 0; i_int < city_arr.length; i_int += 1){
			html_str += '<option value="' + city_arr[i_int] + '">' + city_arr[i_int].toLowerCase() + '</option>';
		}

		$parent_drop_down_el.html(html_str);
		parent_cb(true);//done
		//and if this fails, fail hard here instead
	});
}
function g_customizeResponse(city_str, temp_int){
	var message_str;
	message_str = "Sorry, Pickup isn't available at your location!";
		// message_str += "<br /><br />";
	return message_str;
}
