<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php   
/**  
    * archives  
    *  
    * @package custom  
    */  
$this->need('header.php'); ?>
    <div id="mainbox">   
            <div class="post"  id="post-<?php $this->cid(); ?>">   
            <div class="clear"></div>   
            <div class="entry">   
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $output = '';
    while($archives->next()):
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';
        if ($year != $year_tmp) {
            $year = $year_tmp;
        }
        if ($mon != $mon_tmp) {
            $mon = $mon_tmp;
            $output .= '<li class="node"><span>'. $year .' 年'. $mon .' 月</span><ul>';
        }
        $output .= '<li class="post">'.date('',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
    endwhile;
    $output .= '</ul></li></div>';
    echo $output;
?>          <div class="clear"></div>
            </div>   
        </div>   
    </div>
<?php $this->need('footer.php'); ?>

<style>
/*大屏幕适配开始*/
@media (min-width:800px) {
	div #mainbox {
		position: relative;
		margin: 0% auto 5%;
		width: 100%;
		margin-top: 0px;
		margin-bottom: 30px;
		padding: 20px 20px;
		padding-top: 25px;
	}

	.entry .node {
		margin: 5px 10px;
                display: inline-block;
                padding: 0 10px;
                line-height: 40px;
	}

        .entry .post {
		margin: 10px 10px;
		font-size: 1rem;
		font-weight: 500;
		border-radius: 0.85rem;
		display: inline-block;
		padding: 0 10px;
		color: #2daebf;
		line-height: 40px;
		border-bottom: 1px solid #EEE;
		border-radius: 5px;
		margin-bottom: 20px;
		border: none;
		box-shadow: 0 0 5px #3dc340;
       }

        .post {
                border-bottom: 0px solid #EEE;
        }
    
       .entry .post:hover {
                border: none;
                box-shadow: 0 0 5px #b3d4fc;
                transition: .25s;
       }
}
/*大屏幕适配结束*/

/*小屏适配开始*/
@media (max-width:799px) {
        div #mainbox {
                position: relative;
                margin: 0% auto 5%;
                width: 100%;
                margin-top: 0px;
                margin-bottom: 30px;
                padding: 20px 20px;
                padding-top: 25px;
		width: 90%;
        }

        .entry .node {
                margin: 0px 0px;
                display: inline-block;
                padding: 0 10px;
                line-height: 9px;
        }

        .entry .post {
                margin: 10px 10px;
                font-size: 1rem;
                font-weight: 500;
                border-radius: 0.85rem;
                display: inline-block;
                padding: 0 10px;
                color: #2daebf;
                line-height: 40px;
                border-bottom: 1px solid #EEE;
                border-radius: 5px;
                margin-bottom: 20px;
                border: none;
                box-shadow: 0 0 5px #3dc340;
       }

	.post {
		border-bottom: 0px solid #EEE;
	}

       .entry .post:hover {
                border: none;
                box-shadow: 0 0 5px #b3d4fc;
                transition: .25s;
       }
}
/*小屏适配结束*/

</style>
