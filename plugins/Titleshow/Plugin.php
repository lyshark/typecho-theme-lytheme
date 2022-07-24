<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 该插件会让文章加密功能只加密文章内容/或者部分文章内容
 * 
 * @package Titleshow
 * @author admin
 * @version 1.0.0
 * @link http://qqdie.com
 */
class Titleshow_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->filter = array('Titleshow_Plugin', 'tshow');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
      
      $jianrong = new Typecho_Widget_Helper_Form_Element_Radio('jianrong',array(
      '0' => _t('通用模式'),
      '1' => _t('定制模式'),
    ),'0',_t('模式控制'),_t('为做过特殊处理的模板选择不同模式，一般选择通用模式即可'));
    $form->addInput($jianrong); 
    
        $tixing = new Typecho_Widget_Helper_Form_Element_Text('tixing', NULL, NULL, _t('密码文字提醒'), _t('不填写则默认为 [该文章已加密，如需访问，请验证站长身份。]'));
        $form->addInput($tixing);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
public static function tshow($v, $obj) {
	$tixing = Typecho_Widget::widget('Widget_Options')->plugin('Titleshow')->tixing;//获取设置参数
	$jianrong = Typecho_Widget::widget('Widget_Options')->plugin('Titleshow')->jianrong;//获取设置参数
	if(empty($tixing)){$tixing='该文章已加密，如需访问，请验证站长身份。';} //如果未设置则设置默认文字
	$v['titleshow'] = false;
	$cs='';

	if(false !== strpos($v['text'], '<!--more-->'))
	{
		//针对more标签进行处理
		$cs = explode('<!--more-->', $v['text']);
		$cs=$cs[0] . '<p class="more"><a>- 无阅读权限 -</a></p>';
	}
  
/** 如果访问权限被禁止【就是如果需要密码】 */
if ($v['hidden'])
{
	if($jianrong==1)
	{
		$v['text'] =$cs;
	}
	else
	{
		$v['text'] =$cs.'
		!!!
		<form class="protected" action="' . Typecho_Widget::widget('Widget_Security')->getTokenUrl($v['permalink']). '" method="post">'.'<p class="word">'.$tixing.'</p>'.'<p><input type="password" class="text" name="protectPassword" /><input type="hidden" name="protectCID" value="' . $v['cid'] . '" />&nbsp;<input type="submit" class="submit" value="' . _t('提交') . '" /></p>'.'</form>
		!!!
		';
	}
	/** 跳过系统默认 */
	$v['hidden'] = false;
	/** 用于模板判断插件 */
	$v['titleshow'] = true;
	$v['jianrong'] = $jianrong;
}
	/** 返回数据 */
	return $v; 
}
}
