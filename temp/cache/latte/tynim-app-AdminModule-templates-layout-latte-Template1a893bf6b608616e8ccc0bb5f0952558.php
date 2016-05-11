<?php
// source: C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app\AdminModule/templates/@layout.latte

class Template1a893bf6b608616e8ccc0bb5f0952558 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9e38a12690', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lbdf866bfbcd_head')) { function _lbdf866bfbcd_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb07d2aa00fc_scripts')) { function _lb07d2aa00fc_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/boostrap/js/bootstrap.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery-2.2.3.min.js"></script>
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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(function () {}); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Nette Sandbox</title>
	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/simple-sidebar.css">
	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/boostrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width">
	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
<?php $iterations = 0; foreach ($flashes as $flash) { ?><div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

		<!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>
	</body>
</html>
<?php
}}