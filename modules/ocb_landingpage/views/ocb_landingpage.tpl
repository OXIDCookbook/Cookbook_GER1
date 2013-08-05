[{capture append="oxidBlock_content"}]
    [{assign var="template_title" value=$oView->getTitle()}]
    <div class="cmsContent">
        [{$oView->getContent()}]
    </div>
    [{if $oView->getActionProducts() }]
        [{include file="widget/product/list.tpl" type='grid' head=$oView->getTitle() listId="ocbLP" products=$oView->getActionProducts() showMainLink=true}]
    [{/if}]
    [{insert name="oxid_tracker" title=$template_title }]
[{/capture}]
[{include file="layout/page.tpl"}]