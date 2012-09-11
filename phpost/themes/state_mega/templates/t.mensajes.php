<?
include 'sections/main_header.php';
?>
                <? include 'modules/m.mensajes_menu.php'; ?>
                <div style="float:right;width:730px">
                	<div style="display: none;" id="m-mensaje"></div>
                    <div class="boxy">
                        <div class="boxy-title">
                            <h3>Mensajes</h3>
                            <form method="get" action="<? echo $tsConfig['url']; ?>/mensajes/search/">
                                <input type="text" name="qm" placeholder="Buscar en Mensajes" title="Buscar en Mensajes" value="<? echo $tsMensajes['texto']; ?>" class="search_mp onblur_effect"/>
                            </form>
                        </div>
                        <div class="boxy-content" style="padding:0" id="mensajes">
                            <?
                            if ($tsAction == '' || $tsAction == 'enviados' || $tsAction == 'respondidos' || $tsAction == 'search')
                            include 'modules/m.mensajes_list.php';
                            elseif ($tsAction == 'leer')
                            {    
                            include 'modules/m.mensajes_leer.php';
                            }
                            elseif ($tsAction == 'avisos')
                            include 'modules/m.mensajes_avisos.php';                            
                            ?>
			</div>
                    </div>
                </div>
                <div style="clear: both;"></div>
                
<?
include 'sections/main_footer.php';
?>