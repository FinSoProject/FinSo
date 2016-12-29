$("#button").click(function(e) {
    //this prevents that the form is submitted
    e.preventDefault(); 

    if(confirm('are you sure ?')) {
         alert('clicked ok');
        //do what you want here
    } else {
         alert('clicked cancel');
        //do what you want here
    }
});