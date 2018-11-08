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
        let location = landingInfo[i].location;
        console.log(location);

        let boatCount = landingInfo[i].anglerCount;
        console.log(boatCount)
    }
}