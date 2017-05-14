//Реакция на чекбокс
$(document).ready(function(){
        $('#remember_me').change(function(){
            if ($(this).is(':checked')){
                $('#reg').removeAttr('disabled');
                $('#reg').addClass('btn-success');
            }

            else
                $('#reg').attr('disabled', 'disabled');
               
        });
    });
  //проверка на ввод в поля реквезитов
    $('#num_check').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});

//ввод по маске
jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#phone').mask('+7 (999) 999-9999');
      $('#rs').mask('999.99.999.9.9999.9999999');
      $('#num_check1').mask('9-99-99-99-99999-9');
});