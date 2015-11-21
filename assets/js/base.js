function create_ajax(url,data,content,type) {
	if(typeof(type) == "undefined")
		type = "POST";
	console.log("create ajax");
	var pageContent = content || $("#content-result");
	$.ajax({
		type:type,
		url:url,
		data:data,
		dataType:"html",
		cache:false,
		success : function(result) {
			pageContent.html(result);
		},
		error : function(xhr, ajaxOptions, thrownError) {
			pageContent.html('<h4>Could not load the requested content.</h4>');
		}
	});
}

function show_message(title,content) {
	$("#modal1-title").html(title);
	$("#modal1-body").html(content);
	$("#modal1").modal("toggle");
}

function bind_ajax() {
	console.log("bind_ajax");
	$(".ajax_get").unbind().on("click",function() {
		console.log("ajax_get");
		var content_name = $(this).attr("data-content");
		if(typeof(content_name) != "undefined")
			content_name = "#" + content_name;
		else
			content_name = "#content";
		var url = $(this).attr("data-url");
		create_ajax(url,{},$(content_name),"GET");
	});
}
