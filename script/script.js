window.addEventListener("scroll", function() {
  if(window.scrollY > 140) {
    document.getElementById("logoMod").style.left='0%';
    document.getElementById("logoLink").style.left='0%';
  } 
  if(window.scrollY < 140){
    document.getElementById("logoMod").style.left='-100%';
    document.getElementById("logoLink").style.left='-100%';
  }
});
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function getId(obj){
    return obj.id;
}

function zPosun(obj) {
    document.getElementById(getId(obj)).style.zIndex = '2';
}

async function zPosunZpet(obj) {
    await sleep(300);
    document.getElementById(getId(obj)).style.zIndex = '0'
}
function zPosun1(obj) {
    document.getElementById(getId(obj)).style.zIndex = '3'
}

async function zPosunZpet1(obj) {
    await sleep(300);
    document.getElementById(getId(obj)).style.zIndex = '1'
}