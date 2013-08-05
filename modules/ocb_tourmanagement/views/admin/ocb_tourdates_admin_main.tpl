[{include file="headitem.tpl" title="CONTENT_MAIN_TITLE"|oxmultilangassign}]

[{if $readonly }]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="ocb_tourdates_admin_main">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

        <table cellspacing="0" cellpadding="0" border="0" width="98%">
          <colgroup><col width="30%"><col width="5%"><col width="65%"></colgroup>
          <form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
          [{ $oViewConf->getHiddenSid() }]
          <input type="hidden" name="cl" value="ocb_tourdates_admin_main">
          <input type="hidden" name="fnc" value="">
          <input type="hidden" name="oxid" value="[{ $oxid }]">
          <input type="hidden" name="editval[ocb_tourdates__oxid]" value="[{ $oxid }]">
          <tr>
            <td valign="top" class="edittext" width="200">
              <table cellspacing="0" cellpadding="0" border="0">

                [{block name="ocb_tourdates_admin_main_form"}]
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="GENERAL_TITLE" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocbtitle->fldmax_length}]" name="editval[ocb_tourdates__ocbtitle]" value="[{$edit->ocb_tourdates__ocbtitle->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_GENERAL_TITLE" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="GENERAL_DATE" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocbdatetime->fldmax_length}]" name="editval[ocb_tourdates__ocbdatetime]" value="[{$edit->ocb_tourdates__ocbdatetime->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_GENERAL_DATE" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="OCB_PLACE" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocbplace->fldmax_length}]" name="editval[ocb_tourdates__ocbplace]" value="[{$edit->ocb_tourdates__ocbplace->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_OCB_PLACE" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="OCB_EVENT" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocbevent->fldmax_length}]" name="editval[ocb_tourdates__ocbevent]" value="[{$edit->ocb_tourdates__ocbevent->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_OCB_EVENT" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="OCB_LAT" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocblat->fldmax_length}]" name="editval[ocb_tourdates__ocblat]" value="[{$edit->ocb_tourdates__ocblat->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_OCB_LAT" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="OCB_LONG" }]
                      </td>
                      <td class="edittext">
                      <input type="text" class="editinput" size="28" maxlength="[{$edit->ocb_tourdates__ocblong->fldmax_length}]" name="editval[ocb_tourdates__ocblong]" value="[{$edit->ocb_tourdates__ocblong->value}]" [{ $readonly }]>
                      [{ oxinputhelp ident="HELP_OCB_LONG" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext">
                      [{ oxmultilang ident="OCB_TOURDATES_MAIN_TICKET" }]
                      </td>
                      <td class="edittext">
                        <select name="editval[ocb_tourdates__ocbticket]" class="editinput" [{ $readonly }]>
                            <option value="0">---</option>
                            [{foreach from=$productlist item=product}]
                                <option value="[{ $product->oxarticles__oxid->value }]" [{if $product->oxarticles__oxid->value == $edit->ocb_tourdates__ocbticket->value}]SELECTED[{/if}]>[{ $product->oxarticles__oxtitle->value|oxtruncate:33:"..":true }]</option>
                            [{/foreach}]
                        </select>
                        [{ oxinputhelp ident="HELP_OCB_TOURDATES_MAIN_TICKET" }]
                      </td>
                    </tr>
                    <tr>
                      <td class="edittext" colspan="2">
                      [{include file="language_edit.tpl"}]<br>
                      </td>
                    </tr>
                [{/block}]
                <tr>
                  <td class="edittext">
                  </td>
                  <td class="edittext">
                  <input type="submit" class="edittext" name="saveContent" value="[{ oxmultilang ident="GENERAL_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'"" [{ $readonly }]><br>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
     </table>
    </form>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
