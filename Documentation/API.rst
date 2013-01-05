============================
API
============================

Target group: **Developers**

The pretty printing in the plugin is done via a very simple API that can easily be used in custom tools.

Just get your an instance of the **\\GeorgGrossberger\\GooglePrettyPrint\\PrettyPrint** class and use the **prettyPrint** method.

Example via Dependency Injection with Extbase:
______________________________________________


::

	.. code-block:: php
		:linenos:

		/**
		 *
		 * @inject
		 * @var \GeorgGrossberger\GoogleCodePrettify\PrettyPrint
		 */
		protected $prettyPrint;

		/**
		 * Injects the pretty printer
		 *
		 * @param \GeorgGrossberger\GoogleCodePrettify\PrettyPrint $prettyPrint
		 */
		public function injectPrettyPrint(\GeorgGrossberger\GoogleCodePrettify\PrettyPrint $prettyPrint) {
			$this->prettyPrint = $prettyPrint;
		}

The **prettyPrint** method has two parameters:

#. **$code**
   Pass the code you want to minify
#. **$language** [optional]
   The language to set. If the language (key) is not allowed or unknown, an *InvalidArgumentException* will be thrown.

If everything goes right, you will get a <pre> tag with a nested <code> tag which will contain the (html special chared) code. Javascript and CSS are added automatically. Works in both frontend and backend.

Example
_______

::

	.. code-block:: php
		:linenos:

		$code = '
		/* Display Inline */
		.inline-element {
			 display: inline-block;
			*display: inline;
			*zoom: 1;
		}';

		echo $this->prettyPrint->prettyPrint($code);
