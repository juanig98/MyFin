<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLogo extends Component
{
    public $logo;
    public $width;
    public $height;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width = 50, $height = 50)
    {
        $this->logo = config('APP_URL') . '/storage/images/site/logo.gif';
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.app-logo');
    }
}
