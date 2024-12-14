function printMyResultArea(){
    var divContent=document.getElementById("myResultArea").innerHTML;
    var a= window.open('','');
    a.document.write('<html><title>Result</title>');
    a.document.write('<body style="font-family:fangsong">');
    a.document.write(divContent);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
