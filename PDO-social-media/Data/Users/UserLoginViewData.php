<?php


namespace Data\Users;


class UserLoginViewData
{
    private $error = null;

    /**
     * UserLoginViewData constructor.
     * @param null $error
     */
    public function __construct($error = null)
    {
        $this->error = $error;
    }


    /**
     * @return null
     */
    public function getError()
    {
        return $this->error;
    }


}