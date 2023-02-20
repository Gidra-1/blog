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

                            echo ' 
                            <a href="/blog_article.php?get='.$arti[$i]['id'].'">
                                <button class="post content-new__post">
                                    <div class="flex post__top content-new-post__top">
                                        <div class="post-top__picture content-new-post-top__picture">
                                            <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$i]['image'] . '.jpg" alt="">
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
                                            <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                            <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                                ' . $arti[$i]['lik.e'] . '
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

                                echo '<button class="post content-new__post">
                                <div class="flex post__top content-new-post__top">
                                    <div class="post-top__picture content-new-post-top__picture">
                                        <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                        <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                        <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                            ' . $arti[$keys[$i]]['lik.e'] . '
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
                            </button>';
                            
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

                                if($keys[$i] == false)
                                {
                                    break;
                                }

                                echo '<button class="post content-new__post">
                                <div class="flex post__top content-new-post__top">
                                    <div class="post-top__picture content-new-post-top__picture">
                                        <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                        <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                        <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                            ' . $arti[$keys[$i]]['lik.e'] . '
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
                            </button>';
                            
                            $i++;
                        }  
                        

                        
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc+2]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+3);
                               
                                if($keys[$i] == false and $i <> 0)
                                {
                                    break;
                                }

                                echo '
                                <button class="post content-new__post">
                                    <div class="flex post__top content-new-post__top">
                                        <div class="post-top__picture content-new-post-top__picture">
                                            <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                            <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                            <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                                ' . $arti[$keys[$i]]['lik.e'] . '
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
                                </button>';
                            
                            $i++;
                        }  
                        

                        
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc+3]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+4);

                                if($keys[$i] == false)
                                {
                                    break;
                                }

                                echo '<button class="post content-new__post">
                                <div class="flex post__top content-new-post__top">
                                    <div class="post-top__picture content-new-post-top__picture">
                                        <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                        <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                        <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                            ' . $arti[$keys[$i]]['lik.e'] . '
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
                            </button>';
                            
                            $i++;
                        }  
                        

                        
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc+4]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+5);

                                if($keys[$i] == false)
                                {
                                    break;
                                }

                                echo '<button class="post content-new__post">
                                <div class="flex post__top content-new-post__top">
                                    <div class="post-top__picture content-new-post-top__picture">
                                        <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                        <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                        <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                            ' . $arti[$keys[$i]]['lik.e'] . '
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
                            </button>';
                            
                            $i++;
                        }  
                        

                        
                        ?>
                </div>
            </section>
            <section class="flex content">
                <div class=" content__block content__new">
                    <h2 class="title content-new__title">
                        Новое в <?php echo $cat[$mc+5]['name']; ?>
                    </h2>

                        <?php

                        $i=0;

                        
                        while( $i <= 5 )
                        {
                                
                                $keys = array_keys(array_column($arti, 'categoris_id'), $mc+6);

                                if($keys[$i] == false)
                                {
                                    break;
                                }

                                echo '<button class="post content-new__post">
                                <div class="flex post__top content-new-post__top">
                                    <div class="post-top__picture content-new-post-top__picture">
                                        <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$keys[$i]]['image'] . '.jpg" alt="">
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
                                        <svg class="svg post-bottom-like__svg content-new-post-bottom-like__svg" version="1.0" xmlns="http://www.w3.org/2000/svg" width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
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
                                        <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                            ' . $arti[$keys[$i]]['lik.e'] . '
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
                            </button>';
                            
                            $i++;
                        }  
                        

                        
                        ?>
                </div>
            </section>

        </main>






</body>