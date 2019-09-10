<?php

namespace tranber\functions;

function parseTemplate(string $___path, iterable $___vars = []) :string
{
	$___html = '';

	if (is_file($___path))
	{
		\extract($___vars, \EXTR_SKIP);
		\ob_start();
		include $___path;
		$___html = \ob_get_clean();
	}
	
	return $___html;
}