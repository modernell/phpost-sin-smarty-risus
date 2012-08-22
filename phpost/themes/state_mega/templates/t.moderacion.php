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
                                
                                ?>
                                {elseif $tsAction == 'posts'}
                            	{include file='admin_mods/m.mod_report_posts.tpl}
				{elseif $tsAction == 'fotos'}
                            	{include file='admin_mods/m.mod_report_fotos.tpl'}
                                {elseif $tsAction == 'mps'}
                                {include file='admin_mods/m.mod_report_mps.tpl'}
                                {elseif $tsAction == 'users'}
                            	{include file='admin_mods/m.mod_report_users.tpl'}
                                {elseif $tsAction == 'banusers'}
                                {if $tsUser->is_admod || $tsUser->permisos.movub}{include file='admin_mods/m.mod_ban_users.tpl'}{/if}
				{elseif $tsAction == 'pospelera'}
                                {if $tsUser->is_admod || $tsUser->permisos.morp}{include file='admin_mods/m.mod_papelera_posts.tpl'}{/if}
				{elseif $tsAction == 'fopelera'}
                                {if $tsUser->is_admod || $tsUser->permisos.morf}{include file='admin_mods/m.mod_papelera_fotos.tpl'}{/if}
				{elseif $tsAction == 'buscador'}
                                {if $tsUser->is_admod || $tsUser->permisos.moub}{include file='admin_mods/m.mod_buscador.tpl'}{/if}
				{elseif $tsAction == 'comentarios'}
                                {if $tsUser->is_admod || $tsUser->permisos.mocc}{include file='admin_mods/m.mod_revision_comentarios.tpl'}{/if}
				{elseif $tsAction == 'revposts'}
                                {if $tsUser->is_admod || $tsUser->permisos.mocp}{include file='admin_mods/m.mod_revision_posts.tpl'}{/if}
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
                
<? include 'sections/main_footer.php'; ?>