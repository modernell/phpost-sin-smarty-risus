                                <div class="boxy-title">
                                    <h3>Centro de Administraci&oacute;n</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                	<b>Bienvenido(a), <? echo $tsUser->nick; ?>!</b><br />
                                        Este es tu &quot;Centro de Administraci&oacute;n de PHPost&quot;. Aqu&iacute; puedes modificar la configuraci&oacute;n de tu web, 
                                        modificar usuarios, modificar posts, y muchas otras cosas.
                                        <br />Si tienes algun problema, por favor revisa la p&aacute;gina de &quot;Soporte y Cr&eacute;ditos&quot;.  
                                        Si esa informaci&oacute;n no te sirve, puedes 
                                        <a href="http://www.alconlabs.com.ar/" target="_blank">visitarnos para solicitar ayuda</a> acerca de tu problema.
                                    <hr class="separator" />
                                    <div class="phpost">
                                        <h1>PHPost en directo</h1>
                                        <ul id="news_pp" class="pp_list">
                                            <div class="phpostAlfa">Cargando...</div>
                                        </ul>
                                    </div>
                                    <div class="phpost version">
                                        <h1>Versiones</h1>
                                        <ul id="version_pp" class="pp_list">
                                            <li>
                                                <div class="title">Tu versi&oacute;n de PHPost</div>
                                                <div class="body"><b><? echo $tsConfig['version']; ?></b></div>
                                            </li>
                                        </ul>
                                        <h1>Administradores</h1>
                                        <ul class="pp_list">                                    
                                            <?
                                            foreach ($tsAdmins as $admin)
                                            {
                                            ?>
                                            <li><div class="title">
                                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $admin['user_name']; ?>" class="hovercard" uid="<? echo $admin['user_id']; ?>">
                                                        <? echo $admin['user_name']; ?>
                                                    </a>
                                                </div>
                                            </li>                                    
                                            <? } ?>
                                        </ul>
                                            <div class="categoriaList estadisticasList">
						<h6>Instalaciones</h6>
                                                    <ul>
                                                        <li class="clearfix">
                                                            <span class="floatL">&nbsp; Fundaci&oacute;n</span>
                                                            <span class="floatR number" title="<? echo modifier_hace($tsInst[0]); ?>"><? echo modifier_hace($tsInst[0]); ?> &nbsp;</span>
                                                        </li>
                                                        <li class="clearfix">
                                                            <span class="floatL">&nbsp; Actualizado</span>
                                                            <span class="floatR number" title="<? echo modifier_hace($tsInst[1]); ?>"><? echo modifier_hace($tsInst[1]); ?> &nbsp;</span>
                                                        </li>
                                                    </ul>
                                            </div>                                    
                                    </div>
                                    <div class="clearBoth"></div>
                                </div>

<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "/feed-support.php",
        dataType: "json",
        success: function(r) {
            $('#news_pp').html('');
            for(var i = 0; i < r.length; i++){
                //
                var html = '<li>';
                html += '<div class="title"><a href="' + r[i].link + '" target="_blank">' + r[i].title +'</a></div>';
                html += '<div class="body">' + r[i].info +'</div>';
                html += '</li>';
                //
                $('#news_pp').append(html);
            }
    	}
    });
    $.ajax({
        type: "GET",
        url: "/feed-version.php?v=risus",
        dataType: "json",
        success: function(r) {
            for(var i = 0; i < r.length; i++){
                //
                var html = '<li>';
                html += '<div class="title">' + r[i].title +'</div>';
                html += '<div class="body">' + r[i].text +'</div>';
                html += '</li>';
                //
                $('#version_pp').append(html);
            }
    	}
    });
});
</script>
