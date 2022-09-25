
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
Don't forget to add the `<x-quotes/>` code to the layout file.

##Simple Example

```
<html lang="en">
<head>
    <title>Quotes Package</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container">

    <div id="main" class="row">
        @yield('content')
    </div>
    <div>
        <h1>Quote</h1>
        <x-quotes/>
    </div>

</div>

</body>
</html>
```
