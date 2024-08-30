/*
function findCords() {
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition((position) => {
      fetch(
        "http://api.weatherapi.com/v1/forecast.json?key=ffaab1f3839c463f8cb70716231806&q=London&days=1&aqi=no&alerts=no"
      )
      .then((response)=>response.json())
      .then((data) => {
        console.log(data);
        const sunrise = `${city.sunrise.getHours()}:${city.sunrise.getMinutes()}`
        const city = {
          "name": data.name,
          "descriptoin":  data['weather'][0]['description'],
          "temperature":  data['main']['temp'],
          "wind":  data['wind']['speed'],
          "country":  data['sys']['country'],
          "humidity":  data['main']['humidity'],
          "timezone":  data['timezone'],
          "sunrise":  new Date(data['sys']['sunrise']*1000),
          "sunset":  new Date(data['sys']['sunset']*1000),
          "pressure": data['main']['pressure']
        };
        
        console.log(city)
        // console.log(`${city.sunrise.getHours()}:${city.sunrise.getMinutes()}`)
        fetch("../index.php",{
          "method": "POST",
          "headers": {
            "Content-Type": "applicaiton/json; charset=utf-8"
          },
          "body": JSON.stringify(city)
        })
        .then((response) => response.json())
        .then((data) => {console.log(data);
          console.log("data")})
        .catch((error) => {
          error
          // console.error('Error:', error);
        });
      });

    },
    (err) => { 
      alert(err.message)
    })
  } else {
    alert("Geolocation is not supported by your browser")
  }
}

findCords();
*/