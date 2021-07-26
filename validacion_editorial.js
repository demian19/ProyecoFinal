function validarFormulario(){
	var pais, nombre;
	nombre = document.getElementById('nombre_editorial').value;
	pais = document.getElementById('pais_editorial').value;
	if(nombre === null || nombre === '' || nombre === ' '){
		alert('Es necesario ingresar el nombre de la editorial');
		return false;
	}

	if(pais === null || pais === '' || pais === ' '){
		alert('Es necesario ingresar el país de la editorial');
		return false;
	}
	return true;
}	
