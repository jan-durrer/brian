<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/htmů; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<script>
  function validate(){
    var x=document.getElementById("input");
        var n; // validace
        n = x.value.replace("**","^");
        n = n.replace(":","/");
        n = n.replace(",",".");
        n = n.replace("//","√");
      x.value = n;    
    }
    
  function calc(){
    
    var x = document.getElementById("input");
    var n = x.value; //hodnota inputu 
    document.getElementById("osa").style.display="none"; //skryje osu 
    // error
    var error = new Array(); 
    // -> zero problem 
    var factor = n.replace(/[^/]/g, "").length; //počet / ve stringu
    var zero = n.indexOf("0"); 
    // -> cube problem 
    var cubes = n.replace(/[^^]/g, "").length;
     
    if(factor > 0 && zero >-1 ){ //pokuď ve stringu víc než jedno děleno a jedna nula hledá jestli jí není děleno
      i = 0; 
      while(i < factor){
        var find = n.indexOf("/",i+1);
        if(n.substr(find+1,1) == 0 && n.substr(find+2,1) != "."){  //pokud je za děleno nula a poté nenásleduje . 
          
          var calc = "∞ nebo 1 nebo 0"; //výsledek = 
          error[0] = "Nedělíme nulou";
          break;
        }
        i++;
      }
    

       
    }

    if(error.length == 0){
      var calc = eval(n);
      var show = osa(calc); // číselná osa
    } 
    
      
    
    var node = document.getElementById("basic"); 
    node.innerHTML ="<p>"+ n + " = " + calc + "</p>";  
    document.getElementById("result").style.display="block";   
    
   }        
   
  function osa(calc){ //funkce píšící osu
    var osa = document.getElementById("osa"); 
    document.getElementById("osa").style.display="block";
    var round = Math.round(calc);
    var one = round - 1;
    var three = round + 1;
    
    osa.innerHTML ='<span id="point">•</span><span class="one">'+ one +'</span><span class="two">'+ round +'</span><span class="three">'+ three +'</span>';  
    var decimal = calc%1;
    
    if (calc == round){
      document.getElementById("point").style.margin="14px 0px 0px 196px";
    }else{
      var position = decimal * 162;
      var position = position + 34;   
      document.getElementById("point").style.margin="14px 0px 0px "+ position +"px";
  }
  
}

</script>
<body>

<input type="text" id="input" onkeyup="validate()" class="input"/><button type="submit" name="calc" form="form" class="button" hidefocus="true" onclick="calc()">=</button>

  <div id="result">
    <div id="basic"></div>
    <div id="osa">
    
    </div>
  </div>
  
<iframe width="0" height="0" class="reklama"><endora></iframe>
</body>
</html>