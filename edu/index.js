const text = "ĐĂNG NHẬP TRẢI NGHIỆM";
const textElement = document.getElementById("text");

function typeWriter(text, i) {
  if (i < text.length) {
    textElement.innerHTML += text.charAt(i);
    i++;
    setTimeout(function() {
      typeWriter(text, i);
    }, 50);
  }
}

typeWriter(text, 0);
