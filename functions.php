<?php
class My
{
    static function CheckDate($str)
    {
        $d = substr($str, 0, 2);
        $m = substr($str, 3, 2);
        $y = substr($str, 6, 4);

        if (!checkdate($m, $d, $y))
            return false;

        return DateTime::createFromFormat('d-m-Y G:i:s', "$d-$m-$y 00:00:00");
    }
}
