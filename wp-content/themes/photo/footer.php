<?php
/*
 * The template for displaying the footer
 *
 */
?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <?php wp_footer(); ?>
        <script type="text/javascript">

            $(function() {

            var GammaSettings = {
                // order is important!
                viewport : [ {
                    width : 1200,
                    columns : 5
                }, {
                    width : 900,
                    columns : 4
                }, {
                    width : 500,
                    columns : 3
                }, { 
                    width : 320,
                    columns : 2
                }, { 
                    width : 0,
                    columns : 1
                } ]
            };

            Gamma.init( GammaSettings);

            });

        </script>
        <script>
            AOS.init();
        </script>
    </body>
</html>