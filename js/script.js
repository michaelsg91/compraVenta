$(document).ready(function(){

//---------   Procesos ajax    -------------------------------------
$("#formven #cedcli").keyup(function(){
    var numdoc=$("#formven #cedcli").val();
    $.get("php/ajax.php",{num:numdoc}).done(function(data){
    $("#formven #nombre").html(data);
    });
});

$("#formcre #cedcli").keyup(function(){
    var numdoc=$("#formcre #cedcli").val();
    $.get("php/ajax.php",{num:numdoc}).done(function(data){
    $("#formcre #nombre").html(data);
    });
});

$("#formemp #cedcli").keyup(function(){
    var numdoc=$("#formemp #cedcli").val();
    $.get("php/ajax.php",{num:numdoc}).done(function(data){
    $("#formemp #nombre").html(data);
    });
});

$("#formven #producto").change(function(){
  var articulo=$("#formven #producto").val();
  $.get("php/ajax.php",{art:articulo}).done(function(data){
    $("#formven #compra").html(data);
  });
});

$("#formcre #producto").change(function(){
  var articulo=$("#formcre #producto").val();
  $.get("php/ajax.php",{art:articulo}).done(function(data){
    $("#formcre #compra").html(data);
  });
});


$("#formabcre #credito").change(function(){
  var credito=$("#formabcre #credito").val();
  $.get("php/ajax.php",{cre:credito}).done(function(data){
    $("#formabcre #info").html(data);
  });
});

$("#formabemp #empeno").change(function(){
  var empeno=$("#formabemp #empeno").val();
  $.get("php/ajax.php",{emp:empeno}).done(function(data){
    $("#formabemp #info").html(data);
  });
});

$("#forminv #articulo").change(function(){
  var articulo=$("#forminv #articulo").val();
  $.get("php/ajax.php",{artinv:articulo}).done(function(data){
    $("#forminv #valorcompra").val(data);
  });
});


//-------- Ocultar ventanas ------------------------
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").fadeIn(1000);
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

$("#lventa").click(function(e){
$(".venta").fadeIn(1000);
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});

$("#lventacre").click(function(e){
$(".venta").hide();
$(".credito").fadeIn(1000);
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});

$("#labonocre").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").fadeIn(1000);
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});
$("#lempeno").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").fadeIn(1000);
$(".inventario").hide();
$(".abonoempeno").hide();

});
$("#laboemp").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").fadeIn(1000);

});
$("#lsaldos").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").fadeIn(1000);
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});

$("#lcliente").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").fadeIn(1000);
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});

$("#larticulo").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").fadeIn(1000);
$(".empeno").hide();
$(".inventario").hide();
$(".abonoempeno").hide();

});

$("#linventario").click(function(e){
$(".venta").hide();
$(".credito").hide();
$(".abonoCredito").hide();
$(".saldos").hide();
$(".cliente").hide();
$(".articulo").hide();
$(".empeno").hide();
$(".inventario").fadeIn(1000);
$(".abonoempeno").hide();

});
$("#lhelp").click(function(e){

});


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
$(function(){
$("#empfin").datepicker({
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







});//--End document
