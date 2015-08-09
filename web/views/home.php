 
 
 <div  ng-view class="view-animate">
 
  <form role="form">
    <div class="form-group">
      <label for="inputdefault">Default input</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputlg">input-lg</label>
      <input class="form-control input-lg" id="inputlg" type="text">
    </div>
	
	</form>
 <canvas id="c" width="500" height="500" style="border:1px solid #ccc"></canvas>
 </div>
<script>
	// Place script tags at the bottom of the page.
	// That way progressive page rendering and 
	// downloads are not blocked.
 
	// Run only when HTML is loaded and 
	// DOM properly initialized (courtesy jquery)
/* 	$(function () {
		
		// Obtain a canvas drawing surface from fabric.js
		var canvas = new fabric.Canvas('c');
 
		// Create a text object. 
		// Does not display it-the canvas doesn't 
		// know about it yet.
		var hi = new fabric.Text('hello, world.', {
			left: canvas.getWidth() / 2,
			top: canvas.getHeight() / 2		
		});
	
		// Attach it to the canvas object, then (re)display
		// the canvas.	
		canvas.add(hi);
				
	}); */
</script>