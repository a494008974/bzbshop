$.fn.hoverClass=function(b){var a=this;a.each(function(c){a.eq(c).mouseenter(function(){$(this).addClass(b)});a.eq(c).mouseleave(function(){$(this).removeClass(b)})});return a};
$.fn.foucsText=function(c){var a=this;var b=(c==null)?$(a).val():c;a.val(b);a.focus(function(){if(a.val()==b){a.val("")}});a.blur(function(){if(a.val()==""){a.val(b)}});return a};

(function(a){a.fn.extend({soChange:function(b){b=a.extend({thumbObj:null,botPrev:null,botNext:null,thumbNowClass:"now",thumbOverEvent:true,slideTime:1000,autoChange:true,clickFalse:true,overStop:true,changeTime:5000,delayTime:300},b||{});var h=a(this);var i;var k=h.size();var e=0;var g;var c;var f;function d(){if(e!=g){if(b.thumbObj!=null){a(b.thumbObj).removeClass(b.thumbNowClass).eq(g).addClass(b.thumbNowClass)}if(b.slideTime<=0){h.eq(e).hide();h.eq(g).show()}else{h.eq(e).fadeOut(b.slideTime);h.eq(g).fadeIn(b.slideTime)}e=g;if(b.autoChange==true){clearInterval(c);c=setInterval(j,b.changeTime)}}}function j(){g=(e+1)%k;d()}h.hide().eq(0).show();if(b.thumbObj!=null){i=a(b.thumbObj);i.removeClass(b.thumbNowClass).eq(0).addClass(b.thumbNowClass);i.click(function(){g=i.index(a(this));d();if(b.clickFalse==true){return false}});if(b.thumbOverEvent==true){i.mouseenter(function(){g=i.index(a(this));f=setTimeout(d,b.delayTime)});i.mouseleave(function(){clearTimeout(f)})}}if(b.botNext!=null){a(b.botNext).click(function(){if(h.queue().length<1){j()}return false})}if(b.botPrev!=null){a(b.botPrev).click(function(){if(h.queue().length<1){g=(e+k-1)%k;d()}return false})}if(b.autoChange==true){c=setInterval(j,b.changeTime);if(b.overStop==true){h.mouseenter(function(){clearInterval(c)});h.mouseleave(function(){c=setInterval(j,b.changeTime)})}}}})})(jQuery);

//login
$.getJSON(web_dir+'apps/user_logined.php', function(json){if (json.logined){
		$('#dom_i_link').html(empty(json.nickname) ? json.username : json.nickname);
		$('#dom_top_welcome_unlogin').hide();$('#dom_top_welcome_logined').show();
	}else{
		$('#dom_top_welcome_logined').hide();$('#dom_top_welcome_unlogin').show();
	}
});

function time(){return Math.round(new Date().getTime()/1000)}
function empty(a){var b;if(a===''||a===0||a==='0'||a===null||a===false||a===undefined){return true}if(typeof a=='object'){for(b in a){if(typeof a[b]!=='function'){return false}}return true}return false}
function is_object(a){if(a instanceof Array){return false}else{return(a!==null)&&(typeof(a)=='object')}}
function load_goods_cart_list_v4(){IMPORT_CART ? load_goods_cart_list_v42() : load_goods_cart_list_v41();}
function load_goods_cart_list_v42(){return load_cart_goods_count2();}

