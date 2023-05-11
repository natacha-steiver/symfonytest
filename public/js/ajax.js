




function logJSONData(e) {
   
   e.preventDefault();

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var offset;
    urlParams.get('offset')?offset=parseInt(urlParams.get('offset')):offset=4;

 
    //console.log(offset);
    if(offset!=4){
      
        offset=4;
        
        document.getElementById("more").setAttribute("href", "http://localhost:8000/trainings");
        window.location="http://localhost:8000/trainings";
       
    
    }else if(offset !=1){
      offset=parseInt(offset)-3;
    
    document.getElementById("more").setAttribute("href", "http://localhost:8000/trainings?limit=limit&offset="+offset);
    window.location="http://localhost:8000/trainings?limit=limit&offset="+offset;
   }
    
    
   
   
  }


  function logJSONData2(e) {
   
    e.preventDefault();
 
     const queryString = window.location.search;
     const urlParams = new URLSearchParams(queryString);
     var offset;
     urlParams.get('offset')?offset=parseInt(urlParams.get('offset')):offset=4;
 
  
     //console.log(offset);
     if(offset!=4){
       
         offset=4;
         
         document.getElementById("more").setAttribute("href", "http://localhost:8000/#more");
         window.location="http://localhost:8000/#more";
        
     
     }else if(offset !=1){
       offset=parseInt(offset)-3;
     
     document.getElementById("more").setAttribute("href", "http://localhost:8000?limit=limit&offset="+offset+"/#more");
     window.location="http://localhost:8000?limit=limit&offset="+offset+"/#more";
    }
     
     
    
    
   }

  window.addEventListener("load", (event) => {
    if(window.location.href.indexOf("trainings") !=-1){
      document.getElementById("more").addEventListener("click",logJSONData,false);
    }else{
      document.getElementById("more").addEventListener("click",logJSONData2,false);
    }

  });
