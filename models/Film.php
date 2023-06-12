<?php

class Film {

    public static function novy_film($input) :string{
        $responce = array();


        $nazev = $input["nazev"] != "" ? $input["nazev"] : ($responce["error"] = "nazev");
        $delka = $input["delka"] != "" ? $input["delka"] : ($responce["error"] = "delka");
        $rok_vydani = $input["rok"] != "" ? $input["rok"] : ($responce["error"] = "rok");
        $popis = $input["popis"] != "" ? $input["popis"] : ($responce["error"] = "popis");
        $poster = $input["poster"] != "" ? $input["poster"] : ($responce["error"] = "file");
        $zanry = $input["zanry"] != "" ? $input["zanry"] : ($responce["error"] = "zanry");
        $zanry = explode(",",$zanry);
        $zanry = json_encode($zanry,JSON_UNESCAPED_UNICODE);

        if(array_key_exists("error",$responce)){
            $responce["status"] = "error";
            return json_encode($responce,JSON_UNESCAPED_UNICODE);
        }
        else{
            $responce["status"] = "ok";
        }
    
        $slug = self::vytvor_slug($nazev,$rok_vydani,$delka);
        if($slug == ""){
            $responce["status"] = "error";
            $responce["error"] = "slug";
            return json_encode($responce,JSON_UNESCAPED_UNICODE);
        }
        $nefacha = $delka;
        while(self::sluq_existuje($slug)["status"] == "error"){
            $nefacha += 1;
            $slug = self::vytvor_slug($nazev,$rok_vydani,$nefacha);
        }
        
        $sql = "INSERT INTO film (nazev,delka,rok_vydani,popis,poster,slug,zanry) VALUES (?,?,?,?,?,?,?)";
        
        $responce = Databaze::query($sql,[$nazev,$delka,$rok_vydani,$popis,$poster,$slug,$zanry],false);
        if ($responce["error"]){
            return json_encode($responce,JSON_UNESCAPED_UNICODE);
        }
        $responce["slug"] = "$slug";
        return json_encode($responce,JSON_UNESCAPED_UNICODE);

    }
    public static function vyber_vsechny():array {
        $sql = "SELECT nazev AS nazev, zanry AS zanry 
        , slug AS slug , delka AS delka , popis AS popis 
        , rok_vydani AS rok_vydani , poster AS poster,id_f as id
        FROM film";
        
        return self::format(Databaze::query($sql));
    }
    private static function sluq_existuje(string $slug):array {
        $responce = array(
            "status" => "ok",
            "error" => ""
        );
        
        $sql = "SELECT slug FROM film WHERE slug = ?";
        $res_databaze = Databaze::query($sql,[$slug]);
        if (isset($res_databaze["status"])){
            if ($res_databaze["status"] == "error") {
                $responce["status"] = "error";
                $responce["error"] = "databaze";
                return $responce;
            }
        }
        if(count($res_databaze) > 0){
            $responce["status"] = "error";
            $responce["error"] = "existuje";
            return $responce;
        }
        return $responce;
    }
    private static function format(array $data): array{
        $formated_version = array();
        foreach ($data as $value) {
            $film = array();
            $film["nazev"] = $value["nazev"];
            $film["slug"] = $value["slug"];
            $film["delka"] = $value["delka"];
            $film["rok_vydani"] = $value["rok_vydani"];
            $film["poster"] = $value["poster"];
            $film["popis"] = $value["popis"];
            $film["id"] = $value["id"];
            $film["zanry"] = json_decode($value["zanry"]);
            $formated_version[]=$film;
        }
        return $formated_version;
    }

    private static function vytvor_slug(string $nazev,int $rok_vydani ,int $delka) : string {

        $nazev = strtolower($delka.$rok_vydani." ".$nazev);
        $nazev = str_replace(" ", "-", $nazev);
        return iconv('UTF-8', 'ASCII//TRANSLIT', $nazev);

    }

    public static function vyber_film(string $slug):array {
        
        $sql = "SELECT nazev AS nazev, zanry AS zanry 
        , slug AS slug , delka AS delka , popis AS popis 
        , rok_vydani AS rok_vydani , poster AS poster,id_f as id
        FROM film WHERE slug = ?";
        
        return self::format(Databaze::query($sql,[$slug]));
    }

    public static function odstranit(string $slug):array{
        $responce = array(
            "status" => "ok",
            "error" => ""
        );
        $sql = "DELETE FROM film WHERE slug = ?";
        $res_databaze = Databaze::query($sql,[$slug],false);
        if (isset($res_databaze["status"])){
            if ($res_databaze["status"] == "error") {
                $responce["status"] = "error";
                $responce["error"] = "databaze";
                return $responce;
            }
        }
        return $responce;
    }


}