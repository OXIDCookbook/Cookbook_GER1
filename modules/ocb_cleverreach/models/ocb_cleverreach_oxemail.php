<?php

class ocb_cleverreach_oxemail extends ocb_cleverreach_oxemail_parent
{
    /**
     * Disabeling this function as Cleverreach will do the rest for us.
     * @param type $oUser
     * @param type $sSubject
     * @return boolean
     */
    public function sendNewsletterDbOptInMail( $oUser, $sSubject = null )
    {
        return true;
    }
}
