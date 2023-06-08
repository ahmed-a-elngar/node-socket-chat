$().ready( function() {
    prepare_form();
    prepare_errors_boxs();
});

$(document).on('click', '#move_on', function(){

    // var auto_click = $(this).attr('auto_click');
    // if(auto_click == 2 || auto_click == 0)
    // {
    //     $('#move_on').attr('auto_click', '1');
    //     disable_next();
    // }
    // else{
        validate_move_on() ? enable_next() : false;
    // }
});

function disable_next()
{
    $('a[href="#next"]').attr('href', '');
}

function prepare_form()
{
    $('#company_name').focus();
    $('a[href="#next"]').attr('id', 'move_on');
    $('a[href="#next"]').attr('auto_click', '0');
    $('a[href="#finish"]').attr('id', 'submit_form');
    disable_next();
}

function enable_next()
{
    $('#move_on').attr('href', '#next');
    $('#move_on').attr('auto_click', '2');
    $('#move_on').trigger('click');

    if(validate_user_form())
    {
        $('#submit_form').parent().css('display', 'inline-block');
    }
}

function get_current_section_id()
{
    return parseInt($('ul[role="tablist"]').children('li[aria-selected="true"]').children('a').attr('id').split('-')[4]);
}

function validate_move_on()
{
    switch (get_current_section_id()) {
        case 0:
            return validate_company_form();
        case 1:
            return validate_user_form();
        default:
            return validate_agreement();
    }
}

function validate_company_form()
{
    var errors = false;

    if(! $('#company_name').val() )
    {   
        input_error('#company_name', 'please, enter company name & must be more than 2 characters');
        errors = true;
    }
    else if($('#company_name').val().length < 2)
    {
        input_error('#company_name', 'company name length must be more than 2 characters');
        errors = true;
    }

    if(! $('#company_email').val() )
    {   
        input_error('#company_email', 'please, enter company email');
        errors = true;
    }
    else if( $('#company_email').val().length < 8 || $('#company_email').val().indexOf('@') < 0  || 
             $('#company_email').val().indexOf('.') < $('#company_email').val().indexOf('@') || 
             $('#company_email').val().indexOf('.') < $('#company_email').val().indexOf('@') + 4 || 
             $('#company_email').val().indexOf('.') + 4 > $('#company_email').val().length )
    {
        input_error('#company_email', 'please, enter valid email');
        errors = true;
    }

    if($('#company_industry').val() < 1)
    {
        input_error('#company_industry', 'please, choose company industry');
        errors = true;
    }

    return !errors;
}

function validate_user_form()
{
    var errors = false;

    if(! $('#user_full_name').val() )
    {   
        input_error('#user_full_name', 'please, enter you full name & must be more than 2 characters');
        errors = true;
    }
    else if($('#user_full_name').val().length < 2)
    {
        input_error('#user_full_name', 'full name length must be more than 2 characters');
        errors = true;
    }

    if(! $('#user_email').val() )
    {   
        input_error('#user_email', 'please, enter your email');
        errors = true;
    }
    else if( $('#user_email').val().length < 8 || $('#user_email').val().indexOf('@') < 0  || 
             $('#user_email').val().indexOf('.') < $('#user_email').val().indexOf('@') || 
             $('#user_email').val().indexOf('.') < $('#user_email').val().indexOf('@') + 4 || 
             $('#user_email').val().indexOf('.') + 4 > $('#user_email').val().length )
    {
        input_error('#user_email', 'please, enter valid email');
        errors = true;
    }

    if(! $('#user_name').val() )
    {   
        input_error('#user_name', 'please, enter user name & must be more than 2 characters');
        errors = true;
    }
    else if($('#user_name').val().length < 3)
    {
        input_error('#user_name', 'user name length must be more than 2 characters');
        errors = true;
    }

    if( $('#user_department').val().length < 0)
    {   
        input_error('#user_department', 'please, Enter user Deparment');
        errors = true;
    }
    else if( $('#user_department').val().length < 8)
    {   
        input_error('#user_department', 'please, user Deparment length must be more than 2 characters');
        errors = true;
    }

    if(! $('#user_password').val())
    {   
        input_error('#user_password', 'please, enter your password');
        errors = true;
    }
    else if($('#user_password').val().length < 8)
    {
        input_error('#user_password', 'user name length must be more than 2 characters');
        errors = true;
    }

    return !errors;
}

function validate_agreement()
{

}

function input_error(selector, message)
{
    $(selector).parent().children('span.error').text(message);
    $(selector).addClass('border-danger');
}

function prepare_errors_boxs()
{
    var inputs = [];
    inputs.push($('input[type="text"]'), $('input[type="email"]'), $('input[type="number"]'), $('select'));
    
    for (let i = 0; i < inputs.length; i++) {
        for (let j = 0; j < inputs[i].length; j++) {
            append_error_box(inputs[i][j]);
        }
    }
}

function append_error_box(target)
{
    span = '<span class="error">' + '</span>';
    $(target).parent().append(span);
}

$(document).on('change', '.border-danger', function(){
    $(this).removeClass('border-danger');
    $(this).parent().children('span.error').text(' ');
});

$(document).on('click', '#submit_form', function(){
    $('#example-form').submit();
});