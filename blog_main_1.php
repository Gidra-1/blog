<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сингулярность</title>
    <link rel="stylesheet" href="/css/blog_global.css">
    <link rel="stylesheet" href="/css/blog_global_media.css">
    <link rel="stylesheet" href="/css/blog_header.css">
    <link rel="stylesheet" href="/css/blog_header_media.css">
    <link rel="stylesheet" href="/css/blog_sidbar.css">
    <link rel="stylesheet" href="/css/blog_sidbar_media.css">
    <link rel="stylesheet" href="/css/blog_main.css">
    <link rel="stylesheet" href="/css/blog_main_media.css">
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">
</head>

<body>
    <?php
    include "blog_header.php";
    ?>
    <main>
        <?php
        include "blog_sidbar.php";
        ?>
        <?php 

            // Кол-во блоков на странице -1
            $block = 2;

            // Кол-во катрочек в блоке -1
            $card = 5;

            // Создание массива $sidbar, в нём будут находиться класс блока, название блока, все статьи блока
            $sidbar = array();

            if( $mc == 0)
            {
                 // Внесение в массив $sidbar класс и название первого блока
                $sidbar[0] = 'new';
                $sidbar[1] = 'Самое любимое';
                
                // Внесение в массив  $sidbar id первых 6 статей из массива $arts_max_likes
                $i = 0;
                while( $i <= $card )
                {
                    $sidbar[$i + 2] =  $arti[$i]['id'];
                    $i++;
                }
            } 
            else 
            {

                // Внесение в массив $sidbar класс и название второго блока
                $sidbar[0] = 'famous';
                $sidbar[1] = $cat[$mc]['name'];
                
                // Внесение в массив  $sidbar id первых 6 статей из массива $arts_max_views
                $i = 0;
                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+1);
                while( $i <= $card )
                {
                    $sidbar[$i + $key_quantity + 3] =  $arti[$keys + $i]['id'];
                    $i++;
                }
            }

            

            $key_quantity = count($sidbar);

            // Внесение в массив $sidbar класс и название второго блока
            $sidbar[$key_quantity + 1] = 'famous';
            $sidbar[$key_quantity + 2] = $cat[$mc]['name'];
            
            // Внесение в массив  $sidbar id первых 6 статей из массива $arts_max_views
            $i = 0;
            $keys = array_keys(array_column($arti, 'categoris_id'), $mc+1);
            while( $i <= $card )
            {
                $sidbar[$i + $key_quantity + 3] =  $arti[$keys + $i]['id'];
                $i++;
            }

            $key_quantity = count($sidbar);

            // Внесение в массив $sidbar класс и название второго блока
            $sidbar[$key_quantity + 1] = 'famous';
            $sidbar[$key_quantity + 2] = $cat[$mc + 1]['name'];
            
            // Внесение в массив  $sidbar id первых 6 статей из массива $arts_max_views
            $i = 0;
            $keys = array_keys(array_column($arti, 'categoris_id'), $mc+2);
            while( $i <= $card )
            {
                $sidbar[$i + $key_quantity + 3] =  $arti[$keys + $i]['id'];
                $i++;
            }

            $b = 0;

            // Создание блоков с картачками в сидбаре.
            // С каждым циклом создаёться новый блок.
            // Кол-во блоков зависит от переменной $block.
            // Сделанно именно так с заделом на возможное в будущем управление сибаром через интерфейс
            // на пример через админ панель.
            while( $b <=  $block)
            {   

                // Переменная $m отражает на каком блоке в данный момент находиться массив
                // и какие ячейки массива $sidbar будут использоваться
                $m = $b * ( 3 + $card )
                ?>
                <!-- Ввывод блока, класс зависит от того какой это блок
                так что не смотря на то что блоки создаються циклом их можно стилизовать уникально -->
                <div class="sidebar__block-<?php echo $sidbar[$m] ?>">
                    <!-- Заголовок блока -->
                    <h2 class="title sidebar-block-<?php echo $sidbar[$m] ?>__title">
                        <?php echo $sidbar[$m+1] ?>
                    </h2>
                    <?php
                    
                        $i = 0;
                        
                        // Ввывод карточек блока.
                        // С каждым циклом создаёться новая карточка.
                        // Кол-во карточек зависит от переменной $card
                        while( $i <= $card )
                        {
                        
                            // Вытаскивание необходимого ключа из массива $arti,
                            //  используя при этом id находящийся в массиве $sidbar.
                            $key = array_search( $sidbar[$i + $m + 2], array_column($arti, 'id'));
                        
                            
                            ?>
                            <!-- Ссылка обрамляющая карточку статьи, через GET запрос передаёться id -->
                            <a href="/blog_article.php?id=<?php echo $arti[$key]['id'] ?>">
                                <button class="post sidebar-block-<?php echo $sidbar[$m] ?>__post">
                                    <!-- Верхняя часть карточки, 
                                    в ней находяться обложка и блок текста -->
                                    <div class="flex post__top sidebar-block-<?php echo $sidbar[$m] ?>-post__top">
                                        <!-- Обложка статьи -->
                                        <div class="post-top__picture sidebar-block-<?php echo $sidbar[$m] ?>-post-top__picture">
                                            <img class="post-top-picture__img sidebar-block-<?php echo $sidbar[$m] ?>-post-top-picture__img" src="/img/s<?php echo $arti[$key]['image'] ?>.png" alt="">
                                        </div>
                                        <!-- Блок текста, в нём название, дата и превью статьи -->
                                        <div class="post-top__text sidebar-block-<?php echo $sidbar[$m] ?>-post-top__text">
                                            <!-- Название статьи -->
                                            <h3 class="post-top-text__title sidebar-block-<?php echo $sidbar[$m] ?>-post-top-text__title">
                                                <?php echo $arti[$key]['title'] ?>
                                            </h3>
                                            <!-- Время публикации статьи -->
                                            <time class="post-top-text__time sidebar-block-<?php echo $sidbar[$m] ?>-post-top-text__time" datetime="2022-12-9-12:35">
                                                <?php echo substr($arti[$key]['pubdate'], 0, 16) ?>
                                            </time>
                                            <!-- превью статьи -->
                                            <div class="post-top-text__preview sidebar-block-<?php echo $sidbar[$m] ?>-post-top-text__preview">
                                                <?php echo $arti[$key]['text'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Нижний блок карточки, в нём кол-во лайков и просмотров а так же автор  -->
                                    <div class="flex post__bottom sidebar-block-<?php echo $sidbar[$m] ?>-post__bottom">
                                        <!-- Блок лайков -->
                                        <div class="flex post-bottom__like sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom__like">
                                            <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                            <div class="post-bottom-like__text sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom-like__text">
                                                <?php echo $arts_max_likes[$i]['like'] ?>
                                            </div>
                                        </div>
                                        <!-- Блок просмотров -->
                                        <div class="flex post-bottom__views sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom__views">
                                            <svg class="svg post-bottom-views__svg sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom-views__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04" style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
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
                                            <div class="post-bottom-views__text sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom-views__text">
                                                <?php echo $arti[$key]['views'] ?>
                                            </div>
                                        </div>
                                        <!-- Автор статьи -->
                                        <div class="post-bottom__author sidebar-block-<?php echo $sidbar[$m] ?>-post-bottom__author">
                                            <?php echo $autho[$arti[$key]['author']-1]['name'] ?>
                                        </div>
                                    </div>
                                </button>
                            </a>                           
                            <?php
                            $i++;

                        }  
                    ?>
                </div>
            <?php
            $b++;
            }
        ?>
        <section class="flex content">
            <div class=" content__block content__new">
                <h2 class="title content-new__title">
                        Новое
                    </h2>

                        <?php

                        
                        
                        $i=0;
                        
                        while( $i <= 5 )
                        {

                            if($arti[$i] == false)
                            {
                                break;
                            }
                            $l = 0;
                            foreach ($lik_e as &$lik) {
                                if( $lik['id_article'] == $arti[$i]['id'] ){
                                    $l++;    
                               }
                            
                            } 

                            echo ' 
                            <a href="/blog_article.php?id='.$arti[$i]['id'].'&title='.$arti[$i]['title'].'">
                                <button class="post content-new__post">
                                    <div class="flex post__top content-new-post__top">
                                        <div class="post-top__picture content-new-post-top__picture">
                                            <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$i]['image'] . '.png" alt="">
                                        </div>
                                        <div class="post-top__text content-new-post-top__text">
                                            <h3 class="post-top-text__title content-new-post-top-text__title">
                                                ' . $arti[$i]['title'] . '
                                            </h3>
                                            <time class="post-top-text__time content-new-post-top-text__time" datetime="2022-12-9-12:35">
                                                ' . substr($arti[$i]['pubdate'], 0, 16) . '
                                            </time>
                                            <div class="post-top-text__preview content-new-post-top-text__preview">
                                                ' . $arti[$i]['text'] . '
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex post__bottom content-new-post__bottom">
                                        <div class="flex post-bottom__like content-new-post-bottom__like">
                                            <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                            <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                                ' . $l . '
                                            </div>
                                        </div>
                                        <div class="flex post-bottom__views content-new-post-bottom__views">
                                            <svg class="svg post-bottom-views__svg content-new-post-bottom-views__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04" style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
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
                                            <div class="post-bottom-views__text content-new-post-bottom-views__text">
                                                ' . $arti[$i]['views'] . '
                                            </div>
                                        </div>
                                        <div class="post-bottom__author content-new-post-bottom__author">
                                            ' .  $autho[$arti[$i]['author']-1]['name'] . '
                                        </div>
                                    </div>
                                </button>
                            </a>';
                            $i=$i+1;
                        }          
                        
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+1);

                                if($keys[$i] == false)
                                {
                                    break;
                                }

                                $l = 0;
                                foreach ($lik_e as &$lik) {
                                    if( $lik['id_article'] == $arti[$keys[$i]]['id'] ){
                                        $l++;    
                                    }
                                }

                                echo '
                                <a href="/blog_article.php?id='.$arti[$keys[$i]]['id'].'&title='.$arti[$keys[$i]]['title'].'">
                                    <button class="post content-new__post">
                                        <div class="flex post__top content-new-post__top">
                                            <div class="post-top__picture content-new-post-top__picture">
                                                <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.png" alt="">
                                            </div>
                                            <div class="post-top__text content-new-post-top__text">
                                                <h3 class="post-top-text__title content-new-post-top-text__title">
                                                    ' . $arti[$keys[$i]]['title'] . '
                                                </h3>
                                                <time class="post-top-text__time content-new-post-top-text__time" datetime="2022-12-9-12:35">
                                                    ' . substr($arti[$keys[$i]]['pubdate'], 0, 16) . '
                                                </time>
                                                <div class="post-top-text__preview content-new-post-top-text__preview">
                                                    ' . $arti[$keys[$i]]['text'] . '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex post__bottom content-new-post__bottom">
                                            <div class="flex post-bottom__like content-new-post-bottom__like">
                                                <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                                <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                                    ' . $l . '
                                                </div>
                                            </div>
                                            <div class="flex post-bottom__views content-new-post-bottom__views">
                                                <svg class="svg post-bottom-views__svg content-new-post-bottom-views__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04" style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
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
                                                <div class="post-bottom-views__text content-new-post-bottom-views__text">
                                                    ' . $arti[$keys[$i]]['views'] . '
                                                </div>
                                            </div>
                                            <div class="post-bottom__author content-new-post-bottom__author">
                                                ' .  $autho[$arti[$keys[$i]]['author']-1]['name']  . '
                                            </div>
                                        </div>
                                    </button>
                                </a>';
                            
                            $i++;

                        }  
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc+1]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+2);
                               
                                if($keys[$i] == false and $i <> 0)
                                {
                                    break;
                                }

                                $l = 0;
                                foreach ($lik_e as &$lik) {
                                    if( $lik['id_article'] == $arti[$keys[$i]]['id'] ){
                                        $l++;    
                                    }
                                }

                                echo '
                                <a href="/blog_article.php?id='.$arti[$keys[$i]]['id'].'&title='.$arti[$keys[$i]]['title'].'">
                                    <button class="post content-new__post">
                                        <div class="flex post__top content-new-post__top">
                                            <div class="post-top__picture content-new-post-top__picture">
                                                <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.png" alt="">
                                            </div>
                                            <div class="post-top__text content-new-post-top__text">
                                                <h3 class="post-top-text__title content-new-post-top-text__title">
                                                    ' . $arti[$keys[$i]]['title'] . '
                                                </h3>
                                                <time class="post-top-text__time content-new-post-top-text__time" datetime="2022-12-9-12:35">
                                                    ' . substr($arti[$keys[$i]]['pubdate'], 0, 16) . '
                                                </time>
                                                <div class="post-top-text__preview content-new-post-top-text__preview">
                                                    ' . $arti[$keys[$i]]['text'] . '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex post__bottom content-new-post__bottom">
                                            <div class="flex post-bottom__like content-new-post-bottom__like">
                                                <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                                <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                                    ' . $l . '
                                                </div>
                                            </div>
                                            <div class="flex post-bottom__views content-new-post-bottom__views">
                                                <svg class="svg post-bottom-views__svg content-new-post-bottom-views__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04" style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
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
                                                <div class="post-bottom-views__text content-new-post-bottom-views__text">
                                                    ' . $arti[$keys[$i]]['views'] . '
                                                </div>
                                            </div>
                                            <div class="post-bottom__author content-new-post-bottom__author">
                                                ' .  $autho[$arti[$keys[$i]]['author']-1]['name']  . '
                                            </div>
                                        </div>
                                    </button>
                                </a>';
                            
                            $i++;

                        }  
                        ?>
                </div>
            </section>
            

        </main>

</body>

</html>