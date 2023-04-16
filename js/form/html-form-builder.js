$(document).ready(function (e) {
    var formBuilderOptions = {
        showActionButtons: false,
        scrollToFieldOnAdd: false,
        sortableControls: true
    };

    var formBuilder = $("#build-wrap").formBuilder(formBuilderOptions);

    $("#preview").click(function (e) {
        e.preventDefault();
        if ($("#build-wrap").is(":visible")) {
            $("#build-wrap").hide();
            $("#build-preview").show();
            $(this).text("Edit");

            $("form", $("#build-preview")).formRender({
                formData: formBuilder.formData
            });
        }
        else {
            $("#build-preview").hide();
            $("#build-wrap").show();
            $(this).text("Preview");
        }
    });

    $("#getHTML").click(function (e) {
        e.preventDefault();

        $markup = $("<div/>");
        $markup.formRender({ formData: formBuilder.actions.getData('json') });

        $("#outDiv").show();

        var opts = {};
        opts.indent_size = 4;
        opts.indent_char = " ";
        opts.eol = "\n";
        opts.indent_level = 0;
        opts.indent_with_tabs = false;
        opts.preserve_newlines = true;
        opts.max_preserve_newlines = 5;
        opts.jslint_happy = false;
        opts.space_after_anon_function = false;
        opts.brace_style = "collapse";
        opts.keep_array_indentation = false;
        opts.keep_function_indentation = false;
        opts.space_before_conditional = true;
        opts.break_chained_methods = false;
        opts.eval_code = false;
        opts.unescape_strings = false;
        opts.wrap_line_length = 0;
        opts.wrap_attributes = "auto";
        opts.wrap_attributes_indent_size = 4;
        opts.end_with_newline = false;

        $("#out").val(html_beautify($markup.formRender("html"), opts));
    });

    $("#getXML").click(function (e) {
        e.preventDefault();
        $("#outDiv").show();
        $("#out").val(vkbeautify.xml(formBuilder.actions.getData('xml'), 4));
    });

    // $("#getJSON").click(function (e) {
    //     e.preventDefault();
    //     $("#outDiv").show();
    //     $("#out").val(vkbeautify.json(formBuilder.actions.getData('json'), 4));
    // });
    // Cusotm getJson 

    $("#getJSON").click(function (e) {
        e.preventDefault();
        $("#outDiv").show();
        elements = $('.frmb').children();
        array = [];
        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
            if(element.type == 'button') {
                var object = {
                    type: 'button',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    textColor: $(element).find('.textColor-wrap .fld-textColor')[0].value,
                    buttonColor: $(element).find('.buttonColor-wrap .fld-buttonColor')[0].value,
                    action1: $(element).find('.action1-wrap .custom-select')[0].value,
                    action2: $(element).find('.action2-wrap .custom-select')[0].value,
                    action3: $(element).find('.action3-wrap .custom-select')[0].value,
                    action4: $(element).find('.action4-wrap .custom-select')[0].value,
                };
                array.push(object);
            }
            else if(element.type == 'checkbox-group') {
                var object = {
                    type: 'checkbox',
                    values: [
                        {
                            label: $(element).find('.option-label')[0].value,
                            selected: $(element).find('.option-selected')[0].value,
                        }
                    ]
                };
                array.push(object);
            }
            else if(element.type == 'header') {
                var object = {
                    type: 'header',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                };
                array.push(object);
            }
            else if(element.type == 'text') {
                var object = {
                    type: 'text',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    prefiled: $(element).find('.input-wrap .fld-preFilled')[0].value,
                };
                array.push(object);
            }
            else if(element.type == 'select') {
                var object = {
                    type: 'dropdown',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    multiple: $(element).find('.input-wrap .fld-multiple')[0].checked,
                    values: []
                };
                subelements = $(element).find('.form-group .sortable-options').children();
                for (let j = 0; j < subelements.length; j++) {
                    object.values.push({
                        label: $(subelements[j]).find('.option-label')[0].value,
                        selected: $(subelements[j]).find('.option-selected')[0].value
                    });
                }
                array.push(object);
            }
        }
        $("#out").val(vkbeautify.json(JSON.stringify(array), 4));
        //$("#out").val(vkbeautify.json(formBuilder.actions.getData('json'), 4));
    });

    $("#clear").click(function (e) {
        e.preventDefault();
        $("#build-preview").hide();
        $("#build-wrap").show();
        $("#preview").text("Preview");
        $("#out").val("");
        formBuilder.actions.clearFields();
    });
});