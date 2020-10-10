<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductForm extends Component
{
    /**
     * Insurers list.
     *
     * @var Array
     */
    public $insurers;

    public $categories;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($insurers, $categories)
    {
        $this->insurers = $insurers;
        $this->categories = $categories;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-form');
    }
}
