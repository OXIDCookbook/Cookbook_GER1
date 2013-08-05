[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="box"}]
<style>
    code {
        background:#EEE;
        padding:5px;
        line-height:150%;
        display:block;
        width:75%;
    }
    h1{
        padding-bottom:0;
        margin-bottom:0.3em;
        border-bottom:1px solid #535353;
    }
    h2 {
        color:#535353;
        padding-bottom:0;
        margin:0.5em 0 0.3em;
    }
    p {
        margin:0 0 1em 0;
    }
</style>

[{if $updatenav }]
    [{oxscript add="top.oxid.admin.reloadNavigation('`$oxid`');" priority=10}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="module_main">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

[{oxscript include="js/libs/jquery.min.js"}]
[{oxscript include="js/libs/jquery-ui.min.js"}]

[{if $oView->getReadmeAsHtml()}]
    [{$oView->getReadmeAsHtml()}]
[{else}]
    [{oxmultilang ident='OCB_NOREADMEFILEFORMODULE'}]
[{/if}]
[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
