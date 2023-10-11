<?php

namespace MisterSimon\DaisyComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;

class A extends Button
{
    public function render(): View|Closure|string
    {
        $this->tag ??= 'a';

        return parent::render();
    }
}
