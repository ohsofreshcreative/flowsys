document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".toc-link");
    const sections = Array.from(links).map(link => {
        const id = link.getAttribute("data-target");
        return document.getElementById(id);
    });

    const activateLink = (id) => {
        links.forEach(link => {
            link.classList.toggle("active", link.getAttribute("data-target") === id);
        });
    };

    const triggerOffset = 300;

    const onScroll = () => {
        let current = sections[0];
        for (const section of sections) {
            const rect = section.getBoundingClientRect();
            const distanceFromBottom = window.innerHeight - rect.top;
            if (distanceFromBottom >= triggerOffset) {
                current = section;
            }
        }
        if (current) {
            activateLink(current.id);
        }
    };

    window.addEventListener("scroll", onScroll);
    onScroll(); // initial trigger
});
