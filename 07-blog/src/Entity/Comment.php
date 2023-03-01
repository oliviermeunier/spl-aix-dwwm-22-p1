<?php 

namespace App\Entity;

use DateTimeImmutable;

class Comment {

    private int $idComment;
    private string $nickname;
    private DateTimeImmutable $createdAt;
    private string $content;
    private int $articleId;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    /**
     * Get the value of idComment
     */
    public function getIdComment(): int
    {
        return $this->idComment;
    }

    /**
     * Set the value of idComment
     */
    public function setIdComment(int $idComment): self
    {
        $this->idComment = $idComment;

        return $this;
    }

    /**
     * Get the value of nickname
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     */
    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(string|DateTimeImmutable $createdAt): self
    {
        if (is_string($createdAt)) { // '2016-12-26'
            $createdAt = new DateTimeImmutable($createdAt);
        }

        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of articleId
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * Set the value of articleId
     */
    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Retourne la date de création de l'article formattée 
     */
    public function getFormattedCreatedAt(): string 
    {
        return $this->createdAt->format('d/m/Y') . ' à ' . $this->createdAt->format('H:i');
    }
}