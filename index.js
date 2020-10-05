
$(document).ready(function() {

    $('#imageFile').change(function (event) {
        const imageFile = $('#imageFile').val();

        if (imageFile == '') {
            return false;
        } else {

            const extension = imageFile.split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['jpg', 'png', 'jpeg']) == -1) {

                //set file field to empty
                $('#imageFile').val(' ');
                return false;
            } else {

                const imageUrl = URL.createObjectURL(event.target.files[0]);
                //alert(imageUrl);
                //set image field src attribute to file field value
                $('#image').attr('src', imageUrl);
            }
        }

    });

    
    $("#category").change(function(event){
        let value= "hello";
        //alert("hello");
    })

})