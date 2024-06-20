//  ------------------------------------------------------------------------------------Sales

function displayNextImageSales() {
  x = x === imagesSales.length - 1 ? 0 : x + 1;
  document.getElementById("imgsales").src = imagesSales[x];
}

function displayPreviousImageSales() {
  x = x <= 0 ? imagesSales.length - 1 : x - 1;
  document.getElementById("imgsales").src = imagesSales[x];
}

function startTimerSales() {
  setInterval(displayNextImageSales, 10000);
}

var imagesSales = [],
  x = 0;
imagesSales[0] = "Assets/img/Camara.jpg";
imagesSales[1] = "Assets/img/Monitor.jpg";
imagesSales[2] = "Assets/img/Teclado.jpg";

// --------------------------------------------------------------------------News

function displayNextImageNews() {
  y = y === imagesNews.length - 1 ? 0 : y + 1;
  document.getElementById("imgnews").src = imagesNews[y];
}

function displayPreviousImageNews() {
  y = y <= 0 ? imagesNews.length - 1 : y - 1;
  document.getElementById("imgnews").src = imagesNews[y];
}

function startTimerNews() {
  setInterval(displayNextImageNews, 10000);
}

var imagesNews = [],
  y = 0;
imagesNews[0] = "Assets/img/Board.jpg";
imagesNews[1] = "Assets/img/Portatil.jpg";
imagesNews[2] = "Assets/img/Speakers.jpg";

// -------------------------------------------------------------------------TopSales
function displayNextImageTop() {
  z = z === imagesTop.length - 1 ? 0 : z + 1;
  document.getElementById("imgtop").src = imagesTop[z];
}

function displayPreviousImageTop() {
  z = z <= 0 ? imagesTop.length - 1 : z - 1;
  document.getElementById("imgtop").src = imagesTop[z];
}

function startTimerTop() {
  setInterval(displayNextImageTop, 10000);
}

var imagesTop = [],
  z = 0;
imagesTop[0] = "Assets/img/TV.jpg";
imagesTop[1] = "Assets/img/Telemovel.jpg";
imagesTop[2] = "Assets/img/Processador.jpg";




/*Login------------------------------------------------------------------------------------------------------------------------------*/
function openNav1() {
  document.getElementById("mySidenav1").style.width = "380px";
}

function closeNav1() {
  document.getElementById("mySidenav1").style.width = "0";
}

function openNav2() {
  document.getElementById("mySidenav2").style.width = "380px";
}

function closeNav2() {
  document.getElementById("mySidenav2").style.width = "0";
}

function openNav3() {
  document.getElementById("mySidenav3").style.width = "380px";
}

function closeNav3() {
  document.getElementById("mySidenav3").style.width = "0";
}

function openNav4() {
  document.getElementById("mySidenav4").style.width = "380px";
}

function closeNav4() {
  document.getElementById("mySidenav4").style.width = "0";
}

function openNav5() {
  document.getElementById("mySidenav5").style.width = "380px";
}

function closeNav5() {
  document.getElementById("mySidenav5").style.width = "0";
}
