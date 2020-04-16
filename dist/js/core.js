function goToHREF(ele) {
    let href = ele.getAttribute("data-href");
    if(!href)
        href = ele.getAttribute("href");
    if(href)
        window.location.replace(href);
}