			<div class="content-tabs cuenta">
                            	<div class="alert-cuenta cuenta-1"></div>
                                <fieldset>
                                    <div class="field">
                                        <label for="email">E-Mail:</label>
                                        <div class="input-fake input-hide-email">
                                            <? echo $tsUser->info['user_email']; ?> (<a onclick="input_fake('email')">Cambiar</a>)
                                        </div>
                                        <input type="text" style="display: none" value="<? echo $tsUser->info['user_email']; ?>" maxlength="35" name="email" id="email" class="text cuenta-save-1 input-hidden-email">
                                    </div>
                                    <div class="field">
                                        <label for="pais">Pa&iacute;s:</label>
                                        <select onchange="cuenta.chgpais()" class="cuenta-save-1" name="pais" id="pais">
                                            <option value="">Pa&iacute;s</option>
                                            <?
                                            foreach ($tsPaises as $code=>$pais)
                                            {
                                            ?>
                                            	<option value="<? echo $code; ?>" <? if ($code == $tsPerfil['user_pais']) echo 'selected="selected"'; ?>><? echo $pais; ?></option>
                                            <?    
                                            }
                                            ?>
					</select>
                                    </div>
                                    <div class="field">
                                        <label for="estado">Estado/Provincia:</label>
                                        <select name="estado" id="estado" class="cuenta-save-1">
                                        <?    
                                        foreach($tsEstados as $code=>$estado)
                                        {
                                        ?>
                                            <option value="<? echo $code+1;?>" <?if ($code+1 == $tsPerfil['user_estado']) echo 'selected="selected"'; ?>><? echo $estado; ?></option>
                                        <?    
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Sexo</label>
                                        <ul class="fields">
                                            <li>
                                                <label><input type="radio" value="m" name="sexo" class="radio cuenta-save-1" <? if ($tsPerfil['user_sexo'] == '1') echo 'checked="checked"'; ?>/>Masculino</label>
                                            </li>
                                            <li>
                                                <label><input type="radio" value="f" name="sexo" class="radio cuenta-save-1" <? if ($tsPerfil['user_sexo'] == '0') echo 'checked="checked"'; ?>/>Femenino</label>
                                            </li>
                                        </ul>
                                    </div>
                                </fieldset>
                                <div class="field">
					<label>Nacimiento:</label>
					<select class="cuenta-save-1" name="dia">
                                        <?    
                                        for ($dias=1; $dias<32; $dias++ )    
                                        {
                                        //{section name=dias start=1 loop=32}
                                        ?>
                                            <option value="<? echo $dias; ?>" <? if ($tsPerfil['user_dia'] ==  $dias) echo 'selected="selected"'; ?>><? echo $dias; ?></option>
                                        <?                                        
                                        }                            
                                        ?>
					</select>
					<select class="cuenta-save-1" name="mes">
                                        <?    
                                    	foreach ($tsMeces as $mid=>$mes)
                                        {
                                        ?>
                                        	<option value="<? echo $mid; ?>" <? if ($tsPerfil['user_mes'] == $mid) echo 'selected="selected"'; ?>><? echo $mes; ?></option>
                                        <?        
                                        }
                                        ?>
					</select>
                                        <? // echo $tsEndY."/////".$tsMax."--------------"; ?>
					<select class="cuenta-save-1" name="ano">                                           
                                        <?
                                        $year=$tsEndY;

                                        for($i=1;$i<=$tsMax; $i++)
                                        {                                            
                                    	//{section name=year start=$tsEndY loop=$tsEndY step=-1 max=$tsMax}
                                        ?>
                                        	 <option value="<? echo $year; ?>" <? if ($tsPerfil['user_ano'] ==  $year) echo 'selected="selected"'; ?>><? echo $year; ?></option>
                                        <?
                                            $year--;
                                         }
                                        ?>        
					</select>
					</div>
                                <?
                                if ($tsConfig['c_allow_firma'])
                                {
                                ?>
                                <div class="field">
                                    <label for="firma">Firma:<br /> <small style="font-weight:normal">(Acepta BBCode) Max. 300 car.</small></label>
                                    <textarea name="firma" id="firma" class="cuenta-save-1"><? echo $tsPerfil['user_firma']; ?></textarea>
                                </div>
                                <?
                                }
                                ?>
                                <div class="buttons">
                                    <input type="button" value="Guardar" onclick="cuenta.save(1)" class="mBtn btnOk">
                                    <input type="button" value="Siguiente" onclick="cuenta.save(1, true)" class="mBtn btnOk">
                                </div>
                                <div class="clearfix"></div>
                            </div>