<?php

namespace Agungsp\FilamentCleaveInput\Enums;

enum NumeralThousandGroupStyle: string
{
    case Thousand = 'thousand';
    case Lakh = 'lakh';
    case Wan = 'wan';
    case None = 'none';
}
