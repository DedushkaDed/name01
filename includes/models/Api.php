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

        // modifyProduct
        public function modifyTarif($id, $tarif_title, $tarif_price, $tarif_link, $tarif_speed, $tarif_pay_period, $tarif_group_id){
            $this->db->query('UPDATE tarifs SET title = :title, price = :price, link = :link, speed = :speed, pay_period = :payPeriod, tarif_group_id = :groupId WHERE ID = :id');
            $this->db->bind(':title', $tarif_title);
            $this->db->bind(':price', $tarif_price);
            $this->db->bind(':link', $tarif_link);
            $this->db->bind(':speed', $tarif_speed);
            $this->db->bind(':payPeriod', $tarif_pay_period);
            $this->db->bind(':groupId', $tarif_group_id);
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteProduct($id){
            $this->db->query("DELETE FROM tarifs WHERE ID = :id");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // Вернет single object (поиск по id)
        public function getProductById($id){
            $this->db->query('SELECT * FROM tarifs WHERE ID = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // Вернет все данные из таблицы
        public function getAllProducts(){
            $query = "SELECT * FROM tarifs";

            return $this->findBySql($query);
        }


    }

    $api = new Api();

?>