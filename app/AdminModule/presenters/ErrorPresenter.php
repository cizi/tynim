<?php

namespace App\AdminModule\Presenters;

use Nette;
use Tracy\ILogger;
use Nette\Application\Request;
use Nette\Application\IResponse;

class ErrorPresenter implements Nette\Application\IPresenter {

    use Nette\SmartObject;

	/** @var ILogger */
	private $logger;

	public function __construct(ILogger $logger)
	{
		$this->logger = $logger;
	}


	public function run(Request $request): IResponse
	{
		$e = $request->getParameter('exception');

		if ($e instanceof Nette\Application\BadRequestException) {
			// $this->logger->log("HTTP code {$e->getCode()}: {$e->getMessage()} in {$e->getFile()}:{$e->getLine()}", 'access');
			return new Nette\Application\Responses\ForwardResponse($request->setPresenterName('Error4xx'));
		}

		$this->logger->log($e, ILogger::EXCEPTION);
		return new Nette\Application\Responses\CallbackResponse(function () {
			$pathToErrorPresenter =  __DIR__ . "../../templates/Error/500.phtml";
			require $pathToErrorPresenter;
		});
	}

}
