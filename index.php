
<?
include_once "_hd.php";
?>

<div id="main" class="wrap">

	<?
	include_once "_gnb.php";
	?>
    
    
    <div id="bd">
    	<div id="img_slide_wrap">
        	<div id="img_slide_text_box">
            	<h2>
                	<div id="roll_title_wrap">
                        <p class="roll_0">Relentless Evolution</p>
                        <p class="roll_1">Inspired Creation</p>
                        <p class="roll_2">Service Excellence</p>
                    </div>
                </h2>
				<div class="desc">
                	<div id="roll_desc_wrap">
                        <p class="roll_0">커피에 대한 열정과 전문성을 바탕으로 최고의 로스터를 만드는 젊고 진취적인 기업입니다.</p>
                        <p class="roll_1">로스터의 관점에서 시작한 설계와 기능, 고객의 목소리에 귀 기울여 최고의 결과물로 보답합니다.</p>
                        <p class="roll_2">정기적인 고객 방문을 통해 사전 유지보수를 도와드리며 최고의 서비스를 위해 노력합니다.</p>
					</div>                    
                </div>                
            </div><!--#img_slide_text_box-->
            
            <div id="roll_img_wrap">
            	<div id="roll_img_inner_wrap">
                    <img class="roll_img" id="roll_img_0" src="inc/img/main_slide_img_0.png" />
                    <img class="roll_img" id="roll_img_1" src="inc/img/main_slide_img_1.png" />
                    <img class="roll_img" id="roll_img_2" src="inc/img/main_slide_img_2.png" />
                    <div class="cb"></div>
                </div>
            </div>
            
            <div class="btn_slide_arrow left"></div>
            <div class="btn_slide_arrow right"></div>    
            
            <ul id="img_slide_nav">
            	<li id="img_slide_nav_0" class="on btn_slide_nav"></li>
            	<li id="img_slide_nav_1" class="btn_slide_nav"></li>
            	<li id="img_slide_nav_2" class="last btn_slide_nav"></li>                                
            </ul>        
            <div class="cb"></div>
        </div><!--#img_slide_wrap-->
        
        
        <div id="main_con">
        	<h3 style="color:#1184ba; text-align:center; font-size:16px; font-weight:bold;">NOVUSTEC가 고객님께 드리는 3가지 약속</h3>
            <p class="desc">노부스테크는 로스터기를 제작 판매하는 것을 넘어, 최고의 커피 로스팅 노하우를 노부스테크 만의 <strong>차별화된 서비스로  제공</strong>해드립니다.</p>
            
            <div id="main_support_con_wrap">
            	<dl id="main_support_con_0">
                	<dt>Phone Care Service</dt>
                    <dd class="desc">트리니타스를 사용하며 궁금한 점은<br> 언제든 유선 또는 sns를 통해 <br> 문의해주세요. <br>전문로스터가 친절하게 상담해드립니다.</dd>
                    <dd class="icon"></dd>
                </dl>

            	<dl id="main_support_con_1">
                	<dt>Shop Care Service</dt>
                  <dd class="desc">트리니타스는 최상의 제품 컨디션을 <br>위한 유지보수 프로그램을 운영합니다.<br>
자세한 상담은 문의주세요.</dd>
                    <dd class="icon"></dd>
                </dl>
                
            	<dl id="main_support_con_2">
                	<dt>Warranty Service</dt>
                    <dd class="desc">트리니타스는 1년간의 무료 AS 이후<br>Extended Warranty를 통해
보증기간을<br>연장 하실 수 있습니다.<br>
자세한 내용은 문의주세요</dd>
                    <dd class="icon"></dd>
                </dl>          
                <div class="cb"></div>                  
            </div><!--#main_support_con_wrap-->
            
           
            <div id="contact_num_wrap">
             <!--
             <img src="inc/img/main_contact_num.png" alt="Novustec 연락처 Phone:031-745-3690, H.P:010-4204-3225, Fax:031-745-3691" />
             -->
             </div>
            
       </div><!--#main_con-->
        
        
    </div><!--#bd-->
    
    
