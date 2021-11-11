<?php
include('conexao.php');

if($_POST){
	cadUsuario($_POST['nome'],$_POST['email'],$_POST['cpf'],$_POST['senha']);
}
?>
<form method="get">
	Digite o token:
	<input type="text" name="token">
	<button>Validar</button>
</form>
<?php
if(isset($_GET['token'])){
	validar($_GET['token']);
}
?>