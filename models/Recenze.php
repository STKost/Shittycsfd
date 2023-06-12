<?php
    //rozsiri class film o recenze
    class Recenze {
        public static function vytvor_recenzi(string $recenze ,int $hodniceni,string $slug) :array{
            $response = array();
            if ($hodniceni>5 || $hodniceni<1){
                $response["status"] = "error";
                $response["error"] = "hodnoceni";
                return $response;
            }

            $film = Film::vyber_film($slug);
            if (count($film) == 0){
                $response["status"] = "error";
                $response["error"] = "slug";
                return $response;
            }
            $film = $film[0];
            $id_film = $film["id"];
            $id_uzivatel = $_SESSION["id_uzivatel"] ?? 0;
            $sql = "INSERT INTO recenze (id_f,id_u,hodnoceni,obsah) VALUES (?,?,?,?)";
            return Databaze::query($sql,[$id_film,$id_uzivatel,$hodniceni,$recenze],false);

        }
        public static function vyber_u_filmu($input):array {
            $id_film = $input;
            $sql = "SELECT id_f AS id_film,u.prezdivka as id_uzivatel , hodnoceni AS hodnoceni, obsah AS text ,datum FROM recenze left join uzivatel u on u.id_u = recenze.id_u WHERE id_f = ?";
            return self::format(Databaze::query($sql,[$id_film]));
        }
        public static function vyber_vsechny():array {
            header('Content-Type: application/json');
            $sql = "SELECT id_f AS id_film, id_u AS id_uzivatel, hodnoceni AS hodnoceni, obsah AS text,datum FROM recenze";
            return self::format(Databaze::query($sql));
        }
        private static function format(array $data): array{
            $formated_version = array();
            foreach ($data as $value) {
                $recenze = array();
                $recenze["id_film"] = $value["id_film"];
                $recenze["id_uzivatel"] = $value["id_uzivatel"];
                $recenze["hodnoceni"] = $value["hodnoceni"];
                $recenze["text"] = $value["text"];
                $recenze["datum"] = $value["datum"];
                $formated_version[]=$recenze;
            }
            return $formated_version;
        }
    }

        