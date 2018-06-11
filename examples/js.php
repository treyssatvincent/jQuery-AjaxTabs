<h2>JS for this demo</h2>

<xmp>
   <script type="text/javascript">
      $(document).ready(function() {

         $(".etabs .tab a[href='html.php']").data('post', {
            _ajax_nonce: Math.random().toString(36).substring(7),
            action: "test_ajax",
            toto: 'totoistoto' });

         $('#tab-container').ajaxtabs();
      });
   </script>
</xmp>
