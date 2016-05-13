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
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb07d2aa00fc_scripts')) { function _lb07d2aa00fc_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery-2.2.3.min.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/bootstrap2-toggle.min.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/boostrap/js/bootstrap.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lbdf866bfbcd_head')) { function _lbdf866bfbcd_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
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
	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/bootstrap2-toggle.min.css">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo Latte\Runtime\Filters::escapeHtml($basePath, ENT_COMPAT) ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

	<meta name="viewport" content="width=device-width">
	<?php call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>

<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>

				<div class="modal fade" id="tinym_info_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<?php echo Latte\Runtime\Filters::escapeHtml(MODAL_WINDOWS_WARNING_TITLE, ENT_NOQUOTES) ?>

					</div>
					<div class="modal-body" id="tinym_info_modal_message"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo Latte\Runtime\Filters::escapeHtml(MODAL_BUTTON_OK, ENT_NOQUOTES) ?></button>
					</div>
				</div>
			</div>
		</div>

		<!-- Menu Toggle Script -->
		<script>
			function requiredFields() {
				submitForm = true;
				$($(".tinym_required_field").get().reverse()).each(function() {
					console.log($(this).val());
					if ($(this).val() == "") {
						$(this).addClass("form-control-danger");
						$(this).focus();
						$("#tinym_info_modal_message").text($(this).attr("validation"));
						$("#tinym_info_modal").modal();
						submitForm = false;
					} else {
						$(this).removeClass("form-control-danger");
						$(this).addClass("form-control-success");
					}
				});

				return submitForm;
			}

			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>
	</body>
</html>
<?php
}}