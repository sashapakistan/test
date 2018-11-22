<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.11.2018
 * Time: 20:49
 */

namespace task3;


class User implements UserInterface
{
    private $name;

    /**
     * @param string $name
     * @return User
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

}