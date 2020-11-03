const express = require("express")
const cors = require('cors')
const app = express()
var geoip = require('geoip-lite');

const  port =  process.env.PORT||3000



const corsOptions ={
    origin:'*',
    methods: "GET"
}

app.use(cors(corsOptions))

app.get("/",(req, res)=>{

let IP = req.headers["x-forwarded-for"]

var geo = geoip.lookup(IP);

//console.log("IP ==>  ",IP)

res.send({ip:IP,...geo})

})


app.listen(port,()=>console.log(`Server started on http://localhost:${port}`))