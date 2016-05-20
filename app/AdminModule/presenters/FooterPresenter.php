<?php

namespace App\AdminModule\Presenters;

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
		if (!empty($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES])) {
			/** @var FileUpload $file */
			foreach ($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES] as $file) {
				if (empty($file->name)) {
					continue;
				}
				if (
					substr($file->name, -3) != "png" && substr($file->name, -3) != "PNG"
					&& substr($file->name, -3) != "jpg" && substr($file->name, -3) != "JPG"
					&& substr($file->name, -3) != "bmp" && substr($file->name, -3) != "BMP"
				) {
					$this->flashMessage(SLIDER_SETTINGS_PIC_FORMAT, "alert-danger");
					continue;
				}
				$pathDb = '/upload/' . date("Ymd-His") . "-" . $file->name;
				$path = UPLOAD_PATH . '/' . date("Ymd-His") . "-" . $file->name;
				$file->move($path);

				$footerPic = new FooterPicEntity();
				$footerPic->setPath($pathDb);
				$this->footerPicRepository->save($footerPic);
			}
		}
		unset($valuesToSave[WebconfigRepository::KEY_FOOTER_FILES]);
		$land = WebconfigRepository::KEY_LANG_FOR_COMMON;
		foreach($valuesToSave as $key => $value) {
			$this->webconfigRepository->save($key, $value, $land);

		}
		$this->flashMessage(FOOTER_SETTING_SAVED, "alert-success");
		$this->redirect("default");
	}
}