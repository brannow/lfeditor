<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Language File Editor',
	'description' => 'This module serves several functions for editing of language files.
The extension differs between editors and administrators with appropriate privileges.
Normal users are allowed to edit only languages for which they have permission.
Following functions are implemented in this module:
	* Formats: PHP, XML and XLF
	* Enhanced insert types (resizable text area, TinyMCE)
	* Conversion of formats
	* Splitting and merging of language files
	* Override mode
	* Editing L10n folder content
	* Simple editing of constants and languages (edit/add/rename/delete constants)
	* Flexible search and view of constants and values
	* Tree view of constants
	* Meta information handling
	* Backups, recovering and diff view',
	'category' => 'module',
	'version' => '4.0.4',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Stefan Galinski, Damjan Komlenac',
	'author_email' => 'stefan@sgalinski.de',
	'author_company' => 'sgalinski Internet Services',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.12-8.7.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'tinymce' => '4.2.8',
		),
	),
);
