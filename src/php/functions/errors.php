<?php

namespace tranber\functions;

function htmlError(string $message, ?string $file = null, ?int $line = null) :string 
{
	$html  = '<div class="blk_Error"><div class="elm_Error_Message">';
	$html .= $message.'</div>';

	if ($file) {
		$html .= '<div class="elm_Error_File">In '.$file.', l.'.$line.'</div>';
	}

	$html .= '</div>';

	return $html;
}

function htmlErrorFromException(\Exception $e) :string
{
	return htmlError($e->getMessage(), $e->getFile(), $e->getLine());
}