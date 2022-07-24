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

	.myabout {
		border-bottom: 1px solid #EEE;
	}

	.lyshark {
		color: #3f51b5;
		background-image: -webkit-linear-gradient(left,#009688,#3f51b5 25%,#8bc34a 50%,#804170 75%,#2196f3);
		-webkit-text-fill-color: transparent;
		-webkit-background-clip: text;
		-webkit-background-size: 200% 100%;
		-webkit-animation: masked-animation 3.5s infinite linear;
	}
}
/*大屏幕适配结束*/

/*小屏适配开始*/
@media (max-width:799px) {
	.lyshark {
		display:none;
	}
}
/*小屏适配结束*/
</style>

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
<br>

</center>
<br><br>
</div>
<?php $this->need('footer.php'); ?>
