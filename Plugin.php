<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 外链转内链
 *
 * @package Link2own
 * @author  SnowWarri0r ihesro
 * @version 0.1
 * @link https://www.onesnowwarrior.cn/ https://b.nit9.cn
 */
class Link2own_Plugin implements Typecho_Plugin_Interface
{

    public static function activate(){
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Link2own_Plugin', 'replace');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Link2own_Plugin', 'replace');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->contentEx = array('Link2own_Plugin', 'replace');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->filter = array('Link2own_Plugin', 'replace');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->filter = array('Link2own_Plugin', 'replace');
        Typecho_Plugin::factory('Widget_Archive')->singleHandle = array('Link2own_Plugin', 'replace');
    }

    public static function deactivate(){
    }

    public static function config(Typecho_Widget_Helper_Form $form){
    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form){
    }

    public static function replace($str){
        if((strpos($str,'http')&&strpos($str,'#l'))!=false){
            preg_match_all('!"(http.+?)#l"!',$str,$arr);
            foreach($arr[1] as $link){
                $own="https://www.55brl.cn/jump/?link=".urlencode(self::dense(self::zip("$link",'en'),'en'));
                $str=preg_replace("!$link#l!","$own",$str);
            }
        }
        return $str;
    }


    /**
     * @param $str
     * @param $mode
     * @return string
     */
    public static function zip($str,$mode){
        ($mode=='en')?($search='https://')&&($replace='*s'):($search='*s')&&($replace='https://');
        $str=str_replace($search,$replace,$str);
        ($mode=='en')?($search='http://')&&($replace='*h'):($search='*h')&&($replace='http://');
        $str=str_replace($search,$replace,$str);
        return $str;
    }
    /**
     * @param $a
     * @param $d
     * @return string
     * 凯撒位移
     */
    public static function move($a,$d){
        $a=ord($a);//ascii
        $b=0;//左边界
        $len=26;//凯撒循环大小
        switch ($a){
            case $a>=65 && $a<=90:
                $b=65;
                $d=($d>=0)?$d:$d%26+26;
                break;
            case $a>=97 && $a<=122:
                $b=97;
                $d=($d>=0)?$d:$d%26+26;
                break;
            case $a>=48 && $a<=57:
                $b=48;
                $len=10;
                $d=($d>=0)?$d:$d%10+10;
                break;
        }
        return chr(($b==0)?$a:(($a-$b+$d)%$len)+$b);
    }
    /**
     * @param $str
     * @param $mode
     * @return string
     * 加密&解密
     */
    public static function dense($str,$mode){
        $res=str_split($str,1);
        $len=sizeof($res);
        $e=$d=($mode=='en')?rand(0,25):ord($res[$len-1])-97;
        $add=$len-($mode=='en')?0:1;
        for($i=0;$i<$len-(($mode=='en')?0:1);$i++){
            $d=((($i%2==0)?$d+$add:$d*$i)^100)%1000;
            $res[$i]=self::move($res[$i],$d*(($mode=='en')?1:-1));
        }
        ($mode=='en')?$res[$len]=chr($e+97):$res[$len-1]=null;
        return null.join($res);
    }
}
