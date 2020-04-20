<?php
    class Job{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //Get all jobs
        public function getAllJobs(){
            $this->db->query("SELECT Job_Opening.*
                        FROM Job_Opening
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


        public function getJob($id){
            $this->db->query("SELECT * FROM Job_Opening WHERE id = :id");
            $this->db->bind(':id', $id);


            $row = $this->db->single();

            return $row;
        }

        public function getComboResults($Field, $State, $Education){
            $combo = " ";
            if ($Field != "" && $State != "" && $Education != ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening

                        WHERE Job_Opening.Field = '$Field'
                        AND Job_Opening.Education = '$Education'
                        AND Job_Opening.State = '$State'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if($Field != "" && $State == "" && $Education == ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.Field = '$Field'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($Field == "" && $State == "" && $Education != ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.Education = '$Education'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($Field == "" && $State != "" && $Education == ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.State = '$State'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($Field != "" && $State != "" && $Education == ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.Field = '$Field'
                        AND Job_Opening.State = '$State'
                        ORDER BY Job_Opening.Date DESC";
            }
            else if ($Field != "" && $State == "" && $Education != ""){
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.Field = '$Field'
                        AND Job_Opening.Education = '$Education'
                        ORDER BY Job_Opening.Date DESC";
            }
            else{
              $combo = "SELECT Job_Opening.*
                        FROM Job_Opening
                        WHERE Job_Opening.Education = '$Education'
                        AND Job_Opening.State = '$State'
                        ORDER BY Job_Opening.Date DESC";
            }

              $this->db->query($combo);
              $results = $this->db->resultSet();
              return $results;
        }
        public function twentyApplicationsChecker()
      {
        $this->db->query("SELECT * FROM Applicants WHERE Applicants_ID = :Applicant_ID");
        $this->db->bind(':Applicant_ID', $Applicants_ID);

        $row = $result->fetch();

        $numappliedjobs = $row["NumberAppliedJobs"];

        // If number of applied jobs is greater than or equal to 1, then deny application request
        if($numappliedjobs >= 20){
          return false;
        }
        return true;

      }


    }
