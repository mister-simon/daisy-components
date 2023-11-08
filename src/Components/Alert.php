<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use MisterSimon\DaisyComponents\Enums\Type;

class Alert extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $color = null,

        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        public $dismissable = null,
        public $autoDismiss = null,
        public $dismissIntersect = false,
    ) {
        $classes = ['alert'];

        $classes[] = match ($this->colorEnum()) {
            Type::INFO => 'alert-info',
            Type::SUCCESS => 'alert-success',
            Type::WARNING => 'alert-warning',
            Type::ERROR => 'alert-error',
            default => '',
        };

        $this->defaultAttributes = ['class' => implode(' ', $classes)];

        // Any dismissal option will require alpine additions
        $dismissable = $dismissable || $autoDismiss || $dismissIntersect;

        // Manage unset / non-numeric auto-dismiss timer
        if (($autoDismiss || $dismissIntersect) && ! is_numeric($autoDismiss)) {
            $autoDismiss = 3000;
        }

        // Base alpine additions
        if ($dismissable) {
            $autoDismissDefault = $autoDismiss ?? 0;
            $this->defaultAttributes['x-data'] = <<<"JS"
                {
                    dismissed: false,
                    timeout() {
                        setTimeout(() => this.dismissed = true, {$autoDismissDefault})
                    }
                }
            JS;

            $this->defaultAttributes['x-show'] = '!dismissed';
        }

        // Add autodismiss either on timeout or intersection observer
        if ($autoDismiss) {
            if ($dismissIntersect) {
                $this->defaultAttributes['x-intersect.full.once'] = 'timeout';
            } else {
                $this->defaultAttributes['x-init'] = 'timeout()';
            }
        }
    }

    public function colorEnum()
    {
        return $this->color !== null
            ? Type::tryFrom($this->color)
            : match (true) {
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
        return view('daisy-components::components.alert');
    }
}
