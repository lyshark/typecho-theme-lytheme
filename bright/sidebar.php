<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
        <section class="widget">
        <h3 class="widget-title"><?php _e('公告'); ?></h3>
        <ul class="widget-list">
			<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('./css/sun_box.css'); ?>" />
				<div class="sun-box" style="margin-top: -90px; margin-left: -16px;">
					<div class="sun">
						<div class="sun-line">
								<ul class="list-unstyled">
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
								</ul>
						</div>
					<div class="sun-body"></div>
					<div class="sun-eye"><span></span><span></span></div>
				 </div>
			</div>
			<br><br>
			<!--文章公告栏统计-->
			<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
			<div class="card-data">
				<div class="card-data-item">
					<div class="headline">文章</div>
					<div class="length-num"><?php $stat->publishedPostsNum() ?></div>
				</div>
				<div class="card-data-item">
					<div class="headline">分类</div>
					<div class="length-num"><?php $stat->categoriesNum() ?></div>
				</div>
				<div class="card-data-item">
					<div class="headline">评论</div>
					<div class="length-num"><?php $stat->publishedCommentsNum() ?></div>
				</div>
				 <div class="card-data-item">
					<div class="headline">页面</div>
					<div class="length-num"><?php $stat->publishedPagesNum() ?></div>
				</div>
			</div>

        </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
                <?php /* $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); */?>

		<ul class="widget-list">
			<?php $this->widget('Widget_Metas_Category_List')->parse('<li class="category-level-0 category-parent"><a href="{permalink}">{name} ({count})</a></li>'); ?>
		</ul>

    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        	<ul class="widget-list">
            	<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年 m月&limit=30')->parse('<li><a href="{permalink}">{date} ({count})</a></li>'); ?>
        	</ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

</div><!-- end #sidebar -->
