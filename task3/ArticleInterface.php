<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.11.2018
 * Time: 20:59
 */

namespace task3;


interface ArticleInterface
{
    /**
     * @return UserInterface
     */
    public function getAuthor() : UserInterface;
    /**
     * @param UserInterface $author
     * @return ArticleInterface
     */
    public function setAuthor(UserInterface $author): ArticleInterface;

}