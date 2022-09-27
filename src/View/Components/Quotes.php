<?php

namespace Devpackage\Quote\View\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;
use function view;

class Quotes extends Component
{
    private $API_KEY = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->API_KEY = config('quoteconfig.api_key');
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
        $data     = Collection::make(config('quoteconfig.categories'));
        $category = isset($data[$pagename]) ? $data[$pagename] : $data['default'];
        $quotes   = $this->quotesAPI($category);

        if ($quotes) {
            return $quotes;
        }

        return '';
    }

    public function quotesAPI($category)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.api-ninjas.com/v1/quotes?category=$category",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_HTTPHEADER     => [
                "X-Api-Key: " . $this->API_KEY,
            ], // QUOTES API profile get api key
        ]);

        $data = curl_exec($curl);
        $err  = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("cURL Error #:" . $err);
            return false;
        } else {
            return $data;
        }
    }
}
