<?php
    public class Email(){
        private $db;

          public function __construct(){
            $this->db = new Database;
          }

          public function sendNewJobEmail($field, $company_ID){
              $this->db->query("SELECT email.*
                                FROM Employee
                                WHERE Employee.Field = '$field'");

              while($this->db->resultSet()){
                $to_email = $row['email'];
                $subject = "Job Opening of Interest";
                $message = $companyID . " posted a new " . $title ." job!";
                $headers = 'From: noreply@jobboard.com';

                //check if email is valid
                $secure_check = sanitize_my_email($to_email);
                if($secure_check == true){
                  mail($to_email, $subject, $message, $headers);
                }
              }
          }

          public function sanitize_my_email($email){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
              return true;
            }
            else {
              return false;
            }
          }
      }
?>
