[{if $oxcmp_user->oxuser__oxrights->value == 'malladmin' && $oView->getClassName() == 'details'}]
    <script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
    <script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/vendor/jquery-1.7.2.js"></script>
    <script src="[{$oViewConf->getModuleUrl('ocb_frontendediting','out/js/aloha-config.js')}]"></script>
    <script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
        data-aloha-plugins="
        common/ui,
        common/format,
        common/list,
        common/link,
        common/highlighteditables,
        common/block,
        common/undo,
        common/contenthandler,
        common/paste,
        common/commands
    "></script>
    <script src="[{$oViewConf->getModuleUrl('ocb_frontendediting','out/js/aloha-action.js')}]"></script>
    <script type="text/javascript">
    var requesturl = '[{$oViewConf->getModuleUrl('ocb_frontendediting','controllers/ocb_fe_save.php')}]';
    Aloha.ready( function() {
        var $ = Aloha.jQuery;
        $('.editable').aloha();
    });
    </script>
    <style>
        #debug {
            border: 1px dashed red;
            margin: 30px 0 0 0;
            top:0;
            left:-360px;
            padding: 5px;
            background:rgba(255,255,255,0.95);
            position:absolute;
            z-index:3000;
            width:600px;
            height:300px;
            overflow:hidden;
            box-shadow:0 0 30px;
            display:none;
        }
    </style>
    <link rel="stylesheet" href="http://cdn.aloha-editor.org/latest/css/aloha.css" type="text/css">
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl('ocb_frontendediting','out/css/aloha.css')}]" type="text/css">
[{/if}]
[{$smarty.block.parent}]