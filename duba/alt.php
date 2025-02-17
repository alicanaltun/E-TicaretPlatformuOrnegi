<footer style="display: inline-block;">
    <script>
        function adjustFooterPosition() {
    var footer = document.querySelector('footer');
    var windowHeight = window.innerHeight;
    var bodyHeight = document.body.scrollHeight;

    if (bodyHeight < windowHeight) {
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
        footer.style.left = '0';
        footer.style.width = '100%';
        footer.style.backgroundColor = '#162836';
        footer.style.height = '65px';
        footer.style.padding = '5px 9%';
        footer.style.alignItems = 'center';
        footer.style.justifyContent = 'space-between';
        footer.style.zIndex = '999';
    }else if (bodyHeight > windowHeight){
        footer.style.position = 'relative';
    }
}

// Sayfa yüklendiğinde veya filtre uygulandığında footer konumunu ayarla
$(document).ready(function() {
    adjustFooterPosition(); // Sayfa yüklendiğinde footer konumunu ayarla
});
    </script>
    <div class="footer-left">
        <span>Destek için: <b>destek@duba.com</b></span>
        <span style="margin-left: 8px;"> Tel No: <b>0288 581 73 92</b></span>
    </div>
    <div class="footer-center">
        <span>© 2024. Tüm hakları saklıdır. Tüm satışlarda KDV dahildir.</span>
    </div>
    <div class="footer-right">
        <img src="images/others/odeme_yontemi.png" alt="">
    </div>
</footer>
</body>

</html>