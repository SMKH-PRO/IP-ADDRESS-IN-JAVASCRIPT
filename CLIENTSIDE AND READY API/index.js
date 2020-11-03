let URL = 'https://ipinfo.io/json'

fetch(URL).then((response)=>response.json()).then(JSON=>{


    console.log("RESPNSE ==>> ",JSON)


  let IP = JSON.ip 
  let city = JSON.city 
  let country = JSON.country
  let region = JSON.region

  document.getElementById("IP").innerText = IP
  document.getElementById("city").innerText = city
  document.getElementById("country").innerText = country
  document.getElementById("region").innerText = region


})


// {
//     "ip": "43.229.166.0",
//     "city": "Karachi",
//     "region": "Sindh",
//     "country": "PK",
//     "loc": "24.8608,67.0104",
//     "org": "AS58895 Ebone Network (PVT.) Limited",
//     "postal": "59201",
//     "timezone": "Asia/Karachi",
//     "readme": "https://ipinfo.io/missingauth"
//   }