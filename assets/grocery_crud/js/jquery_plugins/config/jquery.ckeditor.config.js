$(function(){
	$( 'textarea.texteditor' ).ckeditor({toolbar:'Full',autoParagraph : false, enterMode : CKEDITOR.ENTER_BR});
	$( 'textarea.mini-texteditor' ).ckeditor({toolbar:'Basic',width:700,autoParagraph : false, enterMode : CKEDITOR.ENTER_BR});
});