/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'vi';
	 config.skin = 'v2';
	 //config.uiColor = 'Gold';
	 //cau hinh cho phep upload
	 
	config.filebrowserBrowseUrl = 'http://localhost/dl/admin/ckfinder/ckfinder.html';
config.filebrowserImageBrowseUrl = 'http://localhost/dl/admin/ckfinder/ckfinder.htmL?type=Images';
config.filebrowserFlashBrowseUrl = 'http://localhost/dl/admin/ckfinder/ckfinder.html?type=Flash';
config.filebrowserUploadUrl = 'http://localhost/dl/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
config.filebrowserImageUploadUrl = 'http://localhost/dl/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
config.filebrowserFlashUploadUrl = 'http://localhost/dl/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	//cau hinh thanh cong cu
	config.toolbar =
  	[
      	['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['BidiLtr', 'BidiRtl' ],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-']
  	];
};
