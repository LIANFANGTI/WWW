/*
	[TopAPI B2B System] Copyright (c) 2010-2015 TopAPI.CN
	This is NOT a freeware, use is subject to license.txt
*/
var area_id;
var area_name;
var order_sl;
function load_area(areaid, id, areaname,order) {
	order_sl = order;
	area_id = id; area_areaid[id] = areaid; area_name = areaname;
	makeRequest('action=area&area_title='+area_title[id]+'&area_extend='+area_extend[id]+'&area_id='+area_id+'&areaid='+areaid, AJPath, 'into_area');
}
function into_area() {   
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		//Dd('areaid_'+area_id).value = area_areaid[area_id];
		Dd('areaid_'+area_id).value = area_name;
		if (order_sl == 1) { province = area_name;}
		if (order_sl == 2) { city = area_name;}
		if(xmlHttp.responseText) Dd('load_area_'+area_id).innerHTML = xmlHttp.responseText;
	}
}