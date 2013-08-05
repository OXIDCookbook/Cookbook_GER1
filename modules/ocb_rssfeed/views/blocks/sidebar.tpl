[{$smarty.block.parent}]
[{oxscript add="$('a.js-external').attr('target', '_blank');"}]
[{oxscript include="js/widgets/oxarticlebox.js" priority=10 }]
[{oxscript add="$( 'ul.js-articleBox' ).oxArticleBox();" }]
[{oxstyle include=$oViewConf->getModuleUrl("ocb_rssfeed", "out/src/css/rss.css")}]
[{assign var="aRssFeed" value=$oViewConf->getRssContent()}]
<div id="rssSlider" class="box">
    <h3 class="clear ">
        [{oxmultilang ident="RSSFEED_TITLE"}]
        <a title="[{oxmultilang ident="RSSFEED_TITLE"}]" href="[{$oViewConf->getRssSource()}]" class="rss js-external" target="_blank">
                <img alt="[{oxmultilang ident="RSSFEED_TITLE"}]" src="[{$oViewConf->getImageUrl('rss.png')}]">
                <span class="FXgradOrange corners glowShadow">[{oxmultilang ident="RSSFEED_TITLE"}]</span>
        </a>
    </h3>
    <ul class="js-articleBox featuredList">
        [{foreach from=$aRssFeed item="entry"}]
            <li class="articleImage showImage" style="display: list-item;">
                <a href="[{$entry.link}]" target="_blank" class="articleBoxImage">
                    [{$entry.description}]
                </a>
            </li>
            <li class="articleTitle">
                <a href="[{$entry.link}]" target="_blank">
                    <strong>[{$entry.title}]</strong>
                </a>
            </li>
        [{/foreach}]
    </ul>
</div>