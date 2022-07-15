/* global bootstrap: false */
(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()



  
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = "<br><br>ADMIN UNIQUE KEY: " + printContents + "<br><br><b>DO NOT SHARE THIS SENSITIVE INFORMATION TO ANYONE!</b>";

    window.print();

    document.body.innerHTML = originalContents;
}