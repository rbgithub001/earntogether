
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8"/>
  <title>GDP by country visualization</title>

  <!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/style.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/lessframework.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/skin.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/syntax.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jsdoc.css"/>
  <link rel="stylesheet" media="all" href="https://jvectormap.com/css/jquery-ui.min.css"/>
  <script src="https://jvectormap.com/js/jquery-3.4.1.min.js"></script>
  <script src="https://jvectormap.com/js/css3-mediaqueries.js"></script>
  <script src="https://jvectormap.com/js/modernizr.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="https://jvectormap.com/js/tabs.js"></script>
  <script src="https://jvectormap.com/js/jquery-jvectormap-world-mill.js"></script>
  <script src="https://jvectormap.com/js/gdp-data.js"></script>

</head>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20607161-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<body lang="en">
 <div class="mh-div"></div>
<div id="world-map-gdp" style="width: 720px; height: 400px"></div>
    <script>
              $(function(){
                $('#world-map-gdp').vectorMap({
                  map: 'world_mill',
                  series: {
                    regions: [{
                      values: gdpData,
                      scale: ['#C8EEFF', '#0071A4'],
                      normalizeFunction: 'polynomial'
                    }],
                  },
                  onRegionTipShow: function(e, el, code){
                    el.html(el.html()+' (GDP - '+gdpData[code]+')');
                  }
                });
              });
    </script>
</body>
</html>
