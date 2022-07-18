


function printTable(divName)
{
    let body = document.body.innerHTML;
    let head = document.head.innerHTML;
    var divToPrint=document.getElementById(divName);
    $('.noPrint').css("display", "none");
    document.body.innerHTML ="";    
    document.head.innerHTML ="";

    let d = 'table {    font-family: "Poppins", sans-serif; '+
        'font-size: 8px'+
        'width: 100%;   }' +
    'th, td {'+
        'text-align: left;'+
       ' padding: 8px;'+
      '}'+
      'tr:nth-child(even){background-color: #f2f2f2}'+
      'th {'+
       ' background-color: #00bcd4;'+
       ' color: white; }'



   document.write('<html><head><title>Report</title>');
   document.write('<style type = "text/css">');
    document.write(d)
   document.write('</style>');
   document.write('</head>');

   document.write('</head>');
   document.write('<body>');
   document.write(divToPrint.outerHTML);
   document.write('</body>');
   
   document.write('</html>');

   window.print();


    document.body.innerHTML = body;
    document.head.innerHTML = head;
}

