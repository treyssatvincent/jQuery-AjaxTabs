# JQuery AjaxTabs Plugin

AjaxTabs creates tabs... with AJAX.

Unlike jQuery UI tabs, it handles only the functionality of the tabs and leave the styling and layout up to you. Unlike EasyTabs it only handle tabs with AJAX request, but it allow you to add parameters to your requests.

## What AjaxTabs Does:

* Creates tabs from an unordered list, which link to divs on the page
* Allows complete customization of appearance, layout, and style via CSS
* Tabs are bookmarkable and SEO-friendly
* Pass custom parameters along your ajax requests

## What AjaxTabs Does NOT Do:

* Style your tabs in any way (though sensible CSS defaults can be found
  in the demos)
* Supports forward- and back-button in browsers
* Cycling tabs at a specified interval


## Use
### Minimum requirements
#### HTML

You need a container, a list of links to PHP pages<sup>1</sup> for your tabs, and matching divs for your tabbed content.

```
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
```

This will fill the matching divs inside `.panel-container` with the response of the `html.php`, `js.php` and `css.php`.

Notes :
- You can include your tabs links anywhere within the container with the tabs option. Default is inside a list item (`li`) inside an unordered list (`ul`).
- <sup>1</sup> This is needed to avoid error 405 on POST requests.

#### Javascript
Obviously you need jQuery and AjaxTabs, and you need to init AjaxTabs with your container.

```
<script src="../vendor/jquery-3.3.1.js" type="text/javascript"></script>
<script src="../lib/jquery.ajaxtabs.js" type="text/javascript"></script>

<script type="text/javascript">

   $(document).ready(function() {
      $('#tab-container').ajaxtabs();
   });

</script>
```

### Options
| Option          | Description                                                     | Values (`default`)                              |
|---|---|---|
|animate          | Makes content panels fade out and in when a new tab is clicked. | Boolean (`true`)                                |
|panelActiveClass | Adds specified class to the currently-selected content panel    | Any string valid as HTML class (`panelActive`)  |
|tabActiveClass   | Adds specified class to the currently-selected tab              | Any string valid as HTML class (`tabActive`)    |
|tabs             | jQuery selector for the tabs, relative to the container element | Any jquery selector (`> ul > li`)               |
|cache            | Reuse the first response retrieved with ajax                    | Boolean (`true`)                                |

Missing options from EasyTabs to be added later :

- defaultTab
- updateHash
- transitionIn
- transitionOut
- transitionInEasing
- transitionOutEasing
- transitionCollapse
- transitionUncollapse
- transitionCollapseEasing
- transitionUncollapseEasing


### Pass parameters
To include parameters along an AJAX request you need to use a `data-post` on the link. You can add it with simple HTML attribute :

```
<ul class='etabs'>
   <li class='tab'><a href="html.php" data-target="tabs-html" data-post="{ foo: 'bar', fruit: 'banana'}">HTML Markup</a></li>
   <li class='tab'><a href="js.php" data-target="tabs-js">Required JS</a></li>
   <li class='tab'><a href="css.php" data-target="tabs-css">Example CSS</a></li>
</ul>
```

You can of course add it in any way you want, for example with jQuery and PHP :
```
$(".etabs .tab a[href='html.php']").data('post', {
   random: Math.random().toString(36).substring(7),
   foo: "bar",
   fruit: "<?php echo $fruit ?>"
});
```

## Info
* Based on [jQuery EasyTabs](https://os.alfajango.com/easytabs/)
* Author: [Nino Treyssat-Vincent](https://nino.treyssatvincent.fr)
* Company: [WeLikeStartup](https://app.welikestartup.io/)
* License: Licensed under the [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl.html).
