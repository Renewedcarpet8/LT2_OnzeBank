<?php
class Content
{
	private $drawables;
	private $predrawn;

	function __construct()
	{
		$this->drawables = array();
		$this->predrawn = "";
	}
	
	function __destruct()
	{}

	function addDrawable($item)
	{
		$this->drawables[] = $item;
	}

	function write($data)
	{
		$this->predrawn .= $data;
	}


	function draw()
	{
		$output = "";
		foreach($this->drawables as $field => $value)
		{
			$output .= $value->draw();
		}
		return $this->predrawn . $output;
	}
}
$GLOBALS["info"] = new Content();
?>