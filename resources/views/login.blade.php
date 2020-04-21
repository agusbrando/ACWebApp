

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.veen-2 .log').click(function() {
            $('.check').addClass('check-2')
            var name = $('.veen-2 .tada .name input').val();
            var mail = $('.veen-2 .tada .mail input').val();
            var uid = $('.veen-2 .tada .uid input').val();
            var pwd = $('.veen-2 .tada .pwd input').val();
            var chkname = /^[A-Za-z0-9 ]{3,40}$/;
            var chkmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            var chkuid = /^[A-Za-z0-9_]{3,20}$/;
            var chkpwd = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
            if ((!chkname.test(name) || !chkmail.test(mail) || !chkuid.test(uid) || !chkpwd.test(pwd)) || ($('.veen-2 .in-1 input[type="radio"]').is(":not(:checked)") && $('.veen-2 .in-2 input[type="radio"]').is(":not(:checked)"))) {
                $('.check .p1,.check .p2,.check .p3,.check .p4,.check .p5,p').empty();
                if (!chkname.test(name)) {
                    $('.check .p1').text('Enter Valid Name');
                }
                if (!chkmail.test(mail)) {
                    $('.check .p2').text('Enter Valid Mail');
                }
                if (!chkuid.test(uid)) {
                    $('.check .p3').text('Enter Valid User Name');
                }
                if (!chkpwd.test(pwd)) {
                    $('.check .p4').text('Enter Password');
                }
                if ($('.veen-2 .in-1 input[type="radio"]').is(":not(:checked)") && $('.veen-2 .in-2 input[type="radio"]').is(":not(:checked)")) {
                    $('.check .p5').text('Select Gender');
                }
            } else {
                $('.check .p1,.check .p2,.check .p3,.check .p4,.check .p5').empty();
                $('.check').html('<p style="color:#1ec303;line-height:50px;">Youe Registration Is Successful...... ! Please Wait......!</p>', 3000);
                $('.veen-2 .tada input').val('');
                $('.veen-2 .tada input').removeAttr('checked');
                /*setTimeout(function(){
			window.location.reload();
		}, 3000);*/
            }
        });
        $('.main-wrapper').mousemove(function(e) {
            var offset = $(this).offset();
            var relativeX = e.pageX - offset.left;
            var relativeY = e.pageY - offset.top;
            var movex = (-relativeX / 5);
            var movey = (-relativeY / 5);
            $(this).css({
                'background-position-x': movex,
                'background-position-y': movey
            });
        });
        $('.tada').mousemove(function(e) {
            var offset = $(this).offset();
            var relativeX = e.pageX - offset.left;
            var relativeY = e.pageY - offset.top;
            var movex = (-relativeX / 5);
            var movey = (-relativeY / 5);
            $(this).css({
                'background-position-x': movex,
                'background-position-y': movey
            });
        });
        $('.okati').click(function() {
            $('.veen').css({
                'top': 0
            });
            $('.main-wrapper').css({
                'transform': 'scale(.9)'
            });
            $('.veen .tada').css({
                'left': 0
            });
        });

        $('.tada a.close-x').click(function() {
            $('body').find('*').removeAttr('style');
            $('.veen-2 .tada input').removeAttr('checked');
        });




        $('.rendu').click(function() {
            $('.veen-2').css({
                'top': 0
            });
            $('.main-wrapper').css({
                'transform': 'scale(.9)'
            });
            $('.veen-2 .tada').css({
                'left': 0
            });
        });
        $('.veen-2 .tada a.close-x-2').click(function() {
            $('body').find('*').removeAttr('style');
            $('.check').removeClass('check-2');
            $('.check').eampty();
            $('.veen-2 .tada input').removeAttr('checked');
        });


        $('input, textarea, select').each(function() {
            var tmpval = $(this).val();
            if (tmpval != '') {
                $(this).prev().addClass('trans');
            }
        });
        $('input, textarea, select').focus(function() {
            $(this).prev().addClass('trans');

        }).blur(function() {
            if ($(this).val() == '') {
                $(this).prev().removeClass('trans');
            }
        });

        $.fn.toggleAttr = function(attr, attr1, attr2) {
            return this.each(function() {
                var self = $(this);
                if (self.attr(attr) == attr1)
                    self.attr(attr, attr2);
                else
                    self.attr(attr, attr1);
            });
        };
        $('.show-pass').click(function() {
            $(this).toggleClass('go');
            $('.pwd input').toggleAttr('type', 'text', 'password');
        });
    });
</script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js" integrity="sha256-6HSLgn6Ao3PKc5ci8rwZfb//5QUu3ge2/Sw9KfLuvr8=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <main role="main" class="col-md-12 ml-sm-auto col-lg-14 px-4">
    <div class="main-wrapper">
        <a href="#" class="okati">
            <span class="s3">Ya tienes cuenta...?</span>
            <span class="s4">Inicia sesión</span>
        </a>
        <a href="#" class="rendu">
            <span class="s3">Nuevo usuario...?</span>
            <span class="s4">Registrate</span>
        </a>
    </div>
    <div class="veen">
        <div class="tada">
            <p class="head">Iniciar Sesión</p>
            <div class="uid">
                <label>Nombre</label><input type="text"></input>
                </br>
            </div>
            <div class="pwd">
                <label>Contraseña</label><input type="password"></input>
                <span class="show-pass"></span>
            </div>
            <div class="remw">
                <p class="rem">Recordarme</p>
                <div class="dum">
                    <input type="checkbox" id="for"></input><label for="for"></label>
                </div>
            </div>
            <a href="#" class="log">ACCEDER
            </a>
            <a href="#" class="close-x">X
            </a>
        </div>
    </div>
    <div class="veen-2">
        <div class="check"><span class="p1"></span> <span class="p2"></span> <span class="p3"></span> <span class="p4"></span> <span class="p5"></span></div>
        <div class="tada">
            <form action="">
                <p class="head">Registrate</p>
                <div class="name">
                    <label>Nombre</label><input type="text" name="name"></input>
                </div>
                <div class="name">
                    <label>Apellidos</label><input type="text" name="name"></input>
                </div>
                <div class="name">
                    <label>Fecha de nacimiento</label><input type="text" name="name"></input>
                </div>
                <div class="mail">
                    <label>Email</label><input type="mail" name="mail"></input>
                </div>
                <div class="uid">
                    <label>Curso</label><input type="text" name="uid"></input>
                    </br>
                </div>
                <div class="pwd">
                    <label>Contraseña</label><input type="text" name="pwd"></input>
                </div>

                <a href="#" class="log" type="submit">ACCEDER
                </a>
                <a href="#" class="close-x-2">X
                </a>
            </form>
        </div>
    </div>

<style type="text/css">
    .site-link {
        padding: 5px 15px;
        position: fixed;
        z-index: 99999;
        background: #303030;
        box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
        right: 30px;
        bottom: 30px;
        border-radius: 10px;
    }

    .site-link a {
        text-decoration: none;
        color: #0af !important;
        display: inline-block;
    }

    .site-link img {

        width: 30px;
        height: 30px;
    }
</style>
</main>