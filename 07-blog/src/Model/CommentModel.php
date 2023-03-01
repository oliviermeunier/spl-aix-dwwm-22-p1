<?php 

namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Comment;

class CommentModel extends AbstractModel {

    function addComment(string $nickname, string $content, int $idArticle)
    {
        $sql = 'INSERT INTO comment 
                (nickname, content, articleId, createdAt)
                VALUES (?, ?, ?, NOW())'; 

        $this->db->prepareAndExecute($sql, [$nickname, $content, $idArticle]);
    }

    function getCommentsByArticleId(int $idArticle)
    {
        $sql = 'SELECT * 
                FROM comment 
                WHERE articleId = ?
                ORDER BY createdAt DESC';

        $results = $this->db->getAllResults($sql, [$idArticle]);

        $comments = [];
        foreach ($results as $result) {
            $comments[] = new Comment($result);
        }

        return $comments;
    }
}