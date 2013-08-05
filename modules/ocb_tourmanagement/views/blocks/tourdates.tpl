[{$smarty.block.parent}]
<ul class="tourdates" style="clear:both;float:left;margin-top:20px;">
    [{foreach from=$oView->getTourdates() item='tourdate'}]
        <li>
            <strong>[{$tourdate->ocb_tourdates__ocbtitle->value}] ([{$tourdate->ocb_tourdates__ocbplace->value}])</strong><br>
            [{$tourdate->ocb_tourdates__ocbevent->value}]<br>
            [{$tourdate->ocb_tourdates__ocbdatetime->value}]<br>
        </li>
    [{/foreach}]
</ul>