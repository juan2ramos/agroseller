var $files = $('.StepImages'),
    $output;

$files.on('change', function () {

    $output = $(this).siblings('.result');

    if(this.files[0].width != this.files[0].height){
        alert("Las dimensión de  la imágen deben ser iguales ");
        return;
    }

    if (this.files[0].size < 2400000) {

        $('.preload').removeClass("hidden");
        uploadImage(this.files[0]);

    } else {
        alert("El tamaño de la imagen debe ser inferior a 2MB");
    }

});

$files.on('dragover', function () {
     $(this).siblings('figure').css({
         'border-style':'solid',
         'background': 'rgba(33, 33, 33, 0.7)'
     });

});
$files.on('dragleave', removeElement);
$files.on('drop', removeElement);
function removeElement() {
    $(this).siblings('figure').css({
        'border-style':'dashed',
        'background': 'white'
    });
}
function uploadImage(file) {

    if (!file.type.match('image'))
        return;
    var reader = new FileReader();

    reader.addEventListener("load", function (event) {
        var picFile = event.target;
        var figure = document.createElement("figure");
        $output.html('');
        figure.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";


        $output.append(figure);

    });
    reader.readAsDataURL(file);

}
function saveImage(file, img) {
    var form = document.querySelector('form');
    var request = new XMLHttpRequest();
    var x;
    //e.preventDefault();
    //multiple files will be in the form parameter
    var formdata = new FormData(form);
    formdata.append('file', file)
    request.open('post', 'submit');//route
    request.send(formdata);
    x = request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var myArr = JSON.parse(request.responseText);
            myFunction(myArr, img, file);
        }
    }

}
function myFunction(arr, img, file) {
    $(function () {

        name = name + arr + ",";
        document.getElementById("form-files").value = name;
        var nombre = "<p class='p-image'>" + arr + "</p>";
        var nombreOculto = "<p class='p-image1'>" + file.name + "</p>";
        $('.preload').addClass('hidden');
        $('.request-image').append("<div class='img-content' ><span class='close-button'><span class='close-line'></span><span class='close-line1'></span></span>" + img + nombreOculto + nombre + "</div>");
    });
}
