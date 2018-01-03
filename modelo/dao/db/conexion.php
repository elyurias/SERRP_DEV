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
    public static function respaldoDB(){
	$archivoRec = self::$bd.".sql";
	$command = "mysqldump --host=".self::$host." --user=".self::$user." --password=".self::$pwd." --add-drop-database --events --routines --triggers --databases ".self::$bd." > ".$archivoRec."";
	system($command,$output);
	return $output;
    }
    public static function restaurarDB($documento){
	return 'Construir...';
    }
}
?>
