<?php


namespace app\models;

use UAParser\Parser;

class Logs extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{logs}}';
    }

}