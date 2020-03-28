
function Book(title,author,isbn){
    this.bookname=title;
    this.author=author;
    this.isbn=isbn;
}

function UI(){}

UI.prototype.addBookToList =function(book){
    
    const list=document.getElementById('booklist');
    const row=document.createElement('tr');      
     var out;
     out='<td>'+book.bookname+'</td>';
      out+='<td>'+book.author+'</td>';
      out+='<td>'+book.isbn+'</td>';
      out+='<td><a href=""> X</a></td>';                   
        row.innerHTML=out;
    list.appendChild(row);
}

  UI.prototype.clearfield=function(){
      document.bookform.bn.value='';
      document.bookform.an.value='';
      document.bookform.is.value='';
  }

  UI.prototype.showalert=function(message,className){
       const div=document.createElement('div');
        
       div.className='alert'+className;
        
       div.appendChild(document.createTextNode(message));
       const container=document.querySelector('.container');

       const form=document.querySelector('bookform');
       container.insertBefore(div,form);

       setTimeout(function(){
         document.querySelector('.alert')
         .remove();         
       },3000);
  }

  UI.prototype.deletebooklist=function(target){
        
       if(target.className==='delete'){
           target.parentElement.parentElement.remove();
       }
  }

document.getElementById("x").addEventListener('submit',function(e){
    
        title=document.bookform.bn.value;
         author=document.bookform.an.value;
         isbn=document.bookform.is.value;

        const book=new Book(title,author,isbn);

        const ui=new UI();

       if(title==='' ||author==='' ||isbn===''){
         ui.showalert('please fill the fiels','error');
       }
       else{
        ui.addBookToList(book);
        
        ui.clearfield();
       }

        
   e.preventDefault();
});

document.getElementById('booklist').addEventListener('click',function(e){

    
    
     ui.deletebooklist(e.target)

    e.preventDefault();
});