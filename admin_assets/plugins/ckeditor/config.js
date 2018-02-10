/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';
	config.entities = false;
config.enterMode = CKEDITOR.ENTER_BR;
// config.forceSimpleAmpersand = true;
	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	//height of ckEditor
	config.height = '360';
	//disallowed content
	config.allowedContent = true;
	config.disallowedContent = 'script';
	config.protectedSource.push( /<i class[\s\S]*?\>/g );
    config.protectedSource.push( /<\/i>/g );


    //upload image
 	//config.filebrowserBrowseUrl='browser/browse.php';
 	config.filebrowserUploadUrl='../browser/upload';
    //plugins
    config.extraPlugins = 'uploadimage';
    config.extraPlugins = 'uploadwidget';
    config.extraPlugins = 'widget';
    config.extraPlugins = 'clipboard';
    config.extraPlugins = 'filetools';
    config.extraPlugins = 'notification';
    config.extraPlugins = 'notificationaggregator';

};
