<?php

namespace App\View\Components\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RichTextEditor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public ?string $text = null,
        public string $id,
        public string $inputName,
    )
    {  }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.rich-text-editor');
    }
}
