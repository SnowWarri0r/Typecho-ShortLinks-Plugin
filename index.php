<?php
function replace($str){
    if((strpos($str,'http')&&strpos($str,'#l'))!=false){
        preg_match_all('/"(http.+?)#l"/',$str,$arr);
        foreach($arr[1] as $link){
            $str=preg_replace("!$link#l!","123",$str);
        }
    }
    return $str;
}
echo replace('"https://b.nit9.cn#l"');