<?php

namespace App\AdminModule\Presenters;

use App\Controller\MenuController;
use App\Model\BlockRepository;
use App\Model\Entity\BlockContentEntity;
use App\Model\Entity\BlockEntity;
use App\Model\LangRepository;
use App\Model\MenuRepository;
use App\Model\WebconfigRepository;

class BlockContentPresenter extends SignPresenter {

	/**
	 * ID for contact form as a block into content
	 */
	const CONTACT_FORM_ID_AS_BLOCK = -1;

	/** @var MenuRepository  */
	private $menuRepository;

	/** @var MenuController */
	private $menuController;

	/** @var  BlockRepository */
	private $blockRepository;

	/** @var LangRepository */
	private $langRepository;

	/** @var WebconfigRepository */
	private $webconfigRepository;

	public function __construct(
		MenuRepository $menuRepository,
		MenuController $menuController,
		BlockRepository $blockRepository,
		LangRepository $langRepository,
		WebconfigRepository $webconfigRepository
	) {
		$this->menuRepository = $menuRepository;
		$this->menuController = $menuController;
		$this->blockRepository = $blockRepository;
		$this->langRepository = $langRepository;
		$this->webconfigRepository = $webconfigRepository;
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

		$includedBlocks = $this->blockRepository->findAddedBlockContents($lang, $id);
		$this->template->includedBlocks = $includedBlocks;

		$availableBlock = $this->blockRepository->findBlockList($lang);
		$availableBlock[] = $this->getContactFormBlock();

		$this->template->availableBlocks = $availableBlock;
	}

	/**
	 * Add block to current link
	 *
	 * @param int $idMenu
	 * @param int $idBlock
	 */
	public function actionAddBlockToLink($idMenu, $idBlock) {
		$this->blockRepository->savePageContent($idMenu, $idBlock);
		$this->redirect("itemDetail", $idMenu);
	}

	/**
	 * @param int $idMenu
	 * @param int $idBlock
	 */
	public function actionRemoveBlockFromLink($idMenu,  $idBlock) {
		$this->redirect("itemDetail", $idMenu);
	}

	/**
	 * Return contact form as a block into content
	 *
	 * @return BlockEntity
	 */
	private function getContactFormBlock() {
		$langCommon = WebconfigRepository::KEY_LANG_FOR_COMMON;

		$contactBlock = new BlockEntity();
		$contactBlock->setBackgroundColor($this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_BACKGROUND_COLOR, $langCommon));
		$contactBlock->setColor($this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_COLOR, $langCommon));
		$contactBlock->setId(self::CONTACT_FORM_ID_AS_BLOCK);

		$contentEntity = new BlockContentEntity();
		$contentEntity->setContent(BLOCK_CONTENT_SETTINGS_CONTACT_FORM_AS_BLOCK);
		$contentEntity->setLang($langCommon);
		$contactBlock->setBlockContent($contentEntity);

		return $contactBlock;
	}


	/**
	 * @param BlockEntity[] $included
	 * @param BlockEntity[] $available
	 * @return BlockEntity[]
	 */
	private function filterAddedBlocks(array $included, array $available) {
		$filteredAvailable = [];
		if (count($included) == 0) {
			$filteredAvailable = $available;
		} else {
			foreach($included as $inc) {
				$found = false;
				foreach($available as $avail) {


				}
				if ($found == false) {
					//$filteredAvailable[] = $in
				}
			}
		}

		return $filteredAvailable;
	}
}