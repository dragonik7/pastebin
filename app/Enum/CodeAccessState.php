<?php

namespace App\Enum;

enum CodeAccessState: string
{

	case Public   = 'public';
	case Unlisted = 'unlisted';
	case Private  = 'private';
}
