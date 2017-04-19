</div>

<div id="footer-container" class="content">
    <pre id="footer" class="text-center">
    </pre>
    <script>
        $(document).ready(function() {
            if (window.AppUser['role'] == 'admin') {
                $.get('/API/admin.php', function(data) {
                    $('#footer').html(data);
                });
            }
        });
    </script>
</div>
