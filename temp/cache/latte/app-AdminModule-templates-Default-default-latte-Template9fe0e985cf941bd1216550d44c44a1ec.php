<?php
// source: C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app\AdminModule/templates/Default/default.latte

class Template9fe0e985cf941bd1216550d44c44a1ec extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('008af68cde', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbdc7dd2683e_content')) { function _lbdc7dd2683e_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

		<div class="row login">
			<div class="col-lg-5 col-md-4 col-sm-3 col-xs-3"></div>
			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
				<h2 class="form-signin-heading"><?php echo Latte\Runtime\Filters::escapeHtml(ADMIN_LOGIN_HEADER, ENT_NOQUOTES) ?></h2>

				<label for="inputEmail" class="sr-only"><?php if ($_label = $_form["login"]->getLabel()) echo $_label  ?></label>
				<?php echo $_form["login"]->getControl() ?>


				<label for="inputPassword" class="sr-only"><?php if ($_label = $_form["password"]->getLabel()) echo $_label  ?></label>
				<?php echo $_form["password"]->getControl() ?>


				<div class="checkbox">
					<label>
						<?php echo $_form["remember"]->getControl() ?>

					</label>
				</div>
				<?php echo $_form["send"]->getControl() ?>

			</div>
			<div class="col-lg-5 col-md-4 col-sm-3 col-xs-3"></div>
		</div>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start(function () {});}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php
}}