<?php

namespace Craft;

class VisitorCounterVariable
{
	public function trackVisitor()
	{
		$trackStatus = craft()->visitorCounter_visitor->trackVisitor();
	}

	public function getVisitorData($param)
	{
		return craft()->visitorCounter_visitor->getVisitorData($param);
	}
}

?>