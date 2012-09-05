	                            <h3 onclick="cuenta.chgsec(this)">2. Como soy</h3>
                                <fieldset style="display: none">
                                    <div class="alert-cuenta cuenta-3">
                                    </div>
                                    <div class="field">
                                        <label for="altura">Mi altura</label>
                                        <div class="input-fake">
                                            <input type="text" value="<? if ($tsPerfil['p_altura']) echo $tsPerfil['p_altura']; ?>" maxlength="3" name="altura" id="altura" class="text cuenta-save-3">&nbsp;cent&iacute;metros</div>
                                    </div>
                                    <div class="field">
                                        <label for="peso">Mi peso</label>
                                        <div class="input-fake">
                                            <input type="text" value="<? if ($tsPerfil['p_peso'] > 0) echo $tsPerfil['p_peso']; ?>" maxlength="3" name="peso" id="peso" class="text cuenta-save-3">&nbsp;kilogramos</div>
                                    </div>
                                    <div class="field">
                                        <label for="pelo_color">Color de pelo</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="pelo_color" id="pelo_color">
                                                <?
                                            	foreach ($tsPData['pelo'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_pelo'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="ojos_color">Color de ojos</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="ojos_color" id="ojos_color">
                                                <?
                                            	foreach ($tsPData['ojos'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_ojos'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>                                            	
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fisico">Complexi&oacute;n</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="fisico" id="fisico">
                                                <?
                                            	foreach ($tsPData['fisico'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_fisico'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>                                            	
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="dieta">Mi dieta es</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="dieta" id="dieta">
                                                <?
                                            	foreach ($tsPData['dieta'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_dieta'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>                                            	
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Tengo</label>
                                        <div class="input-fake">
                                            <ul>
                                                <?
                                            	foreach ($tsPData['tengo'] as $val=>$text)
                                                {
                                                ?>
                                                <li><input type="checkbox" name="t_<?echo $val; ?>" class="cuenta-save-3" value="1" <? if ($tsPerfil['p_tengo'][$val] == 1) echo 'checked="checked"'; ?>><? echo $text; ?></li>
                                                <?
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fumo">Fumo</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="fumo" id="fumo">
                                                <?
                                            	foreach ($tsPData['fumo_tomo'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_fumo'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
<!--                                            	{foreach from=$tsPData.fumo_tomo key=val item=text}
                                                <option value="{$val}" {if $tsPerfil.p_fumo == $val}selected="selected"{/if}>{$text}</option>
                                                {/foreach}-->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="tomo_alcohol">Tomo alcohol</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="tomo_alcohol" id="tomo_alcohol">
                                                <?
                                            	foreach ($tsPData['fumo_tomo'] as $val=>$text)
                                                {
                                                ?>
                                                <option value="<? echo $val; ?>" <? if ($tsPerfil['p_tomo'] == $val) echo 'selected="selected"'; ?>><? echo $text; ?></option>
                                                <?
                                                }
                                                ?>
                                            	{foreach from=$tsPData.fumo_tomo key=val item=text}
                                                <option value="{$val}" {if $tsPerfil.p_tomo == $val}selected="selected"{/if}>{$text}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Guardar y seguir" onclick="cuenta.save(3, true)" class="mBtn btnOk">
                                    </div>
                                </fieldset>