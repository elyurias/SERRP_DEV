<?php
class conexion {
    private static $host = "localhost";
    private static $user = "root";
    private static $pwd = "root";
    private static $bd = "serrp_dev";
    public static function conectar() {
			try{
				$con = new PDO('mysql:host='.self::$host.';dbname='.self::$bd,self::$user,self::$pwd);
				return $con;
			}catch(PDOException $e){
				return $e->getMessage();
			}
    }
    public static function getArraypP($sql, $array){
			$pS = self::conectar()->prepare($sql);
			$pS->execute($array);
			$res = $pS->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
}
?>
