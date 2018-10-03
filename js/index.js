/*
* @Author: TimJ
* @Date:   2016-11-19 15:51:37
* @Last Modified by:   TimJ
* @Last Modified time: 2016-11-19 16:03:37
*/

'use strict';
$('#form').validate({
		errorLabelContainer: 'ol.login_error',
		wrapper: 'li',
		rules: {
			location: {
				required: true,
			},
			river: {
				required: true,
			},
			mobile:{
				required: true,
			},
			bookdate:{
				required: true,
			},
			bookexpert:{
				required: true,
			},
			eamil:{
				required: true,
			},
		},
		messages: {
			location: {
				required: '位置不能为空!',
			},
			river: {
				required: '请输入您要举报的河流!',
			},
			mobile:{
				required:'请输入河流位置!',
			},
			bookdate:{
				required:'请输入投诉时间!',
			},
			bookexpert:{
				required:'请输入忍受程度'
			},
			eamil:{
				required:'请输入邮箱'
			},
		},
	});