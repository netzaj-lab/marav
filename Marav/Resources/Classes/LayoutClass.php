<?php

namespace Marav\Classes;

class Layout
{

	private $headerLanguage;
	private $headerTitle;
	private $headerDescritpion;
	private $cssDefault;
	private $jsDefault;

	public function getHeader($header)
	{
		switch ($header) {
			case 'home':
				echo "I am Home Header inside a switch<br>";
				break;
			
			default:
				$headerTitle = "I am the Default Header Title";
				$headerDescription = "Your gorgeous description";
				require_once LAYOUT . 'DefaultHeader.php';
				break;
		}
	}

	public function getFooter($footer)
	{
		switch ($footer) {
			case 'home':
				echo "I am Home Footer inside a switch<br>";
				break;
			
			default:
				require_once LAYOUT . 'DefaultFooter.php';
				break;
		}
	}

	private function defaultHeader()
	{
		
	}

	private function defaultFooter()
	{
		
	}
}

/*
	SEO 
	[title tag]
	- keep it under 70 characters long
	- avoid Caps Lock and count characters
	- use character savers, like the ampersand (&) symbol instead of ‘and', the slash (/) instead of ‘or', etc.
	- If you do not want Google to rewrite your titles or punish you for causing poor user experience, please do not stuff your titles with a million keywords.
	- Use your keywords closer to the beginning of the title.
	- I would also recommend to avoid duplicate titles
	- use Brand in the title.

	[meta description]
	- about 160 characters (up to 300 characters)
	- make such a description that advertises your page's content in a best and concise way possible
	- avoid duplicate descriptions
	- search engines bold query's keywords in the descriptions
	- No quotation marks in meta description
	- Schema markup (visit: http://schema.org/ and use google helper at: https://www.google.com/webmasters/markup-helper/?hl=en)

	[Open Graph tags]
	// Open Graph (OG) tags are additional meta tags in HTML <head> section of a page that allow any webpage to become a rich object in social networks.
	// How to Use <meta name="og:title" property="og:title" content="Your Awesome Open Graph Title"> 
	// Visit: http://ogp.me/ to knwo how to do it correctly
	// Tip: Use it for e-commerce product page
	*/