<h2>HTML Markup for these tabs</h2>

<pre>
<code>
&lt;div id="tab-container" class="tab-container"&gt;
&lt;ul class='etabs'&gt;
&lt;li class='tab'&gt;&lt;a href="#tabs1-html"&gt;HTML Markup&lt;/a&gt;&lt;/li&gt;
&lt;li class='tab'&gt;&lt;a href="#tabs1-js"&gt;Required JS&lt;/a&gt;&lt;/li&gt;
&lt;li class='tab'&gt;&lt;a href="#tabs1-css"&gt;Example CSS&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;div id="tabs1-html"&gt;
&lt;h2&gt;HTML Markup for these tabs&lt;/h2&gt;
&lt;!-- content --&gt;
&lt;/div&gt;
&lt;div id="tabs1-js"&gt;
&lt;h2&gt;JS for these tabs&lt;/h2&gt;
&lt;!-- content --&gt;
&lt;/div&gt;
&lt;div id="tabs1-css"&gt;
&lt;h2&gt;CSS Styles for these tabs&lt;/h2&gt;
&lt;!-- content --&gt;
&lt;/div&gt;
&lt;/div&gt;
</code>
</pre>

<p>The HTML markup for your tabs and content can be arranged however you want. At the minimum, you need a container, a collection of links for your tabs (an unordered list by default), and matching divs for your tabbed content. Make sure the tab <code>href</code> attributes match the
<code>id</code> of the target panel. This is standard semantic markup for in-page anchors.</p>
<p>The class names above are just to make it easy to style. You can make them whatever you want, there's no magic here.</p>
