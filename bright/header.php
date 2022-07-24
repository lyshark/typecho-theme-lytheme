<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js" lang="zh-CN">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- 判断是否是主站是则输出概述,不是则输出原文内容 -->
    <?php if($this->is('index')): ?>
	    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?> - 专注信息安全技术</title>
    <?php else: ?>
	    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php endif; ?>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="icon" href="<?php $this->options->themeUrl('./img/icon.ico'); ?>" type="image/x-icon" alt="lyshark,seo,logo">
    <!-- <script type="text/javascript" src="<?php $this->options->themeUrl('./js/debug.js'); ?>"></script> -->

    <!-- 判断是否是主站是则输出概述,不是则输出原文内容 -->
    <?php if($this->is('index')): ?>
        <?php $this->header('description=本站点是一个面向信息安全爱好者的知识分享平台。自创建以来，一直致力并专注于分享信息安全领域的研究成果，推动并帮助安全爱好者通过互联网学习知识，从而让更多安全爱好者从中受益。&generator=&template=&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2='); ?>
    <?php else: ?>
        <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2='); ?>
    <?php endif; ?>
</head>

<body>
<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-9">
            <?php if ($this->options->logoUrl): ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description"><?php $this->options->description() ?></p>
            <?php endif; ?>
            </div>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="col-mb-12">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="body">
    <div class="container">
        <div class="row">
