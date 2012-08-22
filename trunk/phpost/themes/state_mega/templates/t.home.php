<? 
include 'sections/main_header.php'; 
?>
                <div id="izquierda">
			<? include 'modules/m.home_last_posts.php'; ?>
                </div>
                <div id="centro">
                        <?
                        include 'modules/m.home_stats.php';
                        include 'modules/m.home_last_comments.php';
                        include 'modules/m.home_top_posts.php';
                	include 'modules/m.home_top_users.php';                        
                        ?>
                    <!--Poner aqui mas modulos-->
                </div>
                <div id="derecha">
                   {if $tsConfig.c_fotos_private == 1 && !$tsUser->is_member}
                   {else}
                    {include file='modules/m.home_fotos.tpl'}
		  {/if}
                    {include file='modules/m.home_afiliados.tpl'}
                    <br class="spacer"/>
                    {include file='modules/m.global_ads_160.tpl'}
                </div>
                <div style="clear:both"></div>
<? include 'sections/main_footer.php'; ?>