


const modal = document.querySelector(".modal");
const previews = document.querySelectorAll(".gallery img");
const original = document.querySelector(".full-img");
const caption = document.querySelector(".caption");




previews.forEach((previews) => {
    previews.addEventListener("click", () => {
        modal.classList.add("open");
        original.classList.add("open");
        const originalUrl = new URL(previews.src);
        const originalSize = previews.getAttribute
        ("data-original");
        originalUrl.searchParams.set("w", originalSize);
        original.src = originalUrl.toString();
        caption.textContent = previews.alt;
         });
});

modal.addEventListener("click", (e) => {
    if (e.target.classList.contains("modal")) {
        modal.classList.remove("open");
        original.classList.remove("open");
    }
});

