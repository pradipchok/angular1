var express = require('express');
var port = 3000;

var app = express();

app.get('/', (req, res) => {
    res.write('<h1>Hello World</h1>');
});

app.listen(port, function () {
    console.log('Server started on port ' + port);
});