<?php

namespace App\AdminModule\Presenters;

use App\Controller\MenuController;
use App\Model\BlockRepository;
use App\Model\LangRepository;
use App\Model\MenuRepository;

class BlockContentPresenter extends SignPresenter {

	/** @var MenuRepository  */
	private $menuRepository;

	/** @var MenuController */
	private $menuController;

	/** @var  BlockRepository */
	private $blockRepository;

	/** @var LangRepository */
	private $langRepository;

	public function __construct(
		MenuRepository $menuRepository,
		MenuController $menuController,
		BlockRepository $blockRepository,
		LangRepository $langRepository
	) {
		$this->menuRepository = $menuRepository;
		$this->menuController = $menuController;
		$this->blockRepository = $blockRepository;
		$this->langRepository = $langRepository;
	}

	public function actionDefault() {
		$lang = $this->langRepository->getCurrentLang($this->session);
		$this->template->topMenuEntities = $this->menuRepository->findItems($lang);
		$this->template->menuController = $this->menuController;
		$this->template->presenter = $this->presenter;
	}

	/**
	 * @param int $id is order of item (is unique)
	 */
	public function actionItemDetail($id) {
		$lang = $this->langRepository->getCurrentLang($this->session);
		$this->template->menuItem = $this->menuRepository->getMenuEntityByOrder($id, $lang);
	}
}