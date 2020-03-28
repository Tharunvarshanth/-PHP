
//const fs=require('fs');



function Book(title,author,isbn){
    this.title=title;
    this.author=author;
    this.isbn  =isbn;
}

function UI(){} 
 
UI.prototype.addbooklist=function(book){ 
   var out;
   const list=document.getElementById('booklist');
   const row = document.createElement('tr');
         out="<td>"  +book.title+"</td>";
         out+= "<td>"+book.author+"</td>";
         out+= "<td>"+book.isbn+"</td>";
         out+= "<td><a href='#' style='text-decoration: none;' class='delete'>X</a></td>";
         row.innerHTML=out;
         list.appendChild(row);
}

UI.prototype.clearfield=function(){
    document.bookform.bn.value='';
    document.bookform.an.value='';
    document.bookform.is.value='';
}

UI.prototype.deletebook=function(target){
      
    if(target.className==='delete'){

        target.parentElement.parentElement.remove();
    }
}
/*
UI.prototype.showalert=function(message,classname){
   var div= document.createElement('div');

   div.classList.add(classname);
   div.appendChild(document.createTextNode(message));
 
     var c=document.getElementsByTagName('h2')[0];
  // const  form=document.getElementById('x');
   c.insertAdjacentElement("beforebegin",div);


   setTimeout(function(){
       document.querySelector('.'+classname).remove();
   },2000);
}
*/
function showalert(message,classname){
    var div= document.createElement('div');

    div.classList.add(classname);
    div.appendChild(document.createTextNode(message));
  
      var c=document.getElementsByTagName('h2')[0];
   // const  form=document.getElementById('x');
    c.insertAdjacentElement("beforebegin",div);
 
 
    setTimeout(function(){
        document.querySelector('.'+classname).remove();
    },2000);
}

class store{

    static getbook(){
        let books;
        if(localStorage.getItem('books')===null){
            books=[];
        }
        else {
          books=JSON.parse(localStorage.getItem('books'));
        }

        return books;
    }
   static save(book){
       const books=Store.getbook();

       books.push(book);

       localStorage.setItem('books',JSON.stringify(books));
    }

    

   static display(){
    }

    static remove(isbn){
        const book=Store.getbook();
              
        book.foreach(function(book,index){
            if(book.isbn===isbn){
                book.splice(index,1);
            }
        })
    }

}
document.getElementById("x").addEventListener('submit',function(e){
    
    title=document.bookform.bn.value;
    author=document.bookform.an.value;
    isbn=document.bookform.is.value;
     
     
    const book=new Book(title,author,isbn);
    const ui  =new UI();
    if(title===''||author===''||isbn==''){
         ui.showalert('fill the fields','error');
    }
    else{
    /*   fs.readFile('book.json',function(err,data){
           if(err) throw err;
          var b={Bookname:title,Author:author,ISBN:isbn};
          obj=JSON.parse(data);
          obj[obj.lenght]=b;

          fs.writeFile('book.json',JSON.stringify(obj,null,2),function(err){
              if(err)  throw err;
          })

       })
      */
      
        
    ui.addbooklist(book);
    ui.clearfield();
   // ui.   
    showalert('Book Added','success');
  //  Store.save(book);
    }

    e.preventDefault();
});

document.getElementById("booklist").addEventListener('click',function(e){
    const ui  =new UI();

    ui.deletebook(e.target);
 
     store.remove(e.target.parentElement.previousElementSibiling.textContent);
      
    e.preventDefault();

})