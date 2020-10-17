const express = require('express');
const port = 1337;

const app = express(); 

app.use(express.static(__dirname+"/views/"));

app.get('/', (request, response) =>
{
    response.sendFile(__dirname + '/views/index.html');
});

app.get('/doberman', (request, response) => {
    response.sendFile(__dirname + '/views/dober.html');
});

app.get('/shepsherd', (request, response) => {
    response.sendFile(__dirname + '/views/ovha.html');
});

app.get('/labrador', (request, response) => {
    response.sendFile(__dirname + '/views/labr.html');
});


app.listen(port);