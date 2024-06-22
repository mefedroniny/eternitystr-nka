window.addEventListener("scroll", async function() {
  if(window.scrollY > 140) {
    document.getElementById("logoMod").style.opacity='100%';
  } 
  if(window.scrollY < 140){
    document.getElementById("logoMod").style.opacity='0%';
  }
});