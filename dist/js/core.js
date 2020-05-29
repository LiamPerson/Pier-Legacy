function goToHREF(ele) {
    let href = ele.getAttribute("data-href");
    if(!href)
        href = ele.getAttribute("href");
    if(href)
        window.location.replace(href);
}

function displayMessage(target, message, level=null) {
    if(!level)
        level = "danger";
    $(target).html(message).removeClass().addClass("alert alert-"+level).show();
}

Object.defineProperty(Array.prototype, 'first', {
    value() {
        return this.find(Boolean);
    }
});