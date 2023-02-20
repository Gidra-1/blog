<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя страница</title>
    <link rel="stylesheet" href="/css/blog_global.css">
    <link rel="stylesheet" href="/css/blog_global_media.css">
    <link rel="stylesheet" href="/css/blog_header.css">
    <link rel="stylesheet" href="/css/blog_header_media.css">
    <link rel="stylesheet" href="/css/blog_sidbar.css">
    <link rel="stylesheet" href="/css/blog_sidbar_media.css">
    <link rel="stylesheet" href="/css/blog_my-page.css">
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">
</head>

<body>
    <?php
    $data = $_POST;
    if( isset($data['du_relog']) ) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
        unset($_SESSION['acount']); 
        unset($_COOKIE['acount']); 
        setcookie('acount', null, -1, '/'); 
        echo '
            <script> window.setTimeout(function() { window.location = "blog_main.php"; }, 0) </script>
        ';
    }
    include "blog_header.php";
    if( !isset($_SESSION['acount']['id'])){
        echo'
        <script> window.setTimeout(function() { window.location = "blog_main.php"; }, 0) </script>
        ';
    }
    ?>
    
        <?php
        include "blog_sidbar.php";
        ?>
        <?php
            if( isset($data['du_save']) ){
                $file = 0;
                if ( $_FILES['file_avatar']['name'] == '' ) {
                    $file = 2;
                } else    
                    if ( $_FILES['file_avatar']['type'] !=  "image/png" ) {
                    $errors['files'] = "Расщирение файла не png";
                } else 
                    if ( $_FILES['file_avatar']['size'] > 2097152 ) {
                        $errors['files'] = 'Размер файла больше 2 мегабайт';
                } else 
                    if( $_SESSION['acount']['avatar'] == 0 ) {
                        $file = 1;
                        $avatar_name = 0;
                        foreach ($autho as &$name) {
                            if( $name['avatar'] > $avatar_name ){
                                
                                $avatar_name = $name['avatar'];
                            }            
                        }
                        $avatar_name++;
                        echo $avatar_name;
                        move_uploaded_file( $_FILES['file_avatar']['tmp_name'], 
                        'E:\PROGRAM\Vork\locHost\OSPanel\domains\blog\img\a'.$avatar_name.'.png');
                        $id = $_SESSION['acount']['id'];
                        $sql = "UPDATE account SET avatar = '$avatar_name' WHERE id = '$id' ";
                        mysqli_query($connection, $sql) or die(mysqli_error($connection));
                        $_SESSION['acount']['avatar'] = $avatar_name;
                       
                        echo $avatar_name;
                } else {
                    $file = 1;
                    $avatar_name = $_SESSION['acount']['avatar'];
                    move_uploaded_file( $_FILES['file_avatar']['tmp_name'], 
                    'E:\PROGRAM\Vork\locHost\OSPanel\domains\blog\img\a'.$avatar_name.'.png');
                }
                $orig = 0;
                if( $data['name'] == '' ){
                    $orig = 2;
                } else 
                    if( $data['name'] == $_SESSION['acount']['name'] ){
                        $errors['name'] = 'Новое имя должно отличаться от старого';
                } else 
                    foreach ($autho as &$name) {
                        if( $name['name'] == $data['name'] ){
                            $orig = 1;
                            $errors['name'] = 'Такое имя уже есть!';
                        } 
                } 
                if( $orig == 0 ){
                    $name = $data['name'];
                    $id = $_SESSION['acount']['id'];
                    $sql = "UPDATE account SET name = '$name' WHERE id = '$id' ";
                    mysqli_query($connection, $sql) or die(mysqli_error($connection));
                   
                    $_SESSION['acount']['name'] = $data['name'];
                }

                if($file != 2){
                    if( !isset($errors['files']) ){
                        echo '
                        <div class="flex cuc-regi">
                            Аватар обновлён!
                        </div>
                        ';
                    } else {
                        echo '
                        <div class="flex errors">
                            '. $errors['files'] .'
                        </div>
                    ';
                    }
                }

                if($orig != 2){
                    if( !isset($errors['name'])){
                        echo '
                        <div class="flex cuc-regi">
                            Имя обновлено!
                        </div>
                        ';
                    } else {
                        echo '
                        <div class="flex errors">
                            '. $errors['name'].'
                        </div>
                    ';
                    } 
                }
                // print_r($_FILES);
               
                // echo $_FILES['file_avatar'];
            }
            
            
            echo '
            <section class="flex my-page">
                <div class="flex my-page__heading">
                    <div class="my-page-heading__avatar">
                        <img class="my-page-heading-avatar__img" src="/img/a'.  $_SESSION['acount']['avatar'] .'.png" alt="Лого">
                    </div>
                    <h1 class="my-page-heading__name">
                    '.  $_SESSION['acount']['name'] .'
                    </h1>
                </div>
            </section>
            <section class="flex my-page">
                <div class="flex my-page__settings">
                    <h2 class="title my-page-settings__title">
                        Настройки
                    </h2>
                    <form class="flex my-page-settings__form" action="/blog_my-page.php" method="POST" enctype="multipart/form-data">
                        <div class="flex my-page-settings-form__file">
                            <h3 class="my-page-settings-form-file__title">
                                Ваша новая аватарка
                            </h3>
                            <input class="input my-page-settings-form-file__inp" type="file" name="file_avatar" >
                        </div>
                        <div class="flex my-page-settings-form__name">
                            <h3 class="my-page-settings-form-name__title">
                                Ваше новое имя
                            </h3>
                            <input class="input my-page-settings-form-name__inp" type="text" name="name" >
                        </div>
                        <div class="flex my-page-settings-form__save">
                            <button class="flex my-page-settings-form-save__btn" name="du_save" tyep="submit" >
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="flex my-page">
                <div class="flex my-page__new-article">
                    <h2 class="title my-page-new-article__title">
                        <a class="title my-page-new-article-title__link" href="/blog_creature-article.php">
                            Создать новую статью
                        </a>
                    </h2>
                </div>
            </section>
            ';
            $ma = 0; // кол-во статей пользователя (my article)
            foreach ($arti as &$my_arti) {
                if( $my_arti['author'] == $_SESSION['acount']['id'] ){

                    $my_article[$ma] =  $my_arti;
                    $ma++;
                }
            }

            if( $ma == 0 ){
                echo '
                <section class="flex my-page">
                    <div class="flex not-article">
                        <h2 class="title not-article__title">
                            Вы ещё не создали статьи
                        </h2>
                    </div>
                </section>
                ';
            } else {
                echo' 
            <section class="flex my-article">
            <div class=" my-article__block">
                <h2 class="title my-article__title">
                       Ваши статьи
                </h2>';

                        $i=0;
                        
                        while( $i <= 5 )
                        {
                            

                            if($my_article[$i] == false)
                            {
                                break;
                            }


                            echo ' 
                            <a href="/blog_article.php?get='.$my_article[$i]['id'].'">
                                <button class="post my-article__post">
                                    <div class="flex post__top my-article-post__top">
                                        <div class="post-top__picture my-article-post-top__picture">
                                            <img class="post-top-picture__img my-article-post-top-picture__img" src="/img/s' . $my_article[$i]['image'] . '.png" alt="">
                                        </div>
                                        <div class="post-top__text my-article-post-top__text">
                                            <h3 class="post-top-text__title my-article-post-top-text__title">
                                                ' . $my_article[$i]['title'] . '
                                            </h3>
                                            <time class="post-top-text__time my-article-post-top-text__time" datetime="2022-12-9-12:35">
                                                ' . substr($my_article[$i]['pubdate'], 0, 16) . '
                                            </time>
                                            <div class="post-top-text__preview my-article-post-top-text__preview">
                                                ' . $my_article[$i]['text'] . '
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex post__bottom my-article-post__bottom">
                                        <div class="flex post-bottom__like my-article-post-bottom__like">
                                            <svg class="svg post-bottom-like__svg my-article-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,60.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="#000000">
                                                    <path d="M11 576 c-32 -39 36 -151 189 -310 166 -172 293 -266 360 -266 27 0
                                                                30 3 30 33 0 20 -14 56 -35 92 -31 51 -34 62 -25 88 15 44 12 132 -6 175 -45
                                                                109 -172 170 -289 139 -49 -13 -51 -12 -100 20 -62 40 -106 51 -124 29z" />
                                                    <path d="M62 363 c-15 -37 -6 -137 15 -178 27 -51 78 -100 125 -119 37 -16
                                                                132 -21 162 -10 43 17 -6 64 -67 64 -48 0 -109 31 -136 69 -12 16 -21 33 -21
                                                                38 0 4 10 -7 21 -25 12 -18 39 -42 60 -52 38 -20 89 -27 89 -12 0 12 -156 162
                                                                -168 162 -7 0 -10 -12 -7 -32 5 -33 5 -33 -4 -5 -6 16 -7 35 -4 42 5 16 -33
                                                                75 -48 75 -5 0 -13 -8 -17 -17z" />
                                                </g>
                                            </svg>
                                            <div class="post-bottom-like__text my-article-post-bottom-like__text">
                                                ' . $my_article[$i]['lik.e'] . '
                                            </div>
                                        </div>
                                        <div class="flex post-bottom__views my-article-post-bottom__views">
                                            <svg class="svg post-bottom-views__svg my-article-post-bottom-views__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04" style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
                                                <path d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
                                                            c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
                                                            c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
                                                            c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
                                                            c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
                                                            c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
                                                            c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                                                <path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
                                                            c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
                                                            c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
                                                            s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                                                <path d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                                            </svg>
                                            <div class="post-bottom-views__text my-article-post-bottom-views__text">
                                                ' . $my_article[$i]['views'] . '
                                            </div>
                                        </div>
                                        <div class="post-bottom__author my-article-post-bottom__author">
                                            ' .  $autho[$my_article[$i]['author']-1]['name'] . '
                                        </div>
                                    </div>
                                </button>
                            </a>';
                            $i=$i+1;
                        }          
                        
                    echo '        
                </div>
            </section>
            ';
            }
            echo'
            <section class="flex my-page__end">
                <form class="flex my-page-end__relog" action="/blog_my-page.php" method="POST">
                    <div class="flex my-page-end-relog__btn">
                        <button class="flex my-page-end-relog__btn" name="du_relog" tyep="submit" >
                            Выйти из аккаунта
                        </button>
                    </div>
                </form>
            </section>
            ';        

        ?>
           

</body>

</html>