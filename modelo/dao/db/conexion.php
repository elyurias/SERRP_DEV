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
    public static function logs_enableTable(){
	$gl = self::getArraypP("SET GLOBAL log_output = 'TABLE';");
	$gg = self::getArraypP("SET GLOBAL general_log = 'ON';");
	return $gg;
    }
    public static function logs_disableTable(){
	$gg = self::getArraypP("SET GLOBAL general_log = 'OFF';");
	//$sq = self::getArraypP("SET GLOBAL slow_query_log = 'OFF';");
	return $gg;
    }
    public static function logs_show(){
	$gg = self::getArraypP("SELECT * FROM mysql.general_log ORDER BY(general_log.event_time) DESC;");
	return $gg;
    }
    public static function logs_truncate(){
	$gg = self::getArraypP("TRUNCATE TABLE mysql.general_log;");
	return $gg;
    }
    public static function restore_database($rutaLier){
      	$command = "mysql -u".self::$user." -p".self::$pwd." < ".$rutaLier;
	system($command,$output);
	return $output;
    }
}
?>
