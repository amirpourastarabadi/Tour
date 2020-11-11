<?php

namespace App\View\Components\tourAdmin\tour;

use Illuminate\View\Component;

class show-fields extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tour-admin.tour.show-fields');
    }
}
