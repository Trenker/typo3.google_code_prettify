============================
Frontend
============================

Target group: **Editors** and **Integrators**

Frontend Plugin
===============

The most simple way of creating a prettified code sample is to use the frontend plugin.

	.. important::

		Use proper indentions and variable names, since re-formating obfuscated code is out of scope of this extension.

.. figure:: Images/PluginStep01.png
		:width: 708px
		:alt: Create a new content element

		Create a new content element and select "Prettified Code" in the "Plugins" tab.

.. figure:: Images/PluginStep02.png
		:width: 473px
		:alt: Insert some code

		Insert some code.

.. figure:: Images/PluginStep03.png
		:width: 525px
		:alt: Select a language

		Optionally you can select a language.

		If the desired language is not listed or not selected, it will make an intelligent guess. This will work fine in the majority of cases.


.. figure:: Images/PluginStep04.png
		:width: 380px
		:alt: Receive some output

		The result will be displayed right away.


Typoscript cObject
=======================

If you want to pretty print some code via typoscript, you can simply copy the **lib.tx_googlecodeprettify** object and change the properties:

* settings.code (Will contain the displayed code)
* *optional* settings.language (The language used, not the full name but a common abbrivation like "js" for "Javascript")

Example:
________

::

	page.100 < lib.tx_googlecodeprettify
	page.100.settings.code (
		/* Display Inline */
		.inline-element {
			display: inline-block;
			*display: inline;
			*zoom: 1;
		}
	)

	# Optionally
	page.100.settings.language = css
