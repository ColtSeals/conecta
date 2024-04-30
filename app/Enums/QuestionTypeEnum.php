<?php

namespace App\Enums;

use App\Trait\EnumUtilityTrait;

enum QuestionTypeEnum: string
{
    use EnumUtilityTrait;

    case MULTIPLE = 'Multiple';
    case TEXTAREA = 'TextArea';

    case YES_OR_NO = 'YesOrNo';

    case ORIENTATION = 'Orientation';
}
