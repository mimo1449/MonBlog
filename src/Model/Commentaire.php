<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/11/2017
 * Time: 14:40
 */

namespace Model;

class Commentaire extends Entity
{
    public $fields = [
        "id"=>"pk",
        "pseudo"=>"",
        "commentaire"=>"",
        "article_id"=>"",
        "signale"=>"",
        "date_Comment"=>"default"

    ];

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var int
     */
    private $article_id;

    /**
     * @var boolean
     */
    private $signale;

    private $date_Comment;

    private $article;

    /**
     * @return bool
     */
    public function isSignale()
    {
        return $this->signale;
    }

    /**
     * @param bool $signale
     */
    public function setSignale($signale)
    {
        $this->signale = $signale;
    }


    public static function getTable()
    {
        return "commentaires";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getArticle()
    {
        if($this->article === null) {
            $this->article = $this->database->find(Article::class, $this->article_id);
        }
        return $this->article;
    }

    public function getArticleId()
    {
        return $this->article_id;
    }

    public function setArticleId($articleId)
    {
        $this->article_id = $articleId;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getDate_Comment()
    {
        return \DateTime::createFromFormat("Y-m-d H:i:s", $this->date_Comment);
    }

    public function setDate_Comment($date_Comment)
    {
        $this->date_Comment = $date_Comment->format("Y-m-d H:i:s");
    }

    public function __get($name)
    {
        return $this->$name;
    }
}