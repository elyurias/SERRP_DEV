<?php
  try {
  	$con = new PDO('mysql:host=localhost;dbname=serrp_dev','root','root');
  } catch(PDOException $e) {
      echo $e->getMessage();	
  }
  $nombres = [
    'Santiago',
    'Mateo',
    'Sebastián',
    'Alejandro',
    'Matías',
    'Diego',
    'Samuel',
    'Nicolás',
    'Daniel',
    'Martín',
    'Benjamín',
    'Emiliano',
    'Leonardo',
    'Joaquín',
    'Lucas',
    'Iker',
    'Gabriel',
    'Thiago',
    'Adrián',
    'Bruno'
  ];
  $apellidos = [
    'Abad',
'Abalos',
'Abarca',
'Abendano',
'Abila',
'Abina',
'Abitua',
'Aboites',
'Abonce',
'Abrego',
'Abrica',
'Abrigo',
'Abundis',
'Aburto',
'Acebedo',
'Acebes',
'Acencio',
'Acero',
'Acevedo',
'Aceves',
'Acha',
'Adan',
'Adrian',
'Agirre',
'Agredano',
'Ballejo',
'Ballesa',
'Ballesteros',
'Ballin',
'Ballinas',
'Balona',
'Balseca',
'Baltierres',
'Balverde',
'Balvuena',
'Banderas',
'Bandilla',
'Banegas',
'Banes',
'Baptista',
'Baquera',
'Baragan',
'Barajas',
'Baraxas',
'Casique',
'Cassas',
'Cassillas',
'Castanon',
'Castelan',
'Castellanos',
'Castellon',
'Casteneda',
'Castilla',
'Castilleja',
'Castillo',
'Castiyo',
'Casto.',
'Castorena',
'Castrejon',
'Mota',
'Motete',
'Mototl',
'Moxarro',
'Moxica',
'Moya',
'Moyeda',
'Moyotl',
'Muela',
'Mujica',
'Mulgado',
'Mundo',
'Munes',
'Mungia',
'Munguia',
'Munis',
'Xaime',
'Xaimes',
'Xaramillo',
'Xaso',
'Xavier',
'Xaymes',
'Xicotencatl',
'Xihuitl',
'Ximes',
'Ximines',
'Xique',
'Xiron',
'Xochitecatl',
'Xopanecatl',
'Xuares',
'Yanez',
'Ybanez',
'Ybara',
'Ybarrola',
'Yepez',
'Yerena',
'Folla',
'Doblado',
'Bron', 
'Franco',
'de la Polla'
  ];
  $sexo = [
    'M',
    'F'
  ];
  $DNIAlumno  = 2017048063;
  $DNIDocente = 222;
  
  $nombreUsuario = '';
  $paternoUsuario = '';
  $maternoUsuario = '';
  $genero = '';
  header('Content-Type: text/html; charset=UTF-8');
  /*
  for($i=0;$i<126;$i++) {
    $nombreUsuario =  $nombres[mt_rand(0,COUNT($nombres)-1)];
    $paternoUsuario =  $apellidos[mt_rand(0,COUNT($nombres)-1)];
    $maternoUsuario =  $apellidos[mt_rand(0,COUNT($nombres)-1)];
    $generoUsuario = $sexo[mt_rand(0,COUNT($nombres)-1)];
    $lineaDeComandoSQL = "SELECT addusuario('{$DNIAlumno}', '{$nombreUsuario}', '{$paternoUsuario}', '{$maternoUsuario}', '{$DNIAlumno}user@gmail.com', '55555555' , '55555555', 1, 2, '{$generoUsuario}', 3, 0) as statusreg;<br>";
    //$con->query($lineaDeComandoSQL);
    echo $nombreUsuario.'<br>';
    echo $lineaDeComandoSQL;
    $DNIAlumno++;
  }
    for($i=0;$i<20;$i++) {
    $nombreUsuario =  $nombres[mt_rand(0,COUNT($nombres)-1)];
    $paternoUsuario =  $apellidos[mt_rand(0,COUNT($nombres)-1)];
    $maternoUsuario =  $apellidos[mt_rand(0,COUNT($nombres)-1)];
    $generoUsuario = $sexo[mt_rand(0,COUNT($nombres)-1)];
    $lineaDeComandoSQL = "SELECT addusuario('{$DNIDocente}', '{$nombreUsuario}', '{$paternoUsuario}', '{$maternoUsuario}', '{$DNIDocente}user@gmail.com', '55555555' , '55555555', 1, 2, '{$generoUsuario}', 2, 4) as statusreg;<br>";
    //$con->query($lineaDeComandoSQL);
    echo $lineaDeComandoSQL;
    $DNIDocente++;
  }*/
  $DNIAlumno  = 2017048063;
  $DNIDocente = 222;
  
  for($i=0;$i<126;$i++) {
  
  }
  for($i=0;$i<20;$i++) {
  
  }
?>