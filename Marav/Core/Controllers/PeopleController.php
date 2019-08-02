<?php

namespace Marav\Controller;

class People extends Controller
{
	public function __construct()
	{
		echo '<br>-- Hello from People --<br>';
	}

	public function peopleT()
	{
		echo '<br>-- I am people T --<br>';
	}

	public function test()
	{
		echo 'I am a test for composer';
	}
}