<?php

namespace Devpackage\Quote\View\Components;

use HttpRequest;
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
        $pagename = Request::path();
        $data = Collection::make(config('quoteconfig.categories'));
        $quotes = $this->quotesAPI($data[$pagename]);

        return $quotes;

    }

    public function quotesAPI($category)
    {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.api-ninjas.com/v1/quotes?category=$category",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-Api-Key: h1dF2oUsjtF0pOVkH4j/Xg==Ire99vyXK87psSEh",
            ], // QUOTES API profile get api key
        ]);

        $data = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $data;
        }
    }
}
