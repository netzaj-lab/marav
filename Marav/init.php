<?php 
namespace Marav;
require_once CLASSES . 'HeadersClass.php';
require_once LIBRARIES . '/vendor/autoload.php';



use Marav\Controller;
use Marav\Classes\{Headers};


class Init
{

	private $resource;
	private $file;
	private $object;
	private $method;
	private $args;
	private $header;
	private $controller;

	const HOME = 'home';

	function __construct()
	{
		$this->header = new Classes\Headers();

		if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->resource = empty($_GET) ? array(self::HOME) : self::Uri($_GET['resource']);

			self::Object($this->resource);
		}
		else
		{
			$this->header->headerNotFound();
			die();
		}

	}

	private function uri($_resource)
	{

		if($_resource != ucfirst(self::HOME))
		{
			$this->resource = explode('/', filter_var(rtrim($_resource, '/'), FILTER_SANITIZE_URL));
		}

		return $this->resource;

	}

	private function object($_resource)
	{
		$this->object = ucfirst($_resource[0]);

		$this->file =  CONTROLLERS . $this->object . 'Controller.php';

		if(file_exists($this->file))
		{
			require $this->file;

			$this->object = "Marav\\Controller\\{$this->object}";

			$this->object = new $this->object();

			if(isset($_resource[1]) && !empty($_resource[1]))
			{
				if(method_exists($this->object, ucfirst($_resource[1])) && is_callable($_resource[1], true, $method))
				{
					unset($_resource[0], $_resource[1]);

					if(count($_resource) > 0)
					{
						$this->args = array_values($_resource);

						$this->object->$method($this->args);
					}
					else
					{
						$this->object->$method();
					}
				}
				else
				{
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$this->header->getHeaderByStatusCode(404);
					} 
					else
					{
						$this->header->getHeaderNotFoundAndRedirect();
					}
				}
			}
			else
			{
				return $this->object;
			}
		}
		else
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$this->header->getHeaderByStatusCode(404);
			} 
			else
			{
				$this->header->getHeaderNotFoundAndRedirect();
			}
		}
	}
}