<?php

	abstract class MosePage
	{
		abstract public function draw();

		function __construct()
		{
			$GLOBALS["mose"]->addDrawItem($this);
		}

		function __destruct()
		{

		}
	}
?>
 	