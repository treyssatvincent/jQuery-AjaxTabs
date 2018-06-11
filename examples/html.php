<h2>HTML Markup for this demo</h2>

<xmp>
   <div id="tab-container" class='tab-container'>
      <ul class='etabs'>
         <li class='tab'><a href="html.php" data-target="tabs-html">HTML Markup</a></li>
         <li class='tab'><a href="js.php" data-target="tabs-js">Required JS</a></li>
         <li class='tab'><a href="css.php" data-target="tabs-css">Example CSS</a></li>
      </ul>

      <div class='panel-container'>
         <div id="tabs-html"></div>
         <div id="tabs-js"></div>
         <div id="tabs-css"></div>
      </div>

   </div>
</xmp>

<p>The HTML markup for your tabs and content can be arranged however you want. At the minimum, you need a container, a collection of links for your tabs (an unordered list by default), and matching divs for your tabbed content. Make sure the tab <code>data-target</code> attributes match the
<code>id</code> of the target panel.</p>
<p>The class names above are just to make it easy to style. You can make them whatever you want, there's no magic here.</p>

<?php
if ( isset($_POST['_ajax_nonce']) && isset($_POST['action']) && isset($_POST['toto']) ): ?>

<p>This are parameters from the POST request :

   <ul>
      <li>$_POST['_ajax_nonce']) : <?php echo $_POST['_ajax_nonce']; ?></li>
      <li>$_POST['action']) : <?php echo $_POST['action']; ?></li>
      <li>$_POST['toto']) : <?php echo $_POST['toto']; ?></li>
   </ul>

</p>

<?php endif;
