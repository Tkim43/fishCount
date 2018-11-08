



function getData(){
    $.ajax({
        url: 'http://localhost:8888/fishCount/fish.php',
        dataType: 'json',
        success: function(response){
            console.log(response[0].location)
        }
    })
}


getData();