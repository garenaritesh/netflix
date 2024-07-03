// Javascript





// The Script of Menu Sidebar Active On Webpage
const Menu = document.getElementById("menu");
const ClsMenu = document.getElementById("cls-menu");
const Sidebar = document.getElementById('left-sidebar');

Menu.addEventListener("click", () => {
    Sidebar.style.transform = "translate(0% , 0%)";
    Menu.style.display = "none";
    ClsMenu.style.display = "block";
})

ClsMenu.addEventListener("click", () => {
    Sidebar.style.transform = "translate(-500% , 0%)";
    Menu.style.display = "block";
    ClsMenu.style.display = "none";
})