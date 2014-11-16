@extends('admin.layouts-new.admin-template')
	
@section('content')

<section class="mailbox-env">
				
				<div class="row">
					
					<!-- Inbox emails -->
					<div class="col-sm-9 mailbox-right">
						
						<div class="mail-env">
						
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									var $state = $(".mail-table thead input[type='checkbox'], .mail-table tfoot input[type='checkbox']"),
										$chcks = $(".mail-table tbody input[type='checkbox']");
									
									// Script to select all checkboxes
									$state.on('change', function(ev)
									{
										if($state.is(':checked'))
										{
											$chcks.prop('checked', true).trigger('change');
										}
										else
										{
											$chcks.prop('checked', false).trigger('change');
										}
									});
									
									// Row Highlighting
									$chcks.each(function(i, el)
									{
										var $tr = $(el).closest('tr');
										
										$(this).on('change', function(ev)
										{
											$tr[$(this).is(':checked') ? 'addClass' : 'removeClass']('highlighted');
										});
									});
									
									// Stars
									$(".mail-table .star").on('click', function(ev)
									{
										ev.preventDefault();
										
										if( ! $(this).hasClass('starred'))
										{
											$(this).addClass('starred').find('i').attr('class', 'fa-star');
										}
										else
										{
											$(this).removeClass('starred').find('i').attr('class', 'fa-star-empty');
										}
									});
								});
							</script>
						
							<!-- mail table -->
							<table class="table mail-table">
							
								<!-- mail table header -->
								<thead>
									<tr>
										<th class="col-cb">
											<input type="checkbox" class="cbr" />
										</th>
										<th colspan="4" class="col-header-options">
											
											<div class="mail-select-options">Select all</div>
											
											<div class="mail-pagination">
												Showing <strong>1 to 30</strong> of <strong>789</strong> emails
												
												<div class="next-prev">
													<a href="#"><i class="fa-angle-left"></i></a>
													<a href="#"><i class="fa-angle-right"></i></a>
												</div>
											</div>
										</th>
									</tr>
								</thead>
							
								<!-- mail table footer -->
								<tfoot>
									<tr>
										<th class="col-cb">
											<input type="checkbox" class="cbr" />
										</th>
										<th colspan="4" class="col-header-options">
											
											<div class="mail-select-options">Select all</div>
											
											<div class="mail-pagination">
												Showing <strong>1 to 30</strong> of <strong>789</strong> emails
												
												<div class="next-prev">
													<a href="#"><i class="fa-angle-left"></i></a>
													<a href="#"><i class="fa-angle-right"></i></a>
												</div>
											</div>
										</th>
									</tr>
								</tfoot>
								
								<!-- email list -->
								<tbody>
									
									<tr class="unread">
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Google AdWords</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Google AdWords: Ads not serving
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">08:40</td>
									</tr>
									
									<tr class="unread"><!-- new email class: unread -->
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star starred">
												<i class="fa-star"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Facebook</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Reset your account password
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">11:17</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Apple.com</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												<span class="label label-danger">Business</span>
												Your apple account ID has been accessed from un-familiar location.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">Today</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">World Weather Online</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Over Throttle Alert
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">Yesterday</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Dropbox</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Complete your Dropbox setup!
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">4 Dec</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star starred">
												<i class="fa-star"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Arlind Nushi</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												<span class="label label-warning">Friends</span>
												Work progress for Neon Project
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">28 Nov</td>
									</tr>
									
									<tr><!-- new email class: unread -->
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star starred">
												<i class="fa-star"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Jose D. Gardner</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Regarding to your website issues.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">22 Nov</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Aurelio D. Cummins</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Steadicam operator
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">15 Nov</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Filan Fisteku</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												You are loosing clients because your website is not responsive.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">02 Nov</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Instagram</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Instagram announces the new video uploadin feature.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">26 Oct</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">James Blue</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												<span class="label label-success">Envato</span>
												There are 20 notifications
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">18 Oct</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">SomeHost</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Bugs in your system.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">01 Sep</td>
									</tr>
									
									<tr><!-- new email class: unread -->
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star starred">
												<i class="fa-star"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Facebook</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Reset your account password
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">13:52</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Google AdWords</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Google AdWords: Ads not serving
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">09:27</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Apple.com</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												<span class="label label-danger">Business</span>
												Your apple account ID has been accessed from un-familiar location.
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">Today</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">World Weather Online</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Over Throttle Alert
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">Yesterday</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">Dropbox</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												Complete your Dropbox setup!
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">4 Dec</td>
									</tr>
									
								</tbody>
								
							</table>
							
						</div>
						
					</div>
					
					@include('admin.layouts.admin-mail-sidebar')
					
				</div>
				
			</section>

@stop