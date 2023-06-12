<?php
class Databaze
{
    private static $connection;

    public static function vytvoreni($host, $username, $password, $database)
    {
        self::$connection = new mysqli($host, $username, $password, $database);
        if (self::$connection->connect_error) {
            die("Připojení k databázi selhalo: " . self::$connection->connect_error);
        }
    }

    public static function query($sql, $params = [],bool $reutrn = true) :array
    {
        $response["error"] = false;
        $statement = self::$connection->prepare($sql);
        if (!$statement) {
            die("Chyba při přípravě dotazu: " . self::$connection->error);
        }

        if (!empty($params)) {
            $types = '';
            $preparedParams = [];
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
                $preparedParams[] = $param;
            }
            array_unshift($preparedParams, $types);

            $bindParams = [];
            foreach ($preparedParams as $key => $value) {
                $bindParams[$key] = &$preparedParams[$key];
            }

            if (!call_user_func_array([$statement, 'bind_param'], $bindParams)) {
                $response["status"] = "error";
                $response["error"] = "bind_param";
                return $response;
            }
        }

        if (!$statement->execute()) {
            $response["status"] = "error";
            $response["error"] = "execute";
            return $response;
        }

        $result = $statement->get_result();
        if ($result === false && $reutrn) {
            $response["status"] = "error";
            $response["error"] = "get_result";
            return $response;
            
        }
        if (!$reutrn){
            $response["status"] = "ok";
            $statement->close();
            return $response;
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $statement->close();

        return $data;
    }

    public static function close()
    {
        self::$connection->close();
    }
}