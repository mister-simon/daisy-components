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
            $this->bubbleClasses[] = 'chat-bubble-primary';
        } elseif ($this->secondary) {
            $this->bubbleClasses[] = 'chat-bubble-secondary';
        } elseif ($this->accent) {
            $this->bubbleClasses[] = 'chat-bubble-accent';
        } elseif ($this->info) {
            $this->bubbleClasses[] = 'chat-bubble-info';
        } elseif ($this->success) {
            $this->bubbleClasses[] = 'chat-bubble-success';
        } elseif ($this->warning) {
            $this->bubbleClasses[] = 'chat-bubble-warning';
        } elseif ($this->error) {
            $this->bubbleClasses[] = 'chat-bubble-error';
        }

        $this->defaultAttributes = ['class' => implode(' ', $classes)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.chat');
    }
}
