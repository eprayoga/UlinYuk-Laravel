
<script>
    const navElement = document.getElementById("nav");
    function onScroll() {
        if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
        ) {
        navElement.classList.add("onscroll");
        } else {
        navElement.classList.remove("onscroll");
        }
    }
</script>