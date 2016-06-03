<?php

namespace App\AdminModule\Presenters;

use App\Controller\FileController;
use App\Forms\BlockForm;
use App\Model\BlockRepository;
use App\Model\Entity\BlockContentEntity;
use App\Model\Entity\BlockEntity;
use App\Model\Entity\BlockPicsEntity;
use App\Model\LangRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;

class BlockPresenter extends SignPresenter {

	/** @var BlockForm  */
	private $blockForm;

	/** @var BlockRepository */
	private $blockRepository;

	/** @var LangRepository */
	private $langRepository;

	public function __construct(
		BlockForm $blockForm,
		BlockRepository $blockRepository,
		LangRepository $langRepository
	) {
		$this->blockForm = $blockForm;
		$this->blockRepository = $blockRepository;
		$this->langRepository = $langRepository;
	}

	public function actionDefault() {
		$lang = $this->langRepository->getCurrentLang($this->session);
		$this->template->blocks = $this->blockRepository->findBlockList($lang);
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentBlockForm() {
		$form = $this->blockForm->create();
		$form->onSuccess[] = $this->saveBlock;

		return $form;
	}

	/**
	 * @param $id
	 * @param array $values
	 */
	public function actionEdit($id, array $values = null) {
		if ($values != null) {
			$this['blockForm']->setDefaults($values);
		}

		$this->template->blockPics = $this->blockRepository->findBlockPictures();
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveBlock($form, $values) {
		$blockEntity = new BlockEntity();
		$blockEntity->hydrate((array)$values);

		$error = false;
		$supportedFileFormats =  ["jpg", "png", "doc"];
		$mutation = [];
		$pics = [];
		foreach($values as $key => $value) {
			if ($value instanceof ArrayHash) {	// language mutation
				$blockContentEntity = new BlockContentEntity();
				$blockContentEntity->hydrate((array)$value);
				$blockContentEntity->setLang($key);

				$mutation[] = $blockContentEntity;
			}
			if (is_array($value)) {	// obrázky
				/** @var FileUpload $file */
				foreach ($value as $file) {
					if ($file->name != "") {
						$fileController = new FileController();
						if ($fileController->upload($file, $supportedFileFormats) == false) {
							$error = true;
							break;
						}

						$blockPic = new BlockPicsEntity();
						$blockPic->setPath($fileController->getPathDb());
						$pics[] = $blockPic;
					}
				}
			}
		}

		if ($error) {
			$flashMessage = sprintf(UNSUPPORTED_UPLOAD_FORMAT, implode(",", $supportedFileFormats));
			$this->flashMessage($flashMessage, "alert-danger");
			$this->redirect("edit", null, $values);
		} else {
			if ($this->blockRepository->saveCompleteBlockItem($blockEntity, $mutation, $pics) == false) {
				$this->flashMessage(BLOCK_SETTINGS_ITEM_SAVED_FAILED, "alert-danger");
				$this->redirect("edit", null, $values);
			}
		}
		$this->redirect("default");
	}


	/**
	 * @param int $id
	 */
	public function actionDelete($id) {
		if ($this->blockRepository->deleteBlockItem($id) == true) {
			$this->flashMessage(BLOCK_SETTINGS_ITEM_DELETED, "alert-success");
		} else {
			$this->flashMessage(BLOCK_SETTINGS_ITEM_DELETED_FAILED, "alert-danger");
		}

		$this->redirect("default");
	}
	
}