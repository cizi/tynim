<?php

namespace App\AdminModule\Presenters;

use App\Forms\HeaderForm;
use App\Controller\FileController;
use App\Model\Entity\PicEntity;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;
use App\Model\HeaderPicRepository;

class HeaderPresenter extends SignPresenter {

	/** @var HeaderForm */
	private $headerForm;

	/** @var HeaderPicRepository */
	private $headerPicRepository;

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/**
	 * @param HeaderForm $headerForm
	 * @param HeaderPicRepository $headerPicRepository
	 */
	public function __construct(HeaderForm $headerForm, HeaderPicRepository $headerPicRepository, WebconfigRepository $webconfigRepository) {
		$this->headerForm = $headerForm;
		$this->headerPicRepository = $headerPicRepository;
		$this->webconfigRepository = $webconfigRepository;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRepository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		$this['headerForm']->setDefaults($defaults);

		$this->template->headerPics = $this->headerPicRepository->load();
	}

	/**
	 * @param int $id
	 */
	public function actionDeletePic($id) {
		$this->headerPicRepository->delete($id);
		$this->flashMessage(FOOTER_PIC_DELETED, "alert-success");
		$this->redirect("default");
	}


	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentHeaderForm() {
		$form = $this->headerForm->create();
		$form->onSuccess[] = $this->saveForm;

		return $form;
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveForm($form, $values) {
		$valuesToSave = (array)$values;
		$supportedFilesFormat = ["png", "jpg", "bmp"];
		$fileError = false;
		if (!empty($valuesToSave[WebconfigRepository::KEY_HEADER_FILES])) {
			/** @var FileUpload $file */
			foreach ($valuesToSave[WebconfigRepository::KEY_HEADER_FILES] as $file) {
				if ($file->name != "") {
					$fileController = new FileController();
					if ($fileController->upload($file, $supportedFilesFormat) == false) {
						$fileError = true;
						break;
					}
					$pic = new PicEntity();
					$pic->setPath($fileController->getPathDb());
					$this->headerPicRepository->save($pic);
				}
			}
		}

		if ($fileError) {
			$flashMessage = sprintf(UNSUPPORTED_UPLOAD_FORMAT, implode(",", $supportedFilesFormat));
			$this->flashMessage($flashMessage, "alert-danger");
		} else {
			unset($valuesToSave[WebconfigRepository::KEY_HEADER_FILES]);
			$land = WebconfigRepository::KEY_LANG_FOR_COMMON;
			foreach ($valuesToSave as $key => $value) {
				$this->webconfigRepository->save($key, $value, $land);

			}
			$this->flashMessage(HEADER_SETTING_SAVED, "alert-success");
		}
		$this->redirect("default");
	}
}