$(function(){load_cart_goods_count();});
function load_cart_goods_count(){IMPORT_CART ? load_cart_goods_count2() : load_cart_goods_count1();}
function load_cart_goods_count1(){var s_url = web_dir + 'goods/ajax/load_goods_cart_goods_number_v4.php';$.ajax({type: 'POST',url: s_url,data: {},beforeSend: function() {},error: function() {},success: function(sReturn){$('#js_cart_goods_number').html(sReturn);}});}
function load_cart_goods_count2(){var result=$.ajax({async:true,type:'get',url:IMPORT_CART_URL+'ajax/do/minicartzip.html?d='+time(),dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result.errorcode!=0)return gb.ajax.errormessage(result.errormessage);$('#js_cart_goods_number').html(result.data.total.item_quantity);var _html='';$.each(result.data.cart_items,function(i,n){_html+='<dl class="dl_cartpro">';_html+='	<dt><a class="a_title" href="'+web_dir+'pshow-'+n.goods_sku+'.html" target="_blank">'+n.goods_name+'</a><b class="b_num">x'+n.buy_quantity+'</b></dt>';_html+='	<dd class="ddthumb"><a href="'+web_dir+'pshow-'+n.goods_sku+'.html" target="_blank"><img src="'+n.image_s_url+'" width="52" height="52" alt="" /></a></dd>';if(!n.is_suit&&!n.is_pointsexc)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(0);" onclick="return delete_cart_goods(\''+n.goods_sku+'\');">[移除]</a></dd>';if(n.is_pointsexc)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(0);" onclick="return delete_cart_pointsexc2(\''+n.goods_sku+'\');">[移除]</a></dd>';if(n.is_suit)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(\''+n.suit_sku+'\', \''+n.suit_skus+'\');" onclick="return delete_cart_suits2(\''+n.suit_sku+'\', \''+n.suit_skus+'\');">[移除]</a></dd>';_html+='</dl>'});_html+='<p class="p_carttotal"> 共 <b class="red">'+result.data.total.item_quantity+'</b> 件商品 金额总计：<b class="red">￥'+result.data.total.order_amount+'</b></p>';_html+='<p class="p_gotocheck"><a class="a_gotocheck" href="'+web_dir+'goods/cart.php">去结算</a></p>';$('#top_cart_goods_list').html(_html)}})}


//lazyload
function lazyload(option){var settings={defObj:null,defHeight:-50};settings=$.extend(settings,option||{});var defHeight=settings.defHeight,defObj=(typeof settings.defObj=="object")?settings.defObj.find("img"):$(settings.defObj).find("img");var pageTop=function(){return document.documentElement.clientHeight+Math.max(document.documentElement.scrollTop,document.body.scrollTop)-settings.defHeight};var imgLoad=function(){defObj.each(function(){if($(this).offset().top<=pageTop()){var src2=$(this).attr("src2");if(src2){$(this).attr("src",src2).removeAttr("src2")}}})};imgLoad();$(window).bind("scroll",function(){imgLoad()})}

$(function (){
// 伸缩广告
if ($('#js_ads_banner_top_slide').length){setTimeout(function(){$("#js_ads_banner_top_slide").slideUp(1000, function() { $("#js_ads_banner_top").slideDown(1000); });}, 3000);}

//load cart goods list
$("#js_span_cart").mouseover(function(){
	load_goods_cart_list_v4();
});


// 限时抢购
$('#dom_index_countdown').load(web_dir + 'goods_countdown_v4.php', function(){return run_countdown();});

lazyload({ defObj: ".lazybox"});

var dpmload = setTimeout(function () {
	lazyload({ defObj: ".lazybox"});
},7000);

$('.ul_mainnav>li').hoverClass('over');
$('.li_myquick').hoverClass('li_myquick_over');
$('.dl_hotkinds').hoverClass('over');
$('#input_goods_search_keyword').foucsText();

//index_banner
var $bannerobj = $('#js_index_banner .focusbanner');
var blen = $bannerobj.length;
var bw = Math.ceil((727-blen)/blen);
$('#js_index_banner .h2_focus').width(bw);
$bannerobj.soChange({thumbObj:'#js_index_banner .h2_focus',thumbNowClass:'h2_focus_now',slideTime:0,clickFalse:false});

$('#js_info_focus .tabcont').soChange({thumbObj:'#js_info_focus .tabtitle',thumbNowClass:'tabtitlenow',slideTime:0,autoChange:false,clickFalse:false});

// each_a_c as js
var alen = $('.each_a_c').length;
$('.each_a_c').each(function () {
	var blen = $(this).find('img').length+1;
	if (blen>2) {
		var str = '<p class="p_page">';
		for (var i = 1;i<blen; i++) {str = str+"<span>"+ i +"</span>";}
		str = str + '</p>';
		$(this).append(str);
		var thumb = $(this).find('span');
		$(this).find('img').soChange({thumbObj:thumb,changeTime:4000,slideTime:0});
	}
});

//js_moveclew
function auto_move(dom){var left = parseInt($(dom).css('left'))  < 300 ? 300 : 250;	$(dom).animate({'left': left}, 3000, function(){return auto_move(dom);});}
auto_move('#js_moveclew');
$('.tabbox_newpro .ul_prolist').soChange({thumbObj:'.h3_newpro_title span', thumbNowClass:'now', slideTime:0,changeTime:5000});

//cart
var $cartTitle = $('#js_span_cart'),$cartBox = $('.div_cart'),s;
window.carthide = function() {$cartTitle.removeClass('over');$cartBox.hide();};
$cartTitle.bind('mouseenter',function () {clearTimeout(s);$cartTitle.addClass('over');$cartBox.show();load_goods_cart_list_v4();}).bind('mouseleave',function () {s = setTimeout('carthide()',200);});
$cartBox.bind('mouseenter',function () {clearTimeout(s);$cartTitle.addClass('over');}).bind('mouseleave',function () {s = setTimeout('carthide()',200);});

//popelements
var pop_st,$h3= $('.ul_popelements h3');
$('.ul_popelements li:eq(6),.ul_popelements li:eq(7),.ul_popelements li:gt(15)').addClass('right');
window.h3over = function (indx) {
	var obj = $h3.eq(indx),$li = obj.parent('li');
	if ($('.ul_popelements div').queue().length<=1) {
		$li.addClass('over').find('div').animate({'width':'202px','left':(($li.hasClass('right'))?'-192px':'0px')},'fast',function () {
		$(this).addClass('over');
		});
	}
}
$h3.mouseenter(function (){
	var indx = $h3.index($(this));
	 pop_st = setTimeout('h3over('+indx+')',200);
}).mouseleave(function (){
	clearTimeout(pop_st);
	$(this).next('div').removeClass('over').animate({'width':'10px','left':'0'},'fast',function () {
		$(this).parent('li').removeClass('over');
	})
});

//edm email
$("#edm_email").foucsText();



function run_countdown(){
	if(  $('#countdown').size()){
		 $('#dom_index_countdown').show();
		countdown( $('#countdown').get(0), parseInt( $('#countdown').text() * 1000), function()
		{
			 $('#dom_index_countdown').load(web_dir + 'goods_countdown_v4.php', function(){return run_countdown();});
		});
	}else{$('#dom_index_countdown_accshowlist').show();}
}

countdown = function(id, total, callback)
{
	if( total <= 0 ) {
		$('#dom_index_countdown').hide();$('#dom_index_countdown_accshowlist').show();
		function_exists(callback) && callback.call(callback);
		return;
	}
	var start_hours = parseInt( total / (60 * 60 * 1000), 10 );
	var start_minutes = parseInt( (total - start_hours * 60 * 60 * 1000) / (60 * 1000), 10 );
	var start_sec = parseInt( ((total - start_hours * 60 * 60 * 1000) - start_minutes * 60 * 1000) / 1000 );
	if( is_object($(id)) ) {
		var html = '';
		if( start_hours > 0 )
			html += '<b>'+ start_hours + '</b>小时';
		if( start_minutes >= 0 )
			html += (start_minutes < 10 ? '<b>0' + start_minutes + '</b>' : '<b>' + start_minutes) + '</b>分';
		if( start_sec >= 0 )
			html += (start_sec < 10 ? '<b>0' + start_sec + '</b>' : '<b>' + start_sec) + '</b>秒';
		if( empty(html) )
			html = '----';
		$(id).html(html);
	}
	total = total - 1000;
	var self = this;
	setTimeout(function(){
		self.countdown(id, total, callback);
	}, 1000);
};

});




