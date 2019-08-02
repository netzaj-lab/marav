<?php

namespace Marav\Classes;

class Headers
{

	private $http;
	private $uri;

	// get Header by Status Code
	public function getHeaderByStatusCode(int $_code)
	{
		switch ($_code) {
			case 200:
				self::headerSuccess();
				break;

			case 201:
				self::headerCreated();
				break;

			case 204:
				self::headerNoContent();
				break;

			case 304:
				self::headerNotModified();
				break;

			case 400:
				self::headerBadRequest();
				break;

			case 401:
				self::headerUnauthorized();
				break;

			case 403:
				self::headerForbidden();
				break;

			case 404:
				self::headerNotFound();
				break;
			
			default:
				self::headerConflict();
				break;
		}
		return true;
	}

	// 404 Not Found + 302 Redirect
	public function getHeaderNotFoundAndRedirect()
	{
		header("HTTP/1.1 404 Not Found");

		$this->uri = explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));

		$this->http = "http://" . HOST . "/" . $this->uri[1] . "/";
		
		return $this->http;;
	}

	// 200 OK
	private static function headerSuccess()
	{
		header("HTTP/1.1 200 OK");
	}

	// 201 Created
	private static function headerCreated()
	{
		header("HTTP/1.1 201 Created");
	}

	// 204 No Content
	private static function headerNoContent()
	{
		header("HTTP/1.1 204 No Content");
	}

	// 304 Not Modified
	private static function headerNotModified()
	{
		header("HTTP/1.1 304 Not Modified");
	}

	// 400 Bad Request
	private static function headerBadRequest()
	{
		header("HTTP/1.1 400 Bad Request");
	}

	// 401 Unauthorized
	private static function headerUnauthorized()
	{
		header("HTTP/1.1 401 Unauthorized");
	}

	// 403 Forbidden
	private static function headerForbidden()
	{
		header("HTTP/1.1 403 Forbidden");
	}
	
	// 404 Not Found
	private function headerNotFound()
	{
		header("HTTP/1.1 404 Not Found");
	}
	
	// 409 Conflict
	private function headerConflict()
	{
		header("HTTP/1.1 409 Conflict");
	}

}