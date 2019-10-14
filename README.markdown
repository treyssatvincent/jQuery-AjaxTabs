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

You need a container, a list of links to pages for your tabs, and matching divs for your tabbed content.

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
|method           | Method used for requests (e.g. "POST", "GET", "PUT")            | String (`POST`)                                 |
|animate          | Makes content panels fade out and in when a new tab is clicked. | Boolean (`true`)                                |
|animationSpeed   | Controls the speed of the fading effect if `animate: true`.     | Integer in milliseconds (`200`)                 |
|panelActiveClass | Adds specified class to the currently-selected content panel    | Any string valid as HTML class (`panelActive`)  |
|tabActiveClass   | Adds specified class to the currently-selected tab              | Any string valid as HTML class (`tabActive`)    |
|tabs             | jQuery selector for the tabs, relative to the container element | Any jquery selector (`> ul > li`)               |
|cache            | Reuse the first response retrieved with ajax                    | Boolean (`true`)                                |

Missing options from EasyTabs to be added later (transitionIn* and transitionOut* will be merged):

- defaultTab
- updateHash
- transition
- transitionEasing


### Hooks

| Option               | Description                                                     | Returned values                                |
|---|---|---|
|ajaxtabs:before       | Fires before a tab is selected.                                 | $tabLink, $targetPanel, settings               |
|ajaxtabs:midTransition| Fires after the previous panel has been hidden, but before the next is shown. | $tabLink, $targetPanel, settings |
|ajaxtabs:beforeSend   | Fires before a request is done, only if a request is done.      | $tabLink, $targetPanel, data, settings   |
|ajaxtabs:complete     | Fires when the request is complete (or immediately if cached)   | $tabLink, $targetPanel, result, settings         |
|ajaxtabs:after        | Fires after a tab has been selected                             | $tabLink, $targetPanel, settings               |

- $tabLink : jQuery object of the clicked link.
- $targetPanel : Targeted panel.
- settings : Settings used in the transition.
- data : Data send along the request.
- result : data returned by the request, `null` if cached.

**Example of usage** :

```
$('#tab-container').ajaxtabs({method: 'GET'})
```

```
$('#tab-container').ajaxtabs()
.bind('ajaxtabs:complete', function(e, $tabLink, $targetPanel) {

   $(document).attr("title", "AjaxTabs Demo | " + $targetPanel.children('h2').text());

});
```

### Pass parameters
To include parameters along an AJAX request you need to use a `data-tab` on the link. You can add it with simple HTML attribute :

You can of course add it in any way you want, for example with jQuery and PHP :
```
$(".etabs .tab a[href='html.php']").data('tab', {
   random: Math.random().toString(36).substring(7),
   foo: "bar",
   fruit: "<?php echo $fruit ?>"
});
```

## Credits
* Based on [jQuery EasyTabs](https://os.alfajango.com/easytabs/)
* Originally forked at the company [WeLikeStartup](https://app.welikestartup.io/)
* Licensed under the [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl.html).
