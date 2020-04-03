<?php
/**
 * @param $str
 * @param $mode
 * @return string
 */
function zip($str,$mode){
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
function move($a,$d){
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
function dense($str,$mode){
    $res=str_split($str,1);
    $len=sizeof($res);
    $e=$d=($mode=='en')?rand(0,25):ord($res[$len-1])-97;
    $add=$len-($mode=='en')?0:1;
    for($i=0;$i<$len-(($mode=='en')?0:1);$i++){
        $d=((($i%2==0)?$d+$add:$d*$i)^100)%1000;
        $res[$i]=move($res[$i],$d*(($mode=='en')?1:-1));
    }
    ($mode=='en')?$res[$len]=chr($e+97):$res[$len-1]=null;
    return null.join($res);
}
for($i=0;$i<0;$i++){
    $s=dense(zip('https://b.nit9.cn/index.php/archives/6','en'),'en');
    echo urlencode($s).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $s=zip(dense($s,'de'),'de');
    echo $s.'</br>';
}
