<?php

namespace App\FrontendModule\Presenters;

use Nette;
use Nette\Application\UI\Presenter;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

	/** @var \Dibi\Connection @inject */
	public $db;

}
