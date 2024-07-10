

const viewBtn = document.querySelector(".view-modal"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    input = popup.querySelector("input"),
    copy = popup.querySelector("button"),
    field = input.parentElement;

viewBtn.onclick = () => popup.classList.toggle("show");
close.onclick = () => viewBtn.click();

