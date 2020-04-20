<?php
    class Job{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //Get all jobs
        public function getAllJobs(){
            $this->db->query("SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company ON Job_Opening.Company_ID = Company.ID_Number
                        ORDER BY Job_Opening.Date DESC
                        ");
            //assign result set
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCategories(){
            $this->db->query("SELECT *
                        FROM Company ");


            //assign result set
            $results = $this->db->resultSet();

            return $results;
        }

        public function getByCategory($category){
            $this->db->query("SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
            FROM Job_Opening
            INNER JOIN Company
            ON Job_Opening.Company_ID = Company.ID_Number
            WHERE Job_Opening.Company_ID = $category
            ORDER BY Job_Opening.Date DESC
            ");


        //assign result set
        $results = $this->db->resultSet();

        return $results;
        }

        public function getCategory($Company_ID){
            $this->db->query("SELECT * FROM Company WHERE ID_Number = :Company_ID");
            $this->db->bind(':Company_ID', $Company_ID);


            $row = $this->db->single();

            return $row;
        }


        public function getJob($Opening_ID){
            $this->db->query("SELECT * FROM Job_Opening WHERE Opening_ID = :Opening_ID");
            $this->db->bind(':Opening_ID', $Opening_ID);


            $row = $this->db->single();

            return $row;
        }

        public function getComboResults($field, $state, $education){
            $combo = " ";
            if ($field != "" && $state != "" && $education != ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        WHERE Job_Opening.Field = '$field'
                        AND Job_Opening.Education = '$education'
                        AND Job_Opening.State = '$state'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if($field != "" && $state == "" && $education == ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        WHERE Job_Opening.Field = '$field'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($field == "" && $state == "" && $education != ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        AND Job_Opening.Education = '$education'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($field == "" && $state != "" && $education == ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        AND Job_Opening.State = '$state'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($field != "" && $state != "" && $education == ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        WHERE Job_Opening.Field = '$field'
                        AND Job_Opening.State = '$state'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($field != "" && $state == "" && $education != ""){
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        WHERE Job_Opening.Field = '$field'
                        AND Job_Opening.Education = '$education'
                        ORDER BY Job_Opening.Date DESC";
            }
            else{
              $combo = "SELECT Job_Opening.*, Company.Name AS c_name, Company.Address as c_add
                        FROM Job_Opening
                        INNER JOIN Company
                        ON Job_Opening.Company_ID = Company.ID_Number
                        AND Job_Opening.Education = '$education'
                        AND Job_Opening.State = '$state'
                        ORDER BY Job_Opening.Date DESC";
            }

              $this->db->query($combo);
              $results = $this->db->resultSet();
              return $results;
        }


    }
