<?php

namespace Craft;

class VisitorCounter_SummaryWidget extends BaseWidget {
	public function getName() {
		return Craft::t('Besucher: Übersicht');
	}

	public function getBodyHtml() {
		$renderedTemplate = craft()->templates->render('visitorcounter/_widgets/summary');
		return $renderedTemplate;
	}
}

?>