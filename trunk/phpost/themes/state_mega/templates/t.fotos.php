<? include 'sections/main_header.php'; ?>
                <script type="text/javascript" src="<? echo $tsConfig['js']; ?>/fotos.js"></script>
				<style>
                
				</style>
               <?                 
                if ($tsAction == '')
                {    
                include 'modules/m.fotos_home_content.php';
                include 'modules/m.fotos_home_sidebar.php';
                }
                elseif ($tsAction == 'agregar' || $tsAction == 'editar')
                {    
                include 'modules/m.fotos_add_form.php';
                include 'modules/m.fotos_add_sidebar.php';
                }
                elseif ($tsAction == 'ver')
                {    
                include 'modules/m.fotos_ver_left.php';
                include 'modules/m.fotos_ver_content.php';
                include 'modules/m.fotos_ver_right.php';
                }
                elseif ($tsAction == 'album')
                {    
                include 'modules/m.fotos_album.php';
                }
                elseif ($tsAction == 'favoritas')
                {
                ?>
                    <div class="emptyData">En construcci&oacute;n</div>
                <?
                }
                ?>
                <div class="clearBoth"></div>
<? include 'sections/main_footer.php'; ?>