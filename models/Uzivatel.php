<?php
    class Uzivatel{

        public static function login($email, $heslo):array
        {
            $response = array(
                "status" => "error"
            );
            $sql = "SELECT id_u, email, prezdivka, heslo, role FROM uzivatel WHERE email = ?";
            $uzivatel = Databaze::query($sql, array($email));

            if($uzivatel["status"] == "error"){
                $response["error"] = "server";
                return $response;
            }
            if (count($uzivatel) == 1){
                $uzivatel = $uzivatel[0];
                if (password_verify($heslo, $uzivatel["heslo"])){
                    return array(
                        "id" => $uzivatel["id_u"],
                        "email" => $uzivatel["email"],
                        "prezdivka" => $uzivatel["prezdivka"],
                        "role" => $uzivatel["role"],
                        "status" => "ok"
                    );
                }else{
                    $response["error"] = "heslo";
                    return $response;
                }
            }else{
                $response["error"] = "email";
                return $response;
            }
        }

        public static function registrace($email,$heslo,$prezdivka){
            $response = array(
                "status" => "error"
            );
            $sql = "SELECT id_u FROM uzivatel WHERE email = ?";
            $uzivatel = Databaze::query($sql, array($email));
            if (isset($uzivatel["status"])) {
                if ($uzivatel["status"] == "error") {
                    $response["error"] = "server";
                    return $response;
                }
            }
            if (count($uzivatel) == 0){
                $sql = "INSERT INTO uzivatel (email, heslo, prezdivka) VALUES (?,?,?)";
                $heslo = password_hash($heslo, PASSWORD_DEFAULT);
                $uzivatel = Databaze::query($sql, array($email,$heslo,$prezdivka),false);
                if ($uzivatel["status"] == "error"){
                    $response["error"] = "server";
                    return $response;
                }
                return array(
                    "status" => "ok"
                );
            }else{
                $response["error"] = "email";
                return $response;
            }
        }

    }