<?php 

namespace Marav\Controller;


class Home extends Controller
{

	protected $header;

	public function __construct()
	{
		$this->getHeader()->getHeaderByStatusCode(419);
	}

	public function t()
	{
		require_once CONTROLLERS . 'PeopleController.php';
		$p = new People();
		return $p->peopleT();
	}
}