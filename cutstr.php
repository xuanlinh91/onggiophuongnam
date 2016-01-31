<?php 
	function cstr($text, $start=0, $limit=12)
    {
        if (function_exists('mb_substr')) {
            $more = (mb_strlen($text) > $limit) ? TRUE : FALSE;
            $text = mb_substr($text, 0, $limit, 'UTF-8');
            return array($text, $more);
        } elseif (function_exists('iconv_substr')) {
            $more = (iconv_strlen($text) > $limit) ? TRUE : FALSE;
            $text = iconv_substr($text, 0, $limit, 'UTF-8');
            return array($text, $more);
        } else {
            preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $text, $ar);
            if(func_num_args() >= 3) {
                if (count($ar[0])>$limit) {
                    $more = TRUE;
                    $text = join("",array_slice($ar[0],0,$limit))."…";
                }
                $more = TRUE;
                $text = join("",array_slice($ar[0],0,$limit));
            } else {
                $more = FALSE;
                $text =  join("",array_slice($ar[0],0));
            }
            return array($text, $more);
        }
} 
 
	function cut_title($text, $limit=25)
	{
		$val = cstr($text, 0, $limit);
		return $val[1] ? $val[0]."…" : $val[0];
	}
?>