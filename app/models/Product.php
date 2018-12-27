<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $this->db->query("SELECT * FROM Products WHERE status = 1 ");

        return $this->db->all();
    }


}
