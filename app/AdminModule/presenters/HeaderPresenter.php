<?php

namespace App\AdminModule\Presenters;

use App\Forms\HeaderForm;
use App\Controller\FileController;
use App\Model\Entity\PicEntity;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;
use App\Model\PicRepository;

class HeaderPresenter extends SignPresenter {

	/** @var HeaderForm */
	private $headerForm;

	/** @var PicRepository */
	private $picRepository;

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/**
	 * @param HeaderForm $headerForm
	 * @param PicRepository $picRepository
	 */
	public function __construct(HeaderForm $headerForm, PicRepository $picRepository, WebconfigRepository $webconfigRepository) {
		$this->headerForm = $headerForm;
		$this->picRepository = $picRepository;
		$this->webconfigRepository = $webconfigRepository;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRepository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		$this['headerForm']->setDefaults($defaults);

		$this->template->headerPics = $this->picRepository->load();
	}

	/**
	 * @param int $id
	 */
	public function actionDeletePic($id) {
		$this->picRepository->delete($id);
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
					$this->picRepository->save($pic);
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