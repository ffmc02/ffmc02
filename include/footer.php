<!--début du footer-->
<footer>
    <div class="fondPartenaire2 container-fluid">
            <div class="row">
            <div class=" col-sm-12 col-md-12   text-center border border-white">
                <span class="signaturePartenaire texte-copyright">ffmc02 by gaetan jonard coordinateur de la ffmc 02 © <a href="#" >conception</a></span>
                <span><a class="signaturePartenaire texte-contact" href="contactus">Nous Contacter</a></span>
            </div>
        </div>
    </div>
</footer>
<!-- incorporer au besoin le javas script ou la bibiotheque jquery -->

<script src="../assets/librairie/js/jquery-3.3.0.min.js"></script>
<script src="../assets/librairie/js/bootstrap.min.js"></script>

<script src="../assets/js/script.js" type="text/javascript"></script>
<script>
   $(function () {

    $(".small").click(function () {
        var SourcePetiteImage = $(this).attr('src');
//        var SourceGrandeImage = SourcePetiteImage.replace("apuce/", "apuce/");
        $(".big").html("<img src='" + SourcePetiteImage + "'>");
        $(".big").fadeIn("slow").css("display", "flex");
    });
 $(".smalarticle").click(function () {
        var SourcePetiteImage = $(this).attr('src');
//        var SourceGrandeImage = SourcePetiteImage.replace("apuce/", "apuce/");
        $(".big").html("<img src='" + SourcePetiteImage + "'>");
        $(".big").fadeIn("slow").css("display", "flex");
    });
    $(".big").click(function () {
        $(".big").fadeOut("fast");
    });

});
</script>
</body>
</html>
