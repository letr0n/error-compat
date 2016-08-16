<?php

/**
 * @copyright  Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

namespace letron\error\services\cli;

use letron\error\ErrorHandler;
use letron\error\handlers\CLIHandler;

use mako\application\services\Service;

/**
 * Error handler service.
 *
 * @author  Frederic G. Østby
 */
class ErrorHandlerService extends Service
{
	/**
	 * Helper method that ensures lazy loading of the logger.
	 *
	 * @access  protected
	 * @param   \letron\error\ErrorHandler  $errorHandler  Error handler instance
	 */
	protected function setLogger($errorHandler)
	{
		if($this->container->get('config')->get('application.error_handler.log_errors'))
		{
			$errorHandler->setLogger($this->container->get('logger'));
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function register()
	{
		$errorHandler = new ErrorHandler;

		$displayErrors = $this->container->get('config')->get('application.error_handler.display_errors');

		$errorHandler->handle('\Throwable', function($exception) use ($errorHandler, $displayErrors)
		{
			$this->setLogger($errorHandler);

			$webHandler = new CLIHandler($exception, $this->container->get('output'));

			return $webHandler->handle($displayErrors);
		});

		$this->container->registerInstance([ErrorHandler::class, 'errorHandler'], $errorHandler);
	}
}