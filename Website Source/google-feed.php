<?php error_reporting(0); ?>

<?php
	$str = $_GET['str'];

	echo	
			'<script type="text/javascript">document.write(\'\x3Cscript type="text/javascript" src="\' + (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'feed.mikle.com/js/rssmikle.js">\x3C/script>\');
			</script>
			<script type="text/javascript">(function() {var params = {rssmikle_url: "https://news.google.com/news/feeds?pz=1&cf=all&ned=en&hl=us&q='.$str.'&output=rss",rssmikle_frame_width: "500",rssmikle_frame_height: "573",frame_height_by_article: "0",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",rssmikle_border: "off",responsive: "off",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "on",autoscroll: "on",scrolldirection: "up",scrollstep: "8",mcspeed: "20",sort: "Off",rssmikle_title: "on",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",rssmikle_item_bgcolor: "#FFFFFF",rssmikle_item_bgimage: "",rssmikle_item_title_length: "55",rssmikle_item_title_color: "#0066FF",rssmikle_item_border_bottom: "on",rssmikle_item_description: "on",item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#666666",rssmikle_item_date: "gl1",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %Y %l:%M:%S %p",item_description_style: "text+tn",item_thumbnail: "full",item_thumbnail_selection: "auto",article_num: "15",rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);})();</script>
			<div style="font-size:10px; text-align:center; width:500px;"><a href="http://feed.mikle.com/" target="_blank" style="color:#CCCCCC;">RSS Feed Widget</a>
			<!--Please display the above link in your web page according to Terms of Service.--></div><!-- end feedwind code -->';
?>