
## Laravel Quote Package

Laravel package that lists random quotes.

The excerpts contained in the configuration file in this package are listed on the page according to the selected page.

## Installation

Via Composer

`$ composer require devpackage/quote
`


Once Devpackage Quotes is installed, you need to register the service provider. Open up config/app.php and add the following to the providers key.

`Devpackage\Quote\QuoteServiceProvider::class
`Also, register the Facade like so:

```

'providers' => [
...
Devpackage\Quote\QuoteServiceProvider::class
...
];
```


## Configuration
To get started, you'll need to publish all vendor assets:

`$ php artisan vendor:publish --provider="Devpackage\Quote\QuoteServiceProvider"`


## Usage
Don't forget to add the `<x-quotes/>` code to the layout file.   If you want to add your own quote, simply add it to the last line of the directory at config/quoteconfig.php.

## Simple Example

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
