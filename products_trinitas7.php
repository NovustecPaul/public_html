<?
include_once "_hd.php";
?>

<style type="text/css">
#features dd,#features dt{display:none}
</style>

<div id="p_trinitas2" class="wrap">

    
    <?
	include_once "_gnb.php";
	?>
    
    
    <div id="bd">
    	<div id="sub_title_wrap">
        	<div id="blue_bar"></div>
            
            <div id="sub_title">
            	<h3><img src="inc/img/sub_title_products_T-Series.png" alt="Products > Trinitas T2" /></h3>
            </div>
        </div><!--#sub_title_wrap-->
        
        <div class="inner_wrap">
            <div class="right">
                                       
                
            	<div class="section" id="spec">
                	<h4>TRINITAS T7 Launched</h4>
 					<div align="center"><img src="inc/img/T7_test.jpg" width="770" height="533" alt="T2_Spec"/>
                	<h5><br />페이지 준비중입니다. <br />자세한 사항은 본사로 연락주세요.</h5></div>
                </div><!--.section-->                                                              
            </div>
            
        </div><!--.inner_wrap-->
    </div><!--#bd-->
    
    
<?
include_once "_ft.php";
?>

</div><!--.wrap-->

<script type="text/javascript" src="inc/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="inc/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_layer_popup.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_form.js"></script>
<script type="text/javascript" src="inc/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="inc/js/common.js"></script>
<script type="text/javascript">
$(function(){
	
	$('#features dd,#features dt').fadeIn(3000);
	
	$("div.section img").lazyload({
		effect : "fadeIn",
		effectspeed: 2000
	});
	
	setNav('m4');
});

</script>

</body>
</html>
