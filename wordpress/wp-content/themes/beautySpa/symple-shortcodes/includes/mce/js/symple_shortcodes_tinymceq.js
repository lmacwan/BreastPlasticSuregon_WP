(function() {

	$get_value = '';
	$get_value_two = '';

	var $obj;

	function getValues() {
		$get_post_types = [];
		for ($obj in $post_type) {
			$get_post_types.push({
				text : $post_type[$obj].read_name,
				value : $post_type[$obj].name
			});
		}
		return $get_post_types;
	}
	function getValuesTaxonomy() {
		$get_post_types = [];
		for ($obj in $post_type) {
			if ($post_type[$obj].taxsonomy != '') {
				$get_post_types.push({
					text : $post_type[$obj].taxsonomy,
					value : $post_type[$obj].taxsonomy
				});
			}
		}
		return $get_post_types;
	}

	function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) {
				return sParameterName[1];
			}
		}
	}

	tinymce.PluginManager
			.add(
					"my_mce_button",
					function(editor, url) {

						editor
								.addButton(
										'my_mce_button',
										{

											text : 'BeautySpa',

											icon : false,

											type : 'menubutton',

											menu : [
													// // ================ MAIN
													// SLIDE
													// =================== ///
													{

														text : 'Slide',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Slide',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading',

																					value : "Revitalise your senses!",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'Short Description',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque elit tortor, adipiscing vel velit in , ultricies fermentum nulla. Donec in urna semulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				},
																				{

																					type : 'textbox',

																					name : 'button_url',

																					label : 'Button Url',

																					value : "#services"

																				},
																				{

																					type : 'textbox',

																					name : 'button_text',

																					label : 'Button Text',

																					value : "Read More"

																				},
																				{
																					type : 'button',

																					name : 'add_more',

																					label : 'Add More Slide',

																					text : 'Add More',

																					onclick : function(
																							e) {

																						editor.windowManager
																								.open({

																									title : 'Next Slide Show',
																									body : [
																											{

																												type : 'textbox',

																												name : 'heading',

																												label : 'Heading',

																												value : "Revitalise your senses!",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 100

																											},
																											{

																												type : 'textbox',

																												name : 'para',

																												label : 'Short Description',

																												value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque elit tortor, adipiscing vel velit in , ultricies fermentum nulla. Donec in urna semulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'img_url',

																												label : 'Image Url',

																												value : '',

																												onclick : function(
																														e) {

																													tb_show(
																															'',
																															'media-upload.php?type=image&amp;TB_iframe=true');

																													window.send_to_editor = function(
																															html) {
																														imgurl = jQuery(
																																'img',
																																html)
																																.attr(
																																		'src');
																														jQuery(
																																e.toElement)
																																.val(
																																		imgurl);
																														tb_remove();
																													};
																												}

																											},
																											{

																												type : 'textbox',

																												name : 'button_url',

																												label : 'Button Url',

																												value : "#services"

																											},
																											{

																												type : 'textbox',

																												name : 'button_text',

																												label : 'Button Text',

																												value : "Read More"

																											}, ],
																									onsubmit : function(
																											e) {

																										$get_value += '[slide heading="'
																												+ e.data.heading
																												+ '" para="'
																												+ e.data.para
																												+ '" img_url="'
																												+ e.data.img_url
																												+ '" button_url="'
																												+ e.data.button_url
																												+ '" button_text="'
																												+ e.data.button_text
																												+ '"][/slide]';
																										alert("Added");
																									}
																								});
																					}
																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[slide_wrapper][slide heading="'
																							+ e.data.heading
																							+ '" para="'
																							+ e.data.para
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '" button_url="'
																							+ e.data.button_url
																							+ '" button_text="'
																							+ e.data.button_text
																							+ '"][/slide]'
																							+ $get_value
																							+ '[/slide_wrapper]');

																			$get_value = '';
																		}
																	});
														}
													},
													// ///////============ end
													// slide
													// ======== ABOUT =======//
													{
														text : 'About',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Slide',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "About // BeautySpa",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'About Us',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque elit tortor, adipiscing vel velit in, ultriciesnulla. Donec in urna sem. Nulla facilisiestibulum ut aliquet agna. Nulla nec faucibus est. In in augue placerat, ligula quis, elementum augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque lla nec faucibus est. In in augue placerat, ligula quis, elementum augue.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[about heading="'
																							+ e.data.heading
																							+ '" para="'
																							+ e.data.para
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '"][/about]');

																		}
																	});
														}
													},
													// ///============== END
													// ABOUT =========/////////
													// ====== START SERVICES
													// ===////////
													{
														text : 'Services',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Services',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "Our // Services",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'service_name',

																					label : 'Service Name',

																					value : "Stone Massage",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'Service Details',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristiqumsan. Pellentesque elit tortor, adipiscing vel velit in, ultricies fermentum nulla. Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est. In in augue placerat elementum augue.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'services',

																					label : 'List of facilities (separated by "//")',

																					value : "services // Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna // Lorem ipsum dolor sit amet, consectetur adipiscing elit. // Integer gravida velit quis dolor tristiqumsan. // Integer gravida velit quis dolor tristiqumsan.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'currency_symbol',

																					label : 'Currency Symbol ("$")',

																					value : "$",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'amount',

																					label : 'Amount ("75")',

																					value : "75",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				},
																				{
																					type : 'button',

																					name : 'add_more',

																					label : 'Add More Slide',

																					text : 'Add More',

																					onclick : function(
																							e) {

																						editor.windowManager
																								.open({

																									title : 'Next Service Info',
																									body : [
																											{

																												type : 'textbox',

																												name : 'service_name',

																												label : 'Service Name',

																												value : "Stone Massage",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 100

																											},
																											{

																												type : 'textbox',

																												name : 'para',

																												label : 'Service Details',

																												value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristiqumsan. Pellentesque elit tortor, adipiscing vel velit in, ultricies fermentum nulla. Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est. In in augue placerat elementum augue.",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'services',

																												label : 'List of facilities (separated by "//")',

																												value : "services // Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna // Lorem ipsum dolor sit amet, consectetur adipiscing elit. // Integer gravida velit quis dolor tristiqumsan. // Integer gravida velit quis dolor tristiqumsan.",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'currency_symbol',

																												label : 'Currency Symbol ("$")',

																												value : "$",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											},
																											{

																												type : 'textbox',

																												name : 'amount',

																												label : 'Amount ("75")',

																												value : "75",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											},
																											{

																												type : 'textbox',

																												name : 'img_url',

																												label : 'Image Url',

																												value : '',

																												onclick : function(
																														e) {

																													tb_show(
																															'',
																															'media-upload.php?type=image&amp;TB_iframe=true');

																													window.send_to_editor = function(
																															html) {
																														imgurl = jQuery(
																																'img',
																																html)
																																.attr(
																																		'src');
																														jQuery(
																																e.toElement)
																																.val(
																																		imgurl);
																														tb_remove();
																													};
																												}

																											} ],
																									onsubmit : function(
																											e) {

																										$get_value += '[services_nav service_name="'
																												+ e.data.service_name
																												+ '"][/services_nav]';
																										$get_value_two += '[services_content service_name="'
																												+ e.data.service_name
																												+ '" img_url="'
																												+ e.data.img_url
																												+ '" currency_symbol="'
																												+ e.data.currency_symbol
																												+ '" amount="'
																												+ e.data.amount
																												+ '" para="'
																												+ e.data.para
																												+ '" services="'
																												+ e.data.services
																												+ '"][/services_content]';
																										alert("Added");
																									}
																								});
																					}
																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[services_wrapper heading="'
																							+ e.data.heading
																							+ '"][services_nav_wrapper][services_nav service_name="'
																							+ e.data.service_name
																							+ '"][/services_nav]'
																							+ $get_value
																							+ '[/services_nav_wrapper][services_content_wrapper][services_content service_name="'
																							+ e.data.service_name
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '" currency_symbol="'
																							+ e.data.currency_symbol
																							+ '" amount="'
																							+ e.data.amount
																							+ '" para="'
																							+ e.data.para
																							+ '" services="'
																							+ e.data.services
																							+ '"][/services_content]'
																							+ $get_value_two
																							+ '[/services_content_wrapper][/services_wrapper]');
																			$get_value = '';
																			$get_value_two = '';

																		}
																	});
														}
													},
													// /=========== END SERVICE
													// ======///
													// /=========== START POSTER
													// ======//
													{
														text : 'Poster',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Poster',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "We use only // herbal products",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'sub_heading',

																					label : 'About Us',

																					value : "from standard brands only",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Parallax Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[poster heading="'
																							+ e.data.heading
																							+ '" sub_heading="'
																							+ e.data.sub_heading
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '"][/poster]');

																		}
																	});
														}
													},
													// /=========== START exta
													// service list ======//
													{
														text : 'Extra Services',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Extra Services',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "Our Other // packages",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'service_name',

																					label : 'Service Name',

																					value : "Fairness treatment",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'service_facilities',

																					label : 'List of facilities (separated by "//")',

																					value : "services // Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna // Lorem ipsum dolor sit amet, consectetur adipiscing elit. // Integer gravida velit quis dolor tristiqumsan. // Integer gravida velit quis dolor tristiqumsan.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'currency_symbol',

																					label : 'Currency Symbol ("$")',

																					value : "$",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'amount',

																					label : 'Amount ("75")',

																					value : "75",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{
																					type : 'button',

																					name : 'add_more',

																					label : 'Add More Slide',

																					text : 'Add More',

																					onclick : function(
																							e) {

																						editor.windowManager
																								.open({

																									title : 'Next Service Info',
																									body : [
																											{

																												type : 'textbox',

																												name : 'service_name',

																												label : 'Service Name',

																												value : "Fairness treatment",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 100

																											},
																											{

																												type : 'textbox',

																												name : 'service_facilities',

																												label : 'List of facilities (separated by "//")',

																												value : "services // Donec in urna sem. Nulla facilisi. Vestibulum ut aliquet magna // Lorem ipsum dolor sit amet, consectetur adipiscing elit. // Integer gravida velit quis dolor tristiqumsan. // Integer gravida velit quis dolor tristiqumsan.",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'currency_symbol',

																												label : 'Currency Symbol ("$")',

																												value : "$",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											},
																											{

																												type : 'textbox',

																												name : 'amount',

																												label : 'Amount ("75")',

																												value : "75",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											} ],
																									onsubmit : function(
																											e) {

																										$get_value += '[package_list service_name="'
																												+ e.data.service_name
																												+ '" service_facilities="'
																												+ e.data.service_facilities
																												+ '" currency_symbol="'
																												+ e.data.currency_symbol
																												+ '" amount="'
																												+ e.data.amount
																												+ '"][/package_list]';
																										alert("Added");
																									}
																								});
																					}
																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[package_list_wrapper heading="'
																							+ e.data.heading
																							+ '"][package_list service_name="'
																							+ e.data.service_name
																							+ '" service_facilities="'
																							+ e.data.service_facilities
																							+ '" currency_symbol="'
																							+ e.data.currency_symbol
																							+ '" amount="'
																							+ e.data.amount
																							+ '"][/package_list]'
																							+ $get_value
																							+ '[/package_list_wrapper]');
																			$get_value = '';

																		}
																	});
														}
													},
													// /// end exta service list
													// /////=== START SPECIAL
													// OFFER ////
													{
														text : 'Offer Poster',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Offer Poster Bord',

																		body : [
																				{

																					type : 'textbox',

																					name : 'offer_heading',

																					label : 'Offer Heading (Break heading with "//")',

																					value : "Special // Offer",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'Paragraph',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristiqumsan. Pellentesque elit tortor, adipiscing vel velit in, ultricies fermentum nulla. Donec in urna sem. Nulla facilisi.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'percentage_amount',

																					label : 'Percentage of amout is Off',

																					value : "25%",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'off_text',

																					label : 'Text of OFF',

																					value : "OFF",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'button_url',

																					label : 'Button Url',

																					value : "#",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'button_text',

																					label : 'Button Text',

																					value : "Get It Now",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[special_offer percentage_amount="'
																							+ e.data.percentage_amount
																							+ '" off_text="'
																							+ e.data.off_text
																							+ '" offer_heading="'
																							+ e.data.offer_heading
																							+ '" para="'
																							+ e.data.para
																							+ '" button_url="'
																							+ e.data.button_url
																							+ '" button_text="'
																							+ e.data.button_text
																							+ '"][/special_offer]');

																		}
																	});
														}
													},
													// ///=== END SPECIAL OFFER
													// ////
													// // === START GALLERY=
													// ===//
													{

														text : 'Gallery',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Gallery',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Gallery Heading (Break heading with "//")',

																					value : "Our // Gallery",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'Paragraph',

																					value : "In in augue placerat, ligula quis, elementum augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque lla nec faucibus est. In in augue placerat, ligula quis, elementum augue.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'page_id',

																					label : 'Page Id, from which page collects feature images',

																					value : "",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[beautySpa_gallery heading="'
																							+ e.data.heading
																							+ '" para="'
																							+ e.data.para
																							+ '" page_id="'
																							+ e.data.page_id
																							+ '" ][/beautySpa_gallery]');

																		}
																	});
														}
													},
													// / === END GALLERY
													// =====///
													// === START TEAM ======//
													{
														text : 'Team',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Team',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "Our // Experts",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'para',

																					label : 'Para About Expert',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque lla nec faucibus est. In in augue placerat, ligula quis, elementum augue.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'name',

																					label : 'Name Of First Expert',

																					value : "Jone Doe",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'designation',

																					label : 'Expert Designation',

																					value : "Beauty Expert",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 70

																				},
																				{

																					type : 'textbox',

																					name : 'short_info',

																					label : 'Short Info About This Expert',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristiqumsan.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'socials_icons',

																					label : 'Social Icons (use font-awesome icon class, like "fa-facebook". Multiple separated with ",")',

																					value : "fa-facebook, fa-twitter, fa-youtube-play, fa-flickr, fa-google-plus",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'socials_links',

																					label : 'Social Liks (Multiple separated with ",". Number of links should be squential to Icons)',

																					value : "#facebook, #twitter, #youtube-play, #flickr, #google-plus",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Expert Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				},
																				{
																					type : 'button',

																					name : 'add_more',

																					label : 'Add Next Expert Info',

																					text : 'Add More Expert',

																					onclick : function(
																							e) {

																						editor.windowManager
																								.open({

																									title : 'Next Service Info',
																									body : [
																											{

																												type : 'textbox',

																												name : 'name',

																												label : 'Name Of First Expert',

																												value : "Jone Doe",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											},
																											{

																												type : 'textbox',

																												name : 'designation',

																												label : 'Expert Designation',

																												value : "Beauty Expert",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 70

																											},
																											{

																												type : 'textbox',

																												name : 'short_info',

																												label : 'Short Info About This Expert',

																												value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristiqumsan.",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 100

																											},
																											{

																												type : 'textbox',

																												name : 'socials_icons',

																												label : 'Social Icons (use font-awesome icon class, like "fa-facebook". Multiple separated with ",")',

																												value : "fa-facebook, fa-twitter, fa-youtube-play, fa-flickr, fa-google-plus",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'socials_links',

																												label : 'Social Liks (Multiple separated with ",". Number of links should be squential to Icons)',

																												value : "#facebook, #twitter, #youtube-play, #flickr, #google-plus",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'img_url',

																												label : 'Expert Image Url',

																												value : '',

																												onclick : function(
																														e) {

																													tb_show(
																															'',
																															'media-upload.php?type=image&amp;TB_iframe=true');

																													window.send_to_editor = function(
																															html) {
																														imgurl = jQuery(
																																'img',
																																html)
																																.attr(
																																		'src');
																														jQuery(
																																e.toElement)
																																.val(
																																		imgurl);
																														tb_remove();
																													};
																												}

																											} ],
																									onsubmit : function(
																											e) {

																										$get_value += '[team name="'
																												+ e.data.name
																												+ '" designation="'
																												+ e.data.designation
																												+ '" short_info="'
																												+ e.data.short_info
																												+ '" socials_icons="'
																												+ e.data.socials_icons
																												+ '" socials_links="'
																												+ e.data.socials_links
																												+ '" img_url="'
																												+ e.data.img_url
																												+ '"][/team]';
																										alert("Added");
																									}
																								});
																					}
																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[team_wrapper heading="'
																							+ e.data.heading
																							+ '" para="'
																							+ e.data.para
																							+ '"][team name="'
																							+ e.data.name
																							+ '" designation="'
																							+ e.data.designation
																							+ '" short_info="'
																							+ e.data.short_info
																							+ '" socials_icons="'
																							+ e.data.socials_icons
																							+ '" socials_links="'
																							+ e.data.socials_links
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '"][/team]'
																							+ $get_value
																							+ '[/team_wrapper]');
																			$get_value = '';

																		}
																	});
														}
													},
													// / === END TEAM ===///
													// / ==== START TESTIMONIALS
													// ====//
													{
														text : 'Testimonial',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Testimonial',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "What our // clients say",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'quote_text',

																					label : 'Quote Text',

																					value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque elit tortor, adipiscing vel velit inermentum nulla. Donec in urna semulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'quote_author',

																					label : 'Quote Author',

																					value : "Jenny Doe, Model",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'img_url',

																					label : 'Paralax Background Image Url',

																					value : '',

																					onclick : function(
																							e) {

																						tb_show(
																								'',
																								'media-upload.php?type=image&amp;TB_iframe=true');

																						window.send_to_editor = function(
																								html) {
																							imgurl = jQuery(
																									'img',
																									html)
																									.attr(
																											'src');
																							jQuery(
																									e.toElement)
																									.val(
																											imgurl);
																							tb_remove();
																						};
																					}

																				},
																				{
																					type : 'button',

																					name : 'add_more',

																					label : 'Add More Slide',

																					text : 'Add More',

																					onclick : function(
																							e) {

																						editor.windowManager
																								.open({

																									title : 'Next Service Info',
																									body : [
																											{

																												type : 'textbox',

																												name : 'quote_text',

																												label : 'Quote Text',

																												value : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida velit quis dolor tristique accumsan. Pellentesque elit tortor, adipiscing vel velit inermentum nulla. Donec in urna semulla facilisi. Vestibulum ut aliquet magna. Nulla nec faucibus est",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 150

																											},
																											{

																												type : 'textbox',

																												name : 'quote_author',

																												label : 'Quote Author',

																												value : "Jenny Doe, Model",

																												multiline : true,

																												minWidth : 450,

																												minHeight : 100

																											} ],
																									onsubmit : function(
																											e) {

																										$get_value += '[testimonial_nav][/testimonial_nav]';
																										$get_value_two += '[testimonial_content quote_text="'
																												+ e.data.quote_text
																												+ '" quote_author="'
																												+ e.data.quote_author
																												+ '"][/testimonial_content]';
																										alert("Added");
																									}
																								});
																					}
																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[testimonial_wrapper heading="'
																							+ e.data.heading
																							+ '" img_url="'
																							+ e.data.img_url
																							+ '"][testimonial_nav_wrapper][testimonial_nav][/testimonial_nav]'
																							+ $get_value
																							+ '[/testimonial_nav_wrapper][testimonial_content_wrapper][testimonial_content quote_text="'
																							+ e.data.quote_text
																							+ '" quote_author="'
																							+ e.data.quote_author
																							+ '"][/testimonial_content]'
																							+ $get_value_two
																							+ '[/testimonial_content_wrapper][/testimonial_wrapper]');
																			$get_value = '';
																			$get_value_two = '';

																		}
																	});
														}
													},
													// / ==== END TESTIMONIALS
													// ====//
													// ==== START NEWSLWTTER
													// ====//
													{
														text : 'Newsletter',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Newsletter',

																		body : [ {

																			type : 'textbox',

																			name : 'heading',

																			label : 'Heading (Break heading with "//")',

																			value : "Subscribe to our // newsletter // for special offers",

																			multiline : true,

																			minWidth : 450,

																			minHeight : 100

																		} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[beauty_newsletter heading="'
																							+ e.data.heading
																							+ '"][/beauty_newsletter]');

																		}
																	});
														}
													},
													// ==== END NEWSLETTER
													// ====//
													// ==== START CONTACT ====//
													{
														text : 'Contact',
														onclick : function() {

															editor.windowManager
																	.open({

																		title : 'Contact Info',

																		body : [
																				{

																					type : 'textbox',

																					name : 'heading',

																					label : 'Heading (Break heading with "//")',

																					value : "Contact // Us",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'before_form_hading',

																					label : 'Before Contact Form, Short Note',

																					value : "Fill up form below for appointment. All fields are required.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'get_in_touch_heading',

																					label : 'Get In Touch Heading',

																					value : "GET IN TOUCH",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				},
																				{

																					type : 'textbox',

																					name : 'day_time_open',

																					label : 'Spa Center Open and Close Info (Break info with "//")',

																					value : "Monday - Friday: // 9:00am - 6:00pm",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'address',

																					label : 'Address Info (Break info with "//")',

																					value : "123 Main Street // Your City, State Country.",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'phone_fax',

																					label : 'Phone, Fax, etc Info (Break info with "//")',

																					value : "Phone: 310.555.1213 // Fax: 310.555.1213",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 150

																				},
																				{

																					type : 'textbox',

																					name : 'email',

																					label : 'Email',

																					value : "youremailadd@domainname.com",

																					multiline : true,

																					minWidth : 450,

																					minHeight : 100

																				} ],
																		onsubmit : function(
																				e) {

																			editor
																					.insertContent('[beauty_contact heading="'
																							+ e.data.heading
																							+ '" before_form_hading="'
																							+ e.data.before_form_hading
																							+ '" get_in_touch_heading="'
																							+ e.data.get_in_touch_heading
																							+ '" day_time_open="'
																							+ e.data.day_time_open
																							+ '" address="'
																							+ e.data.address
																							+ '" phone_fax="'
																							+ e.data.phone_fax
																							+ '" email="'
																							+ e.data.email
																							+ '"][/beauty_contact]');

																		}
																	});
														}
													}
											// ==== END CONTACT ====//
											]

										});

					});

})(jQuery);
