<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}
	
if ( !$global['user']['loged'] )
	header( "Location: {$config['url_home']}login" );

$template['content'] .= <<<HTML
	<div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="panel">
				<div class="panel-body">
					<ul class="inbox-sidebar-list">
						<li class="inbox-sidebar-compose">
							<a href="inbox/compose.html" class="btn btn-block btn-lg btn-primary">Compose New</a>
						</li>
					</ul>
					<ul class="inbox-sidebar-list">
						<li class="inbox-sidebar-heading">
							<h2 class="inbox-sidebar-heading-title">Folders</h2>
						</li>
						<li class="inbox-sidebar-item ">
							<a href="inbox.html"><span class="fa inbox-sidebar-icon fa-inbox"></span> Inbox</a>
						</li>
						<li class="inbox-sidebar-item">
							<a href="#"><span class="fa inbox-sidebar-icon fa-pencil"></span> Drafts</a>
						</li>
						<li class="inbox-sidebar-item">
							<a href="#"><span class="fa inbox-sidebar-icon fa-paper-plane-o"></span> Sent</a>
						</li>
						<li class="inbox-sidebar-item">
							<a href="#"><span class="fa inbox-sidebar-icon fa-recycle"></span> Junk</a>
						</li>
						<li class="inbox-sidebar-item">
							<a href="#"><span class="fa inbox-sidebar-icon fa-trash"></span> Trash</a>
						</li>
					</ul>
					<ul class="inbox-sidebar-list">
						<li class="inbox-sidebar-heading">
							<h2 class="inbox-sidebar-heading-title">Tags</h2>
						</li>
						<li class="inbox-sidebar-tag">
							<a href="#"><span class="fa inbox-sidebar-icon fa-circle text-primary"></span> General</a>
						</li>
						<li class="inbox-sidebar-tag">
							<a href="#"><span class="fa inbox-sidebar-icon fa-circle text-success"></span> Information</a>
						</li>
						<li class="inbox-sidebar-tag">
							<a href="#"><span class="fa inbox-sidebar-icon fa-circle text-info"></span> Personal</a>
						</li>
						<li class="inbox-sidebar-tag">
							<a href="#"><span class="fa inbox-sidebar-icon fa-circle text-danger"></span> Important</a>
						</li>
					</ul>
					<ul class="inbox-sidebar-list">
						<li class="inbox-sidebar-heading">
							<h2 class="inbox-sidebar-heading-title">Labels</h2>
						</li>
						<li class="inbox-sidebar-labels">
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Home</a> 
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Passwords</a> 
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Confidential</a> 
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Holidays</a> 
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Tax Returns</a> 
						<a href="#" class="label label-primary"><span class="fa fa-tag"></span> Read Later</a>
						</li>
					</ul>
				</div>
			</div>        </div>
					<div class="col-xs-12 col-md-9">
						<div class="panel">
				<div class="panel-body">
					<div>
						<form class="form-inline pull-right">
							<div class="form-group">
								<input type="text" placeholder="Search Inbox..." class="form-control inbox-search-input"><button class="btn btn-transparent btn-transparent-white">Search</button>
							</div>
						</form>
						<h1 class="inbox-main-heading">Inbox <small>(22 unread)</small></h1>
					</div>
					<div class="inbox-actions">
						<button class="btn btn-transparent btn-transparent-white btn-sm"><span class="fa fa-refresh"></span> Refresh</button>
						<button class="btn btn-transparent btn-transparent-info btn-sm"><span class="fa fa-eye"></span> Mark As Read</button>
						<button class="btn btn-transparent btn-transparent-warning btn-sm"><span class="fa fa-exclamation-circle"></span> Flag As Important</button>
						<button class="btn btn-transparent btn-transparent-danger btn-sm"><span class="fa fa-trash"></span> Move To Trash</button>
						<div class="btn-group pull-right">
							<button class="btn btn-transparent btn-transparent-white btn-sm"><i class="fa fa-arrow-left"></i></button>
							<button class="btn btn-transparent btn-transparent-white btn-sm"><i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</div>
				<table class="table table-inbox table-vertical-align-middle">
					<thead>
						<tr>
							<th></th>
							<th>From</th>
							<th>Message</th>
							<th></th>
							<th></th>
							<th>Sent</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-inbox-row-unread">
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">John Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td><span class="fa fa-circle text-success"></span> <span class="fa fa-circle text-warning"></span></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">3 hours ago</small></td>
						</tr>
						<tr class="table-inbox-row-unread">
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jim Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">6 days ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jack Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td><span class="fa fa-circle text-primary"></span></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">7 weeks ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jill Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">9 months ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">John Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td><span class="fa fa-circle text-info"></span></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">3 hours ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jim Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">6 days ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jack Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">7 weeks ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jill Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">9 months ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jack Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">7 weeks ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jill Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td><span class="fa fa-circle text-info"></span> <span class="fa fa-circle text-success"></span> <span class="fa fa-circle text-warning"></span> <span class="fa fa-circle text-primary"></span></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">9 months ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">John Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">3 hours ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jim Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">6 days ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jack Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">7 weeks ago</small></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" class="table-row-checkbox">
							</td>
							<td><a href="inbox/view.html">Jill Doe</a></td>
							<td><a href="inbox/view.html">Hey man, have you seen the new...</a></td>
							<td></td>
							<td><span class="fa fa-paperclip"></span></td>
							<td><small class="text-muted">9 months ago</small></td>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
    </div>
HTML;
include_once(DIR_ROOT . "/core/app2.php");
?>
