<?php

namespace MisterSimon\DaisyComponents\Enums;

enum Type: string
{
    case NEUTRAL = 'neutral';
    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case ACCENT = 'accent';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';
    case ERROR = 'error';
    case GHOST = 'ghost';
    case LINK = 'link';
}
