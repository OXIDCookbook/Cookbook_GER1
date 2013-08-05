OXID Cookbook :: Landingpage
=============================
Setup a new pagetype for actions.

Installation
------------

1.    Copy module to modules directory
2.    Activate module in the OXID backend

Usage
-----

After the installation the new page type "ocb_landingpage" is available.
It requires also the parameter "actionlist" with an OxId of a promotion object.

example:

    index.php?cl=ocb_landingpage&actionlist=oxnewest

You could easily get nice URLs if you enter them in the backend at

    Master Settings > Core Settings > SEO > Static URLs
