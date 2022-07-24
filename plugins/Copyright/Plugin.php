<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 版权声明插件
 *
 * @package Copyright
 * @author  admin
 * @version 1.0.4
 * @link https://github.com/Yves-X/Copyright-for-Typecho
 */

class Copyright_Plugin implements Typecho_Plugin_Interface {
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Copyright_Plugin', 'Copyright');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {
        $author = new Typecho_Widget_Helper_Form_Element_Text('author', NULL, _t('作者名称'), _t('作者'));
        $form->addInput($author);
        $notice = new Typecho_Widget_Helper_Form_Element_Text('notice', NULL, _t('转载时须注明出处及本声明'), _t('声明'));
        $form->addInput($notice);
        $showURL = new Typecho_Widget_Helper_Form_Element_Checkbox('showURL', array(1 => _t('显示原（本）文链接')), NULL, NULL, NULL);
        $form->addInput($showURL);
        $showOnPost = new Typecho_Widget_Helper_Form_Element_Checkbox('showOnPost', array(1 => _t('在文章显示')), NULL, NULL, NULL);
        $form->addInput($showOnPost);
        $showOnPage = new Typecho_Widget_Helper_Form_Element_Checkbox('showOnPage', array(1 => _t('在独立页面显示')), NULL, NULL, NULL);
        $form->addInput($showOnPage);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {
    }

    /**
     * 插件实现方法
     *
     * @access public
     * @return void
     */

    public static function Copyright($content, $widget, $lastResult) {
        $content = empty($lastResult) ? $content : $lastResult;
        $cr = self::apply($widget);
        $cr_html = self::render($cr);
        $content = $content . $cr_html;
        return $content;
    }

    private static function globalCopyright($widget) {
        $cr = array('show_on_post' => '', 'show_on_page' => '', 'show_url' => '', 'author' => '', 'url' => '', 'notice' => '');
        $cr['show_on_post'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->showOnPost;
        $cr['show_on_page'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->showOnPage;
        $cr['show_url'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->showURL[0];
        $cr['author'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->author;
        $cr['url'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->url;
        $cr['notice'] = Typecho_Widget::widget('Widget_Options')->plugin('Copyright')->notice;
        return $cr;
    }

    private static function localCopyright($widget) {
        $cr = array('switch_on' => '', 'author' => '', 'url' => '', 'notice' => '');
        $cr['switch_on'] = $widget->fields->switch;
        $cr['author'] = $widget->fields->author;
        $cr['url'] = $widget->fields->url;
        $cr['notice'] = $widget->fields->notice;
        return $cr;
    }

    private static function apply($widget) {
        $gcr = self::globalCopyright($widget);
        $lcr = self::localCopyright($widget);
        $cr = array('is_enable' => '', 'is_original' => '', 'author' => '', 'url' => '', 'notice' => '');
        if ($widget->is('single')) {
            $cr['is_enable'] = 1;
        }
        if ($widget->parameter->type == 'post' && $gcr['show_on_post'] == 0) {
            $cr['is_enable'] = 0;
        }
        if ($widget->parameter->type == 'page' && $gcr['show_on_page'] == 0) {
            $cr['is_enable'] = 0;
        }
        if ($lcr['switch_on'] != '') {
            $cr['is_enable'] = $lcr['switch_on'];
        }
        if ($gcr['show_url'] == 0) {
            $cr['url'] = 0;
        }
        $cr['url'] = $lcr['url'] != '' ? $lcr['url'] : $gcr['url'];
        if ($gcr['show_url'] == 1 && $lcr['url'] == '') {
            $cr['is_original'] = 1;
            $cr['url'] = $widget->permalink;
        }
        $cr['author'] = $lcr['author'] != '' ? $lcr['author'] : $gcr['author'];
        $cr['notice'] = $lcr['notice'] != '' ? $lcr['notice'] : $gcr['notice'];
        return $cr;
    }

    private static function render($cr) {
        $copyright_html = '';
        $t_author = '';
        $t_notice = '';
        $t_url = '';
        if ($cr['is_enable']) {
           // if ($cr['author']) {
           //     $t_author = '<p>文章作者：' . $cr['author'] . '</p>';
           // }
            if ($cr['url']) {
                if ($cr['is_original']) {
                    $t_url = '<p><b>本文链接：</b><a href="' . $cr['url'] . '">' . $cr['url'] . '</a></p>';
                } else {
                    $t_url = '<p><b>原文链接：</b><a target="_blank" href="' . $cr['url'] . '">' . $cr['url'] . '</a></p>';
                }
            }
            if ($cr['notice']) {
                $t_notice = '<p>' . $cr['notice'] . '</p>';
            }
            $copyright_html = '</br><blockquote class="content-copyright" style="font-style:normal">' . $t_author . $t_url . $t_notice . '</blockquote>';
        }
        return $copyright_html;
    }

}
