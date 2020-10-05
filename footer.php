
<!--End Main Site-->
</main>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>-->
<script src="./assets/js/jquery-1.11.2.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Custom Javascript -->
<!--<script src="./index.js"></script>-->

<!-- JQuery Isotope-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
    
$(document).ready(function() {

//this code is associated with the category section of the products-list page
$("#category-form form").css("display", "none");


$("#category").change(function(event){

   let value=  event.target.value;
   $("#category-hidden-input").val(value);


    $("#category-form form").css("display", "none");
    if(value=="brand") $("#category-form #categoryBrand").css("display", "block");
    if(value=="price") $("#category-form #categoryPrice").css("display", "block");
    
})

$("#category-form #categoryPrice input#priceRange").change(function(e){
    let value=  event.target.value;
    $("#category-form #categoryPrice span#maxPriceRange").text(value);
})

/*toggle the ratings: the star icons*/

let ratings= document.getElementsByClassName('1');
let list= ["1", "2", "3", "4", "5"];
/*
list.forEach(function(element){
    document.getElementById(element).addEventListener
})*/

for (let i = 0; i < ratings.length; i++) {
    const element = ratings[i];
    //var elementId= element.getAttribute('id');

    element.addEventListener("click",function(e){
        /*
        let cNameList= [];
        list.foreach(function(element){
            //let index= parseInt(element);
            let cName= document.getElementById(element).className;
            if(cName.includes('far')){
                cNameList.push('far');
            }elseif(cName.includes('fas')){
                cNameList.push('fas');
            }
        })
        let isFound= cNameList.includes('fas');
        if(!isFound){
            //execute the for loop below
        }else{
            //do something else
        }
        */
        for (let index = 0; index < list.length; index++) { 

            //const element = array[i];
           // var targetId= parseInt(e.target.id);
            if(parseInt(list[index]) <= parseInt(e.target.id)){

                //var cName= e.target.className;
                //var cName= document.getElementById(list[index]).className;
                var cName= ratings[index].className;
                if(cName.includes('far')){
                    ratings[index].classList.remove("far");
                    ratings[index].classList.add("fas");
                }else{
                    ratings[index].classList.remove("fas");
                    ratings[index].classList.add("far");
                }
                /*
                if(cName.includes('far')){
                    e.target.classList.remove("far");
                    e.target.classList.add("fas");
                }else{
                    e.target.classList.remove("fas");
                    e.target.classList.add("far");
                }
                */
            }
            
        }

    })
}




//this code is associated with the html file field: whenever a new image is selected by clicking on the file btn display the img on the web page
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

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        responsive : {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })

})
</script>
</body>
</html>