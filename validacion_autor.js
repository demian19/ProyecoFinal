function validarFormulario(){
var nombre = document.getElementById('nombre_autor').value;
var apaterno = document.getElementById('apaterno_autor').value;
	if(nombre === null || nombre === ''){
		alert('[ERROR] Es necesario ingresar el nombre del autor');
		return false;			
	}

	 if(apaterno === null || apaterno === ''){
		alert('[ERROR] Es necesario ingresar el apellido paterno del autor');
		return false;
	}

	return true;
	
	
}	
