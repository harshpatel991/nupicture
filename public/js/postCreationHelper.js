/**
 * Adding a text/image/list item section:
 *   Adds a 'wrapper section' above the content-bottom div
 *   Removes the text that tells the user to add sections
 * Adding a source section:
 *   Adds a 'wrapper section ' above the source-bottom div
 *   Removes the text that tells the user to add sources
 *
 * Removing sections:
 *   Removes the wrapper
 * @type {number}
 */
var currentGlobalSectionIndex = 1; //the current section number
var currentListItemNumber = 1; //counter for adding list items

var contentBottom = $('#content-bottom'); //new sections should be placed on top of this
var sourceBottom = $('#source-bottom'); //new source sections should be placed on top of this

var postBuilderHelpText = $('#post-builder-help-text'); //the text that tells the user that they have no items
var sourcesHelpText= $('#sources-builder-help-text'); //the text that tells the user that they have no items

var buttonAddTextSection = $('#add-text-section');
var buttonAddImageSection = $('#add-image-section');
var buttonAddListNumberSection = $('#add-list-number-section');
var buttonAddSourceSection= $('#add-source-section');

function textSection (id) {
    return '<div id="'+id+'-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input class="form-control" name="'+id+'-section-text[]" placeholder="Heading (optional)">' +
                        '<textarea class="form-control" rows="4" cols="60" name="'+id+'-section-text[]" placeholder="Write your content here"></textarea>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger" onclick="removeWrapperId('+id+')"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

function imageSection (id) {
    return '<div id="'+id+'-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input type="file" name="'+id+'-section-image[]">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger" onclick="removeWrapperId('+id+')"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>';
            '</div>';
}

function listNumberSection (id) {
    return '<div id="'+id+'-wrapper" class="">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<h2><li></li></h2><input type="hidden" name="'+id+'-section-listnumber">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger post-builder-remove-button" onclick="removeWrapperId('+id+')"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>';
            '</div>';
}

function sourceSection(id) {
    return '<div id="' + id + '-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input class="form-control" name="' + id + '-section-source" placeholder="Enter a source (ex: http://cnn.com)">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger" onclick="removeWrapperId(' + id + ')"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>';
            '</div>';
}

//Set up what to do when the buttons are clicked
buttonAddTextSection.click(addTextSection);
buttonAddImageSection.click(addImageSection);
buttonAddListNumberSection.click(addListNumberSection);
buttonAddSourceSection.click(addSourceSection);

function addTextSection() {
    $(textSection(currentGlobalSectionIndex)).hide().fadeIn().insertBefore(contentBottom);
    addSection();
    postBuilderHelpText.hide();
}

function addImageSection() {
    $(imageSection(currentGlobalSectionIndex)).hide().fadeIn().insertBefore(contentBottom);
    addSection();
    postBuilderHelpText.hide();
}

function addListNumberSection() {
    $(listNumberSection(currentGlobalSectionIndex)).hide().fadeIn().insertBefore(contentBottom);
    addSection();
    postBuilderHelpText.hide();
    currentListItemNumber = currentListItemNumber + 1;
}

function addSourceSection() {
    $(sourceSection(currentGlobalSectionIndex)).hide().fadeIn().insertBefore(sourceBottom);
    addSection();
    sourcesHelpText.hide();
}

//Called when each section is added
function addSection() {
    currentGlobalSectionIndex = currentGlobalSectionIndex + 1;
}

//Press on the remove button
function removeWrapperId(id) {
    $('#'+id+'-wrapper').fadeOut(300, function() {
        $('#'+id+'-wrapper').remove();
    });
}

