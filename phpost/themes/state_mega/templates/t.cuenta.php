<?
include 'sections/main_header.php';
?>
				
		<script type="text/javascript" src="<? echo $tsConfig['js']; ?>/cuenta.js"></script>                
		<script type="text/javascript">
                $(document).ready(function(){
                    //document.domain = global_data.domain;
                	// {/literal}
                    avatar.uid = '<? echo $tsUser->uid; ?>';
                    avatar.current = '<? echo $tsConfig[url]; ?>/files/avatar/<? if ($tsPerfil[p_avatar]) echo $tsPerfil[user_id]; else echo "avatar";?>.jpg';
                	// {literal}                
                    if (typeof location.href.split('#')[1] != 'undefined') {
                        $('ul.menu-tab > li > a:contains('+location.href.split('#')[1]+')').click();
                    }
                
                });
                </script>
                
                <div class="tabbed-d">
                	<div class="floatL">
                        <ul class="menu-tab">
                            <li class="active"><a onclick="cuenta.chgtab(this)">Cuenta</a></li>
                            <li><a onclick="cuenta.chgtab(this)">Perfil</a></li>    
                            <li><a onclick="cuenta.chgtab(this)">Bloqueados</a></li>
                            <li><a onclick="cuenta.chgtab(this)">Cambiar Clave</a></li>
							<li><a onclick="cuenta.chgtab(this)">Cambiar Nick</a></li>
                            <li class="privacy"><a onclick="cuenta.chgtab(this)">Privacidad</a></li>
                        </ul>
                        <a name="alert-cuenta"></a>
                        <form class="horizontal" method="post" action="" name="editarcuenta">
                            <?
                            include 'modules/m.cuenta_cuenta.php';
                            include 'modules/m.cuenta_perfil.php';
                            ?>
                            {include file='modules/m.cuenta_perfil.tpl'}
                            {include file='modules/m.cuenta_block.tpl'}
                            {include file='modules/m.cuenta_clave.tpl'}
                            {include file='modules/m.cuenta_nick.tpl'}
                            {include file='modules/m.cuenta_config.tpl'}
                        </form>
                    </div>
                    <div class="floatR">
                        <?
                            include 'modules/m.cuenta_sidebar.php';
                        ?>
                    </div>
                </div>
                <div style="clear:both"></div>
               

<?
include 'sections/main_footer.php';
?>