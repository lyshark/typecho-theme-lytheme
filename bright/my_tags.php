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
/*
.mytags a:nth-child(9n){background-color: #4A4A4A;}
.mytags a:nth-child(9n+1){background-color: #428BCA;}
.mytags a:nth-child(9n+2){background-color: #5CB85C;}
.mytags a:nth-child(9n+3){background-color: #D9534F;}
.mytags a:nth-child(9n+4){background-color: #567E95;}
.mytags a:nth-child(9n+5){background-color: #B433FF;}
.mytags a:nth-child(9n+6){background-color: #00ABA9;}
.mytags a:nth-child(9n+7){background-color: #B37333;}
.mytags a:nth-child(9n+8){background-color: #FF6600;}
*/

.mytags {
    margin-top: 20px;
    margin-bottom: 30px;
    padding-top: 25px;
}

.mytags a {
    margin: 10px 10px;
    padding: 4px 8px;
    display: inline-block;
    line-height: 28px;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 0.85rem;
    border: 1px solid #999;
    box-shadow: 0 0 23px #dedede;
    background: #fff;

    margin: 10px 10px;
    padding: 4px 8px;
    display: inline-block;
    line-height: 28px;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 0.85rem;
    box-shadow: 0 0 23px #dedede;
    background: #fff;
    position: relative;
    z-index: 1;
    display: inline-block;
    padding: 0 10px;
    background: #fff;
    border-radius: 7px;
    color: #3354AA;
    line-height: 40px;
    text-decoration: none;

/*
    box-shadow: 0 0 23px #dedede;
    position: relative;
    z-index: 1;
    background: #fff;
    border-radius: 20px;
    text-decoration: none;
    opacity: 0.80;
    filter: alpha(opacity=80);
    color: #fff;
    display: inline-block;
    margin: 0 14px 14px 0;
    padding: 5px 20px;
    line-height: 30px;
    opacity: 1.8;
    filter: alpha(opacity=80);
*/
}

.mytags a:hover {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
    border: none;
    box-shadow: 0 0 5px #b3d4fc;
    transition: .25s;
    transform: scale(1.05);
}

.clearfix, .row {
    zoom: 1;
    border-bottom: 1px solid #EEE;
}

</style>

