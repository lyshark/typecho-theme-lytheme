<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php   
/**  
    * about
    *  
    * @package custom
    */  
$this->need('header.php'); ?>

<style>
/*大屏幕适配开始*/
@media (min-width:800px) {
	body {
		line-height: unset;
	}
	.lyshark {
		font-weight: bolder;
		color: #3f51b5;
		background-image: -webkit-linear-gradient(left,#009688,#3f51b5 25%,#8bc34a 50%,#804170 75%,#00ff06);
		-webkit-text-fill-color: transparent;
		-webkit-background-clip: text;
		-webkit-background-size: 200% 100%;
		-webkit-animation: masked-animation 3.5s infinite linear;
	}
	.media_min {
		display:none;
	}
	.about_style {
		margin-top: -6px;
		padding-top: 26px;
		padding-bottom: 26px;
		text-align: center;
		margin-bottom: 35px;
		border: none;
		// box-shadow: 0 0 5px #3dc340;
		transform: translateX(10px);
		width: 98%;
	}
}
/*大屏幕适配结束*/

/*小屏适配开始*/
@media (max-width:799px) {
	.lyshark {
		display:none;
	}
	.media_min {
		display:block;
	}
}
/*小屏适配结束*/
</style>

<br><br>

<div class="about_style">
<center>
<?php
$str = "
 __                      __                            __       
/  |                    /  |                          /  |      
$$ | __    __   _______ $$ |____    ______    ______  $$ |   __ 
$$ |/  |  /  | /       |$$      \  /      \  /      \ $$ |  /  |
$$ |$$ |  $$ |/$$$$$$$/ $$$$$$$  | $$$$$$  |/$$$$$$  |$$ |_/$$/ 
$$ |$$ |  $$ |$$      \ $$ |  $$ | /    $$ |$$ |  $$/ $$   $$<  
$$ |$$ \__$$ | $$$$$$  |$$ |  $$ |/$$$$$$$ |$$ |      $$$$$$  \ 
$$ |$$    $$ |/     $$/ $$ |  $$ |$$    $$ |$$ |      $$ | $$  |
$$/  $$$$$$$ |$$$$$$$/  $$/   $$/  $$$$$$$/ $$/       $$/   $$/ 
    /  \__$$ |                                                  
    $$    $$/                                                   
     $$$$$$/                                                    
";

echo "<xmp class='lyshark'>"; echo $str; echo"</xmp>";
?>
</center>
	<div class="myabout">
	<center>
	<br><br>
	<b class='media_min'>您正在小屏访问,部分特效无法加载.</b>
	<br>
	<b style="color:springgreen;" class="lyshark">[ 孤风洗剑 ]</b>
	<br><br><br><br>
	<a href="https://www.cnblogs.com/lyshark">博客园(主站)</a> | 
	<a href="https://github.com/lyshark">GitHub</a>


	<br><br>
	</center>
	<br><br><br><br><br><br>
	</div>
</div>

<?php $this->need('footer.php'); ?>
