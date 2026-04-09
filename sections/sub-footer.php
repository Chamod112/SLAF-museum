<script>
    const topBtn = document.getElementById("scrollTop");
    window.addEventListener("scroll", () => {
        topBtn.classList.toggle("visible", window.scrollY > 200);
    });

    function toggleDetails(btn) {
        const details = btn.nextElementSibling;
        details.classList.toggle("show");
        btn.classList.toggle("active", details.classList.contains("show"));
        btn.textContent = details.classList.contains("show") ?
            "Hide Details" :
            "View Prices";
    }
</script>