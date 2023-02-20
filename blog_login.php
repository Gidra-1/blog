<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/blog_global.css">
    <link rel="stylesheet" href="/css/blog_global_media.css">
    <link rel="stylesheet" href="/css/blog_header.css">
    <link rel="stylesheet" href="/css/blog_header_media.css">
    <link rel="stylesheet" href="/css/blog_sidbar.css">
    <link rel="stylesheet" href="/css/blog_sidbar_media.css">
    <link rel="stylesheet" href="/css/blog_login.css">
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">
</head>

<body>
    <?php
       
    
        
    ?>
    <?php
    include "blog_header.php";
    ?>
    <main>
        <?php
        include "blog_sidbar.php";
        ?>

<?php
        
        $data = $_POST;

        if( isset($data['du_login']) ) {

            $errors = array();
            $UID = 0;
            if( trim( $data['name']) == '' ){

                $errors[] = 'Введите имя!';
            }

            if( $data['password'] == '' ){

                $errors[] = 'Введите пароль!';
            }

            foreach ($autho as &$acco) {
                if( $acco['name'] == $data['name'] ){
                    if( $acco['password'] == $data['password'] ){
                    
                       $UID = $acco['id'];
                       $log = 1;

                    } else {
                        $errors[] = 'Пароль введён не верно.';
                    } 

                } else {

                    $errors[] = 'Такого пользователя не существует.';

                }
            
            }

            if( $log == 0 ){
                
                echo '
                <div class="flex errors">
                    '. array_shift($errors) .'
                </div>
                ';

            }else {

                foreach ($autho as &$acco) {
                    if( $acco['id'] == $UID ){
                        
                        $_SESSION['acount'] = $acco;
                        if( $data['remember'] == 'Yes' ){
                            $_SESSION['acount']['remember'] = 'Yes';
                            
                        }else{
                            $_SESSION['acount']['remember'] = 'No';
                        }

                    } 
                
                }
                
                
                    echo '
                    <div class="flex cuc-regi">
                        Вы успешно <br> авторизовались!
                    </div>
                    <script> window.setTimeout(function() { window.location = "blog_my-page.php"; }, 2000) </script>
                    '; 
                 
                // echo '
                //     <div class="flex cuc-regi">
                //         Вы успешно <br> авторизовались!
                //     </div>
                //     ';

                
            }


        }
            

       ?>

        <section class="flex log">
            <h2 class="title log-title">
                Авторизация
            </h2>
            <form class="flex log__form" action="/blog_login.php?log=<?php echo $log ?>" method="post">
                <div class="flex log-form__name">
                    <h3 class="log-form-name__title">
                        Ваше имя
                    </h3>
                    <input class="input log-form-name__inp" type="text" name="name" value="<?php echo
                    $data['name']; ?>">
                </div>
                <div class="flex log-form__pas">
                <h3 class="log-form-pas__title">
                        Ваш пароль
                    </h3>
                    <input class="input log-form-pas__inp" type="password" name="password"  value="<?php echo
                    $data['password']; ?>">
                </div>
                <div class="flex log-form__remember">
                    <h3 class="log-form-remember__title">
                       Запомнить меня
                    </h3>
                    <input type="checkbox" name="remember" value="Yes" />
                </div>
                <div class="flex btn-reset log-form__com">
                    <button class="log-form-com__btn" name="du_login" tyep="submit" >
                       Авторизоваться
                    </button>
                </div>
            </form>
        </section>
    </main>


</body>

</html>