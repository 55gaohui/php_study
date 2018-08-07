<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-04
 * Time: 8:28
 */
//内容实体类
class ContentModel extends Model {
    private $title;
    private $nav;
    private $attr;
    private $tag;
    private $keyword;
    private $thumbnail;
    private $info;
    private $source;
    private $author;
    private $content;
    private $gold;
    private $commend;
    private $count;
    private $color;
    //拦截器（__set）
    public function __set($_key, $_value){
        $this->$_key = Tool::mysqliString($_value);
    }
    //拦截器（__get）
    public function __get($_key){
        return $this->$_key;
    }
    //新增文档内容
    public function addContent(){
        $_sql = "INSERT INTO 
                                cms_content (
                                                title,
                                                nav,
                                                info,
                                                thumbnail,
                                                source,
                                                author,
                                                tag,
                                                keyword,
                                                attr,
                                                content,
                                                commend,
                                                count,
                                                gold,
                                                color,
                                                date
                                            ) 
                                    VALUES (
                                                '$this->title',
                                                '$this->nav',
                                                '$this->info',
                                                '$this->thumbnail',
                                                '$this->source',
                                                '$this->author',
                                                '$this->tag',
                                                '$this->keyword',
                                                '$this->attr',
                                                '$this->content',
                                                '$this->commend',
                                                '$this->count',
                                                '$this->gold',
                                                '$this->color',
                                                NOW()
                                            )";
        return parent::aud($_sql);
    }
}
?>
