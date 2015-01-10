<?php

namespace edax\CRssFeed;

use SimplePie;

/**
 * A SimplePie wrapper-class for generating objects that can be used to render a RSS feed.
 * 
 * 
 */

class CRssFeed{

	private $feed;
	private $cacheDir;

	public function __construct(array $urls, $cacheTime = null, $cacheDir = null){

		//require the SimplePie library
		require_once(__DIR__.'/simplepie/simplepie_1.3.1.mini.php');
		$this->feed = new SimplePie();

		//set default cache directory if none is provided
		$this->cacheDir = isset($cacheDir) ? $cacheDir : __DIR__ . '/cache';

		//setup RSS feed urls
		if(!empty($urls))
		{
			$this->feed->set_feed_url($urls);
		}
		else
		{
			throw new Exception('No valid url provided.');
		}

		//enable cache if duration was provided
		if($cacheTime != null)
		{	
			if(!is_writable($this->cacheDir) || !file_exists($this->cacheDir))
			{
				throw new Exception('The cache directory: is not writable and/or does not exist.');
			}
			else if(!is_int($cacheTime))
			{
				throw new Exception('Unsupported value provided for cache duration.');
			}
			else
			{
				$this->feed->enable_cache(true);
				$this->feed->set_cache_location($this->cacheDir);
				$this->feed->set_cache_duration($cacheTime);
			}

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