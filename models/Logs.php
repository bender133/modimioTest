<?php


namespace app\models;


class Logs extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{logs}}';
    }
}