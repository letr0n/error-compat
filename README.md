# Error Compat

This the [Mako](https://makoframework.com) 5 error handler as a stand-alone package that is ment to be used with [Mako](https://makoframework.com) 4.5 applications running on PHP 7.

### How do I use it?

Install the package using composer:

	composer require letr0n/error-compat

Then open your ```app/config/application.php``` configuration file and replace the two Mako error handler services with the ```letr0n\error\services\cli\ErrorHandlerService``` and ```letr0n\error\services\web\ErrorHandlerService``` services.

That's it. You're done!