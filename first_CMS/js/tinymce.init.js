	tinyMCE.init({
		mode : "exact",
		elements : "edytor, edytor_1, edytor_2, edytor_3, edytor_4, edytor_1_1, edytor_1_2, edytor_1_3, edytor_1_4",
		theme : "advanced",
		language : "pl",
		plugins : "style,table,save,advhr,advimage,advlink,insertdatetime,preview,media,searchreplace,contextmenu,paste,fullscreen,visualchars,nonbreaking,filemanager",
		theme_advanced_buttons3_add : "media,separator,styleprops,visualchars,nonbreaking",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		content_css : "/js/tinymce.css",

                relative_urls:false,
                remove_script_host : false,

		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : true,
		nonbreaking_force_tab : true,
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Example of filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}