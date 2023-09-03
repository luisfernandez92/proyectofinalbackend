const api_url = "https://api.ipregistry.co/?key=zmf2z6zs3serktzn";
 
async function getAPI(url) {
    const response = await fetch(url);
   
    var data = await response.json();
    console.log(data);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:
        
        }
    };
    xhttp.open("GET", `http://localhost/album/public_html/pages/insert.php?ip=${data.ip}&currencyCode=${data.currency.code}&countryName=${data.location.country.name}&city=${data.location.city}&lat=${data.location.latitude}&lng=${data.location.longitude}`, true);
    xhttp.send();
}

getAPI(api_url);


