[{$smarty.block.parent}]
<script type="text/javascript">
    var source = '[{$oViewConf->getModuleUrl('ocb_autosuggestion','controllers/ocb_autosuggest.php')}]';
</script>
[{oxstyle include=$oViewConf->getModuleUrl('ocb_autosuggestion','out/src/css/ocb_autosuggest.css')}]
[{oxscript include=$oViewConf->getModuleUrl('ocb_autosuggestion','out/src/js/libs/jquery.min.js')}]
[{oxscript include=$oViewConf->getModuleUrl('ocb_autosuggestion','out/src/js/libs/jquery-ui.min.js')}]
[{oxscript include=$oViewConf->getModuleUrl('ocb_autosuggestion','out/src/js/ocb_autosuggest.js')}]