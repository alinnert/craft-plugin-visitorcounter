<?php

namespace Craft;

class VisitorCounterPlugin extends BasePlugin {
	function getName() {
		return Craft::t('Besucherzähler');
	}

	function getVersion() {
		return '1.2';
	}

	function getDeveloper() {
		return 'Andreas Linnert';
	}

	function getDeveloperUrl() {
		return 'http://linnertmedia.de';
	}
}

?>