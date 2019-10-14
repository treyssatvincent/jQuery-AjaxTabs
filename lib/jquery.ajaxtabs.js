'use strict';

( function($) {

  $.ajaxtabs = function(container, options) {

        // Attach to plugin anything that should be available via
        // the $container.data('ajaxtabs') object
    var plugin = this,
        $container = $(container),

        defaults = {
          method: 'POST',
          animate: true,
          panelActiveClass: "panelActive",
          tabActiveClass: "tabActive",
          // defaultTab: "li:first-child",
          animationSpeed: 200,
          tabs: "> ul > li",
          // updateHash: true,
          // transition: 'fadeOut',
          // transitionEasing: 'swing',
          cache: true
        },

        // Shorthand variable so that we don't need to call
        // plugin.settings throughout the plugin code
        settings;

    // =============================================================
    // Functions available via ajaxtabs object
    // =============================================================

    plugin.init = function() {

      plugin.settings = settings = $.extend({}, defaults, options);

      $('a.anchor').remove().prependTo('body');

      // Store ajaxtabs object on container so we can easily set
      // properties throughout
      $container.data('ajaxtabs', {});

      // plugin.setTransitions();

      // Get the tabs in plugin.panels
      plugin.getTabs();

      // Start listening on the clicks
      bindToTabClicks();

      // Click on the default tab
      setDefaultTab();

    };

    // Find and instantiate tabs and panels.
    // Could be used to reset tab and panel collection if markup is
    // modified.
    plugin.getTabs = function() {
      var $matchingPanel;

      // Find the initial set of elements matching the setting.tabs
      // CSS selector within the container
      plugin.tabs = $container.find(settings.tabs);

      // Instantiate panels as empty jquery object
      plugin.panels = $();

      plugin.tabs.each(function(){

        var $tab = $(this),

            targetId = $tab.children('a').data('target');

            $matchingPanel = $("#" + targetId);

        // If tab has a matching panel, add it to panels
        if ( $matchingPanel.length ) {

          // Don't hide panel if it's active (allows `getTabs` to be called manually to re-instantiate tab collection)
          $matchingPanel.not(settings.panelActiveClass).hide();

          // Add the panels to plugin.panels
          plugin.panels = plugin.panels.add($matchingPanel);

        // Otherwise, remove tab from tabs collection
        } else {
          plugin.tabs = plugin.tabs.not($tab);
        }
      });
    };

    // =============================================================
    // Private functions
    // =============================================================

    // Set the default tab, whether from hash (bookmarked) or option,
    // called by init
    var setDefaultTab = function() {
      var hash = $(location).attr('hash');
      var $selectedPanel = $( hash );

      // If hash don't matches one of the tabs, make the default tab the first one
      if( $selectedPanel.length !== 1 ){

         hash = "#" + $(plugin.tabs).eq(0).children('a').data('target');

      }

      var $defaultTabLink = $(plugin.tabs).children('a[data-target="' +  hash.replace('#','') + '"]');

      // Fire the click event on the default tab
      $defaultTabLink.click();
    };

    // Bind tab-select funtionality to namespaced click event, called by
    // init
    var bindToTabClicks = function() {

      plugin.tabs.each(function( key, value ) {

         var $tabLink = $(value).children('a');

          // Get the parameters used in the tab request
         var data = $tabLink.data('tab');

          // Select the panel for the clicked tab
         var targetId = "#" + $tabLink.data('target');

         $tabLink.click(function(e) {

            var this2 = this;

            $container.trigger('ajaxtabs:before', [$tabLink, $(targetId), settings]);

            // Remove the Active Classes
            plugin.tabs.removeClass(settings.tabActiveClass);
            plugin.panels.removeClass(settings.panelActiveClass);

            // Hide all the panels
            plugin.panels.hide();

            // Empty the panel if we don't want cache
            if (!settings.cache) {
               $(targetId).empty();
            }

            $container.trigger('ajaxtabs:midTransition', [$tabLink, $(targetId), settings]);

            // Do a request only if the panel wasn't filled before
            if ( $(targetId).is(':empty') ){

               // We fire the beforeSend event only if we do a request
               $container.trigger('ajaxtabs:beforeSend', [$tabLink, $(targetId), data, settings]);

                $.ajax(
                    this.href,
                    {
                        type: settings.method,
                        data: data,
                        cache: settings.cache,
                        success: function (result) {
                            // Fill the section with the request's result
                            $(targetId).append(result);

                            // We fire the 'complete' event when the request is done
                            $container.trigger('ajaxtabs:complete', [$tabLink, $(targetId), result, settings]);
                        }
                    });

            } else {
               // but if cached, we fire the 'complete' event immediately
               $container.trigger('ajaxtabs:complete', [$tabLink, $(targetId), null, settings]);
            }

            // add the Active Classes
            $(value).addClass(settings.tabActiveClass);
            $(targetId).addClass(settings.panelActiveClass);

            // Display the targeted panel
            if (settings.animate) {
               $(targetId).fadeIn(settings.animationSpeed);
            } else {
               $(targetId).show();
            }


            // Change the hash in url
            window.location.hash = targetId;

            $container.trigger("ajaxtabs:after", [$tabLink, $(targetId), settings]);

            // Prevent the change of page with the link's href
            e.preventDefault();

         });

      });
    };


    plugin.init();

  };

  $.fn.ajaxtabs = function(options) {
    var args = arguments;

    return this.each(function() {
      var $this = $(this),
          plugin = $this.data('ajaxtabs');

      // Initialization was called with $(el).ajaxtabs( { options } );
      if (undefined === plugin) {
        plugin = new $.ajaxtabs(this, options);
        $this.data('ajaxtabs', plugin);
      }

    });
  };

})(jQuery);
