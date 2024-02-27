
<div class="footer">
                <p>Copyright &copy; 2023 - Mucle Mento</p>
</div>

<script>
// Captura todos os elementos de submenu
var submenus = document.querySelectorAll('.submenu');

submenus.forEach(function(submenu) {
    submenu.addEventListener('click', function(event) {
        event.stopPropagation();
        this.classList.toggle('active'); // Adicione ou remova a classe 'active'
    });
});

window.addEventListener('click', function(event) {
    submenus.forEach(function(submenu) {
        submenu.classList.remove('active'); // Remova a classe 'active' de todos os submenus
    });
});

</script>
</body>

</html>