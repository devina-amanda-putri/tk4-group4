<?php

class PenggunaModel
{
    private $db;

    function __construct($db) {
        $this->db = $db;
    }
    public function getAllPengguna()
    {
        try {
            $query = "SELECT * FROM Pengguna";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

}