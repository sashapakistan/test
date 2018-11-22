<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.11.2018
 * Time: 21:15
 */

namespace task3;


class Article implements ArticleInterface
{
    private $author;
    private $content;

    /**
     * @param string $content
     * @return Article
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return UserInterface
     */
    public function getAuthor() : UserInterface
    {
        return $this->author;
    }

    /**
     * @param UserInterface $author
     * @return array
     */
    public function findByAuthor(UserInterface $author) : array {}
    /**
     * @param UserInterface $author
     * @return ArticleInterface
     */
    public function setAuthor(UserInterface $author) : ArticleInterface
    {
        $this->author = $author;
        return $this;
    }

}