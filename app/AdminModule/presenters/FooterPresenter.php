<?php

namespace App\AdminModule\Presenters;

use App\Controller\FileController;
use App\Forms\FooterForm;
use App\Model\Entity\PicEntity;
use App\Model\PicRepository;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;

class FooterPresenter extends SignPresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var FooterForm */
	private $footerForm;

	/** @var PicRepository */
	private $picRepository;

	/**
	 * @param WebconfigRepository $webconfigRepository
	 * @param FooterForm $footerForm
	 * @param PicRepository $picRepository
	 */
	public function __construct(
		WebconfigRepository $webconfigRepository,
		FooterForm $footerForm,
		PicRepository $picRepository
	) {
		$this->webconfigRepository = $webconfigRepository;
		$this->footerForm = $footerForm;
		$this->picRepository = $picRepository;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRepository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		$this['footerForm']->setDefaults($defaults);

		$this->template->footerPics = $this->picRepository->load();
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