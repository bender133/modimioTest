<?php
use UAParser\Parser;

$log = file('../tz/modimio.access.log.1');
$pattern = '/(?<ip>[0-9.]+)\s+\-\s+\-\s\[(?<date>.+)\s\+\d+\]\s"(?<request>[^"]+)"\s(?<code>\d+)\s+(?<size>\d+)\s"(?<url>[^"]+)"\s"(?<useragent>[^"]+)"/m';
$total = count($log);
var_dump($total);
foreach ($log as $string) {


    preg_match_all($pattern, $string, $matches, PREG_SET_ORDER, 0);


    foreach ($matches as $match) {
        if (empty($match['useragent']) === false) {
//            print_r($match['browser'] . '<hr>');
            $date = str_replace('/', ' ', \app\commands\ImportController::str_replace_once(':', ' ', $match['date']));
            $dateObj = new DateTime($date);
            echo $dateObj->format('Y-m-d H:i:s') . '<hr>';

        }
    }
}

$ua = '2.93.223.141 - - [21/Mar/2019:09:47:46 +0300] "GET / HTTP/1.1" 200 8691 "http://www.google.com/" "Mozilla/5.0 (Linux; Android 6.0; CRO-U00 Build/HUAWEICRO-U00) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36"
';
$parser = Parser::create();
$result = $parser->parse($ua);

//'/(?<ip>[0-9.]+)[\s-]{2,}\[(?<date>[^\]]+)\]\s"([^"]+)"\s(\d+)\s+(\d+)\s"(?<url>[^"]+)"\s".+?\((?<os>([A-Z]|i).+?(?<arch>\s{1}\D{1,4}[0-9]{2})*)\)/m'
?>

<pre>
<!--    --><?php //var_dump($result); ?>
</pre>

