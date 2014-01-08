<?php

namespace Craft;

class VisitorCounter_VisitorRecord extends BaseRecord
{
	public function getTableName()
	{
		return 'visitorcounter_visitor';
	}

	protected function defineAttributes()
	{
		return array(
			'hash' => AttributeType::String,
			'date' => AttributeType::String
		);
	}

	public function create() {
		$class = get_class($this);
		$record = new $class();
		return $record;
	}
}

?>