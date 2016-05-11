<?php
// source: C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app\AdminModule/templates/Dashboard/default.latte

class Template8a2c66a6549fdcc0bbfcca788f514912 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7054fe6917', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb6967cf46b1_content')) { function _lb6967cf46b1_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div id="wrapper">
<?php $_b->templates['7054fe6917']->renderChildTemplate('../@menu.latte', $template->getParameters()) ?>


		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1>Simple Sidebar</h1>
						<p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
						<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
						<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->



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