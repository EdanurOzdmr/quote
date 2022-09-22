<?php

namespace Devpackage\Quote;

use Illuminate\Support\Collection;

class QuotePackage
{
    public function quoteList($pagename )
    {
        $data = Collection::make(config('quoteconfig.quotes'));
        if(isset($data[$pagename])){
            $value=$data[$pagename];
            $rand_quote=array_rand($value,1);
            $quote=$value[$rand_quote];
        }
        else{
            $quote='';
        }
        return $quote;
    }
}
