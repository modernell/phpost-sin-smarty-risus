<? include 'sections/main_header.php'; ?>
		<script type="text/javascript" src="<? echo $tsConfig['default']; ?>/js/perfil.js"></script>
                <script type="text/javascript" src="<? echo $tsConfig['default']; ?>/js/portal.js"></script>
                <div id="left_box">
                    <?
                    include 'modules/m.portal_userbox.php';
                    ?>
                    <br class="spacer"/>
                    <?
                    //include 'modules/m.global_ads_160.php';
                    ?>
                </div>
                <div id="center_box">
                    <div id="portal">
                        <div class="tabs_menu box_title">
                            <ul id="tabs_menu">
                                <li class="selected"><a onclick="portal.load_tab('news', this); return false" class="news">Noticias</a></li>
                                <li><a onclick="portal.load_tab('activity', this); return false;" class="activity">Actividad</a></li>
                                <li><a onclick="portal.load_tab('posts', this); return false;" class="posts">Posts</a></li>
                                <li><a onclick="portal.load_tab('favs', this); return false;" class="favs">Favoritos</a></li>
                            </ul>
                            <div class="clearBoth"></div>
                        </div>
                        <div id="portal_content">
                        <?    
                            include 'modules/m.portal_noticias.php';                            
                            include 'modules/m.portal_activity.php';                            
                            include 'modules/m.portal_posts.php';
                            ?>
                            include 'modules/m.portal_posts_favoritos.php';
                        </div>
                    </div>
                </div>
                <div id="right_box">
                    <br />
                    include 'modules/m.home_stats.php';
                    include 'modules/m.portal_posts_visitados.php';
                    include 'modules/m.portal_fotos.php';
                    include 'modules/m.portal_afiliados.php';
                    <!--Poner aqui mas modulos-->
                </div>
                <div style="clear:both"></div>

<? include 'sections/main_footer.php'; ?>