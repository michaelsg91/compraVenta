$(document).ready(function(){



  var fechaHoy=new Date();
  var mesHoy=fechaHoy.getMonth()+1;
  var diaHoy=fechaHoy.getDate();
  var anioHoy=fechaHoy.getFullYear();

//------- Start validate function ------------------

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z-á,é,í,ó,ú,ñ,\u0020]+$/i.test(value);
}, "Formato no válido");

$(function(){
$("#fechafin").datepicker({
minDate: "+0d",
dateFormat: "yy-mm-dd",
});

});


$.validator.addMethod("fechaESP", function( value, element){
			var validator = this;
			var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
			var fechaCompleta = value.match(datePat);

			if (fechaCompleta == null) {
				$.validator.messages.fechaESP = "Fecha erronea";
				return false;
			}

			dia = fechaCompleta[1];
			mes = fechaCompleta[3];
			anio = fechaCompleta[5];


			if (dia < 1 || dia > 31) {
				$.validator.messages.fechaESP = "El valor del día debe estar comprendido entre 1 y 31.";
				return false;
			}
			if (mes < 1 || mes > 12) {
				$.validator.messages.fechaESP = "El valor del mes debe estar comprendido entre 1 y 12.";
				return false;
			}
			if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) {
				$.validator.messages.fechaESP = "El mes "+mes+" no tiene 31 días!";
				return false;
			}
			if (mes == 2) { // bisiesto
				var bisiesto = (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
				if (dia > 29 || (dia==29 && !bisiesto)) {
					$.validator.messages.fechaESP = "Febrero del " + anio + " no contiene " + dia + " dias!";
					return false;
				}
			}
      if(anio<1900){
        $.validator.messages.fechaESP = "La fecha debe ser mayor al año de 1900.";
        return false;
      }
      if(anio>anioHoy){
        $.validator.messages.fechaESP = "La fecha es mayor a la actual.";
				return false;
      }else if(anio==anioHoy){
        if(mes>mesHoy){
          $.validator.messages.fechaESP = "La fecha es mayor a la actual.";
  				return false;
        }else if(mes==mesHoy){
          if(dia>diaHoy){
            $.validator.messages.fechaESP = "La fecha es mayor a la actual.";
    				return false;
          }
        }
      }


			return true;
		}, "Formato de fecha no válido");



$("#form").validate({
  rules:{
    nombre:{
      lettersonly: true,
      required: true,
    },
    numdoc:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    fecha:{
      required: true,
      fechaESP: true,
    },
    departamento: "required",
    ciudad: "required",
    tipodoc: "required",

  },//end rules

  messages:{
    nombre:{
      required: "Campo requerido",
    },
    numdoc:{
      required: "Campo requerido",
      number:"Formato no válido",
      minlength: "Mínimo 6 digitos",
      maxlength: "Máximo 11 digitos",
    },
    fecha:{
      required: "Campo requerido",
    },
    departamento: "Campo requerido",
    ciudad: "Campo requerido",
    tipodoc: "Campo requerido",

  }
});//-------- End validate function


$("#formsueldo").validate({
  rules:{
    cedula:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    sueldo:{
      number: true,
      maxlength: 15,
      required: true,
    },
    dias:{
      number: true,
      maxlength: 9,
      required: true,
    },

  },//end rules

  messages:{
    cedula:{
      required: "Campo requerido",
      number:"Formato no válido",
      minlength: "Mínimo 6 digitos",
      maxlength: "Máximo 11 digitos",
    },
    sueldo:{
      required: "Campo requerido",
      number:"Formato no válido",
      maxlength: "Máximo 15 digitos",
    },
    dias:{
      required: "Campo requerido",
      number:"Formato no válido",
      maxlength: "Máximo 9 digitos",
    },
  }
});//-------- End validate function




});//--End document
