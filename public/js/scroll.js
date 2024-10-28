window.addEventListener("scroll", handleScroll);

var content = document.querySelector(".contentBox");
function handleScroll() {
    var winScroll =
        document.body.scrollTop || document.documentElement.scrollTop;
    var height = content.scrollHeight - content.clientHeight;
    var scrolled = (winScroll / content.clientHeight) * 100;
    console.log(height);
    document.querySelector(".progressBar").style.width = scrolled + "%";
}
