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

        public $type = null,

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

        if ($type) {
            $this->primary = $type === 'primary';
            $this->secondary = $type === 'secondary';
            $this->accent = $type === 'accent';
            $this->info = $type === 'info';
            $this->success = $type === 'success';
            $this->warning = $type === 'warning';
            $this->error = $type === 'error';
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
