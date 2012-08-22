		<!--end-cuerpo-->
		</div>
        <div id="pie">
		<div class="text">
		<a href="http://www.phpost.net/foro/user/2238-megaerick/">Dise&ntilde;ado por Hussein</a> &nbsp;
        <a href="{$tsConfig.url}/pages/ayuda/">Ayuda</a>&nbsp;
        <a href="{$tsConfig.url}/pages/chat/">Chat</a>&nbsp;
        <a href="{$tsConfig.url}/pages/contacto/">Contacto</a>&nbsp;
        <a href="{$tsConfig.url}/pages/protocolo/">Protocolo</a>&nbsp;
        <a href="{$tsConfig.url}/pages/terminos-y-condiciones/">T&eacute;rminos y condiciones</a>&nbsp; 
        <a href="{$tsConfig.url}/pages/privacidad/">Privacidad de datos</a>&nbsp;
        <a href="{$tsConfig.url}/pages/dmca/">Report Abuse - DMCA</a>
        </div>
        </div>
        </div>
        <!--END CONTAINER-->
    </div>
    <div class="rbott"></div>
    {* El siguiente contenedor sirve para validar el Copyright *}
    {* El ID del div NO debe ser alterado de lo contrario nuestro validador *}
    {* tomará al sitio como una web sin copyright *}
    <div id="pp_copyright" style="display: block!important; opacity: 1!important;">
        <a href="{$tsConfig.url}"><strong>{$tsConfig.titulo}</strong></a> &copy; {$smarty.now|date_format:"%Y"} - Powered by <a href="http://www.alconlabs.com.ar/" target="_blanck"><strong>AlconLabs Inc.</strong></a>
    </div>
</div>
</body>
</html>