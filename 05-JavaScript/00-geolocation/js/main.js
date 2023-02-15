
// FONCTIONS
function onSuccess(position)
{
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;

    console.log(lat, lng);
}

function onError(error)
{
    console.error(error.message);
}

// CODE PRINCIPAL
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(onSuccess, onError);
}
else {
    console.error('No geolocation on your browser');
}
