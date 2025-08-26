var preload = document.getElementById("preload")
window.addEventListener("load", function(){
preload.style.opacity = "0";
const sr = ScrollReveal ({
    distance: '65px',
    duration: 500,
    delay: 600,
    reset: true 
});
sr.reveal(".left",{delay: 700, origin: 'left'});
sr.reveal(".right",{delay: 900, origin: 'right'});
sr.reveal(".one",{delay: 1000, origin: 'bottom'});
sr.reveal(".two",{delay: 1100, origin: 'bottom'});
sr.reveal(".three",{delay: 1200, origin: 'bottom'});
sr.reveal(".four",{delay: 1300, origin: 'bottom'});
sr.reveal(".five",{delay: 1400, origin: 'bottom'});
sr.reveal(".background-content",{delay: 1500, origin: 'bottom'});
sr.reveal(".logo",{delay: 1600, origin: 'right'});
sr.reveal(".last",{delay: 1700, origin: 'left'});
setTimeout(lone, 1000);
function lone(){
    preload.style.display = "none";
}
}
);
function mine(){
    const five = document.getElementById("five");
    five.style.transition = "ease-in-out 0.5s";
    console.log('berhasil');
};
setTimeout(mine, 2000);

function setelahSubmit(){
    var button = document.getElementById("btn");
    var body = document.body;
    button.style.color = "var(--primary-color)";
    button.style.background = "white";
    button.style.cursor = "progress";
    body.style.cursor = "progress"; 
}
