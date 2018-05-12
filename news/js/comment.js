$.extend({
	comment: {
		submit: function(target) {
			var $this = $(target);
			$this.button('loading');

			$('#detail-modal').modal('show');
			$(".close").click(function() {
				setTimeout(function() {
					$this.html("<i class='fa fa-close'></i>取消操作...");
					setTimeout(function() {
						$this.button('reset');
					}, 1000);
				}, 500);
			});
			// 模态框抖动
			$("#detail-form-btn").click(function() {
				$.ajax({
					type: "get",
					url: "./server/comment.json",
					async: true,
					success: function(json) {
						if(json.statusCode == 200) {
							console.log(json.message);
						} else {
							console.error(json.message);
						}
						$('#detail-modal').modal('hide');

						setTimeout(function() {
							$this.html("<i class='fa fa-check'></i>" + json.message);
							setTimeout(function() {
								$this.button('reset');
								window.location.reload();
							}, 1000);
						}, 1000);
					},
					error: function(data) {
						console.error(data);
					}
				});
			});
		},
		reply: function(pid, c) {
			console.log(pid);
			$('#comment-pid').val(pid);
			$('#cancel-reply').show();
			$('.comment-reply').show();
			$(c).hide();
			$(c).parents('.comment-body').append($('#comment-post'));
		},
		cancelReply: function(c) {
			$('#comment-pid').val("");
			$('#cancel-reply').hide();
			$(c).parents(".comment-body").find('.comment-reply').show();
			$("#comment-place").append($('#comment-post'));
		}
	}
});

$(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$("#comment-form-btn").click(function() {
		$.comment.submit($(this));
	});

});

$(document).ready(function(){
	var E = window.wangEditor
	var editor = new E('#editor')
	// 自定义菜单配置
	editor.customConfig.menus = [
		'bold', // 粗体
		'italic', // 斜体
		'underline', // 下划线
		'quote', // 引用
		'emoticon', // 表情
	];
	// debug模式下，有 JS 错误会以throw Error方式提示出来
	editor.customConfig.debug = true;

	// 关闭粘贴样式的过滤
	editor.customConfig.pasteFilterStyle = false;
	// 自定义处理粘贴的文本内容
	editor.customConfig.pasteTextHandle = function(content) {
		// content 即粘贴过来的内容（html 或 纯文本），可进行自定义处理然后返回
		return content + '<p>在粘贴内容后面追加一行</p>'
	};
	// 插入网络图片的回调
	editor.customConfig.linkImgCallback = function(url) {
		console.log(url) // url 即插入图片的地址
	};
	editor.customConfig.zIndex = 100;
	editor.create();
	// 读取 html
	console.log(editor.txt.html());
	// 读取 text
	console.log(editor.txt.text());
	// 获取 JSON 格式的内容
	console.log(editor.txt.getJSON());
})