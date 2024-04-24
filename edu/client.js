document.getElementById("li1").addEventListener("click", function () {
  window.location.href = "client.html";
});

document.getElementById("li2").addEventListener("click", function () {
  window.location.href = "client2.html";
});

document.getElementById("li3").addEventListener("click", function () {
  window.location.href = "client3.html";
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
      data.forEach(function (lop) {
        var row = tableBody.insertRow(-1);
        row.insertCell(0).textContent = lop.class_id;
        row.insertCell(1).textContent = lop.class_title;
      });
    }
  };
  xhttp.open("GET", "get_lop.php", true);
  xhttp.send();
});
