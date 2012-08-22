			<div id="topsUserBox">
                        <div class="box_title">
                            <div class="box_txt ultimos_comentarios">TOPs usuarios  <a class="size9" href="<? echo $tsConfig['url']; ?>/top/usuarios/">(Ver m&aacute;s)</a></div>
                            <div class="box_rss">
                            	<a href="/rss/usuarios-top-mes"><span class="systemicons sRss"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" style="padding: 0pt; height: 330px;">
                        	<div class="filterBy">
                            	<a href="javascript:TopsTabs('topsUserBox','AyerUser')" id="AyerUser">Ayer</a> -
                                <a href="javascript:TopsTabs('topsUserBox','SemanaUser')" id="SemanaUser">Semana</a> -
                                <a href="javascript:TopsTabs('topsUserBox','MesUser')" id="MesUser"<? if ($tsTopUsers['mes']) echo 'class="here"'; ?> >Mes</a> -
                                <a href="javascript:TopsTabs('topsUserBox','HistoricoUser')" id="HistoricoUser" <? if ($tsTopUsers['mes']) echo 'class="here"'; ?>>Hist&oacute;rico</a>
                            </div>
                            <ol id="filterByAyerUser" class="filterBy cleanlist" style="display:none;">
                            <? 
                            foreach ($tsTopUsers['ayer'] as $key=>$u)
                            {
                            ?>
				<li>
                                	<?  if ($i+1 < 10){echo 0; }echo $i+1; ?>.
                                	<a href="<? echo $tsConfig['url'].'/perfil/'.$u['user_name'];?>" class="hovercard" uid="<? echo $u['user_id']; ?>"><? echo $u['user_name'] ?></a>
                                    <span><? echo $u['total']; ?></span>
                                </li>
                            <?    
                            }
                            ?>
                            </ol>
                            <ol id="filterBySemanaUser" class="filterBy cleanlist" style="display:none;">
                            <? 
                            foreach ($tsTopUsers['semana'] as $key=>$u)
                            {
                            ?>
				<li>
                                	<?  if ($i+1 < 10){echo 0; }echo $i+1; ?>.
                                	<a href="<? echo $tsConfig['url'].'/perfil/'.$u['user_name'];?>" class="hovercard" uid="<? echo $u['user_id']; ?>"><? echo $u['user_name'] ?></a>
                                    <span><? echo $u['total']; ?></span>
                                </li>
                            <?                            
                            }
                            ?>
                            </ol>
                            <ol id="filterByMesUser" class="filterBy cleanlist" style="display:<? if (!$tsTopUsers['mes']) echo 'block'; else echo 'none'; ?>;">
                            <? 
                            foreach ($tsTopUsers['mes'] as $key=>$u)
                            {
                            ?>
				<li>
                                	<?  if ($i+1 < 10){echo 0; }echo $i+1; ?>..
                                	<a href="<? echo $tsConfig['url'].'/perfil/'.$u['user_name'];?>" class="hovercard" uid="<? echo $u['user_id']; ?>"><? echo $u['user_name'] ?></a>
                                    <span><? echo $u['total']; ?></span>
                                </li>
                            <?                             
                            }
                            ?>
                            </ol>
                            <ol id="filterByHistoricoUser" class="filterBy cleanlist" style="display:<? if (!$tsTopUsers['mes']) echo 'block'; else echo 'none'; ?>;">
                            <? 
                            foreach ($tsTopUsers['historico'] as $key=>$u)
                            {
                            ?>
				<li>
                                	<?  if ($i+1 < 10){echo 0; }echo $i+1; ?>..
                                	<a href="<? echo $tsConfig['url'].'/perfil/'.$u['user_name'];?>" class="hovercard" uid="<? echo $u['user_id']; ?>"><? echo $u['user_name'] ?></a>
                                    <span><? echo $u['total']; ?></span>
                                </li>
                            <? 
                            }
                            ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>