<?php
if (!defined('APPPATH'))
	exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{title}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="navbar">
                <div class="navbar-inner">
                    {menubar}
                    <br><br>
                    <?php
                        if(ISSET($this->session->userdata['userName']))
                            echo 'Hello '.$this->session->userdata['userName'];
                    ?>
                </div>
            </div>           
            <div id="content">
                <h1 align="center">{title}</h1>
                {content}
            </div>
        </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Status</h4>
        </div>
        <div class="modal-body">
            <table>
                {table}
                <tr>
                    <td>
                        {name}: 
                    </td>
                    <td>
                        {tableData}
                    </td>
                </tr>
                {/table}
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
        
    </body>
</html>
