

 * Added a new Job in mass action to add comments to list of simple products you have selected in products page.
 * Added a Menu Custom Settings inside main menu.
 * Added a Custom dashboard Inside activities tab we will list products in that page.
 * ACL(Access Control List) for Custom Dashboard And Custom Settings and shown in System menu and click on permissions tab and click on system there will be listing Custom Dashboard and Custom Settings
* Installation Steps:
   Add the bundle inside the src/ folder
   Place this “new Wissend\Bundle\CustomBundle\WissendCustomBundle(),”inside the app/AppKernel.php file under getSymfonyBundles function.
		wissend_custom:
		    resource: "@WissendCustomBundle/Resources/config/routing.yml"
		    prefix:   /wissend
* Place the above code in routing.yml inside the app/routing.yml file.

* Running Commands:
	sudo rm -rf var/cache/; 
	sudo bin/console pim:install:assets; 
	sudo bin/console assets:install --symlink; 
	sudo yarn run less; sudo yarn run webpack; 
	sudo bin/console cache:clear; 
	sudo chmod 777 -R ./

