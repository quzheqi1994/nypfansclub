<?php
	include("../simple_html_dom.php");
	$html = new simple_html_dom();
	$url = "https://zhongchou.modian.com/search?key=".$_GET['user'];
	$html->load_file($url);
	$div = $html->find("div[class=project-member]",0);
	$div = str_replace("https://me.modian.com/u/detail?uid=","#",$div);
	echo "<h4>请选择确认您的摩点ID</h4>";
	echo $div;
echo '
<script>
    $("li").on("click", function(e) {
    	$("#modian_name").val($(this).find(".name")[0].innerHTML);
    	$("#modian_id").val($(this).attr("user_id"));
        signup();
    });
</script>
';