const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    ciudad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	correo:  /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/,
	telefono: /^\d{7,10}$/,
	clave: /^.{4,10}$/, // 4 a 12 digitos.
	numDoc: /^\d{7,12}$/,
	direccion: /[A-Za-z0-9]/
}

const campos = {
	nombre: false,
	ciudad: false,
	correo: false,
	telefono: false,
	clave: false,
	numDoc: false,
	direccion: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "ciudad":
			validarCampo(expresiones.ciudad, e.target, 'ciudad');
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "clave":
			validarCampo(expresiones.clave, e.target, 'clave');
		break;
		case "numDoc":
			validarCampo(expresiones.numDoc, e.target, 'numDoc');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo_${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo_${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo_${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo_${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	if(campos.nombre && campos.ciudad && campos.correo && campos.telefono && campos.clave && campos.numDoc && campos.direccion){
		
		var nombre = document.forms.formulario.nombre.value;
		var ciudad = document.forms.formulario.ciudad.value;
		var tipoDocumento = document.forms.formulario.tipoDocumento.value;
		var telefono = document.forms.formulario.telefono.value;
		var numDoc = document.forms.formulario.numDoc.value;
		var correo = document.forms.formulario.correo.value;
		var direccion = document.forms.formulario.direccion.value;
		var clave = document.forms.formulario.clave.value;

		window.location = "registrar.php?nombre=" + nombre + "&ciudad=" + ciudad + "&tipoDocumento=" + tipoDocumento + "&telefono=" + telefono + "&numDoc=" + numDoc + "&correo=" + correo + "&direccion=" + direccion + "&clave=" + clave;
	} else {
		alert ("Revisa todos los campos");
	}
});