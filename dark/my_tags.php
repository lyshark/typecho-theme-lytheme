<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php   
/**  
    * tags
    *  
    * @package custom
    */  
$this->need('header.php'); ?>
    
<?php 
        $db = Typecho_Db::get();
        $options = Typecho_Widget::widget('Widget_Options');
        $tags= $db->fetchAll($db->select()->from('table.metas')
                ->where('table.metas.type = ?', 'tag')
                ->order('table.metas.order', Typecho_Db::SORT_DESC));
	echo "<div class='mytags'>";
	foreach($tags AS $tag) {
            $type = $tag['type'];
            $count = $tag['count'];
            $routeExists = (NULL != Typecho_Router::get($type));
            $tag['pathinfo'] = $routeExists ? Typecho_Router::url($type, $tag) : '#';
            $tag['permalink'] = Typecho_Common::url($tag['pathinfo'], $options->index);
            echo "<a href=\"".$tag['permalink']."\">".$tag['name']." (".$tag['count'].")"."</a> ";
        }
	echo "</div>";
?>

<?php $this->need('footer.php'); ?>

<style>
/*大屏幕适配开始*/
@media (min-width:800px) {
	.mytags {
		margin-top: 25px;
		// margin-bottom: 30px;
		padding-top: 26px;
		padding-bottom: 26px;
		text-align: center;
		margin-bottom: 35px;
		border: none;
		box-shadow: 0 0 5px #3dc340;
		transform: translateX(10px);
		width: 98%;
	}

	.mytags a {
		border: 1px solid #999;
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

	.mytags a:hover {
		color: #00ff06;
		box-shadow: 0 0 5px #b3d4fc;
		transition: .25s;
		transform: scale(1.05);
	}

	.clearfix, .row {
		zoom: 1;
	}
}
/*大屏幕适配结束*/

/*小屏适配开始*/
@media (max-width:799px) {
        .mytags {
                margin-top: 25px;
                // margin-bottom: 30px;
                padding-top: 26px;
                padding-bottom: 26px;
                text-align: center;
                margin-bottom: 35px;
                border: none;
                box-shadow: 0 0 5px #3dc340;
                transform: translateX(11px);
                width: 94%;
        }

        .mytags a {
                border: 1px solid #999;
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

        .mytags a:hover {
                color: #00ff06;
                box-shadow: 0 0 5px #b3d4fc;
                transition: .25s;
                transform: scale(1.05);
        }

        .clearfix, .row {
                zoom: 1;
        }
}
/*小屏适配结束*/
</style>
