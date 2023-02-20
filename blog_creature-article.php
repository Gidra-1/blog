<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание статьи</title>
    <link rel="stylesheet" href="/css/blog_global.css">
    <link rel="stylesheet" href="/css/blog_global_media.css">
    <link rel="stylesheet" href="/css/blog_header.css">
    <link rel="stylesheet" href="/css/blog_header_media.css">
    <link rel="stylesheet" href="/css/blog_sidbar.css">
    <link rel="stylesheet" href="/css/blog_sidbar_media.css">
    <link rel="stylesheet" href="/css/blog_creature-article.css">
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">
</head>

<body>
    <?php
    include "blog_header.php";
    if( !isset($_SESSION['acount']['id'])){
        echo'
        <script> window.setTimeout(function() { window.location = "blog_main.php"; }, 0) </script>
        ';
    }
    ?>
    <main>
        <?php
        include "blog_sidbar.php";
        
        $data = $_POST;

        if( isset($data['du_creature']) ) {

            $errors = array();
            if( trim( $data['categ']) == 'none' ){

                $errors[] = 'Выберите категорию';
            }

            if( trim( $data['title']) == '' ){

                $errors[] = 'Введите название!';
            }

            if(  mb_strlen( $data['title']) > 30 ){

                $errors[] = 'Название длинее  40 символов';
            }

            if ( $_FILES['file_picture']['name'] == '' ) {
                $errors[] = 'Добавте картинку!';
            } else    
                if ( $_FILES['file_picture']['type'] !=  "image/png" ) {
                $errors[] = 'Расщирение файла не png';
            } else 
                if ( $_FILES['file_picture']['size'] > 5242880 ) {
                    $errors[] = 'Размер файла больше 2 мегабайт';
            } 

            if( trim( $data['text']) == '' ){

                $errors[] = 'Введите текст!';
            }

            if(  mb_strlen( $data['text']) > 1000 ){

                $errors[] = 'Текст длинее 1000 символов';
            }


        
            if( empty($errors) ){
                $pict = 0;
                foreach ($arti as &$pic) {
                    if( $pic['image'] > $pict ){
                        
                        $pict = $pic['image'];
                    }            
                }
                $pict++;
                $categoris_id = $data['categ'];
                $title = $data['title'];
                $picture = $pict;
                $text = $data['text'];
                $author = $_SESSION['acount']['id'];
               
                move_uploaded_file( $_FILES['file_picture']['tmp_name'], 
                'E:\PROGRAM\Vork\locHost\OSPanel\domains\blog\img\s'.$picture.'.png');

                $sql = "INSERT INTO article (categoris_id, title, image, text, author) VALUES (' $categoris_id', ' $title', '$picture', '$text', '$author')";
                if (mysqli_query($connection, $sql)) {
                    echo '
                    <div class="flex cuc-creat">
                        Статья успешно <br> создана!
                    </div>
                    <script> window.setTimeout(function() { window.location = "blog_my-page.php"; }, 2000) </script>
                    ';

                
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }

            } else 
            {
                echo '
                <div class="flex errors">
                    '. array_shift($errors) .'
                </div>
                ';
            }

            
        }

        ?>
        <section class="flex creature">
            <h2 class="title creature-title">
                Создание статьи
            </h2>
            <form class="flex creature__form" action="/blog_creature-article.php" method="post" enctype="multipart/form-data">
                <div class="flex creature-form__categ">
                    <h3 class="creature-form-categ__title">
                        Категоря 
                    </h3>
                    <select class="select creature-form-categ__sel" name="categ">
                        <?php 
                         echo'<option class="select creature-form-categ-sel_opt" value="none">Выбор категории</option>';
                        $i = 0;
                        while( $i <= array_key_last($cat) )
                        {
                            if( $cat[$i]['id'] == $data['categ'] ){
                                echo'
                                    <option selected class="select creature-form-categ-sel_opt" value="'. $cat[$i]['id'] .'">'. $cat[$i]['name'] .'</option>
                                ';
                            } else {
                                echo'
                                    <option class="select creature-form-categ-sel_opt" value="'. $cat[$i]['id'] .'">'. $cat[$i]['name'] .'</option>
                                ';
                            }
                            $i++;
                        }
                        ?>

                    </select>
                </div>
                <div class="flex creature-form__name">
                    <h3 class="creature-form-name__title">
                        Название
                    </h3>
                    <input class="input creature-form-name__inp" type="text" name="title" value="<?php echo
                    $data['title']; ?>">
                </div>
                <div class="flex creature-form__file">
                    <h3 class="creature-form-file__title">
                        Картинка 
                    </h3>
                    <input class="input creature-form-file__inp" type="file" name="file_picture" value="<?php 
                    $_FILES; ?>">
                </div>
                <div class="flex creature-form__text">
                    <h3 class="creature-form-text__title">
                        Текст 
                    </h3>
                    <textarea class="creature-form-text__textarea" resize type="text" name="text" ><?php echo
                    $data['text']; ?></textarea>
                    <div class="creature-form-text__symbols">
                        <?php
                            $symbols = mb_strlen( $data['text']);
                            echo'
                                Количество символов = '. $symbols .'     
                            ';
                        ?>
                    </div>
                </div>
            
                <div class="flex btn-reset creature-form__com">
                    <button class="creature-form-com__btn" name="du_creature" tyep="submit" >
                        Создать
                    </button>
                </div>
            </form> 
        </section>
            
        </main>

</body>

</html>