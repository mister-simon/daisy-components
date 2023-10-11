<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chat extends Component
{
    public $defaultAttributes;

    public $bubbleClasses = [];

    public function __construct(
        public $end = null,
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

        if ($primary) {
            $this->bubbleClasses[] = 'chat-bubble-primary';
        } elseif ($secondary) {
            $this->bubbleClasses[] = 'chat-bubble-secondary';
        } elseif ($accent) {
            $this->bubbleClasses[] = 'chat-bubble-accent';
        } elseif ($info) {
            $this->bubbleClasses[] = 'chat-bubble-info';
        } elseif ($success) {
            $this->bubbleClasses[] = 'chat-bubble-success';
        } elseif ($warning) {
            $this->bubbleClasses[] = 'chat-bubble-warning';
        } elseif ($error) {
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
