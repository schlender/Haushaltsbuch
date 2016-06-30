/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function stopDefaultEvents(evt) {
    evt.preventDefault();
    evt.stopImmediatePropagation();
}

/* copy objects */
function copyObject(obj) {
    var copy;
    if (obj === null || typeof obj !== "object") {
        return obj;
    }
    copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) {
            copy[attr] = obj[attr];
        }
    }
    return copy;
}


function addAjaxSubmit(form_id, submitURL) {
    var submitBtn;
    submitBtn = $('#' + form_id + ' input[type=submit]');

    submitBtn.on("click", function (evt) {
        stopDefaultEvents(evt);

        $.ajax({
            method: 'post',
            url: submitURL + '?inputType=cost',
            data: $('#' + form_id).serialize(),
            success: function (response, status, jqXHR) {
                var errorList = $('#insertErrorArea #errorList');
                var successList = $('#insertErrorArea #successList');
                // check if response contains 'ERROR:...'
                if ( response.indexOf("ERROR:") === 0 ) {
                    successList.hide();
                    errorList.html("<li>" + response + "</li>").show();
                } else {
                    // otherwise all inserts are correct
                    errorList.hide();
                    successList.show().delay(5000).slideUp("slow");
                    $('#' + form_id + ' input[type=reset]').click();
                    submitBtn.hide();
                };
            }
        });
    });
}

function checkInputCategories(form_id) {
    var refinements, defaults, submitBtn;

    refinements = $('#' + form_id + ' input[data-refinement=1]:checked');
    defaults = $('#' + form_id + ' input[data-refinement=0]:checked');
    submitBtn = $('#' + form_id + ' input[type=submit]');

    if (defaults.length > 0 || refinements.length > 1) {
        submitBtn.show();
    } else {
        submitBtn.hide();
    }
}