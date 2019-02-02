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

var Tree = function (element, options)
{
	this.$element = $(element);
	this.options = $.extend({}, $.fn.tree.defaults, options);
	this.init();
};

Tree.prototype =
{
	constructor: Tree,

	init: function ()
	{
		var that = $(this);

		this.$element.find("label.tree-toggler, .icon-folder-close, .icon-folder-open").click(
			function ()
			{
				if ($(this).parent().parent().children("ul.tree").is(":visible"))
				{
					$(this).parent().children(".icon-folder-open")
						.removeClass("icon-folder-open")
						.addClass("icon-folder-close");

					that.trigger('collapse');
				}
				else
				{
					$(this).parent().children(".icon-folder-close")
						.removeClass("icon-folder-close")
						.addClass("icon-folder-open");

					that.trigger('expand');
				}
				$(this).parent().parent().children("ul.tree").toggle(300);
			}
		);
		this.$element.find("li").click(
			function ()
			{
				$('.tree-selected').removeClass("tree-selected");
				$('li input:checked').parent().addClass("tree-selected");
			}
		);

		return $(this);
	},
	
	collapseAll : function($speed)
	{
		this.$element.find("label.tree-toggler").each(
			function()
			{
				$(this).parent().children(".icon-folder-open")
					.removeClass("icon-folder-open")
					.addClass("icon-folder-close");
				$(this).parent().parent().children("ul.tree").hide($speed);
			}
		);

		return $(this);
	},

	expandAll : function($speed)
	{
		this.$element.find("label.tree-toggler").each(
			function()
			{
				$(this).parent().children(".icon-folder-close")
					.removeClass("icon-folder-close")
					.addClass("icon-folder-open");
				$(this).parent().parent().children("ul.tree").show($speed);
			}
		);

		return $(this);
	},
};

$.fn.tree = function (option, value)
{
	var methodReturn;
	var $set = this.each(
		function ()
		{
			var $this = $(this);
			var data = $this.data('tree');
			var options = typeof option === 'object' && option;

			if (!data){
				$this.data('tree', (data = new Tree(this, options)));
			}
			if (typeof option === 'string') {
				methodReturn = data[option](value);
			}
		}
	);

	return (methodReturn === undefined) ? $set : methodReturn;
};

$.fn.tree.Constructor = Tree;