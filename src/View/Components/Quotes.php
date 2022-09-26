<?php

namespace Devpackage\Quote\View\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;
use function view;

class Quotes extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('quote::components.quotes');
    }
    public function quotes()
    {
        session_start();

        $pagename=Request::path();
        $data = Collection::make(config('quoteconfig.quotes'));
        if(isset($data[$pagename])){
            $value=$data[$pagename];
            if (!isset($_SESSION['count'])) {
                $_SESSION['count'] = 0;
            } else {
                if($_SESSION['count']<count($value)-1)
                    $_SESSION['count']++;
                else{
                    $_SESSION['count']=0;
                }
            }
            $quotes=$value[$_SESSION['count']];
           // $rand_quote=array_rand($value,1);
           // $quotes=$value[$rand_quote];
        }
        else{
            $quotes='';
        }

        return $quotes;
    }

}
