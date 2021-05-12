<?php

function portada($peinado_id, $peinado){

$salida = "";

$salida = $salida . '<div class="col-lg-4">';
$salida = $salida . '<h2>' . $peinado["nombre"] . '</h2>';
$salida = $salida . '<img src="' . $peinado["imagen"] . '" alt="' . $peinado["nombre"] . '"class="img-rounded" height="300px" width="300px">';
$salida = $salida . '<p>' . $peinado["descripcion"] . '</p>';
$salida = $salida . '<h1>' . $peinado["precio"] . '€</h1>';
$salida = $salida . '<p><a class="btn btn-danger" href="peinado.php?id=' . $peinado_id . '">Ver</a></p>';
$salida = $salida . '</div>';
return $salida;
}

$peinados = array();
$peinados[001] = array(
  "nombre" => "Fade (degradado)",
  "descripcion" => "Consiste en un corte de pelo para hombre con degradado en los costados de la cabeza. Es decir, en la parte de arriba se mantiene mucha cantidad de pelo y en los laterales este se reduce de forma progresiva. Con este corte de pelo para hombre se disimula el salto de una parte a otra, dejando un efecto fundido. El hecho de que se vaya reduciendo la longitud del pelo de forma progresiva le da un toque de discreción pero tú puedes darle tu personalidad decidiendo el marcado del corte.",
  "imagen" => "img/fade.jpg",
  "precio" => 8
);
$peinados[002] = array(
  "nombre" => "Undercut",
  "descripcion" => "Este corte de pelo para hombre también consiste en dejar mayor cantidad de pelo en la parte superior de la cabeza y menos en los laterales. La diferencia con el corte de pelo “fade” es que en éste el corte de pelo de los laterales es más uniforme y suele ser más corto de longitud, aunque eso lo decides tú. Con este corte de pelo para hombre irás a la última. Además, si tienes el rostro cuadrado te sentará genial.",
  "imagen" => "img/undercut.jpg",
  "precio" => 10
);
$peinados[003] = array(
  "nombre" => "Buzz",
  "descripcion" => "Tal vez con el nombre inglés “buzz” no te suene pero si te decimos muy corto o casi rapado, seguro que ya sabes de qué tipo de corte de pelo para hombre te estamos hablando. Si eres de los que no te gusta dedicar mucho tiempo a tu peinado este es tu look. Consiste en un rapado de toda la cabeza que deja poca cantidad de pelo destacando las facciones del hombre. Conseguirás estar a la moda este año e ir siempre perfecto.",
  "imagen" => "img/buzz.jpg",
  "precio" => 5
);
$peinados[004] = array(
  "nombre" => "Hipster",
  "descripcion" => "El estilo hipster está de moda, así que con un peinado hipster seguro que aciertas. Este tipo de corte de pelo para hombre se caracteriza por su volumen en la parte central y los laterales cortos. Puedes peinarlo hacia atrás o hacia el lado. ¡Conseguirás un estilo muy interesante y elegante! Ser hipster es un estilo de vida y, con él, asumes sus cortes de pelo. De entre las múltiples posibilidades que podríamos encajar dentro de este estilo destacamos dos tendencias dentro del afamado corte de pelo hipster undercut, que supone un menor nivel de cabello a los lados (incluso rapado).",
  "imagen" => "img/hipster.jpg",
  "precio" => 14
);
$peinados[005] = array(
  "nombre" => "Raya al lado",
  "descripcion" => "Este año el corte de pelo con raya al lado seguirá de moda. Son muchos los famosos y no tan famosos que lo llevan. Así que, consigue este pelo y estarás elegante y a la última. Obtendrás un look top con la raya al lado derecho y peinado, aunque puedes probar el lado que más te favorezca. ¡Tú decides! La raya al lado de toda la vida, muy marcada y normalmente a la derecha. Favorecedor para casi todos los rostros, es un corte de pelo muy versátil, ya que se adapta bien al cabello liso o rizado y, al mismo tiempo,  combina con casi cualquier look u ocasión de moda.",
  "imagen" => "img/rayalado.jpg",
  "precio" => 7
);

function isNull($nombre, $user, $pass, $pass_con, $email){
  if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
  {
    return true;
  } else {
    return false;
  }		
}

function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		} else {
			return false;
		}
	}

function validaPassword($var1, $var2){
		if (strcmp($var1, $var2) !== 0){
			return false;
		} else {
	  	return true;
	  }
}

function usuarioExiste($usuario){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
		} else {
			return false;
	}
}

function emailExiste($email){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
		} else {
			return false;	
		}
}

function generateToken(){
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
}

function hashPassword($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
}

function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario){
		
  global $mysqli;
  
  $stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, nombre, correo, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssisi', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
  
  if ($stmt->execute()){
    return $mysqli->insert_id;
    } else {
    return 0;	
  }		
}

function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
  require_once 'PHPMailer/PHPMailerAutoload.php';
  
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tipo de seguridad'; //Modificar
  $mail->Host = 'dominio'; //Modificar
  $mail->Port = 'puerto'; //Modificar
  
  $mail->Username = 'adritopps98@gmail.com'; //Modificar
  $mail->Password = 'cabezatrol'; //Modificar
  
  $mail->setFrom('adritopps98@gmail.com', 'Sistema de Usuarios'); //Modificar
  $mail->addAddress($email, $nombre);
  
  $mail->Subject = $asunto;
  $mail->Body    = $cuerpo;
  $mail->IsHTML(true);
  
  if($mail->send())
  return true;
  else
  return false;
}

function resultBlock($errors){
  if(count($errors) > 0)
  {
    echo "<div id='error' class='alert alert-danger' role='alert'>
    <a href='#' onclick=\"showHide('error');\">[X]</a>
    <ul>";
    foreach($errors as $error)
    {
      echo "<li>".$error."</li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}

function validaIdToken($id, $token){
  global $mysqli;
  
  $stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
  $stmt->bind_param("is", $id, $token);
  $stmt->execute();
  $stmt->store_result();
  $rows = $stmt->num_rows;
  
  if($rows > 0) {
    $stmt->bind_result($activacion);
    $stmt->fetch();
    
    if($activacion == 1){
      $msg = "La cuenta ya se activo anteriormente.";
      } else {
      if(activarUsuario($id)){
        $msg = 'Cuenta activada.';
        } else {
        $msg = 'Error al Activar Cuenta';
      }
    }
    } else {
    $msg = 'No existe el registro para activar.';
  }
  return $msg;
}

function activarUsuario($id){
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
}

?>