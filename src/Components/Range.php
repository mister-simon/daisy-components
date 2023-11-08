<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Range extends Component
{
    public $defaultAttributes;

    public function __construct(
        // Style
        public $color = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        // Sizes
        public $lg = null,
        public $md = null,
        public $sm = null,
        public $xs = null,

        // Measure
        public $measure = null,
    ) {
        $classes = ['range'];

        // Style
        if ($color && ($typeEnum = Type::tryFrom($color))) {
            $this->primary = $typeEnum === Type::PRIMARY;
            $this->secondary = $typeEnum === Type::SECONDARY;
            $this->accent = $typeEnum === Type::ACCENT;
            $this->info = $typeEnum === Type::INFO;
            $this->success = $typeEnum === Type::SUCCESS;
            $this->warning = $typeEnum === Type::WARNING;
            $this->error = $typeEnum === Type::ERROR;
        }

        if ($this->primary) {
            $classes[] = 'range-primary';
        } elseif ($this->secondary) {
            $classes[] = 'range-secondary';
        } elseif ($this->accent) {
            $classes[] = 'range-accent';
        } elseif ($this->info) {
            $classes[] = 'range-info';
        } elseif ($this->success) {
            $classes[] = 'range-success';
        } elseif ($this->warning) {
            $classes[] = 'range-warning';
        } elseif ($this->error) {
            $classes[] = 'range-error';
        }

        // Sizes
        $classes[] = match (true) {
            $lg => 'range-lg',
            $md => 'range-md',
            $sm => 'range-sm',
            $xs => 'range-xs',
            default => '',
        };

        $this->defaultAttributes = [
            'type' => 'range',
            'class' => implode(' ', $classes),
        ];
    }

    /**
     * The x padding for each size should be exactly 1/2 the range input's height.
     */
    public function defaultMeasureClass()
    {
        $md = (
            $this->lg === null
            && $this->md === null
            && $this->sm === null
            && $this->xs === null
        );

        return match (true) {
            $this->lg => 'px-4',
            $this->sm => 'px-[0.625rem]',
            $this->xs => 'px-2',
            $md => 'px-3',
            default => 'px-3',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.range');
    }
}
