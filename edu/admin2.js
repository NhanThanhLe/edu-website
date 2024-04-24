document.getElementById("li1").addEventListener("click", function(){
    window.location.href = "admin.html";
  });
  
  document.getElementById("li2").addEventListener("click", function(){
    window.location.href = "admin2.html";
  });
  
  document.getElementById("li3").addEventListener("click", function(){
    window.location.href = "admin3.html";
  });
  
  document.addEventListener("DOMContentLoaded", function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4) {
        var data = JSON.parse(this.responseText);
        var tableBody = document.querySelector("#lop-table tbody");
        while (tableBody.firstChild) {
          tableBody.removeChild(tableBody.firstChild);
        }
        data.forEach(function (lich) {
          var row = tableBody.insertRow(-1);
          row.insertCell(0).textContent = lich.MaLichThi;
          row.insertCell(1).textContent = lich.MaMonHoc;
          row.insertCell(2).textContent = lich.ThoiGian;
          row.insertCell(3).textContent = lich.DiaDiem;
        });
      }
    };
    xhttp.open("GET", "get_lich.php", true);
    xhttp.send();
  });
  
  
  