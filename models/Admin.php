<?php
    class Admin{
        
        public static function overeni():bool{
            if(isset($_SESSION["id_uzivatel"])){
                if($_SESSION["role"] == "admin"){
                    return true;
                }
            }
            return false;
        }
    }