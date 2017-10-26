function makeRequest() {

    var cupcakeType = $('#cupcakeType').val();
    $.get({
        url: "phpObjectsForAJAX.php",
        success: function (results) {
            console.log(results);
            $('#description').html = results.description;
            $('#price').html = results.price;
            $('#image').html = "<img src='" + results.image + "'/>";
        },
    });
}
