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
var buttonAddYoutubeSection = $('#add-youtube-section');
var buttonAddSourceSection= $('#add-source-section');

function textSection (id, optional_content, content) {
    optional_content = optional_content || '';
    content = content || '';

    return '<div id="'+id+'-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-12">' +
                        '<input class="form-control" name="'+id+'-section-text[]" placeholder="Heading" id="' + id + '-optional" value="'+ optional_content +'">' +
                        '<textarea class="form-control post-builder-textarea" rows="6" cols="60" name="'+id+'-section-text[]" id="' + id + '-content" placeholder="Your Content*">'+ content +'</textarea>' +
                    '</div>' +
                    '<div class="col-sm-10">' +
                        '<div style="color: #bbb;">Tags Allowed: b, strong, i, a, ul, ol, li, br, span, and p</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger pull-right post-builder-remove-button" onclick="removeWrapperId('+id+')" id="' + id + '-remove"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

function imageSection (id, optional_content, content) {
    return '<div id="'+id+'-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-12">' +
                        '<input type="file" name="'+id+'-section-image[]" id="' + id + '-content">' +
                        '<input hidden name="'+id+'-section-image[]">' + //here so that the image item is in the correct order
                    '</div>' +
                '</div>' +
                '<div class="row">' +
                    '<div class="col-sm-12">' +
                        '<p style="color: #bbb;"> Max File Size: 2MB. File types accepted: PNG, GIF, JPG, JPEG.</p>' +
                    '</div>' +
                '</div>' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input class="form-control" name="'+id+'-section-image[]" placeholder="Image Source (ex. http://cnn.com)" id="' + id + '-optional" value="'+ optional_content +'">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger pull-right post-builder-remove-button" onclick="removeWrapperId('+id+')" id="' + id + '-remove"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +

            '</div>';
}

function listNumberSection (id, optional_content) {
    optional_content = optional_content || '';

    return '<div id="'+id+'-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<li class="h2" style="margin-top:0px; margin-bottom:0px;">' +
                            '<p><input class="form-control display-inline post-builder-list-number-input" name="'+id+'-section-listnumber" placeholder="Heading" id="' + id + '-optional" value="' + optional_content + '"></p>' +
                        '</li>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger pull-right post-builder-remove-button" onclick="removeWrapperId('+id+')" id="' + id + '-remove"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

function youtubeSection (id, content) {
    return '<div id="' + id + '-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input class="form-control" name="' + id + '-section-youtube" placeholder="YouTube Link* (ex: https://www.youtube.com/watch?v=QcIy9NiNbmo)" id="' + id + '-content" value="'+ content +'">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger pull-right" onclick="removeWrapperId(' + id + ')" id="' + id + '-remove"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

function sourceSection(id, content) {
    content = content || '';

    return '<div id="' + id + '-wrapper" class="post-builder-section">' +
                '<div class="row">' +
                    '<div class="col-sm-10">' +
                        '<input class="form-control" name="' + id + '-section-source" placeholder="Article Source* (ex: http://cnn.com)" id="' + id + '-content" value="'+ content +'">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<div class="btn btn-danger pull-right" onclick="removeWrapperId(' + id + ')" id="' + id + '-remove"><span class="glyphicon glyphicon-trash"></span></div>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

//Set up what to do when the buttons are clicked
buttonAddTextSection.click(addTextSection('',''));
buttonAddImageSection.click(addImageSection('', ''));
buttonAddListNumberSection.click(addListNumberSection('', ''));
buttonAddYoutubeSection.click(addYoutubeSection('', ''));
buttonAddSourceSection.click(addSourceSection('', ''));

function addTextSection(optional_content, content) {
    return function() {
        $(textSection(currentGlobalSectionIndex, optional_content, content)).hide().fadeIn().insertBefore(contentBottom);
        addSection();
        postBuilderHelpText.hide();
    }
}

function addImageSection(optional_content, content) {
    return function(){
        $(imageSection(currentGlobalSectionIndex, optional_content, content)).hide().fadeIn().insertBefore(contentBottom);
        addSection();
        postBuilderHelpText.hide();
    }
}

function addListNumberSection(optional_content, content) {
    return function() {
        $(listNumberSection(currentGlobalSectionIndex, optional_content)).hide().fadeIn().insertBefore(contentBottom);
        addSection();
        postBuilderHelpText.hide();
        currentListItemNumber = currentListItemNumber + 1;
    }
}

function addYoutubeSection(optional_content, content) {
    return function() {
        $(youtubeSection(currentGlobalSectionIndex, content)).hide().fadeIn().insertBefore(contentBottom);
        addSection();
        postBuilderHelpText.hide();
        currentListItemNumber = currentListItemNumber + 1;
    }
}

function addSourceSection(optional_content, content) {
    return function() {
        $(sourceSection(currentGlobalSectionIndex, content)).hide().fadeIn().insertBefore(sourceBottom);
        addSection();
        sourcesHelpText.hide();
    }
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

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})