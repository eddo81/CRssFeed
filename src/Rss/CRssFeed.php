<?php

namespace edax\Rss;

use SimplePie;

/**
 * A SimplePie wrapper-class for generating objects that can be used to render a RSS feed.
 * 
 * 
 */

class CRssFeed{

	private $feed;

	public function __construct(array $urls){

		//require the SimplePie library
		require_once(__DIR__.'/../simplepie/simplepie_1.3.1.mini.php');
		$this->feed = new SimplePie();
		$this->feed->enable_cache(false);

		//setup RSS feed urls
		if(!empty($urls))
		{
			$this->feed->set_feed_url($urls);
		}
		else
		{
			throw new Exception('No valid url provided.');
		}

		//Initialise feed and set headers
		$this->feed->init();
		$this->feed->handle_content_type();

	}

	public function getRssFeed()
	{
		//return feed object
		return $this->feed;
	}

}