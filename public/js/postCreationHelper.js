var containers = [$('#container-image'), $('#container-short-text'), $('#container-list'), $('#container-article')];
var listItemsCount = 0;
function singleImageItem(postType, index) {
	return '<div class="form-group">' +
		'<label class="col-md-3 control-label">Image</label>' +
		'<div class="col-md-7"> ' +
			'<div style="position:relative;">' +
				'<a class="btn btn-default btn-file" href="javascript:;"> Choose File... ' +
				'<input type="file" class="input-file" name="file_source" size="40" onchange="chooseFileInput(event, this)">' +
				' </a> ' +
				'<span class="label label-info" id="'+ postType +'-upload-file-' + index +'"></span> ' +
			'</div> ' +
		'</div> ' +
	'</div>' +
	'<div class="form-group">' +
		'<label class="col-md-3 control-label" for="'+ postType +'-post-caption-' + index +'">Caption</label> ' +
		'<div class="col-md-7">' +
			'<input type="text" class="form-control" id="'+postType+'-post-caption-' + index +'" placeholder="Enter caption">' +
		'</div>' +
	'</div>'+
	'<div class="form-group">' +
		'<label class="col-md-3 control-label" for="'+ postType +'-post-text-'+ index +'">Text</label>' +
		'<div class="col-md-7"> ' +
			'<textarea class="form-control" rows="4" id="'+ postType +'-post-text-'+ index +'"></textarea>' +
		'</div> ' +
	'</div>';
}


function removeImageItemButton(postType, index) {
	return '<div class="form-group"><div class="col-md-7 col-md-offset-3"><a class="btn-sm btn btn-danger pull-right" onclick="removeItem(\''+postType+'\', '+index+')">Remove</a></div></div>'
}

function removeTextItemButton(postType, index) {

}


$('#content-type').change(function() {
	showContainer($('#content-type').val());
});

function showContainer(index) {
	$.each(containers, function(index, aContainer) {aContainer.hide()});
	containers[index].show();
}

function addToContainerImage() {
	$('#container-image').append(singleImageItem('image', 0));
}

function addToContainerShortText() {
	$('#container-short-text').append(singleTextItem('short-text', 0));
}

function addImageItemToContainerList() {
	$('#container-list-items').append('<li>'+singleImageItem('list', listItemsCount)+ removeImageItemButton('list', listItemsCount) + '</li><hr>');
	listItemsCount = listItemsCount+1;
}

function addToContainerArticle() {

}

function removeItem(postType, index) {
	if(postType === 'list') {
		$('#container-list-items').find('li')[index].remove();
	}
}

function chooseFileInput(e, inputElement){
	$(inputElement).closest('div').find('.label').text(e.target.files[0].name);
}

showContainer(0); //show first container at start
addToContainerImage();
addToContainerShortText();