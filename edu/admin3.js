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
        data.forEach(function (diem) {
          var row = tableBody.insertRow(-1);
          row.insertCell(0).textContent = diem.MaNhapDiem;
          row.insertCell(1).textContent = diem.MaSinhVien;
          row.insertCell(2).textContent = diem.MaMonHoc;
          row.insertCell(3).textContent = diem.Diem;
        });
      }
    };
    xhttp.open("GET", "get_diem.php", true);
    xhttp.send();
  });
  
  
  