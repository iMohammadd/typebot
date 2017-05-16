<?php
namespace App\Helper;

class Translate {
    private static $keys = [
        '113'   =>  '1590',
        '119'   =>  '1589',
        '101'   =>  '1579',
        '114'   =>  '1602',
        '116'   =>  '1601',
        '121'   =>  '1594',
        '117'   =>  '1593',
        '105'   =>  '1607',
        '111'   =>  '1582',
        '112'   =>  '1581',
        '91'    =>  '1580',
        '93'    =>  '1670',
        '97'    =>  '1588',
        '115'   =>  '1587',
        '100'   =>  '1740',
        '102'   =>  '1576',
        '103'   =>  '1604',
        '104'   =>  '1575',
        '106'   =>  '1578',
        '107'   =>  '1606',
        '108'   =>  '1605',
        '59'    =>  '1705',
        '39'    =>  '1711',
        '122'   =>  '1592',
        '120'   =>  '1591',
        '99'    =>  '1586',
        '118'   =>  '1585',
        '98'    =>  '1584',
        '110'   =>  '1583',
        '109'   =>  '1662',
        '44'    =>  '1608',
        '81'    =>  '1611',
        '87'    =>  '1612',
        '69'    =>  '1613',
        '82'    =>  '1585',
        '84'    =>  '1548',
        '89'    =>  '1563',
        '35'    =>  '44',
        '73'    =>  '93',
        '79'    =>  '91',
        '80'    =>  '92',
        '123'   =>  '125',
        '65'    =>  '1614',
        '83'    =>  '1615',
        '68'    =>  '1616',
        '70'    =>  '1617',
        '71'    =>  '1728',
        '72'    =>  '1570',
        '74'    =>  '1600',
        '75'    =>  '171',
        '76'    =>  '187',
        '90'    =>  '1577',
        '88'    =>  '1610',
        '67'    =>  '1688',
        '86'    =>  '1572',
        '66'    =>  '1573',
        '78'    =>  '1571',
        '77'    =>  '1569',
        '32'    =>  '32',
        '92'    =>  '92'
    ];

    private static $plain_keys = [
        'q' => 'ض',
        'w' => 'ص',
        'e' => 'ث',
        'r' => 'ق',
        't' => 'ف',
        'y' => 'غ',
        'u' => 'ع',
        'i' => 'ه',
        'o' => 'خ',
        'p' => 'ح',
        '[' => 'ج',
        ']' => 'چ',
        'a' => 'ش',
        's' => 'س',
        'd' => 'ی',
        'f' => 'ب',
        'g' => 'ل',
        'h' => 'ا',
        'j' => 'ت',
        'k' => 'ن',
        'l' => 'م',
        ';' => 'ک',
        '\'' => 'گ',
        'z' => 'ظ',
        'x' => 'ط',
        'c' => 'ز',
        'v' => 'ر',
        'b' => 'ذ',
        'n' => 'د',
        'm' => 'پ',
        ',' => 'و',
        'Q' => 'ً',
        'W' => 'ٌ',
        'E' => 'ٍ',
        'R' => 'ر',
        'T' => '،',
        'Y' => '؛',
        'I' => ']',
        'O' => '[',
        'P' => '\\',
        '{' => '}',
        'A' => 'َ',
        'S' => 'ُ',
        'D' => 'ِ',
        'F' => 'ّ',
        'G' => 'ۀ',
        'H' => 'آ',
        'J' => 'ـ',
        'K' => '«',
        'L' => '»',
        'Z' => 'ة',
        'X' => 'ي',
        'C' => 'ژ',
        'V' => 'ؤ',
        'B' => 'إ',
        'N' => 'أ',
        'M' => 'ء',
        ' ' => ' ',
        "\\" => "\\"
    ];


    private static function getKey()
    {
        return self::$keys;
    }

    private static function getPlainKey()
    {
        return self::$plain_keys;
    }

    private static function trans($char)
    {
        $k = mb_convert_encoding($char, 'UCS-2LE', 'UTF-8');
        $k1 = ord(substr($k, 0, 1));
        $k2 = ord(substr($k, 1, 1));
        return $k2 * 256 + $k1;
    }

    private static function convert($int)
    {
        return mb_convert_encoding(pack('n', $int), 'UTF-8', 'UTF-16BE');
    }

    private static function toArray($str, $l = 0)
    {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($str, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function translate($query)
    {
        $keys = self::getPlainKey();
        $array = self::toArray($query);
        $resp = [];
        //return $array;
        for ($i=0; $i<count($array); $i++) {
            $resp[$i] = $array[$i];
            //$converted[] = \App\Helper\Translate::trans($array[$i]);
            foreach ($keys as $k => $v) {
                if ($array[$i] == $k) {
                    $resp[$i] = $v;
                    break;
                } elseif ($array[$i] == $v) {
                    $resp[$i] = $k;
                    break;
                }
            }
        }
        return implode($resp);
    }


}