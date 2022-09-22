
## Laravel Quote Package

Laravel package that lists random quotes.

The excerpts contained in the configuration file in this package are listed on the page according to the selected page.

## Installation

Via Composer

`$ composer require devpackage/quote
`

Add service provider at config/app.php if you're using Laravel 5.4 and below. Latest Laravel versions have auto dicovery and automatically add service provider.

```

'providers' => [
...
Devpackage\Quote\QuoteServiceProvider::class
...
];
```


Publish config files.If you want to add your own quote just add it at the last row of array at src/config/quoteconfig.php or you can fork this package and contribute.

`$ php artisan vendor:publish --provider="Devpackage\Quote\QuoteServiceProvider"`

## Usage


$pagename is the name of your web page. If there is a quote in the configuration file of your web page, the quote will be listed where the {{$quote}} code you added on your web page is located. 

Add the following code to the web.php file.

```

Route::get('/{pagename}',  function($pagename) {
$quote = new QuotePackage();
$quotes= $quote->quoteList($pagename);
return view($pagename) ->with('quotes',$quotes);
});

```

Don't forget to add the `{{$quotes}}` code where you want to display the quote on your relevant web page!
