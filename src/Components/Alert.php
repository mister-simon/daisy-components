<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $defaultAttributes;

    public function __construct(
        public $type = null,

        public $info = null,
        public $success = null,
        public $warning = null,
        public $error = null,

        public $dismissable = null,
        public $autoDismiss = null,
        public $dismissIntersect = false,
    ) {
        $classes = ['alert'];

        if ($type) {
            $this->info = $type === 'info';
            $this->success = $type === 'success';
            $this->warning = $type === 'warning';
            $this->error = $type === 'error';
        }

        if ($this->info) {
            $classes[] = 'alert-info';
        } elseif ($this->success) {
            $classes[] = 'alert-success';
        } elseif ($this->warning) {
            $classes[] = 'alert-warning';
        } elseif ($this->error) {
            $classes[] = 'alert-error';
        }

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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('daisy-components::components.alert');
    }
}
