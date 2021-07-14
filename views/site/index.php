<?php
use UAParser\Parser;

$log = file('../tz/modimio.access.log.1');
$pattern = '/(?<ip>[0-9.]+)\s+\-\s+\-\s\[(?<date>[^\]]+)\]\s"(?<request>[^"]+)"\s(?<code>\d+)\s+(?<size>\d+)\s"(?<url>[^"]+)"\s"(?<useragent>[^"]+)"/m';

foreach ($log as $string) {


    preg_match_all($pattern, $string, $matches, PREG_SET_ORDER, 0);

    foreach ($matches as $match) {
        if (empty($match['useragent']) === false) {
//            print_r($match['browser'] . '<hr>');
        }
    }
}

$ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_1_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/16D57 Instagram 85.0.0.10.100 (iPhone10,6; iOS 12_1_4; ru_RU; ru; scale=3.00; gamut=wide; 1125x2436; 145918352)';
$parser = Parser::create();
$result = $parser->parse($ua);

//'/(?<ip>[0-9.]+)[\s-]{2,}\[(?<date>[^\]]+)\]\s"([^"]+)"\s(\d+)\s+(\d+)\s"(?<url>[^"]+)"\s".+?\((?<os>([A-Z]|i).+?(?<arch>\s{1}\D{1,4}[0-9]{2})*)\)/m'
?>

<pre>
    <?php var_dump($result); ?>
</pre>

