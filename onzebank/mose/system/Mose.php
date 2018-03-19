<?php
	/**
	 * Mose Main Class
	 * 
	 * 
	 */
	class Mose
	{
		private $classes;

		function __construct()
		{
			$this->classes  	= array();
			$GLOBALS["mose"] 	= $this;
		}

		function __destroy()
		{}
		
		function draw()
		{
			$output = "";
			foreach($this->classes as $fieldnr => $value)
			{
				$output .= $value->draw();
			}
			echo $output;
		}

		function addDrawItem($item)
		{
			$this->classes[] = $item;
		}
	}	
	new Mose();
?>
 	