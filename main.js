getData();



function getData(){
    $.ajax({
        url: 'http://localhost:8888/fishCount/fish.php',
        dataType: 'json',
        success: function(response){
            displayLandingCounts(response);
            console.log(response)
        }
    })
}


function displayLandingCounts(landingInfo){
    for(let i =0; i < landingInfo.length; i++){
        let startDiv = $('<div>').addClass('col s12 m7 fishHomeInfoStart');
        $('.fishHomePageInformation').append(startDiv);
        let header = $('<h3>').addClass("header");
        $('.fishHomeInfoStart').append(header)
    }
}