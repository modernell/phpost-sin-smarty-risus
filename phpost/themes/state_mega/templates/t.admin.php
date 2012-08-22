<? include 'sections/main_header.php'; ?>
                <script type="text/javascript" src="<? echo $tsConfig['js'];?>/admin.js"></script>
                <div id="borradores">
					<div class="clearfix">
                    	<div class="left" style="float:left;width:200px">
                            <div class="boxy">
                                <div class="boxy-title">
                                    <h3>Men&uacute;</h3>
                                    <span></span>
                                </div><!-- boxy-title -->
                                <div class="boxy-content" id="admin_menu">
				<? include 'admin_mods/m.admin_sidemenu.php'; ?>
                                </div><!-- boxy-content -->
                            </div>
                        </div>
                        <div class="right" style="float:left;margin-left:10px;width:730px">
                            <div class="boxy" id="admin_panel">
                            	<?                                
                            	if ($tsAction == '')                                
                                    include 'admin_mods/m.admin_welcome.php';                                
                                elseif ($tsAction == 'creditos')
                                    include 'admin_mods/m.admin_creditos.php';
                                elseif ($tsAction == 'configs')
                            	include 'admin_mods/m.admin_configs.php';
                                elseif ($tsAction == 'temas')
                            	include 'admin_mods/m.admin_temas.php';
                                elseif ($tsAction == 'news')
                            	include 'admin_mods/m.admin_noticias.php';
                                elseif ($tsAction == 'ads')
                            	include 'admin_mods/m.admin_publicidad.php';
                                elseif ($tsAction == 'medals')
                            	include 'admin_mods/m.admin_medallas.php';
				elseif ($tsAction == 'stats')
                            	include 'admin_mods/m.admin_stats.php';
				elseif ($tsAction == 'posts')
                            	include 'admin_mods/m.admin_posts.php';
				elseif ($tsAction == 'fotos')
                            	include 'admin_mods/m.admin_fotos.php';
                                elseif ($tsAction == 'afs')
                            	include 'admin_mods/m.admin_afiliados.php';
                                elseif ($tsAction == 'pconfigs')
                            	include 'admin_mods/m.admin_posts_configs.php';
                                elseif ($tsAction == 'cats')
                            	include 'admin_mods/m.admin_cats.php';
                                elseif ($tsAction == 'users')
                            	include 'admin_mods/m.admin_users.php';
				elseif ($tsAction == 'sesiones')
                            	include 'admin_mods/m.admin_sesiones.php';
				elseif ($tsAction == 'nicks')
                            	include 'admin_mods/m.admin_nicks.php';
                                elseif ($tsAction == 'blacklist')
                            	include 'admin_mods/m.admin_blacklist.php';
                                elseif ($tsAction == 'badwords')
                                include 'admin_mods/m.admin_badwords.php';
                                elseif ($tsAction == 'rangos')
                            	include 'admin_mods/m.admin_rangos.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
<? include 'sections/main_footer.php'; ?>