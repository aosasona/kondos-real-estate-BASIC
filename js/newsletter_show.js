function newsletter_show() {
    var w = document.getElementById("newsletter");

    if (w.style.display === "block") {
        w.style.display = "none";
    } else {
        w.style.display = "block";
    }
}