<?php
$header = <<<'EOF'
EOF;

$finder = PhpCsFixer\Finder::create()
	->ignoreDotFiles(false)
	->ignoreVCSIgnored(true)
	->exclude('tests/Fixtures')
	->in(__DIR__)
;

$config = new PhpCsFixer\Config();
$config
	->setRiskyAllowed(true)
	->setRules([
		'@PHP70Migration' => true,
		'@PHP71Migration' => true,
		'@PSR12' => true,
		'@Symfony' => true,
		'@Symfony:risky' => true,
		'@DoctrineAnnotation' => true,
		'align_multiline_comment' => true,
		'array_indentation' => true,
		'array_syntax' => ['syntax' => 'short'],
		'blank_line_before_statement' => true,
		'combine_consecutive_issets' => true,
		'combine_consecutive_unsets' => true,
		// one should use PHPUnit methods to set up expected exception instead of annotations
		'header_comment' => ['header' => $header],
		'heredoc_to_nowdoc' => true,
		'list_syntax' => ['syntax' => 'long'],
		'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
		'no_extra_blank_lines' => ['tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block']],
		'no_null_property_initialization' => true,
		'echo_tag_syntax' => true,
		'no_superfluous_elseif' => true,
		'no_unneeded_curly_braces' => true,
		'native_function_invocation' => ['include' => ['@internal']],
		'no_unneeded_final_method' => true,
		'no_unreachable_default_argument_value' => true,
		'no_useless_else' => true,
		'no_useless_return' => true,
		'ordered_class_elements' => true,
		'ordered_imports' => true,
		'php_unit_strict' => false,
		'php_unit_test_class_requires_covers' => false,
		'phpdoc_add_missing_param_annotation' => true,
		'phpdoc_order' => true,
		'phpdoc_types_order' => true,
		'no_superfluous_phpdoc_tags' => false,
		'phpdoc_to_param_type' => true,
		'phpdoc_to_return_type' => true,
		'semicolon_after_instruction' => true,
		'single_line_comment_style' => true,
		'strict_comparison' => true,
		'strict_param' => true,
		'yoda_style' => true,
		'non_printable_character' => false // Solve testing with non-printable characters (ex 'long space' - Polish thousand separator)
	])
	->setFinder($finder)
;
// special handling of fabbot.io service if it's using too old PHP CS Fixer version
if (false !== getenv('FABBOT_IO')) {
	try {
		PhpCsFixer\FixerFactory::create()
			->registerBuiltInFixers()
			->registerCustomFixers($config->getCustomFixers())
			->useRuleSet(new PhpCsFixer\RuleSet($config->getRules()))
		;
	} catch (PhpCsFixer\ConfigurationException\InvalidConfigurationException $e) {
		$config->setRules([]);
	} catch (UnexpectedValueException $e) {
		$config->setRules([]);
	} catch (InvalidArgumentException $e) {
		$config->setRules([]);
	}
}

return $config;
