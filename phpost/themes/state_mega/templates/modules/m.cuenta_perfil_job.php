	                            <h3 onclick="cuenta.chgsec(this)">3. Formaci&oacute;n y trabajo</h3>
                                <fieldset style="display: none">
                                    <div class="alert-cuenta cuenta-4">
                                    </div>
                                    <div class="field">
                                        <label for="estudios">Estudios</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="estudios" id="estudios">
                                               <? 
                                            	foreach ($tsPData['estudios'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_estudios'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Idiomas</label>
                                        <div class="input-fake">
                                            <ul>
                                                <?
                                            	foreach ($tsPData['idiomas'] as $iid =>$idioma)
                                                {
                                                ?>
                                                <li>
                                                    <span class="label-id"><? echo $idioma; ?></span>
                                                    <select class="cuenta-save-4" name="idioma_<? echo $iid; ?>">
                                                        <?
                                                        foreach ($tsPData['inivel'] as $val=>$text)
                                                        {
                                                        ?>
                                                            <option value="<? echo $val; ?>" <? if ($tsPerfil['p_idiomas'][$iid] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                        <?
                                                         }
                                                        ?>    
                                                    </select>
                                                </li>
                                                <?
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div> 
                                    <div class="field">
                                        <label for="profesion">Profesi&oacute;n</label>
                                        <input class="text cuenta-save-4" maxlength="32" name="profesion" id="profesion" value="<? echo $tsPerfil['p_profesion']; ?>"/>
                                    </div>
                                    <div class="field">
                                        <label for="empresa">Empresa</label>
                                        <input class="text cuenta-save-4" maxlength="32" name="empresa" id="empresa" value="<? echo $tsPerfil['p_empresa']; ?>"/>
                                    </div>
                                    <div class="field">
                                        <label for="sector">Sector</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="sector" id="sector">
                                               <? 
                                                foreach ($tsPData['sector'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_sector'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="ingresos">Nivel de ingresos</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="ingresos" id="ingresos">
                                                <? 
                                                foreach ($tsPData['ingresos'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_ingresos'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="intereses_profesionales">Intereses Profesionales</label>
                                        <div class="input-fake">
                                            <textarea class="cuenta-save-4" name="intereses_profesionales" id="intereses_profesionales"><? echo $tsPerfil['p_int_prof']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="habilidades_profesionales">Habilidades Profesionales</label>
                                        <div class="input-fake">
                                            <textarea class="cuenta-save-4" name="habilidades_profesionales" id="habilidades_profesionales"><? echo $tsPerfil['p_hab_prof']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Guardar y seguir" onclick="cuenta.save(4, true)" class="mBtn btnOk">
                                    </div>
                                </fieldset>