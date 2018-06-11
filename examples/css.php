<h2>CSS Styles for this demo</h2>

<p>This is only for the sake of the demo, you can style your tabs in any way you want with you own CSS.

<xmp>
   <style>
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
</xmp>
