$(function(){
    // 动态计算新闻列表文字样式
    auto_resize();
    $(window).resize(function() {
        auto_resize();
    });
    $('.am-list-thumb img').load(function(){
        auto_resize();
    });

    $('.am-list > li:last-child').css('border','none');
    function auto_resize(){
        $('.pet_list_one_nr').height($('.pet_list_one_img').height());

    }
	$('.pet_nav_gengduo').on('click',function(){
		$('.pet_more_list').addClass('pet_more_list_show');
    });
	$('.pet_more_close').on('click',function(){
		$('.pet_more_list').removeClass('pet_more_list_show');
	});
	//行程模块初始化
	$('.VivaTimeline').vivaTimeline({
		carousel: true,
		carouselTime: 3000
	});
});
function changeSwitch(){
	if($("#collswitch").html()!="收起行程安排")
		$("#collswitch").html("收起行程安排");
	else
		$("#collswitch").html("展开行程安排");
}