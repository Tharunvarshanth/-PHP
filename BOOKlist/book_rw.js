const fs=require('fs');




fs.readFile('book.json',function(err,data){
     
    let user = { 
        name: "New User", 
        age: 30, 
        language: ["PHP", "Go", "JavaScript"] 
    }; 

if(data){
       
  var  myobj=JSON.parse(data);
        myobj[myobj.length]=user;
    fs.writeFile('book.json',JSON.stringify(myobj,null,2),function(err){
        if(err){
            console.log(err);
        }
    })    

}
else {
    fs.writeFile('book.json',JSON.stringify(user,null,2),function(err){
        if(err){
            console.log(err);
        }
    })    

}


});