<?php

    class Api{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function findBySql($query){
            $this->db->query($query);

            $set = $this->db->resultSet();

            return $set;
        }

            // POST-Метод (tarifs)
            public function addTarif($tarif_title, $tarif_price, $tarif_link, $tarif_speed, $tarif_pay_period, $tarif_group_id){

            $this->db->query('INSERT INTO tarifs(title, price, link, speed, pay_period, tarif_group_id) VALUES(:title, :price, :link, :speed, :pay_period, :tarif_group_id)');
            $this->db->bind(':title', $tarif_title);
            $this->db->bind(':price', $tarif_price);
            $this->db->bind(':link', $tarif_link);
            $this->db->bind(':speed', $tarif_speed);
            $this->db->bind(':pay_period', $tarif_pay_period);
            $this->db->bind(':tarif_group_id', $tarif_group_id);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function modifyTarif($tarif_ID, $tarif_title, $tarif_price, $tarif_link, $tarif_speed, $tarif_pay_period, $tarif_group_id){
            $this->db->query('UPDATE tarifs SET title = :title, price = :price, link = :link, speed = :speed, pay_period = :pay_period, tarif_group_id = :tarif_group_id WHERE ID = :id');
            $this->db->bind(':title', $tarif_title);
            $this->db->bind(':price', $tarif_price);
            $this->db->bind(':link', $tarif_link);
            $this->db->bind(':speed', $tarif_speed);
            $this->db->bind(':pay_period', $tarif_pay_period);
            $this->db->bind(':tarif_group_id', $tarif_group_id);
            $this->db->bind(':id', $tarif_ID);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteTarif($tarif_ID){
            $this->db->query("DELETE FROM tarifs WHERE ID = :id");
            $this->db->bind(":id", $tarif_ID);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // Вернёт single-object (поиск по ID). Не использовал
        public function getProductById($id){
            $this->db->query('SELECT * FROM tarifs WHERE ID = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getTask1(){
           $query = 'SELECT * FROM users
            INNER JOIN services on users.ID = services.user_id
            INNER JOIN tarifs on tarifs.tarif_group_id = services.tarif_id
            WHERE tarifs.tarif_group_id = services.tarif_id';

            return $this->findBySql($query);
        }

        public function getAllTarifs(){
            $query = "SELECT * FROM tarifs";

            return $this->findBySql($query);
        }
    }

    $api = new Api();

?>