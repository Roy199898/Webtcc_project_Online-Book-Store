function validate() {
    
    var name = document.getElementById("name").value;
    var description = document.getElementById("description").value;

    var price = document.getElementById("price").value;

    var writerName = document.getElementById("writer_name").value;

    console.log(name);


    if (name == "" || description=="" || price=="" || writerName=="" ) {

      if(name==""){
        document.getElementById("name_error").innerHTML="Please enter Name";

      }
      else{
        document.getElementById("name_error").innerHTML="";

      }
      if(description==""){
        document.getElementById("description_error").innerHTML="Please enter description";

      }
      else{
        document.getElementById("description_error").innerHTML="";

      }
      if(price==""){
        document.getElementById("price_error").innerHTML="Please enter price";

      }
      else{
        document.getElementById("price_error").innerHTML="";
      }
      if(writerName==""){
        document.getElementById("writer_error").innerHTML="Please enter writer name";

      }  
      else{
        document.getElementById("writer_error").innerHTML="";

      }
      return false;
    }

    return true;
    
  }
