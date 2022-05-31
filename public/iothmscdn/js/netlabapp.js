var elem = function(el){
	var e = document.getElementById(el);
	this.hide = function(){
		e.style.display = "none";
	};
	this.show = function(){
		e.style.display = "block";
	};
	this.html = function(html){
		e.innerHTML = html;
	};
	this.value = function(v = ''){
		if(v == ''){
			return e.value;
		}
		else {
			e.value = v;
		}
	};
	this.clear = function(){
		e.value = '';
	};
	this.disabled = function(s){
		this.disabled = s;
	};
	this.get = function(){
		return e;
	};
	return this;
};

var paginator = function(items, current_page, per_page_items){
	var page = current_page || 1,
	per_page = per_page_items || 10,
	offset = (page - 1) * per_page,

	paginatedItems = items.slice(offset).slice(0, per_page_items),
	total_pages = Math.ceil(items.length / per_page);

	return {
		page: page,
		per_page: per_page,
		pre_page: page - 1 ? page - 1 : null,
		next_page: (total_pages > page) ? page + 1 : null,
		total: items.length,
		total_pages: total_pages,
		data: paginatedItems
	};
};

var check_valid_json = function(json){
	try {
		JSON.parse(json);
		return true;
	}
	catch(e){
		return false;
	}
};

var api = function(data){
	var xhr = new XMLHttpRequest();
	xhr.open('POST', "/netlab/api", true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			data.success(xhr.responseText);
		}
	};
	xhr.send(JSON.stringify(data.data));
};