<?
include_once "_ft.php";
?>


</div><!--.wrap-->
<script type="text/javascript" src="inc/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="inc/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_layer_popup.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_form.js"></script>
<script type="text/javascript" src="inc/js/common.js"></script>
<script type="text/javascript">
$(function(){
	
var img_slide = {
	now_pos:0,
	roll_title_y:[0, -38, -76],
	roll_desc_y:[0, -44, -88],	
	start:function(){
		$('#img_slide_wrap .btn_slide_arrow').on('click', function(){	
			$('#img_slide_wrap .btn_slide_arrow').off('click');
			img_slide.slide_arrow_fn($(this));
		});		

		var timer = setInterval(function(){
			$('#img_slide_wrap .btn_slide_arrow').off('click');
			img_slide.slide_arrow_fn($('#img_slide_wrap .btn_slide_arrow.right'));
		},5000);
		
		$('#img_slide_wrap').click(function(){
			clearInterval(timer);
		});
	},	
	move_fn:function(this_img){	
		$('#img_slide_wrap #roll_title_wrap,#img_slide_wrap #roll_desc_wrap').fadeOut(200,function(){
			$('#img_slide_wrap #roll_title_wrap').css({ 'top':img_slide.roll_title_y[img_slide.now_pos]});
			$('#img_slide_wrap #roll_desc_wrap').css({ 'top':img_slide.roll_desc_y[img_slide.now_pos]});
		});
		
		
		$('#img_slide_wrap #roll_title_wrap,#img_slide_wrap #roll_desc_wrap').fadeIn(500);	
			
		this_img
			.css({ 'z-index':999 })
			.stop()
			.animate({ 'left':0 }, 2000, 'easeInOutExpo', function(){
				$('#img_slide_wrap #roll_img_inner_wrap img').css('z-index',1);
				
				this_img.css('z-index', 2);	
				$('#img_slide_wrap #img_slide_nav li').removeClass('on');
				$('#img_slide_wrap #img_slide_nav li#img_slide_nav_'+img_slide.now_pos).addClass('on');

				$('#img_slide_wrap .btn_slide_arrow').on('click', function(){	
					$('#img_slide_wrap .btn_slide_arrow').off('click');
					img_slide.slide_arrow_fn($(this));
				});	
				
				
				
				
			
			});		
			
			//$('#img_slide_wrap #roll_title_wrap').stop().animate({ 'top':img_slide.roll_title_y[img_slide.now_pos]} , 1000, 'easeOutExpo')
			//$('#img_slide_wrap #roll_desc_wrap').stop().animate({ 'top':img_slide.roll_desc_y[img_slide.now_pos]} , 1000, 'easeOutExpo')	
						
			
	},
	
	prev_fn:function(){
		img_slide.now_pos = Number(img_slide.now_pos) - 1;
		if(img_slide.now_pos == -1){
			img_slide.now_pos = 2;
		}
		
		var this_img = $('#img_slide_wrap #roll_img_inner_wrap #roll_img_'+img_slide.now_pos);
		this_img.css({ 'left':-1000 });			
		img_slide.move_fn(this_img);
	},
	
	next_fn:function(){
		img_slide.now_pos = Number(img_slide.now_pos) + 1;
		if(img_slide.now_pos == 3){
			img_slide.now_pos = 0;
		}
		var this_img = $('#img_slide_wrap #roll_img_inner_wrap #roll_img_'+img_slide.now_pos);
		this_img.css({ 'left':1000 });				
		img_slide.move_fn(this_img);		
	},
	
	slide_arrow_fn:function(tg){		
		if(tg.hasClass('left')){
			img_slide.prev_fn();	
		}
		else if(tg.hasClass('right')){
			img_slide.next_fn();
		}			
	}
}

img_slide.start();

setNav('m1');

});
</script>


</body>
</html>
