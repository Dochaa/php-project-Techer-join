<html>
<head>
	<title>ThaiCreate.Com</title>
	<meta charset="utf-8">
</head>
<body>
	<script src="ckediter/ckeditor.js"></script>


		<!-- Sample 1 -->
		<textarea id="txtDescription1" name="content" class="frm500" rows="10">
				เนื้อหา
		</textarea>

		<script>

		//	CKEDITOR.replace('txtDescription1');

 

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'txtDescription1', {
			//	uiColor: '#14B8C4',
				toolbar: [
					[ 'Source', 'Format', 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					[ 'FontSize', 'TextColor', 'BGColor' ],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>

</body>
</html>
