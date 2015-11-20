function create_ajax(url,data,content) {
	console.log("create ajax");
	var pageContent = content || $("#content-result");
	$.ajax({
		type:"POST",
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
