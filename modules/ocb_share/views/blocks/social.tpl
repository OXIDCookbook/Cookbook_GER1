<style>
.social,
.social:hover {
    float:left;
    display:block;
    width:20px;
    height:20px;
    padding:0;
    margin:10px 10px 0 0;
    background:url('[{$oViewConf->getModuleUrl('ocb_share','out/img/socialicons.png')}]') 0 0 no-repeat;
    overflow:hidden;
    text-indent:40px;
}
.social.facebook {
    background-position:-20px 0;
}
.social.google {
    background-position:-40px 0;
}
.social.twitter{
    background-position:-60px 0;
}
</style>
<div class="social facebook">
    <a href="http://www.facebook.com/sharer.php?u=[{$oDetailsProduct->getMainLink()|urlencode}]" target="_blank">
        Share on Facebook
    </a>
</div>
<div class="social">
    <a href="//pinterest.com/pin/create/button/?url=[{$oDetailsProduct->getMainLink()|urlencode}]&media=[{$oDetailsProduct->getPictureUrl()|urlencode}]&description=[{$oDetailsProduct->oxarticles__oxtitle->value}] [{$oDetailsProduct->oxarticles__oxshortdesc->value}]" target="_blank" data-pin-do="buttonPin">
        Pin it
    </a>
</div>
</div>
<div class="social google">
    <a href="https://plus.google.com/share?url=[{$oDetailsProduct->getMainLink()|urlencode}]"  target="_blank">
        +1
    </a>
</div>
<div class="social twitter">
    <a href="https://twitter.com/intent/tweet?text=[{$oDetailsProduct->oxarticles__oxtitle->value}] [{$oDetailsProduct->oxarticles__oxshortdesc->value}] [{$oDetailsProduct->getMainLink()|urlencode}]&url=[{$oDetailsProduct->getMainLink()|urlencode}]" target="_blank">
        Tweet it.
    </a>
</div>