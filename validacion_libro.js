

function validarFormulario(){
var nombre = document.getElementById('nombre_libro').value;
var edicion = document.getElementById('edicion_libro').value;
var editorial = document.getElementById('id_editorial').value;
var autor = document.getElementById('id_autor').value;
var publicacion = document.getElementById('anio_publicacion').value;

	if(nombre === null || nombre === ''){

		alert('Ingrese el título del libro');
		return false;
	}

	if(edicion === null || edicion === ''){
		alert('Ingrese la edición del libro');
		return false;
	}

	if(editorial === "0" || editorial === ''){
		alert('Seleccione la editorial del libro');
		return false;
	}

	if(autor === "0" || autor === ''){
		alert ('Seleccione el autor que publicó el libro');
		return false;
	}

	if(publicacion === null || publicacion === ''){
		alert('Seleccione el año de la publicación del libro');
		return false;
	}

	return true;
}	
