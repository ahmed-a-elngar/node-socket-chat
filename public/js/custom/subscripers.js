$().ready(function(){
    loadDepartmentEmployees();
});

$('#subscripers_search').on('keyup', function(){
    if($(this).val().trim().length > 0)
    {
        let subscripers = $('#subscripers .subscriper_container');
        let pattern = $(this).val().trim().toLowerCase();
        for (let index = 0; index < subscripers.length; index++) {
            const subscriper_name = $(subscripers[index]).data('subscriper');
            if(subscriper_name.toLowerCase().search(pattern) > -1)
            {
                $(subscripers[index]).show();
            }
            else{
                $(subscripers[index]).hide();
            }
        }
    }
    else{
        $('#subscripers .subscriper_container').show();
    }
});

$('#new_subscriper').on('click', function(){
    $('#subscripers_form').show();
    $('#subscripers').hide();
});

$('#cancel_adding_subscriper').on('click', function(){
    $('#subscripers_form').hide();
    $('#subscripers').show();
});

$('#add_subscriper').on('click', function(){
    if($('#target_employee').val())
    {
        subscribeEmployee($('#target_employee').val());
    }
});

$('.unsubscripe').on('click', function(){
    x = confirm('Are you sure?');
    console.log(x);
});

$('#subscripers_form #department').on('change', function(){
    loadDepartmentEmployees();
});


function updateEmployees(new_employees)
{
    new_html = '';
    for (let index = 0; index < new_employees.length; index++) {
        new_html += '<option value="'+ new_employees[index]['id'] +'">'+ new_employees[index]['name'] +'</option>';
    }
    $('#target_employee').html(new_html);
}

function showErrors(msg)
{
    new_html = '<div class="alert alert-danger">' + msg + '</div>';
    $('#subscripers_errors').html(new_html);
}
