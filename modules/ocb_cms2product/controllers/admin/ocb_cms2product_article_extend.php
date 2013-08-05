<?php

class ocb_cms2product_article_extend extends ocb_cms2product_article_extend_parent
{

    public function render()
    {
        $sTpl = parent::render();
        
        $iAoc = oxConfig::getParameter("aoc");
        
        if ( $iAoc == 3 )
        {
            $oCms2ProductAjax = oxNew( 'ocb_cms2product_main_ajax' );
            $this->_aViewData['oxajax'] = $oCms2ProductAjax->getColumns();

            return "ocb_cms2product_main_ajax.tpl";
        }
        
		if( 'article_extend.tpl' === $sTpl )
		{
			return 'ocb_article_extend.tpl';
		}
		
        return $sTpl;
    }
}