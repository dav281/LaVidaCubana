<?php
/**
 * @author Jan Kotrba <jan.kotrbaa@gmail.com>
 * @date 13:58, 21. 3. 2015
 */

namespace App\AdminModule\Model;

use Nette;

class TeamsManager extends Nette\Object
{

	const TEAMS_TABLE = "bowling_teams";

	private $database;

	function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getAll()
	{
		return $this->database->table(self::TEAMS_TABLE)->fetchAll();
	}
}