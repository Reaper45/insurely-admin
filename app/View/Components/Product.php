<?php

namespace App\View\Components;

use App\Product as AppProduct;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * The product.
     *
     * @var string
     */
    public $product;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AppProduct $product)
    {
        // dd($product->insurer->id);
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product');
    }
}
