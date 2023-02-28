<?php 

class ArticleModel {

    private Database $db;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Sélectionne tous les articles
     */
    function getAllArticles()
    {
        $sql = 'SELECT * 
                FROM article AS A
                INNER JOIN category AS C 
                ON A.categoryId = C.idCategory 
                ORDER BY createdAt DESC 
                LIMIT 3';

        return $this->db->getAllResults($sql);
    } 

    /**
     * Sélectionne un article à partir de son id
     */
    function getOneArticle(int $idArticle)
    {
        $sql = 'SELECT * 
                FROM article AS A
                INNER JOIN category AS C 
                ON A.categoryId = C.idCategory
                WHERE idArticle = ?'; 

        return $this->db->getOneResult($sql, [$idArticle]);
    }
}