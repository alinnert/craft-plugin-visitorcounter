<?php

namespace Craft;

class VisitorCounter_VisitorService extends BaseApplicationComponent
{
	protected $visitorRecord;
	const dateformat = 'Y-m-d';

	public function __construct($visitorRecord = null)
	{
		$this->visitorRecord = $visitorRecord;
		if (is_null($this->visitorRecord)) {
			$this->visitorRecord = VisitorCounter_VisitorRecord::model();
		}
	}

	public function trackVisitor()
	{
		$remoteAddr = $_SERVER['REMOTE_ADDR'];
		$currentDate = date(self::dateformat);
		$hash = hash('sha256', $remoteAddr . $currentDate);

		if (isset($remoteAddr) && !empty($remoteAddr)) {
			$numRecords = $this->visitorRecord->countByAttributes( array( 'hash' => $hash ) );

			if ($numRecords === '0') {
				$record = $this->visitorRecord->create();
				$record->setAttribute('hash', $hash);
				$record->setAttribute('date', $currentDate);
				return $record->save() ? true : false;
			}
		}
	}

	public function getVisitorData($period = 'today')
	{
		$today = new DateTime();

		switch($period) {
			case 'today':
				$date = $today->format(self::dateformat);
				$visitorData = $this->visitorRecord->countByAttributes( array( 'date' => $date ) );
				break;
			case 'yesterday':
				$date = $today->sub(new DateInterval('P1D'))->format(self::dateformat);
				$visitorData = $this->visitorRecord->countByAttributes( array( 'date' => $date ) );
				break;
			case 'week':
				$attributesArray = array();
				for ($i = 0; $i < 7; $i++) {
					$intervalString = sprintf('P%dD', $i);
					$dateTimeObj = new DateTime();
					$attributesArray[] = $dateTimeObj->sub(new DateInterval($intervalString))->format(self::dateformat);
				}
				$visitorData = $this->visitorRecord->countByAttributes( array( 'date' => $attributesArray ) );
				break;
			case 'all':
				$date = '%';
				$visitorData = $this->visitorRecord->count();
				break;
		}

		return $visitorData;
	}
}

?>