<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property string $title
 * @property string $source
 * @property string $content
 * @property string $images
 * @property string $update_time
 * @property string $classify
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['content'], 'string'],
            [['images'], 'string'],
            [['update_time'], 'safe'],
            [['id'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 256],
            [['source'], 'string', 'max' => 64],
            [['classify'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'source' => 'Source',
            'content' => 'Content',
            'images' => 'Images',
            'update_time' => 'Update Time',
            'classify'=>'classify'
        ];
    }

    public function getArticleId(){
        return date("Ymdhis");
    }

    public function getArticleList(){
        $sql = "select * from article order by update_time desc limit 3";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $res;
    }

    public function getAllArticles($page){
        $count = 10;
        if($page>0){
            $page = $page-1;
        }
        $start = $page*$count;
        $sql = "select * from article order by update_time desc limit $start,$count";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $res;
    }

    public function editArticle(){
        $id = $this->id;
        $sql = "select * from article where id = $id";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        $title = $this->title;
        $content = $this->content;
        $classify = $this->classify;
        $id = $this->id;
        if($res == false){
            return false;
        }else{
            $sql = "update article set title=:title,content=:content,classify=:classify where id=:id";
            $res = Yii::$app->db->createCommand($sql)->bindParam(":title",$title)
                ->bindParam(":content",$content)
                ->bindParam(":classify",$classify)
                ->bindParam(":id",$id)
                ->execute();
            return true;
        }
    }

    public function getArticleCount(){
        $sql = "select count(*) as count from article ";
        $res = Yii::$app->db->createCommand($sql)->queryOne();
        return $res;
    }
}
