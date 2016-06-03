<?php

namespace App\AdminModule\Presenters;

use App\Controller\FileController;
use App\Forms\FooterForm;
use App\Model\Entity\FooterPicEntity;
use App\Model\FooterPicRepository;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;

class FooterPresenter extends SignPresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var FooterForm */
	private $footerForm;

	/** @var FooterPicRepository */
	private $footerPicRepository;

	/**
	 * @param WebconfigRepository $webconfigRepository
	 * @param FooterForm $footerForm
	 * @param FooterPicRepository $footerPicRepository
	 */
	public function __construct(
		WebconfigRepository $webconfigRepository,
		FooterForm $footerForm,
		FooterPicRepository $footerPicRepository
	) {
		$this->webconfigRepository = $webconfigRepository;
		$this->footerForm = $footerForm;
		$this->footerPicRepository = $footerPicRepository;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRepository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		$this['footerForm']->setDefaults($defaults);

		$this->template->footerPics = $this->footerPicRepository->load();
	}

	/**
	 * @param int $id
	 */
	public function actionDeletePic($id) {
		$this->footerPicRepository->delete($id);
		$this->flashMessage(FOOTER_PIC_DELETED, "alert-success");
		$this->redirect("default");
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentFooterForm() {
		$form = $this->footerForm->create();
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
		if (!empty($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES])) {
			/** @var FileUpload $file */
			foreach ($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES] as $file) {
				if ($file->name != "") {
					$fileController = new FileController();
					if ($fileController->upload($file, $supportedFilesFormat) == false) {
						$fileError = true;
						break;
					}
					$footerPic = new FooterPicEntity();
					$footerPic->setPath($fileController->getPathDb());
					$this->footerPicRepository->save($footerPic);
				}
			}
		}

		if ($fileError) {
			$flashMessage = sprintf(UNSUPPORTED_UPLOAD_FORMAT, explode(",", $supportedFilesFormat));
			$this->flashMessage($flashMessage, "alert-danger");
		} else {
			unset($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES]);
			$land = WebconfigRepository::KEY_LANG_FOR_COMMON;
			foreach ($valuesToSave as $key => $value) {
				$this->webconfigRepository->save($key, $value, $land);

			}
			$this->flashMessage(FOOTER_SETTING_SAVED, "alert-success");
		}
		$this->redirect("default");
	}
}