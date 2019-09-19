<html>

<head>
   <meta charset="utf-8">
   <title>AjaxTabs Demo</title>
   <script src="../node_modules/jquery/dist/jquery.js" type="text/javascript"></script>
   <script src="../lib/jquery.ajaxtabs.js" type="text/javascript"></script>

   <style>
      /* Example Styles for Demo */

      .etabs {
         margin: 0;
         padding: 0;
      }

      .tab {
         display: inline-block;
         zoom: 1;
         *display: inline;
         background: #eee;
         border: solid 1px #999;
         border-bottom: none;
         border-radius: 4px 4px 0 0;
      }

      .tab a {
         font-size: 14px;
         line-height: 2em;
         display: block;
         padding: 0 10px;
         outline: none;
      }

      .tab a:hover {
         text-decoration: underline;
      }

      .tab.tabActive {
         background: #fff;
         padding-top: 6px;
         position: relative;
         top: 1px;
         border-color: #666;
      }

      .tab.tabActive a {
         font-weight: bold;
      }

      .tab-container .panel-container {
         background: #fff;
         border: solid #666 1px;
         padding: 10px;
         border-radius: 0 4px 4px 4px;
      }

      .panel-container {
         margin-bottom: 10px;
      }
   </style>

</head>

<body>

   <h1>AjaxTabs Demo</h1>

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

   <script type="text/javascript">
      $(document).ready(function() {

         $(".etabs .tab a[href='html.php']").data('post', {
            _ajax_nonce: "<?php echo bin2hex(random_bytes(5)); ?>",
            action: "test_ajax",
            toto: 'totoistoto' });

         $('#tab-container').ajaxtabs()
         .bind('ajaxtabs:complete', function(e, $tabLink, $targetPanel) {

            $(document).attr("title", "AjaxTabs Demo | " + $targetPanel.children('h2').text());

         });

   });

   </script>

</body>

</html>