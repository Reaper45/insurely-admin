<?php

namespace App\View\Components;

use App\Insurer as AppInsurer;
use Illuminate\View\Component;

class Insurer extends Component
{
    public $insurer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AppInsurer $insurer)
    {
        $this->insurer = $insurer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.insurer');
    }
}
