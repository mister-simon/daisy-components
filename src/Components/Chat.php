<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Chat extends Component
{
    public $defaultAttributes;

    public $bubbleClasses = [];

    public function __construct(
        public $end = null,

        public $color = null,

        public $primary = null,
        public $secondary = null,
        public $accent = null,
        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,
    ) {
        $classes = ['chat'];

        $classes[] = $end
            ? 'chat-end'
            : 'chat-start';

        $this->bubbleClasses[] = 'chat-bubble';

        $this->bubbleClasses[] = match ($this->colorEnum()) {
            Type::PRIMARY => 'chat-bubble-primary',
            Type::SECONDARY => 'chat-bubble-secondary',
            Type::ACCENT => 'chat-bubble-accent',
            Type::INFO => 'chat-bubble-info',
            Type::SUCCESS => 'chat-bubble-success',
            Type::WARNING => 'chat-bubble-warning',
            Type::ERROR => 'chat-bubble-error',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
                $this->primary => Type::PRIMARY,
                $this->secondary => Type::SECONDARY,
                $this->accent => Type::ACCENT,
                $this->info => Type::INFO,
                $this->success => Type::SUCCESS,
                $this->warning => Type::WARNING,
                $this->error => Type::ERROR,
                default => null,
            };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.chat');
    }
}
