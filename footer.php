                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $('.numeric').keyup(function() {
            $(this).val(this.value.replace(/\D/g, ''));
        });
        function functionDelete() {
            var r = confirm("Deseja excluir o regitro?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
        function functionCancel() {
            var r = confirm("Deseja cancelar o registro?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
        </script>
    </body>
</html>
<?php if(isset($link)){ mysqli_close($link); }  ?>