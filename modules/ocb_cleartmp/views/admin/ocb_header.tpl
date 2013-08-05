<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html id="top">
<head>
    <title>[{ oxmultilang ident="NAVIGATION_TITLE" }]</title>
    <link rel="stylesheet" href="[{$oViewConf->getResourceUrl()}]nav.css">
    <link rel="stylesheet" href="[{$oViewConf->getResourceUrl()}]colors.css">
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl('ocb_cleartmp','out/admin/css/ocb_cleartmp.css')}]">
    <script type="text/javascript" src="[{$oViewConf->getResourceUrl()}]js/libs/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('select').change(function(){
            $('#cleartmp').submit();
        });
        $('input').change(function(){
            $('#cleartmp').submit();
        });
    });
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=[{$charset}]">
</head>
<body>
    [{assign var="oConfig" value=$oViewConf->getConfig()}]
    <ul>
      <li class="act">
          <a href="[{$oViewConf->getSelfLink()}]&cl=navigation&amp;item=home.tpl" id="homelink" target="basefrm" class="rc"><b>[{ oxmultilang ident="NAVIGATION_HOME" }]</b></a>
      </li>
      <li class="sep">
          <a href="[{$oConfig->getShopURL()}]" id="shopfrontlink" target="_blank" class="rc"><b>[{ oxmultilang ident="NAVIGATION_SHOPFRONT" }]</b></a>
      </li>
      <li class="sep">
          <a href="[{$oViewConf->getSelfLink()}]&cl=navigation&amp;fnc=logout" id="logoutlink" target="_parent" class="rc"><b>[{ oxmultilang ident="NAVIGATION_LOGOUT" }]</b></a>
      </li>
      <li class="sep">
          <form method="post" action="[{$oViewConf->getSelfLink()}]" id="cleartmp">
              <div>
                  <input type="hidden" name="cl" value="navigation" />
                  <input type="hidden" name="item" value="header.tpl" />
                  <input type="hidden" name="fnc" value="cleartmp" />
                  <input type="hidden" name="editlanguage" value="[{ $editlanguage }]" />
                  [{$oViewConf->getHiddenSid()}]
              </div>
              <span class="rc">[{ oxmultilang ident="OCB_CLEARTMP_LABEL" }]</span>
              <select name="clearoption">
                  <option value="none">[{ oxmultilang ident="OCB_CLEARTMP_PLEASECHOOSE" }]</option>
                  <option value="smarty">[{ oxmultilang ident="OCB_CLEARTMP_SMARTY" }]</option>
                  <option value="language">[{ oxmultilang ident="OCB_CLEARTMP_LANGUAGE" }]</option>
                  <option value="database">[{ oxmultilang ident="OCB_CLEARTMP_DATABASE" }]</option>
                  <option value="seo">[{ oxmultilang ident="OCB_CLEARTMP_SEO" }]</option>
                  <option value="complete">[{ oxmultilang ident="OCB_CLEARTMP_COMPLETE" }]</option>
              </select>
              <input type="checkbox" value="1" [{if $prodmode}]disabled="disabled"[{/if}] id="devmode" name="devmode" [{if $oView->isDevMode()}]checked="checked"[{/if}] />
              <label for="devmode" class="rc[{if $prodmode}] disabled[{/if}]">[{ oxmultilang ident="OCB_CLEARTMP_DEVMODE" }]</label>
          </form>
      </li>
    </ul>

    <div class="version">
        <b>
            [{$oView->getShopFullEdition()}]
            [{$oView->getShopVersion()}]_[{$oView->getRevision()}]
        </b>
    </div>

</body>
</html>