var http = require('http');
var fs=require('fs');
var path=require('path');
var url=require('url');

host ='localhost';
port=3002;


const server=http.createServer((req,res)=>{
  
   
   //  fs.readFile('index.html',function(err,html){
        res.writeHead(200,{'Content-Type':'text/html'});
    //    res.write(html);
        res.end();
     });
   


   /* res.writeHead(200,{'Content-Type':'text/html'});
    res.end();*/
  

server.listen(port, host, () => {
  console.log(`Server running at http://${host}:${port}/`);
  });