<?php 

class ArrayList
{
    private $list = array();

    public function add($object)
    {
        array_push($this->list, $object);
    }

    public function getSize()
    {
        return count($this->list);
    }

    public function getObject($key)
    {
        if (array_key_exists($key, $this->list))
        {
            return $this->list[$key];
        }
        else
        {
            return NULL;
        }
    }
}

?>