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
    public static function activate(){
    }

    public static function deactivate(){}

    public static function config(Typecho_Widget_Helper_Form $form){}

    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function render(){}
}
