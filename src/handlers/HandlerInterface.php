<?php

/**
 * @copyright  Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

namespace letron\error\handlers;

/**
 * Store interface.
 *
 * @author  Frederic G. Østby
 */
interface HandlerInterface
{
	/**
	 * Handles the exception.
	 *
	 * @access  public
	 * @param   boolean  $showDetails  Show error details?
	 * @return  boolean
	 */
	public function handle($showDetails = true);
}