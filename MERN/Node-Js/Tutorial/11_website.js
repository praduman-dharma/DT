const http = require('http');
const fs = require('fs');

const port = process.env.PORT || 3000;

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('content-type', 'text/html');

    console.log(req.url);

    if (req.url == '/') {
        const data = fs.readFileSync('11_index.html');
        res.end(data.toString());
    } else if (req.url == '/contact') {
        res.end('<h1>This is heading</h1> <p>Hey this is the way to rock the world!</p>');
    } else if (req.url == '/about') {
        res.end('<h1>This is about heading dd</h1> <p>Hey this is the about page content!</p>');
    } else {
        res.statusCode = 404;
        res.end('<h1>404 Not Found</h1> <p>Hey this page was not found on this server</p>');
    }

});

server.listen(port, () => {
    console.log(`Server is listening on port ${port}`);
});
