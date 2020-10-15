<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryForm extends Component
{
    public $insuranceClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($insuranceClasses)
    {
        $this->insuranceClasses = $insuranceClasses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-form');
    }
}
