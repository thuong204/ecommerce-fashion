const dropdownItems = document.querySelectorAll(".dropdown");

dropdownItems.forEach(item => {
    item.addEventListener("click", (event) => {
        event.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
        dropdownItems.forEach(item => item.classList.remove("open"));
        item.classList.add("open");
    });
});

document.addEventListener("click", () => {
    dropdownItems.forEach(item => item.classList.remove("open"));
});