const fs=require('fs');


const users = require('./book'); 
   
// Defining new user 
let user = { 
    name: "New User", 
    age: 30, 
    language: ["PHP", "Go", "JavaScript"] 
}; 
   
// STEP 2: Adding new data to users object 
if(users){
    console.log(users);
users.push(user);
   
// STEP 3: Writing to a file 
fs.writeFile("book.json", JSON.stringify(users,null,2), err => { 
     
    // Checking for errors 
    if (err) throw err;  
   
    console.log("Done writing"); // Success 

}); 
}
else{
    
    fs.writeFile("book.json", JSON.stringify(user,null,2), err => { 
     
        // Checking for errors 
        if (err) throw err;  
       
        console.log("Done writing"); // Success 
    
    }); 
}