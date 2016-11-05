/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\n(function () {\n\n  var laravel = {\n    initialize: function initialize() {\n      this.methodLinks = $('a[data-method]');\n      this.token = $('a[data-token]');\n      this.registerEvents();\n    },\n\n    registerEvents: function registerEvents() {\n      this.methodLinks.on('click', this.handleMethod);\n    },\n\n    handleMethod: function handleMethod(e) {\n      var link = $(this);\n      var httpMethod = link.data('method').toUpperCase();\n      var form;\n\n      // If the data-method attribute is not PUT or DELETE,\n      // then we don't know what to do. Just ignore.\n      if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {\n        return;\n      }\n\n      // Allow user to optionally provide data-confirm=\"Are you sure?\"\n      if (link.data('confirm')) {\n        if (!laravel.verifyConfirm(link)) {\n          return false;\n        }\n      }\n\n      form = laravel.createForm(link);\n      form.submit();\n\n      e.preventDefault();\n    },\n\n    verifyConfirm: function verifyConfirm(link) {\n      return confirm(link.data('confirm'));\n    },\n\n    createForm: function createForm(link) {\n      var form = $('<form>', {\n        'method': 'POST',\n        'action': link.attr('href')\n      });\n\n      var token = $('<input>', {\n        'type': 'hidden',\n        'name': '_token',\n        'value': link.data('token')\n      });\n\n      var hiddenInput = $('<input>', {\n        'name': '_method',\n        'type': 'hidden',\n        'value': link.data('method')\n      });\n\n      return form.append(token, hiddenInput).appendTo('body');\n    }\n  };\n\n  laravel.initialize();\n})();//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2RlbGV0ZS5qcz84MWJlIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcblxuKGZ1bmN0aW9uICgpIHtcblxuICB2YXIgbGFyYXZlbCA9IHtcbiAgICBpbml0aWFsaXplOiBmdW5jdGlvbiBpbml0aWFsaXplKCkge1xuICAgICAgdGhpcy5tZXRob2RMaW5rcyA9ICQoJ2FbZGF0YS1tZXRob2RdJyk7XG4gICAgICB0aGlzLnRva2VuID0gJCgnYVtkYXRhLXRva2VuXScpO1xuICAgICAgdGhpcy5yZWdpc3RlckV2ZW50cygpO1xuICAgIH0sXG5cbiAgICByZWdpc3RlckV2ZW50czogZnVuY3Rpb24gcmVnaXN0ZXJFdmVudHMoKSB7XG4gICAgICB0aGlzLm1ldGhvZExpbmtzLm9uKCdjbGljaycsIHRoaXMuaGFuZGxlTWV0aG9kKTtcbiAgICB9LFxuXG4gICAgaGFuZGxlTWV0aG9kOiBmdW5jdGlvbiBoYW5kbGVNZXRob2QoZSkge1xuICAgICAgdmFyIGxpbmsgPSAkKHRoaXMpO1xuICAgICAgdmFyIGh0dHBNZXRob2QgPSBsaW5rLmRhdGEoJ21ldGhvZCcpLnRvVXBwZXJDYXNlKCk7XG4gICAgICB2YXIgZm9ybTtcblxuICAgICAgLy8gSWYgdGhlIGRhdGEtbWV0aG9kIGF0dHJpYnV0ZSBpcyBub3QgUFVUIG9yIERFTEVURSxcbiAgICAgIC8vIHRoZW4gd2UgZG9uJ3Qga25vdyB3aGF0IHRvIGRvLiBKdXN0IGlnbm9yZS5cbiAgICAgIGlmICgkLmluQXJyYXkoaHR0cE1ldGhvZCwgWydQVVQnLCAnREVMRVRFJ10pID09PSAtMSkge1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIC8vIEFsbG93IHVzZXIgdG8gb3B0aW9uYWxseSBwcm92aWRlIGRhdGEtY29uZmlybT1cIkFyZSB5b3Ugc3VyZT9cIlxuICAgICAgaWYgKGxpbmsuZGF0YSgnY29uZmlybScpKSB7XG4gICAgICAgIGlmICghbGFyYXZlbC52ZXJpZnlDb25maXJtKGxpbmspKSB7XG4gICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGZvcm0gPSBsYXJhdmVsLmNyZWF0ZUZvcm0obGluayk7XG4gICAgICBmb3JtLnN1Ym1pdCgpO1xuXG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgfSxcblxuICAgIHZlcmlmeUNvbmZpcm06IGZ1bmN0aW9uIHZlcmlmeUNvbmZpcm0obGluaykge1xuICAgICAgcmV0dXJuIGNvbmZpcm0obGluay5kYXRhKCdjb25maXJtJykpO1xuICAgIH0sXG5cbiAgICBjcmVhdGVGb3JtOiBmdW5jdGlvbiBjcmVhdGVGb3JtKGxpbmspIHtcbiAgICAgIHZhciBmb3JtID0gJCgnPGZvcm0+Jywge1xuICAgICAgICAnbWV0aG9kJzogJ1BPU1QnLFxuICAgICAgICAnYWN0aW9uJzogbGluay5hdHRyKCdocmVmJylcbiAgICAgIH0pO1xuXG4gICAgICB2YXIgdG9rZW4gPSAkKCc8aW5wdXQ+Jywge1xuICAgICAgICAndHlwZSc6ICdoaWRkZW4nLFxuICAgICAgICAnbmFtZSc6ICdfdG9rZW4nLFxuICAgICAgICAndmFsdWUnOiBsaW5rLmRhdGEoJ3Rva2VuJylcbiAgICAgIH0pO1xuXG4gICAgICB2YXIgaGlkZGVuSW5wdXQgPSAkKCc8aW5wdXQ+Jywge1xuICAgICAgICAnbmFtZSc6ICdfbWV0aG9kJyxcbiAgICAgICAgJ3R5cGUnOiAnaGlkZGVuJyxcbiAgICAgICAgJ3ZhbHVlJzogbGluay5kYXRhKCdtZXRob2QnKVxuICAgICAgfSk7XG5cbiAgICAgIHJldHVybiBmb3JtLmFwcGVuZCh0b2tlbiwgaGlkZGVuSW5wdXQpLmFwcGVuZFRvKCdib2R5Jyk7XG4gICAgfVxuICB9O1xuXG4gIGxhcmF2ZWwuaW5pdGlhbGl6ZSgpO1xufSkoKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9kZWxldGUuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);