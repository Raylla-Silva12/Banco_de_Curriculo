<?php
$user = '';
$senha = '';
$servidor = 'localhost';
$banco = '';
/*$con = new mysqli($servidor,$user,$senha,$banco);

if(!$con){
	alert("Erro de conexão!");
}
*/
/*  ********* usuario *********/
function validar($token){
	$sql = 'SELECT * FROM tb_usuario WHERE status="'.$token.'"';
	$resultado = $GLOBALS['con']->query($sql);
	if($resultado->num_rows > 0){
		$user = $resultado->fetch_array();
		$atualizar = 'UPDATE tb_usuario SET status="ativo" WHERE id='.$user['id'];
		$resultado2 = $GLOBALS['con']->query($sql);
		if($resultado2){
			alert("Conta ativada com sucesso");
			//redirecioanr o usuário para página home
		}
	}else{
		alert("Token inválido");
	}
}

function cadUsuario($nome,$email,$cpf,$senha){
	$key = md5($cpf);
	$sql = 'INSERT INTO tb_usuario VALUES (null,"'.$nome.'","'.$email.'","'.$cpf.'","'.$senha.'","sem_foto.png","'.$key.'")';
	$resultado = $GLOBALS['con']->query($sql);
	if($resultado){
		implementar validação de email
		if(mail($email,"BancoCurriculo [ativação de conta]",$key)){
			alert("Verifique seu email para validar o cadastro!");
		}else{
			alert("Falha ao enviar código.");
		}
	}else{
		alert("Erro ao cadastrar: ".$GLOBALS['con']->error);
	}
}

/*  ********* .usuario *********/

/*  ********* estados *********/
function listEstado($id){
	$sql = 'SELECT * FROM tb_estado';
	if($id>0){
		$sql.=' WHERE id='.$id;
	}
	$resultado = $GLOBALS['con']->query($sql);
	return $resultado;
}
/***************.estado **************/

// uteis
function alert($msg){
	echo '<script>alert("'.$msg.'");</script>';
}