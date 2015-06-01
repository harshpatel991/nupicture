var containers = [$('#container-image'), $('#container-short-text'), $('#container-list'), $('#container-article')];

$('#content-type').change(function() {
	showContainer($('#content-type').val());
});

function showContainer(index) {
	$.each(containers, function(index, aContainer) {aContainer.hide()});
	containers[index].show();
}

function addToContainerImage() {

}

function addToContainerShortText() {

}

function addToContainerList() {

}

function addToContainerArticle() {

}

showContainer(0); //show first container at start

function chooseFileInput(e, inputElement){
	$(inputElement).closest('div').find('.label').text(e.target.files[0].name);
}