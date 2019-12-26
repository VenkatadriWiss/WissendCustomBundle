 * Added a new Job in mass action to add comments to list of simple products you have selected in products page.
 * Added a Menu Custom Settings inside main menu.
 * Added a Custom dashboard Inside activities tab we will list products in that page.
 * ACL(Access Control List) for Custom Dashboard And Custom Settings and shown in System menu and click on permissions tab and click on system there will be listing Custom Dashboard and Custom Settings

* Installation Steps:

   Place this “new Wissend\Bundle\CustomBundle\WissendCustomBundle(),”inside the app/AppKernel.php file under getSymfonyBundles function after adding this and then run shell commands.


* Shell script running commands:
	composer config repositories.repo-name vcs https://github.com/wissenddevops/wissendcustombundle.git;
	composer require "wissenddevops/wissendcustombundle";
	bin/console wissend:addroute;
	bin/console pim:install:assets;
	bin/console assets:install --symlink;
	yarn run less;
	yarn run webpack;
	bin/console cache:clear;

