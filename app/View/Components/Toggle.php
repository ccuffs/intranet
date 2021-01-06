<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toggle extends Component
{
    /**
     * The name and id of this toggle.
     *
     * @var string
     */
    public $name;

    /**
     * The label used for this toggle.
     *
     * @var string
     */
    public $label;

    /**
     * If the toggle is checked or not
     *
     * @var string
     */
    public $checked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = '', $checked = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.toggle');
    }
}
