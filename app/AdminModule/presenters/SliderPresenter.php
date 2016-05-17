<?php

namespace App\AdminModule\Presenters;

use App\Forms\SliderForm;
use App\Model\Entity\SliderPicEntity;
use Nette\Application\UI\Form;
use App\Model\SliderPicRepository;
use Nette\Http\FileUpload;

class SliderPresenter extends SignPresenter {

	/** @var SliderForm  */
	private $sliderForm ;

	/** SliderPicRepository  */
	private $sliderPicRepository;

	public function __construct(SliderForm $sliderForm, SliderPicRepository $sliderPicRepository) {
		$this->sliderForm = $sliderForm;
		$this->sliderPicRepository = $sliderPicRepository;
	}

	public function actionDefault() {
		$this->template->sliderPics = $this->sliderPicRepository->findPics();
	}

	/**
	 * @param int $id
	 */
	public function actionPicDelete($id) {
		$this->sliderPicRepository->delete($id);
		$this->redirect("default");
	}

	/**
	 * @return Form
	 */
	public function createComponentSliderForm() {
		$form = $this->sliderForm->create();
		$form->onSuccess[] = $this->proceedForm;

		return $form;
	}

	/**
	 * @param Form $form
	 * @param array $values
	 */
	public function proceedForm($form, $values) {
		// pics
		foreach($values[SliderPicRepository::KEY_SLIDER_FILES_UPLOAD] as $value) {
			/** @var FileUpload $file */
			$file = $value;
			if (empty($file->name)) continue;
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

			$sliderPicEntity = new SliderPicEntity();
			$sliderPicEntity->setPath($pathDb);
			$this->sliderPicRepository->save($sliderPicEntity);
		}

		$this->redirect("default");
	}
}