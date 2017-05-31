<?php 
	include '..//..//app/config.php';
	include URL_TEMPLATES . 'head.php';
?>
<body>
   <div class="app app-default">
<?php include URL_TEMPLATES . 'aside.php'; ?>
<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>

<div class="app-container">
  
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">
          Modal
        </div>
        <div class="card-body">
          <div class="row">
		  <div class="col-sm-12">
		    <div>
		      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		      Demo modal
		      </button>
		    </div>
		    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title">Modal title</h4>
		          </div>
		          <div class="modal-body">
		            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
		            <button type="button" class="btn btn-sm btn-success">Save changes</button>
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="simplio-example __modal">
		      <div class="modal in">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		              <h4 class="modal-title">Modal title</h4>
		            </div>
		            <div class="modal-body">
		              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
		              <button type="button" class="btn btn-sm btn-success">Save changes</button>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
 
  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>
</body>
</html>