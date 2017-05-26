function clickAndDisable(link) {
     // disable subsequent clicks
     link.onclick = function(event) {
        event.preventDefault();
     }
   }

var hasClicked = false;
$('#Submitbutton').on('click',function(e) {
    if (hasClicked === true) {
        //submit form here
        e.preventDefault();
        $(this).attr("disabled", true);
    } else {
        //e.preventDefault();
        hasClicked = true;
    }
});

$( "form input,select" ).on('change keyup paste',function(e) {
    hasClicked = false;
    $('#Submitbutton').attr("disabled", false);
});

$('#SubmitLink').bind('click', function(e){
        if (hasClicked === true) {
        //submit form here
        e.preventDefault();
        return;
    } else {
        //e.preventDefault();
        hasClicked = true;
        document.getElementById('logout-form').submit();
    }
})