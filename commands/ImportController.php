<?php


namespace app\commands;


use phpDocumentor\Reflection\Types\Null_;
use UAParser\Parser;
use app\models\Logs;
use Yii;
use yii\console\ExitCode;
use yii\helpers\Console;

class ImportController extends \yii\console\Controller
{
    public $defaultAction = 'go';


    public function actionGo($fileNameImport = 'modimio.access.log')
    {
        $this->stdout("Начинаем импорт.\n", Console::BOLD);

        $importPath = Yii::getAlias('@app/import/');
        $path = Yii::getAlias($importPath . $fileNameImport);

        $processingPath = \Yii::getAlias($importPath . 'processing.log');
        $lastProcessingPath = \Yii::getAlias($importPath . 'last.processing.log');
        if (file_exists($processingPath) === true) {
            unlink($processingPath);
        }

        if (file_exists($path) === false) {
            $this->stdout("Файл импорта не найден!\n", Console::BOLD, Console::BG_RED);
            return ExitCode::OK;
        }

        copy($path, $processingPath);
        copy($processingPath, $lastProcessingPath);
        $this->actionParseLog($path);
        unlink($processingPath);
        unlink($path);

        $this->stdout("Импорт успешно завершен.\n", Console::BOLD, Console::BG_GREEN);

        return ExitCode::OK;

    }

    public function actionParseLog($file)
    {
        $log = file($file);
        $pattern = '/(?<ip>[0-9.]+)\s+\-\s+\-\s\[(?<date>.+)\s\+\d+\]\s"(?<request>[^"]+)"\s(?<code>\d+)\s+(?<size>\d+)\s"(?<url>[^"]+)"\s"(?<useragent>[^"]+)"/m';
        $iter = 0;
        $total = count($log);
        Console::startProgress($iter, $total);
        foreach ($log as $string) {

            preg_match_all($pattern, $string, $matches, PREG_SET_ORDER, 0);

            foreach ($matches as $match) {
                $model = new Logs();

                if (empty($match) === false) {
                    $date = str_replace('/', ' ', \app\commands\ImportController::str_replace_once(':', ' ', $match['date']));
                    $dateObj = new \DateTime($date);
                    $model->ip = $match['ip'];
                    $model->date = $dateObj->format('Y-m-d H:i:s');
                    $model->url = $match['url'] === '-' ? Null : $match['url'];
                    $model->user_agent = $match['useragent'];
                    $parser = Parser::create();
                    $result = $parser->parse($model->user_agent);
                    $model->os = $result->os->family . '.' . $result->os->major . '.' . $result->os->minor;
                    $model->architecture = $result->os->architecture;
                    $model->browser = $result->ua->family;
                    $model->save();
                    Console::updateProgress($iter, $total);
                    $iter++;
                }
            }
        }
        Console::endProgress();
    }

    public static function str_replace_once($search, $replace, $text)
    {
        $pos = strpos($text, $search);
        return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }

}