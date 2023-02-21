document.addEventListener("DOMContentLoaded", function() {//écouteur de chargement de la page
    //récupération des différentes images de coupe servant de bouton
    const cup_1 = document.getElementById("cup_1");
    const cup_2 = document.getElementById("cup_2");
    const cup_3 = document.getElementById("cup_3");
    const cup_4 = document.getElementById("cup_4");
    const cup_5 = document.getElementById("cup_5");
    const cup_6 = document.getElementById("cup_6");
    const cup_7 = document.getElementById("cup_7");
    const cup_8 = document.getElementById("cup_8");
    const cup_9 = document.getElementById("cup_9");
    const cup_10 = document.getElementById("cup_10");
    const cup_11 = document.getElementById("cup_11");
    const cup_12 = document.getElementById("cup_12");
    const cup_13 = document.getElementById("cup_13");
    const cup_14 = document.getElementById("cup_14");
    const cup_15 = document.getElementById("cup_15");
    const cup_16 = document.getElementById("cup_16");
    
    //récupération de chaque ensemble de courses à faire apparaitre/disparaitre
    const tracks_1=document.getElementById("tracks_1");
    tracks_1.style.display='none';
    const tracks_2=document.getElementById("tracks_2");
    tracks_2.style.display='none';
    const tracks_3=document.getElementById("tracks_3");
    tracks_3.style.display='none';
    const tracks_4=document.getElementById("tracks_4");
    tracks_4.style.display='none';
    const tracks_5=document.getElementById("tracks_5");
    tracks_5.style.display='none';
    const tracks_6=document.getElementById("tracks_6");
    tracks_6.style.display='none';
    const tracks_7=document.getElementById("tracks_7");
    tracks_7.style.display='none';
    const tracks_8=document.getElementById("tracks_8");
    tracks_8.style.display='none';
    const tracks_9=document.getElementById("tracks_9");
    tracks_9.style.display='none';
    const tracks_10=document.getElementById("tracks_10");
    tracks_10.style.display='none';
    const tracks_11=document.getElementById("tracks_11");
    tracks_11.style.display='none';
    const tracks_12=document.getElementById("tracks_12");
    tracks_12.style.display='none';
    const tracks_13=document.getElementById("tracks_13");
    tracks_13.style.display='none';
    const tracks_14=document.getElementById("tracks_14");
    tracks_14.style.display='none';
    const tracks_15=document.getElementById("tracks_15");
    tracks_15.style.display='none';
    const tracks_16=document.getElementById("tracks_16");
    tracks_16.style.display='none';

//écouteur click sur chaque coupe pour faire apparaitre/disparaitre chaque ensemble de course en fonction de son display
  cup_1.onclick = function modal(){
    if(tracks_1.style.display != "none"){
      tracks_1.style.display = "none";
    } else {
      tracks_1.style.display = "block";
    };
  };
  cup_2.onclick = function modal(){
    if(tracks_2.style.display != "none"){
      tracks_2.style.display = "none";
    } else {
      tracks_2.style.display = "block";
    };
  };
  cup_3.onclick = function modal(){
    if(tracks_3.style.display != "none"){
      tracks_3.style.display = "none";
    } else {
      tracks_3.style.display = "block";
    };
  };
  cup_4.onclick = function modal(){
    if(tracks_4.style.display != "none"){
      tracks_4.style.display = "none";
    } else {
      tracks_4.style.display = "block";
    };
  };
  cup_5.onclick = function modal(){
    if(tracks_5.style.display != "none"){
      tracks_5.style.display = "none";
    } else {
      tracks_5.style.display = "block";
    };
  };
  cup_6.onclick = function modal(){
    if(tracks_6.style.display != "none"){
      tracks_6.style.display = "none";
    } else {
      tracks_6.style.display = "block";
    };
  };
  cup_7.onclick = function modal(){
    if(tracks_7.style.display != "none"){
      tracks_7.style.display = "none";
    } else {
      tracks_7.style.display = "block";
    };
  };
  cup_8.onclick = function modal(){
    if(tracks_8.style.display != "none"){
      tracks_8.style.display = "none";
    } else {
      tracks_8.style.display = "block";
    };
  };
  cup_9.onclick = function modal(){
    if(tracks_9.style.display != "none"){
      tracks_9.style.display = "none";
    } else {
      tracks_9.style.display = "block";
    };
  };
  cup_10.onclick = function modal(){
    if(tracks_10.style.display != "none"){
      tracks_10.style.display = "none";
    } else {
      tracks_10.style.display = "block";
    };
  };
  cup_11.onclick = function modal(){
    if(tracks_11.style.display != "none"){
      tracks_11.style.display = "none";
    } else {
      tracks_11.style.display = "block";
    };
  };
  cup_12.onclick = function modal(){
    if(tracks_12.style.display != "none"){
      tracks_12.style.display = "none";
    } else {
      tracks_12.style.display = "block";
    };
  };
  cup_13.onclick = function modal(){
    if(tracks_13.style.display != "none"){
      tracks_13.style.display = "none";
    } else {
      tracks_13.style.display = "block";
    };
  };
  cup_14.onclick = function modal(){
    if(tracks_14.style.display != "none"){
      tracks_14.style.display = "none";
    } else {
      tracks_14.style.display = "block";
    };
  };
  cup_15.onclick = function modal(){
    if(tracks_15.style.display != "none"){
      tracks_15.style.display = "none";
    } else {
      tracks_15.style.display = "block";
    };
  };
  cup_16.onclick = function modal(){
    if(tracks_16.style.display != "none"){
      tracks_16.style.display = "none";
    } else {
      tracks_16.style.display = "block";
    };
  };

});