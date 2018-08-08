
var mydate=new Date();
var year=mydate.getYear();   
if (year < 1000) year+=1900;
var day=mydate.getDay();
var month=mydate.getMonth()+1;
var daym=mydate.getDate(); 
if (daym<10) daym="0"+daym;
var dayarray=new Array("Sun","Mon","Tue","Web","Thu","Fri","Sat"); 
document.write(""+dayarray[day]+", "+ month + "-"+ daym + "-"+year+"");
