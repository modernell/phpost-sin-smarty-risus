<?
if ($tsAction == 'denuncia-post')
{
?>
<div align="center" style="padding:10px 10px 0">
    <b>Denunciar el post:</b><br />
    <? echo $tsData['obj_title']; ?>
    <br /><br />
    <b>Creado por:</b><br />
    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsData['obj_user']; ?>" target="_blank"><? echo $tsData['obj_user']; ?></a><br /><br />
    <b>Raz&oacute;n de la denuncia:</b><br />
    <select name="razon">
    <?    
    foreach ($tsDenuncias as $i=>$denuncia)
    {
    
        if($denuncia)
        { 
        ?>
        <option value="<? $i; ?>"><? echo $denuncia; ?></option>        
    <?
        }
    }
    ?>
    </select><br />
    <b>Aclaraci&oacute;n y comentarios:</b><br />
    <textarea tabindex="6" rows="5" cols="40" name="extras"></textarea><br />
    <span class="size9">En el caso de ser Re-post se debe indicar el link del post original.</span>
</div>
<?
}
elseif ($tsAction == 'denuncia-foto')
{
?>
<div align="center" style="padding:10px 10px 0">
    <b>Denunciar foto:</b><br />
    <? echo $tsData['obj_title']; ?><br /><br />
    <b>Raz&oacute;n de la denuncia:</b><br />
    <select name="razon">
    <?    
    foreach ($tsDenuncias as $i =>$denuncia)
    {
    	if( $denuncia)
        {
        ?>
        <option value="<? echo $i; ?>"><? echo $denuncia; ?></option>
        <?
        }
    }
    ?>
    
    </select><br />
    <b>Aclaraci&oacute;n y comentarios:</b><br />
    <textarea tabindex="6" rows="5" cols="40" name="extras"></textarea><br />
    <span class="size9">Para atender tu caso r&aacute;pidamente, adjunta pruevas de tu denuncia.<br /> (capturas de pantalla)</span>
</div>
<?
}
elseif ($tsAction == 'denuncia-mensaje')
{
?>
<div class="emptyData">Si reportas este mensaje ser&aacute; eliminado de tu bandeja. <br />&iquest;Realmente quieres denunciar este mensaje como correo no deseado?</div>
<input type="hidden" name="razon" value="spam" />
<?
}
elseif ($tsAction == 'denuncia-usuario')
{
?>
<div align="center" style="padding:10px 10px 0">
    <b>Denunciar usuario:</b><br />
    <? echo $tsData['nick']; ?>}<br /><br />
    <b>Raz&oacute;n de la denuncia:</b><br />
    <select name="razon">
        <?    
    foreach ($tsDenuncias as $i =>$denuncia)
    {
    	if( $denuncia)
        {
        ?>
        <option value="<? echo $i; ?>"><? echo $denuncia; ?></option>
        <?
        }
    }
    ?>    
    </select><br />
    <b>Aclaraci&oacute;n y comentarios:</b><br />
    <textarea tabindex="6" rows="5" cols="40" name="extras"></textarea><br />
    <span class="size9">Para atender tu caso r&aacute;pidamente, adjunta pruevas de tu denuncia.
        <br /> (capturas de pantalla)</span>
</div>
<?
}
?>