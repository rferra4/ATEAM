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
                        INNER JOIN Company ON Job_Opening.Opening_ID = Company.JobOpening_ID
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
            $this->db->query("SELECT Job_Opening.*
            FROM Job_Opening
            INNER JOIN Company ON Job_Opening.Opening_ID = Company.JobOpening_ID
            WHERE jobs.category_id = $category
            ORDER BY Job_Opening.Date DESC
            ");


        //assign result set
        $results = $this->db->resultSet();

        return $results;
        }
    }