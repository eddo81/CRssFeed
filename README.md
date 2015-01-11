#CRssFeed
___
###Description

A SimplePie wrapper-class for generating objects that can be used to render a RSS feed. This wrapper-class comes prebundled with a minified version of SimplePie. For more information on SimplePie, visit http://simplepie.org/

###Installation

*Download*

To download CRssFeed you can either add it as a dependency in your composer.json like so:

	"require": {
		"edax/crssfeed": "dev-master"
	}

or you can simply download the .zip file and extract it to the desired directory.

*Setup*

If you are not using the ANAX-MVC framework you can add the CRssFeed class into your project via a simple include. If you've downloaded the .zip file and extracted the "CRssFeed-master" class folder to the same directory as your own working file, then it would look something like this:

	include('CRssFeed-master/src/Rss/CRssFeed.php');
	$rss = new \edax\Rss\CRssFeed(array( url_1, url_2, url,3 ));

Using the ANAX-MVC framework you can include the CRssFeed class like this:

	$di->setShared('rss', function() {
    	$rss = new \edax\Rss\CRssFeed(array( url_1, url_2, url,3 ));
    	return $rss;
	});

Remember to provide actual urls to Rss-feeds for the constructor in place of "url_1, url_2, url,3".

Feel free to examine rss.php for an example on how to retrive feeds and itterate over the rss object. For a complete list of methods consult the API reference at http://simplepie.org/ 











