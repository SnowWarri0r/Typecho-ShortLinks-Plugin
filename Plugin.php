<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 外链转内链
 *
 * @package ShortLinks
 * @author  SnowWarrior,鸿
 * @version 0.0
 * @link
 */
class ShortLinks_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return String
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){

    }
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return String
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){

    }

    public static function config(Typecho_Widget_Helper_Form $form){}

    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function render(){}
}
