    $(document).ready(function(){
         $('.popup, #no, .overlay').click(function (){
            $('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
        });
        $('#exit').click(function (e){
            $('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
            e.preventDefault();
        });
    });