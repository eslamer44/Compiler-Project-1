

$(document).ready(function() {
    let codeEditor = ace.edit("code");
    codeEditor.session.setMode("ace/mode/javascript");
    // start-------------------------

    // end-----------------------------
    $('.ace_text-input').attr('name', 'code');
})
function submitCode(form,itemId)
{
    let codeEditor = ace.edit("code");
    $flag=$(itemId).attr('data-flag');
    if($flag==0)
    {
        form.preventDefault();
        $('.ace_text-input').val(codeEditor.getValue());
        $(itemId).attr('data-flag', '1');
        $(itemId).submit();
    }
}

function fileName()
{
    $("#file-name").text($("#file").val());
}


$("#code-form").submit(function(e){
    $flag=$("#code-form").attr('data-flag');
    if($flag==0)
    {
        return false;
    }
    return true;
});
function scanner()
{
    let codeEditor = ace.edit("code");
    $flag=$("#code-form").attr('data-flag');
    if($flag==0)
    {
        $('.ace_text-input').val(codeEditor.getValue());
        $("#code-form").attr('action', '');
        $("#code-form").attr('data-flag', '1');
        $("#code-form").submit();
    }
}
function parser()
{
    let codeEditor = ace.edit("code");
    $flag=$("#code-form").attr('data-flag');
    if($flag==0)
    {
        $('.ace_text-input').val(codeEditor.getValue());
        $("#code-form").attr('action', 'parser.php');
        $("#code-form").attr('data-flag', '1');
        $("#code-form").submit();
    }
}
