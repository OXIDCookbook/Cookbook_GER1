[{if $oxcmp_user->oxuser__oxrights->value == 'malladmin'}]
    [{assign var="oLongdesc" value=$oDetailsProduct->getLongDescription()}]
    [{capture append="tabs"}]<a href="#description">[{oxmultilang ident="PAGE_DETAILS_TABS_DESCRIPTION"}]</a>[{/capture}]
    [{capture append="tabsContent"}]
    <div id="description" class="cmsContent ">
        <div class="editable" tableField="oxarticles__oxlongdesc" oxid="[{$oDetailsProduct->oxarticles__oxid->value}]">
            [{if $oLongdesc->value}]
                [{oxeval var=$oLongdesc}]
            [{/if}]
        </div>
        [{if $oDetailsProduct->oxarticles__oxexturl->value}]
            <a id="productExturl" class="js-external" href="http://[{$oDetailsProduct->oxarticles__oxexturl->value}]">
            [{if $oDetailsProduct->oxarticles__oxurldesc->value }]
                [{$oDetailsProduct->oxarticles__oxurldesc->value }]
            [{else}]
                [{$oDetailsProduct->oxarticles__oxexturl->value }]
            [{/if}]
            </a>
        [{/if}]
    </div>
    [{/capture}]
[{else}]
    [{$smarty.block.parent}]
[{/if}] 