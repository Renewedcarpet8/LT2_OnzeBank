<?php
class aMenu
{
	private $items;
	private $link;

	function __construct()
	{
		$this->items = array();
		$this->link = "";
	}
	
	function __destruct()
	{}

	function addItem($url,$title,$position)
	{
		while(isset($this->items[$position]))
			$position++;
		
		$this->items[$position] = ""
					. "<a href=\"?t=" . $url . "\">"
					. "" . $title . ""
					. "</a>"
					;
	}
	function addLink($link)
	{
		$this->link .= $link;
	}
	function draw()
	{
		ksort($this->items);

		$output = "";
		foreach($this->items as $field => $value)
		{
			$output .= $value;
		}
		return $output . $this->link;
	}
}
$GLOBALS["menu"] = new aMenu();
?>