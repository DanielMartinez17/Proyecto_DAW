<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<title>PELICULAS!!! </title>

<link href="../css/login.css" rel="stylesheet" type="text/css">

<link href="../css/dist/sweetalert2.css" rel="stylesheet">
<script src="../css/dist/sweetalert2.min.js"></script>

<script>
function aler(titulo,mensaje){
	Swal.fire({
	  type: 'error',
	  title: titulo,
	  text: mensaje
	})
}
</script>
<script type="text/javascript">
  function checkForm(form){
    if(form.loginusuario.value == "") {
      alert("Error: Username cannot be blank!");
      form.loginusuario.focus();
      return false;
    }
	re = /^\w+$/;
    if(!re.test(form.loginusuario.value)) {
      alert("Error: Nombre de usuario debe tner solo letras, numeros y  guines!");
      form.loginusuario.focus();
      return false;
    }
	
	if(form.clave.value != "" && form.clave.value == form.clave2.value) {
      if(form.clave.value.length < 6) {
		msg="Error: La clave debe tener un minimo de 6 caracteres!";	
		tit="Error!!!";
		aler(tit,msg);
        form.clave.focus();
        return false;
      }
      if(form.clave.value == form.loginusuario.value) {
		msg="Error: La clave debe ser diferente al nombre del usuario!";	
		tit="Error!!!";
		aler(tit,msg);
        form.clave.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.clave.value)) {
        alert("Error: la clave debe tener almenos un digito (0-9)!");
        form.clave.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.clave.value)) {
		msg="Error: La clave debe tener al menos una letra minuscula (a-z)!";	
		tit="Error!!!";
		aler(tit,msg);
        form.clave.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.clave.value)) {
		msg="Error: La clave debe tener al menos una letra mayuscula (A-Z)!";	
		tit="Error!!!";
		aler(tit,msg);  
        form.clave.focus();
        return false;
      }
    } else {
	  msg="Error: las claves no son iguales!";	
      tit="Error!!!";
	  aler(tit,msg);
      form.clave.focus();
      return false;
    }
  }
</script> 	
</head>
<body>
<div id="login-form">


<h1>REGISTRO DE USUARIO</h1>
	<fieldset>
    <form  method="post" action="registro_php.php" onsubmit="return checkForm(this);">
	<input type="text" name=loginusuario required placeholder="Usuario"  > 
				
	<input type="text" name=nom_usuario required placeholder="Nombres" >
				
	<input type="text" name=ape_usuario required placeholder="Apellidos" >
	<label>Sexo	
	<select name=sexo  >
		<option>Femenino
		<option>Masculino
		
	</select>
	</label>	
	<label>Nivel de estudio
	<select name=nivel_estudio  >
		<option>basico</option>
		<option>intermedio</option>
		<option>superior</option>
		
	</select>
	</label>	
	<label>Instituci&oacute;n educativa
	<select name=institucion_educativa  >
		<option>[-Seleccione una-]</option>
		
		
	</select>
	</label>
	<input type="text" name=email required placeholder="Email" >
				
	
	<input type="password" name=clave required placeholder="clave" >
	<input type="password" name=clave2 placeholder="Repetir clave" >
				
    <input type="submit" value="Registrar" name="ok2" >
	<a href='https://sweetalert2.github.io/'>
	visita sweetalert2
	</a>
    <footer class="clearfix">
		<p><span class="info">?</span><a href="login.php">iniciar sesion</a></p>
    </footer>
    </form>
    </fieldset>
    </div> <!-- end login-form -->
	
</body>
</html>