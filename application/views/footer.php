<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

        </main>

        <footer class="page-footer transparent z-depth-0" style="padding-top: 0; margin-bottom: 20px;">
            <div class="footer-copyright transparent">
                <div class="container center-align grey-text text-lighten-1" style="font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">
                    &copy; <?= date("Y"); ?> Gunadarma University. Designed for SISMUL.
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="<?= site_url('asset/js/materialize.min.js'); ?>"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems);
            });
        </script>
    </body>
</html>