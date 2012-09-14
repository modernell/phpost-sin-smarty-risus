	<div class="subMenuContent">
        	<div id="subMenuPosts" class="subMenu <? if($tsPage != 'tops') echo 'here'; ?>">
                <ul class="floatL tabsMenu">
                    <li<? if ($tsPage == 'home' || $tsPage == 'portal') echo ' class="here"'; ?>>
                        <a class=vctip  title="Inicio" href="<? echo $tsConfig['url'].'/'; if ($tsPage == 'home' || $tsPage == 'posts') echo 'posts/'; ?>">Inicio</a>
                    </li>
                    <li<? if ($tsPage == 'buscador') echo ' class="here"'; ?>>
                        <a class=vctip title="Buscador" href="<? echo $tsConfig['url']; ?>/buscador/">Buscador</a></li>
                    <? 
                    if ($tsUser->is_member) 
                    {                     
                       if ($tsUser->is_admod || $tsUser->permisos['gopp'])
                        {
                    ?>
                    <li<? if ($tsSubmenu == 'agregar') echo ' class="here"'; ?>>
                        <a class=vctip title="Agregar Post" href="<? echo $tsConfig['url']; ?>/agregar/">Agregar Post</a>
                    </li>
                    <li class="<? if($tsPage == 'mod-history') echo 'here' ?>">
                        <a class=vctip title="Historial de Moderaci&oacute;n" href="<? echo $tsConfig['url']; ?>/mod-history/">Historial</a>
                    </li>
        	    <?
                    if ($tsUser->is_admod || $tsUser->permisos['moacp'])
                    {   
                    ?>
                    <li class="<? if($tsPage == 'moderacion') echo 'here'; ?>">
                        <a class=vctip title="Panel de Moderador" href="<? echo $tsConfig['url']; ?>/moderacion/">Moderaci&oacute;n 
                            <? if ($tsConfig['c_see_mod'] && $tsConfig['novemods']['total'])
                            { 
                            ?>
                            <span class="cadGe cadGe_<? if ($tsConfig['novemods']['total'] < 10) echo 'green'; elseif ($tsConfig['novemods']['total'] < 30) echo 'purple'; else echo 'red'; ?>" style="position:relative;"><? echo $tsConfig['novemods']['total'];?> </span>
                            <?                            
                            } 
                            ?>
                        </a>
                    </li>
                    <?                    
                     }
                    }                    
                    }
                    ?>
                    <div class="clearBoth"></div>
                </ul>
                <? include 'head_categorias.php'; ?>
                <div class="clearBoth"></div>
            </div>
            <div id="subMenuFotos" class="subMenu <? if($tsPage == 'fotos') echo 'here'; ?>">
                <ul class="floatL tabsMenu">
                    <li <? if ($tsAction == '' && $tsAction != 'agregar' && $tsAction != 'album' && $tsAction != 'favoritas' || $tsAction == 'ver') echo 'class="here"'; ?>>
                        <a href="<? echo $tsConfig['url']; ?>/fotos/">Inicio</a>
                    </li>
                    <? if ($tsAction == 'album' && $tsFUser[0] != $tsUser->uid)
                    {
                    ?>    
                    <li class="here">
                        <a href="<? echo $tsConfig['url']; ?>/fotos/<? echo $tsFUser[1]; ?>">&Aacute;lbum de <? echo $tsFUser[1]; ?></a></li>
                    <?                     
                    }
                    if ($tsUser->is_admod || $tsUser->permisos['gopf']) 
                    {
                    ?>
                    <li<? if( $tsAction == 'agregar') echo ' class="here"'; ?>>
                        <a href="<? echo $tsConfig['url']; ?>/fotos/agregar.php">Agregar Foto</a></li>
                    <?
                    }
                    ?>
                    <li <? if ($tsAction == 'album' && $tsFUser[0] == $tsUser->uid) echo 'class="here"'; ?> >
                        <a href="<? echo $tsConfig['url'].'/fotos/'.$tsUser->nick; ?>">Mis Fotos</a>
                    </li>
                </ul>
                <div class="clearBoth"></div>
            </div>
            <div id="subMenuTops" class="subMenu <? if($tsPage == 'tops') echo 'here'; ?>">
                <ul class="floatL tabsMenu">
                    <li <? if ($tsAction == 'posts') echo 'class="here"'; ?>><a href="<? echo $tsConfig['url']; ?>/top/posts/">Posts</a></li>
                    <li <? if ($tsAction == 'usuarios') echo 'class="here"'; ?>><a href="<? echo $tsConfig['url']; ?>/top/usuarios/">Usuarios</a></li>
                </ul>
                <div class="clearBoth"></div>
            </div>
        </div>