$(document).ready(function(){
        $('#check').change(function(){
            if ($(this).is(':checked')){
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              }
              else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.open("GET","update.php?f=1",true);
              xmlhttp.send();
              console.log('мы поменяли твой флажок хозяин');
              console.log($('#dish_name').value)
            }
            else{
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              }
              else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.open("GET","update.php?f=0",true);
              xmlhttp.send();
              console.log('мы разменяли твой флажок хозяин');
            }    
        });
    });