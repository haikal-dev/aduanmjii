function searchIssue(id){
    window.location = "/admin/issue/id/" + id.value;
}

function submitSolution(form){
    form.btnSubmit.value = "Submitting...";
    form.btnSubmit.disabled = true;

    $.ajax({
        type: 'POST',
        url: '/admin/issue/id/' + form.id.value + '?pid=submit',
        data: {
            solution: form.solution.value
        },
        success: function(data){
            if(data == 'ok'){
                $('#message').removeClass();
                $('#message').html("Solution has been updated successfully!");
                $('#message').addClass("alert alert-success");
                $('#message').fadeIn();

                setTimeout(function(){
                    $('#message').fadeOut();
                    form.btnSubmit.value = "Submit Solution";
                    form.btnSubmit.disabled = false;
                }, 3000);
            } else {
                $('#message').removeClass();
                $('#message').html(data);
                $('#message').addClass("alert alert-danger");
                $('#message').fadeIn();

                setTimeout(function(){
                    $('#message').fadeOut();
                    form.btnSubmit.value = "Submit Solution";
                    form.btnSubmit.disabled = false;
                }, 3000);
            }
        }
    });

    return false;
}

function deleteIssue(id){
    var c = confirm("Are you sure want to delete this issue?");
    if(c){
        window.location = "/admin/issue/id/" + id + "?pid=delete";
    }
}