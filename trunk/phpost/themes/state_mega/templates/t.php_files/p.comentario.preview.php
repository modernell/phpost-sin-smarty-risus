<?
echo '1:';
//echo 'dhsahdsahdsahdahsdhsadh';
//$tsType= 'new';
if ($tsType == 'new')
{    
?>
 <div id="div_cmnt_<?  echo $tsComment[0]; ?>" class="<? if ($tsComment[4] == $tsUser->uid)echo 'especial1'; else 'especial3';?>">
   <span id="citar_comm_<? echo $tsComment[0]; ?>" style="display:none"><? echo $tsComment[2]; ?></span>
    <div class="comentario-post clearbeta">
        <div class="avatar-box" style="z-index: 99;">
            <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsUser->info['user_name']; ?>">
                <img width="48" height="48" title="<?  echo $tsUser->info['user_name']; ?>" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $tsUser->uid;?>_50.jpg" class="avatar-48 lazy" style="position: relative; z-index: 1; display: inline;"/>
            </a>
        </div>
        <div class="comment-box">
            <div class="dialog-c"></div>
            <div class="comment-info clearbeta">
                <div class="floatL">
                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsUser->nick; ?>" class="nick"><? echo $tsUser->nick; ?></a>
                    <? if ($tsUser->is_admod)
                       {
                    ?>
                      (<span style="color:red;">IP:</span>
                        <a href="<?  echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $tsComment[6]; ?>" class="geoip" target="_blank">
                        <? echo $tsComment[6];?>
                        </a>
                      )
                    <? } ?>dijo
                    <span><?  echo modifier_hace($tsComment[3]); ?></span>:
                </div>
                <div class="floatR answerOptions">
                    <ul> <? if ($tsComment[0] > 0)
                    {
                            if ($tsUser->is_member)
                               {
                             ?>   
                            <li class="answerCitar">
                                    <a onclick="citar_comment(<? echo $tsComment[0];?>, '<? echo $tsUser->nick;?>')">
                                    <span class="citar-comentario"></span>
                                </a>
                            </li>
                            <? }
                            if ($tsUser->is_admod || $tsUser->permisos['goepc'])
                            {    
                            ?>
                            <li>
                                    <a onclick="comentario.editar(<? echo $tsComment[0];?>, 'show')" title="Editar">
                                    <span class="editar-comentario"></span>
                                </a>
                            </li>
                             <?                             
                             }
                            if ($tsUser->is_admod || $tsUser->permisos['godpc'])
                            {
                             ?>       
                            <li class="iconDelete">
                                <a onclick="borrar_com(<? echo $tsComment[0];?>, <? echo $tsUser->uid; ?>)">
                                                            <span class="borrar-comentario"></span>
                            </a>
                            </li>
                            <? }
                            if ($tsUser->is_admod || $tsUser->permisos['moaydcp'])
                            {
                            ?>
                            <li class="iconHide">                                                    	
				<a onclick="ocultar_com(<? echo $tsComment[0];?>, <? echo $tsUser->uid; ?>);" title="Ocultar/Mostrar">
					<span class="moderar-comentario"></span>														
				</a>                                                    
                            </li>
                            <? }
                        
                        }                            
                        else
                        {
                         ?>
                            <li><a><span style="color:red;width:auto;background:none;"><b>Vista Previa</b></span></a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
            <div id="comment-body-<? echo $tsComment[0]; ?>" class="comment-content" style="text-align:left;">
                <? echo nl2br($tsComment[1]); ?>
            </div>
        </div>
    </div>
</div>
<?
}
elseif ($tsType == 'edit')
{
?>    
<div id="preview" class="box_cuerpo" style="margin: -15px 0 0; font-size:13px; line-height: 1.4em; min-width:300px;max-width: 760px; padding: 12px 20px; overflow-y: auto; text-align: left; border-top:1px solid #CCC">
    <div id="new-com-html"><? echo nl2br($tsComment[1]); ?></div>
    <div id="new-com-bbcode" style="display:none"><? echo $tsComment[5]; ?></div>
</div>
<? } ?>