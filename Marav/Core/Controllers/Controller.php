<?php

namespace Marav\Controller;

require_once CLASSES . 'LayoutClass.php';
require_once CLASSES . 'HeadersClass.php';

use Marav\Classes\{Layout};
use Marav\Classes\{Headers};

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Controller
{
	protected $object;
	protected $layout;
	protected $view;
	protected $log;
	protected $instance;

	protected function getView($_view, $_header, $_footer)
	{
		// Object
		$this->layout = new Layout();
		// Header
		$this->layout->getHeader($_header);
		// View
		require_once VIEWS . ucfirst($_view) . 'View.php';
		// Footer
		$this->layout->getFooter($_footer);
	}

	public function getHeader()
	{
		$this->object = new Headers();

		return $this->object;

	}

	public function logger($log_name, $log_filename, $logger_type)
	{

		$this->log = new Logger($log_name);
		$this->log->pushHandler(new StreamHandler(LOGS . $log_filename . '.log', $logger_type));

	}
}