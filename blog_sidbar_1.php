

<body>
    <section class="flex sidebar">
        <div class="sidebar__block-random">
            <h2 class="title sidebar-block-random-title">
                Случайная запись
            </h2>
            <?php

                

                $rand_arts = array_rand($arti, 1);
                $rand_arts++;
                echo'
                <a href="/blog_article.php?get='.$arti[$rand_arts]['id'].'">
                    <button class="btn-reset sidebar-block-random__btn">
                        <img class="sidebar-block-random-btn__img" src="/img/cat-black-hole.png" alt="">
                    </button>
                <a/>
                ';
            ?>
        </div>
        <div class="sidebar__block-favourite">
            <h2 class="title sidebar-block-favourite__title">
                Самое любимое
            </h2>
            <?php
                $a = 0;
                
                
                foreach ($arti as &$art) {
                    $l = 0;
                    foreach ($lik_e as &$lik) {
                        
                        if( $lik['id_article'] == $arti[$a]['id']) {
                            $l++;   
                            
                        }
                    }
                    $ar[$a]['like'] = $l;
                    $ar[$a]['id'] = $arti[$a]['id'];

                    $a++;
                    
                }
                
                
                
                $arts_max_likes = $ar;
                       
                function arts_max_likes($a, $b) { 
                    return strnatcmp($b["like"], $a["like"]); 
                } 
                          
                usort($arts_max_likes, "arts_max_likes");
                
                $i = 0;

                while( $i <= 5 )
                {
                    $f = $arts_max_likes[$i]['id'];
                    
                    $key = array_search( $arts_max_likes[$i]['id'], array_column($arti, 'id'));
                   
                    
                    echo ' 
                    <a href="/blog_article.php?id='.$arti[$key]['id'].'">
                        <button class="post content-new__post">
                            <div class="flex post__top content-new-post__top">
                                <div class="post-top__picture content-new-post-top__picture">
                                    <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arti[$key]['image'] . '.png" alt="">
                                </div>
                                <div class="post-top__text content-new-post-top__text">
                                    <h3 class="post-top-text__title content-new-post-top-text__title">
                                        ' . $arti[$key]['title'] . '
                                    </h3>
                                    <time class="post-top-text__time content-new-post-top-text__time" datetime="2022-12-9-12:35">
                                        ' . substr($arti[$key]['pubdate'], 0, 16) . '
                                    </time>
                                    <div class="post-top-text__preview content-new-post-top-text__preview">
                                        ' . $arti[$key]['text'] . '
                                    </div>
                                </div>
                            </div>
                            <div class="flex post__bottom content-new-post__bottom">
                                <div class="flex post-bottom__like content-new-post-bottom__like">
                                    <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                    <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                        ' . $arts_max_likes[$i]['like'] . '
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
                                        ' . $arti[$key]['views'] . '
                                    </div>
                                </div>
                                <div class="post-bottom__author content-new-post-bottom__author">
                                    ' .  $autho[$arti[$key]['author']-1]['name']  . '
                                </div>
                            </div>
                        </button>
                    </a>';                            
    
                    $i++;

                }  
                        
            ?>

        </div>
        <div class="sidebar__block-famous">
            <h2 class="title sidebar-block-famous__title">
                Самое известное
            </h2>
            <?php
    
                $arts_max_views= $arti;
                                
                function arts_max_views($a, $b) { 
                    return strnatcmp($b["views"], $a["views"]); 
                } 
                        
                usort($arts_max_views, "arts_max_views");

                $i=0;

                while( $i <= 5 )
                {
                    $l = 0;
                    foreach ($lik_e as &$lik) {
                        if( $lik['id_article'] == $arts_max_views[$i]['id'] ){
                            $l++;    
                        }
                    }
                               
                    echo '
                    <a href="/blog_article.php?id='.$arts_max_views[$i]['id'].'">
                        <button class="post content-new__post">
                            <div class="flex post__top content-new-post__top">
                                <div class="post-top__picture content-new-post-top__picture">
                                    <img class="post-top-picture__img content-new-post-top-picture__img" src="/img/s' . $arts_max_views[$i]['image'] . '.png" alt="">
                                </div>
                                <div class="post-top__text content-new-post-top__text">
                                    <h3 class="post-top-text__title content-new-post-top-text__title">
                                        ' . $arts_max_views[$i]['title'] . '
                                    </h3>
                                    <time class="post-top-text__time content-new-post-top-text__time" datetime="2022-12-9-12:35">
                                        ' . substr($arts_max_views[$i]['pubdate'], 0, 16) . '
                                    </time>
                                    <div class="post-top-text__preview content-new-post-top-text__preview">
                                        ' . $arts_max_views[$i]['text'] . '
                                    </div>
                                </div>
                            </div>
                            <div class="flex post__bottom content-new-post__bottom">
                                <div class="flex post-bottom__like content-new-post-bottom__like">
                                    <img class="post-bottom-like__img" src="/img/like-off.png" alt="">
                                    <div class="post-bottom-like__text content-new-post-bottom-like__text">
                                        ' .  $l . '
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
                                        ' . $arts_max_views[$i]['views'] . '
                                    </div>
                                </div>
                                <div class="post-bottom__author content-new-post-bottom__author">
                                    ' .  $autho[$arts_max_views[$i]['author']-1]['name']  . '
                                </div>
                            </div>
                        </button>
                    </a>';                            
    
                    $i++;

                }  
                        
            ?>                        
        </div>
    </section>
</body>

</html>