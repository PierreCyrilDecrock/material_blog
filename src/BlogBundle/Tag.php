<?php
namespace BlogBundle;
class Tag
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}
