[{if $oxcmp_user->oxuser__oxrights->value == 'malladmin'}]
    <div id="debug"></div>
    <h1 id="productTitle"><span><span class="editable" tableField="oxarticles__oxtitle" oxid="[{$oDetailsProduct->oxarticles__oxid->value}]">[{$oDetailsProduct->oxarticles__oxtitle->value}]</span> <span class="editable" tableField="oxarticles__oxvarselect" oxid="[{$oDetailsProduct->oxarticles__oxid->value}]">[{$oDetailsProduct->oxarticles__oxvarselect->value}]</span></span></h1>
[{else}]
    [{$smarty.block.parent}]
[{/if}] 