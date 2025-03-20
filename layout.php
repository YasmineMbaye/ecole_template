<?php
    session_start();
    
    
    if(!isset($_SESSION['nom'])){
        header("location:connexion.php");
    }
    ?>

<?php
include("header.php");
include("top_bar.php");
include("left_sidebar.php");
include("right_content.php");
include("footer.php");

?>
<script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>