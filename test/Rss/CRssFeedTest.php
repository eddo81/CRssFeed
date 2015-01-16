<?php

namespace edax\Rss;

/**
 * A testclass
 * 
 */
class CRssFeedTest extends \PHPUnit_Framework_TestCase
{
	
	public function testClass()
	{
		$rss = new \edax\Rss\CRssFeed(array('http://www.smashingmagazine.com/feed/'));

		$res = get_class($rss);
		$exp = "edax\Rss\CRssFeed";
		$this->assertEquals($res, $exp, "Unexpected class.");
	}

	public function testReturnType()
	{
		$rss = new \edax\Rss\CRssFeed(array('http://www.smashingmagazine.com/feed/'));

		$res = gettype($rss->getRssFeed());
		$exp = 'object';
		$this->assertEquals($res, $exp, "Unexpected type.");
	}

	public function testInstanceOf()
	{
		$rss = new \edax\Rss\CRssFeed(array('http://www.smashingmagazine.com/feed/'));
		
		$this->assertInstanceOf("SimplePie", $rss->getRssFeed());
	}

	public function testHasAttribute()
	{
		$rss = new \edax\Rss\CRssFeed(array('http://www.smashingmagazine.com/feed/'));
		
		$this->assertObjectHasAttribute('feed', $rss);
	}
	
}
