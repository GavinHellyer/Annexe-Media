<!--[if IE]>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
  <style>
    .chromeFrameOverlayContent { position:fixed; }
    .chromeFrameOverlayUnderlay { position:fixed; opacity:0.8; filter: alpha(opacity = 80); }
  </style>

  <div id="prompt">
  We have detected that you are running IE. To make this website more compatible with your browser please update.
  </div>

  <script>
   // The conditional ensures that this code will only execute in IE,
   // Therefore we can use the IE-specific attachEvent without worry
    window.attachEvent("onload", function() {
      CFInstall.check({
        mode: "overlay", // the default
        node: "prompt",
        destination: "<?php echo SERVER_HOST; ?>"
      });

      document.getElementById('chromeFrameCloseButton').parentNode.innerHTML = '<td>We have detected that you are running IE. To make this website more compatible with your browser please update below. <button id="chromeFrameCloseButton" type="submit">No Thank You</button></td>';
    });
  </script>
  <![endif]-->