<?php

namespace Agungsp\FilamentCleaveInput\Forms\Components;

use Agungsp\FilamentCleaveInput\Enums\DateUnit;
use Agungsp\FilamentCleaveInput\Enums\NumeralThousandGroupStyle;
use Agungsp\FilamentCleaveInput\Enums\TimeFormat;
use Agungsp\FilamentCleaveInput\Enums\TimeUnit;
use Filament\Forms\Components\TextInput;

class CleaveInput extends TextInput
{
    protected string $view = 'filament-cleave-input::forms.components.cleave-input';

    protected string $cleaveType = 'general';

    protected array $cleaveOptions = [];

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function getCleaveType(): string
    {
        return $this->cleaveType;
    }

    public function getCleaveOptions(): array
    {
        return $this->cleaveOptions;
    }

    public function creditCard(): static
    {
        $this->cleaveType = 'creditCard';

        return $this;
    }

    public function numeral(bool $enabled = true): static
    {
        if ($enabled) {
            $this->cleaveType = 'numeral';
        }

        return $this;
    }

    public function numeralThousandsGroupStyle(NumeralThousandGroupStyle | string $style): static
    {
        $this->cleaveOptions['numeralThousandsGroupStyle'] = $style instanceof NumeralThousandGroupStyle ? $style->value : $style;

        return $this;
    }

    public function numeralIntegerScale(int $scale): static
    {
        $this->cleaveOptions['numeralIntegerScale'] = $scale;

        return $this;
    }

    public function numeralDecimalScale(int $scale): static
    {
        $this->cleaveOptions['numeralDecimalScale'] = $scale;

        return $this;
    }

    public function numeralDecimalMark(string $mark): static
    {
        $this->cleaveOptions['numeralDecimalMark'] = $mark;

        return $this;
    }

    public function numeralPositiveOnly(bool $positiveOnly = true): static
    {
        $this->cleaveOptions['numeralPositiveOnly'] = $positiveOnly;

        return $this;
    }

    public function stripLeadingZeroes(bool $strip = true): static
    {
        $this->cleaveOptions['stripLeadingZeroes'] = $strip;

        return $this;
    }

    public function date(bool $enabled = true): static
    {
        if ($enabled) {
            $this->cleaveType = 'date';
        }

        return $this;
    }

    public function datePattern(array $pattern): static
    {
        $this->cleaveOptions['datePattern'] = array_map(function ($unit) {
            return $unit instanceof DateUnit ? $unit->value : $unit;
        }, $pattern);

        return $this;
    }

    public function dateMin(string $min): static
    {
        $this->cleaveOptions['dateMin'] = $min;

        return $this;
    }

    public function dateMax(string $max): static
    {
        $this->cleaveOptions['dateMax'] = $max;

        return $this;
    }

    public function time(bool $enabled = true): static
    {
        if ($enabled) {
            $this->cleaveType = 'time';
        }

        return $this;
    }

    public function timePattern(array $pattern): static
    {
        $this->cleaveOptions['timePattern'] = array_map(function ($unit) {
            return $unit instanceof TimeUnit ? $unit->value : $unit;
        }, $pattern);

        return $this;
    }

    public function timeFormat(TimeFormat | string $format): static
    {
        $this->cleaveOptions['timeFormat'] = $format instanceof TimeFormat ? $format->value : $format;

        return $this;
    }

    public function blocks(array $blocks): static
    {
        if ($this->cleaveType !== 'creditCard' && $this->cleaveType !== 'time' && $this->cleaveType !== 'date') {
            $this->cleaveType = 'general';
        }
        $this->cleaveOptions['blocks'] = $blocks;

        return $this;
    }

    public function delimiter(string $delimiter): static
    {
        $this->cleaveOptions['delimiter'] = $delimiter;

        return $this;
    }

    public function delimiters(array $delimiters): static
    {
        $this->cleaveOptions['delimiters'] = $delimiters;

        return $this;
    }

    public function uppercase(bool $uppercase = true): static
    {
        $this->cleaveOptions['uppercase'] = $uppercase;

        return $this;
    }

    public function lowercase(bool $lowercase = true): static
    {
        $this->cleaveOptions['lowercase'] = $lowercase;

        return $this;
    }

    public function numericOnly(bool $numericOnly = true): static
    {
        $this->cleaveOptions['numericOnly'] = $numericOnly;

        return $this;
    }

    public function cleavePrefix(string $prefix): static
    {
        $this->cleaveOptions['prefix'] = $prefix;

        return $this;
    }

    public function tailPrefix(bool $tail = true): static
    {
        $this->cleaveOptions['tailPrefix'] = $tail;

        return $this;
    }

    public function cleaveOptions(array $options): static
    {
        $this->cleaveOptions = array_merge($this->cleaveOptions, $options);

        return $this;
    }
}
