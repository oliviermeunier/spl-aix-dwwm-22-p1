
const getCoords = new Promise((resolve, reject) => {

    function onSuccess(position)
    {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
    
        resolve({
            lat: lat,
            lng: lng
        });
    }
    
    function onError(error)
    {
        reject(error.message);
    }
    
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }
    else {
        reject('No geolocation on your browser');
    }
});

// getCoords
//     // Si la promesse est résolue (succès), JS appelle la fonction en apramètre du .then()
//     .then(function(coords) {
//         console.log(coords);
//     })
//     // Si la promesse est rejetée (échec), JS appelle la fonction en paramètre du .catch()
//     .catch(function(error) {
//         console.error(error);
//     });

getCoords
    // Si la promesse est résolue (succès), JS appelle la fonction en apramètre du .then()
    .then(coords => console.log(coords))
    // Si la promesse est rejetée (échec), JS appelle la fonction en paramètre du .catch()
    .catch(function(error) {
        console.error(error);
    });