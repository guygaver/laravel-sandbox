/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: Options {\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}} passed to /Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-preset-env/lib/index.js which does not accept options.\n    at /Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/options/option-manager.js:290:15\n    at Array.map (native)\n    at OptionManager.resolvePresets (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/options/option-manager.js:265:20)\n    at OptionManager.mergePresets (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/options/option-manager.js:254:10)\n    at OptionManager.mergeOptions (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/options/option-manager.js:239:14)\n    at OptionManager.init (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/options/option-manager.js:338:12)\n    at File.initOptions (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/index.js:216:65)\n    at new File (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/file/index.js:137:24)\n    at Pipeline.transform (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-core/lib/transformation/pipeline.js:46:16)\n    at transpile (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-loader/index.js:38:20)\n    at /Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-loader/lib/fs-cache.js:145:18\n    at ReadFileContext.callback (/Users/Guy/Sites/concepts/PHP/frameworks/laravel/project/node_modules/babel-loader/lib/fs-cache.js:28:23)\n    at FSReqWrap.readFileAfterOpen [as oncomplete] (fs.js:366:13)");

/***/ })
/******/ ]);