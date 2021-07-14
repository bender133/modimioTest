<?php


namespace app\commands;


use UAParser\Parser;

class ImportController extends \yii\console\Controller
{
    public function actionIndex ($message = 5)
    {
        $ua = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.3022 Yowser/2.5 Safari/537.36';
        $parser = Parser::create();
        $result = $parser->parse($ua);

        echo $result->ua->family;
    }

}