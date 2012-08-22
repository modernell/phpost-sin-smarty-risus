<? include 'sections/main_header.php'; ?>
                <script type="text/javascript" src="<? echo $tsConfig['default']; ?>/js/moderacion.js"></script>
                <div id="borradores">
					<div class="clearfix">
                    	<div class="left" style="float:left;width:210px">
                   			<div class="boxy">
                                <div class="boxy-title">
                                    <h3>Opciones</h3>
                                    <span></span>
                                </div><!-- boxy-title -->
                                <div class="boxy-content" id="admin_menu">
				<? include 'admin_mods/m.mod_sidemenu.php'; ?>
                                </div><!-- boxy-content -->
                            </div>
                            <? 
                            if ($tsAction == 'buscador' && $tsAct == 'search')
                                include 'admin_mods/m.mod_buscador_stats.php';
                            ?>
                        </div>
                        <div class="right" style="float:left;margin-left:10px;width:720px">
                            <div class="boxy" id="admin_panel">                            	
                                <?                                
                            	if ($tsAction == '')
                                    include 'admin_mods/m.mod_welcome.php';
                                elseif ($tsAction == 'posts')
                            	include 'admin_mods/m.mod_report_posts.php';
				elseif ($tsAction == 'fotos')
                            	include 'admin_mods/m.mod_report_fotos.php';
                                elseif ($tsAction == 'mps')
                                include 'admin_mods/m.mod_report_mps.php';
                                elseif ($tsAction == 'users')
                            	include 'admin_mods/m.mod_report_users.php';
                                elseif ($tsAction == 'banusers')
                                if ($tsUser->is_admod || $tsUser->permisos['movub'])
                                include 'admin_mods/m.mod_ban_users.php';
				elseif ($tsAction == 'pospelera')
                                if ($tsUser->is_admod || $tsUser->permisos['morp'])
                                include 'admin_mods/m.mod_papelera_posts.php';
				elseif ($tsAction == 'fopelera')
                                if ($tsUser->is_admod || $tsUser->permisos['morf'])
                                include 'admin_mods/m.mod_papelera_fotos.php';//if
				elseif ($tsAction == 'buscador')
                                if ($tsUser->is_admod || $tsUser->permisos['moub'])
                                include 'admin_mods/m.mod_buscador.php';//if
				elseif ($tsAction == 'comentarios')
                                if ($tsUser->is_admod || $tsUser->permisos['mocc'])
                                include 'admin_mods/m.mod_revision_comentarios.php';//if
				elseif ($tsAction == 'revposts')
                                if ($tsUser->is_admod || $tsUser->permisos['mocp'])
                                include 'admin_mods/m.mod_revision_posts.php';                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
                
<? include 'sections/main_footer.php'; ?>