/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.video = function()
{
	return {
		reUrlYoutube: /https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube\.com\S*[^\w\-\s])([\w\-]{11})(?=[^\w\-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig,
		reUrlVimeo: /https?:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/,
		getTemplate: function()
		{
			return String()
			+ '<section id="redactor-modal-video-insert">'
				+ '<label>' + this.lang.get('video_html_code') + '</label>'
				+ '<textarea id="redactor-insert-video-area" style="height: 160px;"></textarea>'
			+ '</section>';
		},
		init: function()
		{
			var button = this.button.addAfter('image', 'video', this.lang.get('video'));
			this.button.addCallback(button, this.video.show);
		},
		show: function()
		{
			this.modal.addTemplate('video', this.video.getTemplate());

			this.modal.load('video', this.lang.get('video'), 700);
			this.modal.createCancelButton();

			var button = this.modal.createActionButton(this.lang.get('insert'));
			button.on('click', this.video.insert);

			this.selection.save();
			this.modal.show();

			$('#redactor-insert-video-area').focus();

		},
		insert: function()
		{
			var data = $('#redactor-insert-video-area').val();

			if (!data.match(/<iframe|<video/gi))
			{
				data = this.clean.stripTags(data);

				// parse if it is link on youtube & vimeo
				var iframeStart = '<iframe style="width: 500px; height: 281px;" src="',
					iframeEnd = '" frameborder="0" allowfullscreen></iframe>';

				if (data.match(this.video.reUrlYoutube))
				{
					data = data.replace(this.video.reUrlYoutube, iframeStart + '//www.youtube.com/embed/$1' + iframeEnd);
				}
				else if (data.match(this.video.reUrlVimeo))
				{
					data = data.replace(this.video.reUrlVimeo, iframeStart + '//player.vimeo.com/video/$2' + iframeEnd);
				}
			}

			this.selection.restore();
			this.modal.close();

			var current = this.selection.getBlock() || this.selection.getCurrent();

			if (current) $(current).after(data);
			else
			{
				this.insert.html(data);
			}

			this.code.sync();
		}

	};
};