  function MenuCONECTADO()
    {
        $(document).ready(function(){
                $('#menulogin').hide();
                $('#menusingup').hide();

                $('#logout').show();
                $('#menupreguntas').show();

            });
    }
    function MenuDESCONECTADO()
    {
        $(document).ready(function(){
            $('#menulogin').show();
            $('#menusingup').show();

            $('#menulogout').hide();
            $('#menupreguntas').hide();
        });
    }
