/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/date-input-polyfill/date-input-polyfill.dist.js":
/*!**********************************************************************!*\
  !*** ./node_modules/date-input-polyfill/date-input-polyfill.dist.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(t,e){if(true)module.exports=e();else { var r, n; }}(this,function(){return function(t){function e(r){if(n[r])return n[r].exports;var o=n[r]={exports:{},id:r,loaded:!1};return t[r].call(o.exports,o,o.exports,e),o.loaded=!0,o.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}n(84);var o=n(41),i=r(o),a=function(){i["default"].addPickerToOtherInputs(),i["default"].supportsDateInput()||i["default"].addPickerToDateInputs()};a(),document.addEventListener("DOMContentLoaded",function(){a()}),document.querySelector("body").addEventListener("mousedown",function(){a()})},function(t,e,n){t.exports=!n(11)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(t,e){var n=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(t,e){var n={}.hasOwnProperty;t.exports=function(t,e){return n.call(t,e)}},function(t,e,n){var r=n(9),o=n(32),i=n(25),a=Object.defineProperty;e.f=n(1)?Object.defineProperty:function(t,e,n){if(r(t),e=i(e,!0),r(n),o)try{return a(t,e,n)}catch(u){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(t[e]=n.value),t}},function(t,e,n){var r=n(59),o=n(16);t.exports=function(t){return r(o(t))}},function(t,e,n){var r=n(4),o=n(14);t.exports=n(1)?function(t,e,n){return r.f(t,e,o(1,n))}:function(t,e,n){return t[e]=n,t}},function(t,e,n){var r=n(23)("wks"),o=n(15),i=n(2).Symbol,a="function"==typeof i,u=t.exports=function(t){return r[t]||(r[t]=a&&i[t]||(a?i:o)("Symbol."+t))};u.store=r},function(t,e){var n=t.exports={version:"2.4.0"};"number"==typeof __e&&(__e=n)},function(t,e,n){var r=n(12);t.exports=function(t){if(!r(t))throw TypeError(t+" is not an object!");return t}},function(t,e,n){var r=n(2),o=n(8),i=n(56),a=n(6),u="prototype",s=function(t,e,n){var c,l,f,d=t&s.F,p=t&s.G,h=t&s.S,y=t&s.P,m=t&s.B,v=t&s.W,b=p?o:o[e]||(o[e]={}),g=b[u],x=p?r:h?r[e]:(r[e]||{})[u];p&&(n=e);for(c in n)l=!d&&x&&void 0!==x[c],l&&c in b||(f=l?x[c]:n[c],b[c]=p&&"function"!=typeof x[c]?n[c]:m&&l?i(f,r):v&&x[c]==f?function(t){var e=function(e,n,r){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(e);case 2:return new t(e,n)}return new t(e,n,r)}return t.apply(this,arguments)};return e[u]=t[u],e}(f):y&&"function"==typeof f?i(Function.call,f):f,y&&((b.virtual||(b.virtual={}))[c]=f,t&s.R&&g&&!g[c]&&a(g,c,f)))};s.F=1,s.G=2,s.S=4,s.P=8,s.B=16,s.W=32,s.U=64,s.R=128,t.exports=s},function(t,e){t.exports=function(t){try{return!!t()}catch(e){return!0}}},function(t,e){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,e,n){var r=n(38),o=n(17);t.exports=Object.keys||function(t){return r(t,o)}},function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},function(t,e){var n=0,r=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++n+r).toString(36))}},function(t,e){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on  "+t);return t}},function(t,e){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,e){t.exports={}},function(t,e){t.exports=!0},function(t,e){e.f={}.propertyIsEnumerable},function(t,e,n){var r=n(4).f,o=n(3),i=n(7)("toStringTag");t.exports=function(t,e,n){t&&!o(t=n?t:t.prototype,i)&&r(t,i,{configurable:!0,value:e})}},function(t,e,n){var r=n(23)("keys"),o=n(15);t.exports=function(t){return r[t]||(r[t]=o(t))}},function(t,e,n){var r=n(2),o="__core-js_shared__",i=r[o]||(r[o]={});t.exports=function(t){return i[t]||(i[t]={})}},function(t,e){var n=Math.ceil,r=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?r:n)(t)}},function(t,e,n){var r=n(12);t.exports=function(t,e){if(!r(t))return t;var n,o;if(e&&"function"==typeof(n=t.toString)&&!r(o=n.call(t)))return o;if("function"==typeof(n=t.valueOf)&&!r(o=n.call(t)))return o;if(!e&&"function"==typeof(n=t.toString)&&!r(o=n.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},function(t,e,n){var r=n(2),o=n(8),i=n(19),a=n(27),u=n(4).f;t.exports=function(t){var e=o.Symbol||(o.Symbol=i?{}:r.Symbol||{});"_"==t.charAt(0)||t in e||u(e,t,{value:a.f(t)})}},function(t,e,n){e.f=n(7)},function(t,e){"use strict";e.__esModule=!0,e["default"]=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}e.__esModule=!0;var o=n(45),i=r(o);e["default"]=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),(0,i["default"])(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}()},function(t,e){var n={}.toString;t.exports=function(t){return n.call(t).slice(8,-1)}},function(t,e,n){var r=n(12),o=n(2).document,i=r(o)&&r(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},function(t,e,n){t.exports=!n(1)&&!n(11)(function(){return 7!=Object.defineProperty(n(31)("div"),"a",{get:function(){return 7}}).a})},function(t,e,n){"use strict";var r=n(19),o=n(10),i=n(39),a=n(6),u=n(3),s=n(18),c=n(61),l=n(21),f=n(67),d=n(7)("iterator"),p=!([].keys&&"next"in[].keys()),h="@@iterator",y="keys",m="values",v=function(){return this};t.exports=function(t,e,n,b,g,x,M){c(n,e,b);var w,S,O,D=function(t){if(!p&&t in k)return k[t];switch(t){case y:return function(){return new n(this,t)};case m:return function(){return new n(this,t)}}return function(){return new n(this,t)}},T=e+" Iterator",_=g==m,A=!1,k=t.prototype,E=k[d]||k[h]||g&&k[g],j=E||D(g),C=g?_?D("entries"):j:void 0,N="Array"==e?k.entries||E:E;if(N&&(O=f(N.call(new t)),O!==Object.prototype&&(l(O,T,!0),r||u(O,d)||a(O,d,v))),_&&E&&E.name!==m&&(A=!0,j=function(){return E.call(this)}),r&&!M||!p&&!A&&k[d]||a(k,d,j),s[e]=j,s[T]=v,g)if(w={values:_?j:D(m),keys:x?j:D(y),entries:C},M)for(S in w)S in k||i(k,S,w[S]);else o(o.P+o.F*(p||A),e,w);return w}},function(t,e,n){var r=n(9),o=n(35),i=n(17),a=n(22)("IE_PROTO"),u=function(){},s="prototype",c=function(){var t,e=n(31)("iframe"),r=i.length,o="<",a=">";for(e.style.display="none",n(58).appendChild(e),e.src="javascript:",t=e.contentWindow.document,t.open(),t.write(o+"script"+a+"document.F=Object"+o+"/script"+a),t.close(),c=t.F;r--;)delete c[s][i[r]];return c()};t.exports=Object.create||function(t,e){var n;return null!==t?(u[s]=r(t),n=new u,u[s]=null,n[a]=t):n=c(),void 0===e?n:o(n,e)}},function(t,e,n){var r=n(4),o=n(9),i=n(13);t.exports=n(1)?Object.defineProperties:function(t,e){o(t);for(var n,a=i(e),u=a.length,s=0;u>s;)r.f(t,n=a[s++],e[n]);return t}},function(t,e,n){var r=n(38),o=n(17).concat("length","prototype");e.f=Object.getOwnPropertyNames||function(t){return r(t,o)}},function(t,e){e.f=Object.getOwnPropertySymbols},function(t,e,n){var r=n(3),o=n(5),i=n(55)(!1),a=n(22)("IE_PROTO");t.exports=function(t,e){var n,u=o(t),s=0,c=[];for(n in u)n!=a&&r(u,n)&&c.push(n);for(;e.length>s;)r(u,n=e[s++])&&(~i(c,n)||c.push(n));return c}},function(t,e,n){t.exports=n(6)},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}function o(t,e){for(t=String(t),e=e||2;t.length<e;)t="0"+t;return t}function i(t){var e=new Date(t.getFullYear(),t.getMonth(),t.getDate());e.setDate(e.getDate()-(e.getDay()+6)%7+3);var n=new Date(e.getFullYear(),0,4);n.setDate(n.getDate()-(n.getDay()+6)%7+3);var r=e.getTimezoneOffset()-n.getTimezoneOffset();e.setHours(e.getHours()-r);var o=(e-n)/6048e5;return 1+Math.floor(o)}function a(t){var e=t.getDay();return 0===e&&(e=7),e}function u(t){return null===t?"null":void 0===t?"undefined":"object"!==("undefined"==typeof t?"undefined":(0,c["default"])(t))?"undefined"==typeof t?"undefined":(0,c["default"])(t):Array.isArray(t)?"array":{}.toString.call(t).slice(8,-1).toLowerCase()}Object.defineProperty(e,"__esModule",{value:!0});var s=n(48),c=r(s),l=function(){var t=/d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZWN]|'[^']*'|'[^']*'/g,e=/\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,n=/[^-+\dA-Z]/g;return function(r,s,c,f){if(1!==arguments.length||"string"!==u(r)||/\d/.test(r)||(s=r,r=void 0),r=r||new Date,r instanceof Date||(r=new Date(r)),isNaN(r))throw TypeError("Invalid date");s=String(l.masks[s]||s||l.masks["default"]);var d=s.slice(0,4);"UTC:"!==d&&"GMT:"!==d||(s=s.slice(4),c=!0,"GMT:"===d&&(f=!0));var p=c?"getUTC":"get",h=r[p+"Date"](),y=r[p+"Day"](),m=r[p+"Month"](),v=r[p+"FullYear"](),b=r[p+"Hours"](),g=r[p+"Minutes"](),x=r[p+"Seconds"](),M=r[p+"Milliseconds"](),w=c?0:r.getTimezoneOffset(),S=i(r),O=a(r),D={d:h,dd:o(h),ddd:l.i18n.dayNames[y],dddd:l.i18n.dayNames[y+7],m:m+1,mm:o(m+1),mmm:l.i18n.monthNames[m],mmmm:l.i18n.monthNames[m+12],yy:String(v).slice(2),yyyy:v,h:b%12||12,hh:o(b%12||12),H:b,HH:o(b),M:g,MM:o(g),s:x,ss:o(x),l:o(M,3),L:o(Math.round(M/10)),t:b<12?"a":"p",tt:b<12?"am":"pm",T:b<12?"A":"P",TT:b<12?"AM":"PM",Z:f?"GMT":c?"UTC":(String(r).match(e)||[""]).pop().replace(n,""),o:(w>0?"-":"+")+o(100*Math.floor(Math.abs(w)/60)+Math.abs(w)%60,4),S:["th","st","nd","rd"][h%10>3?0:(h%100-h%10!=10)*h%10],W:S,N:O};return s.replace(t,function(t){return t in D?D[t]:t.slice(1,t.length-1)})}}();l.masks={"default":"ddd mmm dd yyyy HH:MM:ss",shortDate:"m/d/yy",mediumDate:"mmm d, yyyy",longDate:"mmmm d, yyyy",fullDate:"dddd, mmmm d, yyyy",shortTime:"h:MM TT",mediumTime:"h:MM:ss TT",longTime:"h:MM:ss TT Z",isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:sso",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",expiresHeaderFormat:"ddd, dd mmm yyyy HH:MM:ss Z"},l.i18n={dayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"]},e["default"]=l},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}Object.defineProperty(e,"__esModule",{value:!0});var o=n(44),i=r(o),a=n(28),u=r(a),s=n(29),c=r(s),l=n(43),f=r(l),d=n(42),p=r(d),h=n(40),y=r(h),m=function(){function t(e){var n=this;(0,u["default"])(this,t),this.element=e,this.element.setAttribute("data-has-picker",""),this.locale=this.element.getAttribute("lang")||document.body.getAttribute("lang")||"en",this.format=this.element.getAttribute("date-format")||document.body.getAttribute("date-format")||this.element.getAttribute("data-date-format")||document.body.getAttribute("data-date-format")||"yyyy-mm-dd",this.localeText=this.getLocaleText(),(0,i["default"])(this.element,{valueAsDate:{get:function(){if(!n.element.value)return null;var t=n.format||"yyyy-mm-dd",e=n.element.value.match(/(\d+)/g),r=0,o={};return t.replace(/(yyyy|dd|mm)/g,function(t){o[t]=r++}),new Date(e[o.yyyy],e[o.mm]-1,e[o.dd])},set:function(t){n.element.value=(0,y["default"])(t,n.format)}},valueAsNumber:{get:function(){return n.element.value?n.element.valueAsDate.valueOf():NaN},set:function(t){n.element.valueAsDate=new Date(t)}}});var r=function(t){var e=n.element;e.locale=n.localeText,f["default"].attachTo(e)};this.element.addEventListener("focus",r),this.element.addEventListener("mouseup",r),this.element.addEventListener("keydown",function(t){var e=new Date;switch(t.keyCode){case 9:case 27:f["default"].hide();break;case 38:n.element.valueAsDate&&(e.setDate(n.element.valueAsDate.getDate()+1),n.element.valueAsDate=e,f["default"].pingInput());break;case 40:n.element.valueAsDate&&(e.setDate(n.element.valueAsDate.getDate()-1),n.element.valueAsDate=e,f["default"].pingInput())}f["default"].sync()}),this.element.addEventListener("keyup",function(t){f["default"].sync()})}return(0,c["default"])(t,[{key:"getLocaleText",value:function(){var t=this.locale.toLowerCase();for(var e in p["default"]){var n=e.split("_");if(n.map(function(t){return t.toLowerCase()}),~n.indexOf(t)||~n.indexOf(t.substr(0,2)))return p["default"][e]}}}],[{key:"supportsDateInput",value:function(){var t=document.createElement("input");t.setAttribute("type","date");var e="not-a-date";return t.setAttribute("value",e),!(t.value===e)}},{key:"addPickerToDateInputs",value:function(){var e=document.querySelectorAll('input[type="date"]:not([data-has-picker])'),n=e.length;if(!n)return!1;for(var r=0;r<n;++r)new t(e[r])}},{key:"addPickerToOtherInputs",value:function(){var e=document.querySelectorAll('input[type="text"].date-polyfill:not([data-has-picker])'),n=e.length;if(!n)return!1;for(var r=0;r<n;++r)new t(e[r])}}]),t}();e["default"]=m},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n={"en_en-US_en-UK":{days:["Su","Mo","Tu","We","Th","Fr","Sa"],months:["January","February","March","April","May","June","July","August","September","October","November","December"]},"zh_zh-CN":{days:["星期天","星期一","星期二","星期三","星期四","星期五","星期六"],months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]},"zh-Hans_zh-Hans-CN":{days:["周日","周一","周二","周三","周四","周五","周六"],months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]},"zh-Hant_zh-Hant-TW":{days:["週日","週一","週二","週三","週四","週五","週六"],months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]},"de_de-DE":{days:["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"],months:["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"]},"nl_nl-NL_nl-BE":{days:["Zondag","Maandag","Dinsdag","Woensdag","Donderdag","Vrijdag","Zaterdag"],months:["Januari","Februari","Maart","April","Mei","Juni","Juli","Augustus","September","Oktober","November","December"],today:"Vandaag",format:"D/M/Y"},"pt_pt-BR":{days:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],months:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],today:"Hoje"},"fr_fr-FR_fr-BE":{days:["Di","Lu","Ma","Me","Je","Ve","Sa"],months:["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"],today:"Aujourd'hui",format:"D/M/Y"},"es_es-VE":{days:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],today:"Hoy",format:"D/M/Y"},"da_da-dk":{days:["Søndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","Lørdag"],months:["Januar","Februar","Marts","April","Maj","Juni","Juli","August","September","Oktober","November","December"],today:"I dag",format:"dd/MM-YYYY"},"ru_ru-RU_ru-UA_ru-KZ_ru-MD":{days:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],today:"Сегодня",format:"D.M.Y"},"uk_uk-UA":{days:["Нд","Пн","Вт","Ср","Чт","Пт","Сб"],months:["Січень","Лютий","Березень","Квітень","Травень","Червень","Липень","Серпень","Вересень","Жовтень","Листопад","Грудень"],today:"Cьогодні",format:"D.M.Y"},"sv_sv-SE":{days:["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"],months:["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],today:"Idag",format:"YYYY-MM-dd"},"test_test-TEST":{days:["Foo","Mon","Tue","Wed","Thu","Fri","Sat"],months:["Foo","February","March","April","May","June","July","August","September","October","November","December"]},ja:{days:["日","月","火","水","木","金","土"],months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],today:"今日",format:"YYYY-MM-dd"}};e["default"]=n},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}Object.defineProperty(e,"__esModule",{value:!0});var o=n(28),i=r(o),a=n(29),u=r(a),s=function(){function t(){var e=this;if((0,i["default"])(this,t),window.thePicker)return window.thePicker;this.date=new Date,this.input=null,this.isOpen=!1,this.container=document.createElement("date-input-polyfill"),this.year=document.createElement("select"),t.createRangeSelect(this.year,1890,this.date.getFullYear()+20),this.year.className="yearSelect",this.year.addEventListener("change",function(){e.date.setYear(e.year.value),e.refreshDaysMatrix()});var n=document.createElement("span");n.className="yearSelect-wrapper",n.appendChild(this.year),this.container.appendChild(n),this.month=document.createElement("select"),this.month.className="monthSelect",this.month.addEventListener("change",function(){e.date.setMonth(e.month.value),e.refreshDaysMatrix()});var r=document.createElement("span");r.className="monthSelect-wrapper",r.appendChild(this.month),this.container.appendChild(r),this.today=document.createElement("button"),this.today.textContent="Today",this.today.addEventListener("click",function(){var t=new Date;e.date=new Date(t.getFullYear()+"/"+("0"+(t.getMonth()+1)).slice(-2)+"/"+("0"+t.getDate()).slice(-2)),e.setInput()}),this.container.appendChild(this.today);var o=document.createElement("table");this.daysHead=document.createElement("thead"),this.days=document.createElement("tbody"),this.days.addEventListener("click",function(t){var n=t.target;if(!n.hasAttribute("data-day"))return!1;var r=e.days.querySelector("[data-selected]");r&&r.removeAttribute("data-selected"),n.setAttribute("data-selected",""),e.date.setDate(parseInt(n.textContent)),e.setInput()}),o.appendChild(this.daysHead),o.appendChild(this.days),this.container.appendChild(o),this.hide(),document.body.appendChild(this.container),this.removeClickOut=function(t){if(e.isOpen){for(var n=t.target,r=n===e.container||n===e.input;!r&&(n=n.parentNode);)r=n===e.container;("date"!==t.target.getAttribute("type")&&!r||!r)&&e.hide()}},this.removeBlur=function(t){e.isOpen&&e.hide()}}return(0,u["default"])(t,[{key:"hide",value:function(){this.container.setAttribute("data-open",this.isOpen=!1),this.input&&this.input.blur(),document.removeEventListener("mousedown",this.removeClickOut),document.removeEventListener("touchstart",this.removeClickOut)}},{key:"show",value:function(){var t=this;this.container.setAttribute("data-open",this.isOpen=!0),setTimeout(function(){document.addEventListener("mousedown",t.removeClickOut),document.addEventListener("touchstart",t.removeClickOut)},500),window.onpopstate=function(){t.hide()}}},{key:"goto",value:function(t){var e=this,n=t.getBoundingClientRect();this.container.style.top=n.top+n.height+(document.documentElement.scrollTop||document.body.scrollTop)+3+"px";var r=this.container.getBoundingClientRect(),o=r.width?r.width:280,i=function(){return e.container.className.replace("polyfill-left-aligned","").replace("polyfill-right-aligned","").replace(/\s+/g," ").trim()},a=n.right-o;n.right<o?(a=n.left,this.container.className=i()+" polyfill-left-aligned"):this.container.className=i()+" polyfill-right-aligned",this.container.style.left=a+(document.documentElement.scrollLeft||document.body.scrollLeft)+"px",this.show()}},{key:"attachTo",value:function(t){return!(t===this.input&&this.isOpen||(this.input=t,this.refreshLocale(),this.sync(),this["goto"](this.input),0))}},{key:"sync",value:function(){isNaN(Date.parse(this.input.valueAsDate))?this.date=new Date:this.date=t.absoluteDate(this.input.valueAsDate),this.year.value=this.date.getFullYear(),this.month.value=this.date.getMonth(),this.refreshDaysMatrix()}},{key:"setInput",value:function(){var t=this;this.input.valueAsDate=this.date,this.input.focus(),setTimeout(function(){t.hide()},100),this.pingInput()}},{key:"refreshLocale",value:function(){if(this.locale===this.input.locale)return!1;this.locale=this.input.locale,this.today.textContent=this.locale.today||"Today";for(var e=["<tr>"],n=0,r=this.locale.days.length;n<r;++n)e.push('<th scope="col">'+this.locale.days[n]+"</th>");this.daysHead.innerHTML=e.join(""),t.createRangeSelect(this.month,0,11,this.locale.months)}},{key:"refreshDaysMatrix",value:function(){this.refreshLocale();for(var e=this.date.getFullYear(),n=this.date.getMonth(),r=new Date(e,n,1).getDay(),o=new Date(this.date.getFullYear(),n+1,0).getDate(),i=t.absoluteDate(this.input.valueAsDate)||!1,a=i&&e===i.getFullYear()&&n===i.getMonth(),u=[],s=0;s<o+r;++s)if(s%7===0&&u.push("\n          "+(0!==s?"</tr>":"")+"\n          <tr>\n        "),s+1<=r)u.push("<td></td>");else{var c=s+1-r,l=a&&i.getDate()===c;u.push("<td data-day "+(l?"data-selected":"")+">\n          "+c+"\n        </td>")}this.days.innerHTML=u.join("")}},{key:"pingInput",value:function(){var t=void 0,e=void 0;try{t=new Event("input"),e=new Event("change")}catch(n){t=document.createEvent("KeyboardEvent"),t.initEvent("input",!0,!1),e=document.createEvent("KeyboardEvent"),e.initEvent("change",!0,!1)}this.input.dispatchEvent(t),this.input.dispatchEvent(e)}}],[{key:"createRangeSelect",value:function(t,e,n,r){t.innerHTML="";for(var o=e;o<=n;++o){var i=document.createElement("option");t.appendChild(i);var a=r?r[o-e]:o;i.text=a,i.value=o}return t}},{key:"absoluteDate",value:function(t){return t&&new Date(t.getTime()+60*t.getTimezoneOffset()*1e3)}}]),t}();window.thePicker=new s,e["default"]=window.thePicker},function(t,e,n){t.exports={"default":n(49),__esModule:!0}},function(t,e,n){t.exports={"default":n(50),__esModule:!0}},function(t,e,n){t.exports={"default":n(51),__esModule:!0}},function(t,e,n){t.exports={"default":n(52),__esModule:!0}},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}e.__esModule=!0;var o=n(47),i=r(o),a=n(46),u=r(a),s="function"==typeof u["default"]&&"symbol"==typeof i["default"]?function(t){return typeof t}:function(t){return t&&"function"==typeof u["default"]&&t.constructor===u["default"]?"symbol":typeof t};e["default"]="function"==typeof u["default"]&&"symbol"===s(i["default"])?function(t){return"undefined"==typeof t?"undefined":s(t)}:function(t){return t&&"function"==typeof u["default"]&&t.constructor===u["default"]?"symbol":"undefined"==typeof t?"undefined":s(t)}},function(t,e,n){n(73);var r=n(8).Object;t.exports=function(t,e){return r.defineProperties(t,e)}},function(t,e,n){n(74);var r=n(8).Object;t.exports=function(t,e,n){return r.defineProperty(t,e,n)}},function(t,e,n){n(77),n(75),n(78),n(79),t.exports=n(8).Symbol},function(t,e,n){n(76),n(80),t.exports=n(27).f("iterator")},function(t,e){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,e){t.exports=function(){}},function(t,e,n){var r=n(5),o=n(70),i=n(69);t.exports=function(t){return function(e,n,a){var u,s=r(e),c=o(s.length),l=i(a,c);if(t&&n!=n){for(;c>l;)if(u=s[l++],u!=u)return!0}else for(;c>l;l++)if((t||l in s)&&s[l]===n)return t||l||0;return!t&&-1}}},function(t,e,n){var r=n(53);t.exports=function(t,e,n){if(r(t),void 0===e)return t;switch(n){case 1:return function(n){return t.call(e,n)};case 2:return function(n,r){return t.call(e,n,r)};case 3:return function(n,r,o){return t.call(e,n,r,o)}}return function(){return t.apply(e,arguments)}}},function(t,e,n){var r=n(13),o=n(37),i=n(20);t.exports=function(t){var e=r(t),n=o.f;if(n)for(var a,u=n(t),s=i.f,c=0;u.length>c;)s.call(t,a=u[c++])&&e.push(a);return e}},function(t,e,n){t.exports=n(2).document&&document.documentElement},function(t,e,n){var r=n(30);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==r(t)?t.split(""):Object(t)}},function(t,e,n){var r=n(30);t.exports=Array.isArray||function(t){return"Array"==r(t)}},function(t,e,n){"use strict";var r=n(34),o=n(14),i=n(21),a={};n(6)(a,n(7)("iterator"),function(){return this}),t.exports=function(t,e,n){t.prototype=r(a,{next:o(1,n)}),i(t,e+" Iterator")}},function(t,e){t.exports=function(t,e){return{value:e,done:!!t}}},function(t,e,n){var r=n(13),o=n(5);t.exports=function(t,e){for(var n,i=o(t),a=r(i),u=a.length,s=0;u>s;)if(i[n=a[s++]]===e)return n}},function(t,e,n){var r=n(15)("meta"),o=n(12),i=n(3),a=n(4).f,u=0,s=Object.isExtensible||function(){return!0},c=!n(11)(function(){return s(Object.preventExtensions({}))}),l=function(t){a(t,r,{value:{i:"O"+ ++u,w:{}}})},f=function(t,e){if(!o(t))return"symbol"==typeof t?t:("string"==typeof t?"S":"P")+t;if(!i(t,r)){if(!s(t))return"F";if(!e)return"E";l(t)}return t[r].i},d=function(t,e){if(!i(t,r)){if(!s(t))return!0;if(!e)return!1;l(t)}return t[r].w},p=function(t){return c&&h.NEED&&s(t)&&!i(t,r)&&l(t),t},h=t.exports={KEY:r,NEED:!1,fastKey:f,getWeak:d,onFreeze:p}},function(t,e,n){var r=n(20),o=n(14),i=n(5),a=n(25),u=n(3),s=n(32),c=Object.getOwnPropertyDescriptor;e.f=n(1)?c:function(t,e){if(t=i(t),e=a(e,!0),s)try{return c(t,e)}catch(n){}if(u(t,e))return o(!r.f.call(t,e),t[e])}},function(t,e,n){var r=n(5),o=n(36).f,i={}.toString,a="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[],u=function(t){try{return o(t)}catch(e){return a.slice()}};t.exports.f=function(t){return a&&"[object Window]"==i.call(t)?u(t):o(r(t))}},function(t,e,n){var r=n(3),o=n(71),i=n(22)("IE_PROTO"),a=Object.prototype;t.exports=Object.getPrototypeOf||function(t){return t=o(t),r(t,i)?t[i]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?a:null}},function(t,e,n){var r=n(24),o=n(16);t.exports=function(t){return function(e,n){var i,a,u=String(o(e)),s=r(n),c=u.length;return s<0||s>=c?t?"":void 0:(i=u.charCodeAt(s),i<55296||i>56319||s+1===c||(a=u.charCodeAt(s+1))<56320||a>57343?t?u.charAt(s):i:t?u.slice(s,s+2):(i-55296<<10)+(a-56320)+65536)}}},function(t,e,n){var r=n(24),o=Math.max,i=Math.min;t.exports=function(t,e){return t=r(t),t<0?o(t+e,0):i(t,e)}},function(t,e,n){var r=n(24),o=Math.min;t.exports=function(t){return t>0?o(r(t),9007199254740991):0}},function(t,e,n){var r=n(16);t.exports=function(t){return Object(r(t))}},function(t,e,n){"use strict";var r=n(54),o=n(62),i=n(18),a=n(5);t.exports=n(33)(Array,"Array",function(t,e){this._t=a(t),this._i=0,this._k=e},function(){var t=this._t,e=this._k,n=this._i++;return!t||n>=t.length?(this._t=void 0,o(1)):"keys"==e?o(0,n):"values"==e?o(0,t[n]):o(0,[n,t[n]])},"values"),i.Arguments=i.Array,r("keys"),r("values"),r("entries")},function(t,e,n){var r=n(10);r(r.S+r.F*!n(1),"Object",{defineProperties:n(35)})},function(t,e,n){var r=n(10);r(r.S+r.F*!n(1),"Object",{defineProperty:n(4).f})},function(t,e){},function(t,e,n){"use strict";var r=n(68)(!0);n(33)(String,"String",function(t){this._t=String(t),this._i=0},function(){var t,e=this._t,n=this._i;return n>=e.length?{value:void 0,done:!0}:(t=r(e,n),this._i+=t.length,{value:t,done:!1})})},function(t,e,n){"use strict";var r=n(2),o=n(3),i=n(1),a=n(10),u=n(39),s=n(64).KEY,c=n(11),l=n(23),f=n(21),d=n(15),p=n(7),h=n(27),y=n(26),m=n(63),v=n(57),b=n(60),g=n(9),x=n(5),M=n(25),w=n(14),S=n(34),O=n(66),D=n(65),T=n(4),_=n(13),A=D.f,k=T.f,E=O.f,j=r.Symbol,C=r.JSON,N=C&&C.stringify,L="prototype",P=p("_hidden"),F=p("toPrimitive"),J={}.propertyIsEnumerable,H=l("symbol-registry"),I=l("symbols"),Y=l("op-symbols"),R=Object[L],z="function"==typeof j,U=r.QObject,B=!U||!U[L]||!U[L].findChild,W=i&&c(function(){return 7!=S(k({},"a",{get:function(){return k(this,"a",{value:7}).a}})).a})?function(t,e,n){var r=A(R,e);r&&delete R[e],k(t,e,n),r&&t!==R&&k(R,e,r)}:k,Z=function(t){var e=I[t]=S(j[L]);return e._k=t,e},G=z&&"symbol"==typeof j.iterator?function(t){return"symbol"==typeof t}:function(t){return t instanceof j},K=function(t,e,n){return t===R&&K(Y,e,n),g(t),e=M(e,!0),g(n),o(I,e)?(n.enumerable?(o(t,P)&&t[P][e]&&(t[P][e]=!1),n=S(n,{enumerable:w(0,!1)})):(o(t,P)||k(t,P,w(1,{})),t[P][e]=!0),W(t,e,n)):k(t,e,n)},V=function(t,e){g(t);for(var n,r=v(e=x(e)),o=0,i=r.length;i>o;)K(t,n=r[o++],e[n]);return t},q=function(t,e){return void 0===e?S(t):V(S(t),e)},Q=function(t){var e=J.call(this,t=M(t,!0));return!(this===R&&o(I,t)&&!o(Y,t))&&(!(e||!o(this,t)||!o(I,t)||o(this,P)&&this[P][t])||e)},X=function(t,e){if(t=x(t),e=M(e,!0),t!==R||!o(I,e)||o(Y,e)){var n=A(t,e);return!n||!o(I,e)||o(t,P)&&t[P][e]||(n.enumerable=!0),n}},$=function(t){for(var e,n=E(x(t)),r=[],i=0;n.length>i;)o(I,e=n[i++])||e==P||e==s||r.push(e);return r},tt=function(t){for(var e,n=t===R,r=E(n?Y:x(t)),i=[],a=0;r.length>a;)!o(I,e=r[a++])||n&&!o(R,e)||i.push(I[e]);return i};z||(j=function(){if(this instanceof j)throw TypeError("Symbol is not a constructor!");var t=d(arguments.length>0?arguments[0]:void 0),e=function(n){this===R&&e.call(Y,n),o(this,P)&&o(this[P],t)&&(this[P][t]=!1),W(this,t,w(1,n))};return i&&B&&W(R,t,{configurable:!0,set:e}),Z(t)},u(j[L],"toString",function(){return this._k}),D.f=X,T.f=K,n(36).f=O.f=$,n(20).f=Q,n(37).f=tt,i&&!n(19)&&u(R,"propertyIsEnumerable",Q,!0),h.f=function(t){return Z(p(t))}),a(a.G+a.W+a.F*!z,{Symbol:j});for(var et="hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables".split(","),nt=0;et.length>nt;)p(et[nt++]);for(var et=_(p.store),nt=0;et.length>nt;)y(et[nt++]);a(a.S+a.F*!z,"Symbol",{"for":function(t){return o(H,t+="")?H[t]:H[t]=j(t)},keyFor:function(t){if(G(t))return m(H,t);throw TypeError(t+" is not a symbol!")},useSetter:function(){B=!0},useSimple:function(){B=!1}}),a(a.S+a.F*!z,"Object",{create:q,defineProperty:K,defineProperties:V,getOwnPropertyDescriptor:X,getOwnPropertyNames:$,getOwnPropertySymbols:tt}),C&&a(a.S+a.F*(!z||c(function(){var t=j();return"[null]"!=N([t])||"{}"!=N({a:t})||"{}"!=N(Object(t))})),"JSON",{stringify:function(t){if(void 0!==t&&!G(t)){for(var e,n,r=[t],o=1;arguments.length>o;)r.push(arguments[o++]);return e=r[1],"function"==typeof e&&(n=e),!n&&b(e)||(e=function(t,e){if(n&&(e=n.call(this,t,e)),!G(e))return e}),r[1]=e,N.apply(C,r)}}}),j[L][F]||n(6)(j[L],F,j[L].valueOf),f(j,"Symbol"),f(Math,"Math",!0),f(r.JSON,"JSON",!0)},function(t,e,n){n(26)("asyncIterator")},function(t,e,n){n(26)("observable")},function(t,e,n){n(72);for(var r=n(2),o=n(6),i=n(18),a=n(7)("toStringTag"),u=["NodeList","DOMTokenList","MediaList","StyleSheetList","CSSRuleList"],s=0;s<5;s++){var c=u[s],l=r[c],f=l&&l.prototype;f&&!f[a]&&o(f,a,c),i[c]=i.Array}},function(t,e,n){e=t.exports=n(82)(),e.push([t.id,"date-input-polyfill{background:#fff;color:#000;text-shadow:none;border:0;padding:0;height:auto;width:auto;line-height:normal;font-family:sans-serif;font-size:14px;position:absolute!important;text-align:center;box-shadow:0 3px 10px 1px rgba(0,0,0,.22);cursor:default;z-index:1;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;overflow:hidden;display:block}date-input-polyfill[data-open=false]{visibility:hidden;z-index:-100!important;top:0}date-input-polyfill[data-open=true]{visibility:visible}date-input-polyfill select,date-input-polyfill table,date-input-polyfill td,date-input-polyfill th{background:#fff;color:#000;text-shadow:none;border:0;padding:0;height:auto;width:auto;line-height:normal;font-family:sans-serif;font-size:14px;box-shadow:none;font-family:Lato,Helvetica,Arial,sans-serif}date-input-polyfill button,date-input-polyfill select{border:0;border-radius:0;border-bottom:1px solid #dadfe1;height:24px;vertical-align:top;-webkit-appearance:none;-moz-appearance:none}date-input-polyfill .monthSelect-wrapper{width:55%;display:inline-block}date-input-polyfill .yearSelect-wrapper{width:25%;display:inline-block}date-input-polyfill select{width:100%}date-input-polyfill select:first-of-type{border-right:1px solid #dadfe1;border-radius:5px 0 0 0;-moz-border-radius:5px 0 0 0;-webkit-border-radius:5px 0 0 0}date-input-polyfill button{width:20%;background:#dadfe1;border-radius:0 5px 0 0;-moz-border-radius:0 5px 0 0;-webkit-border-radius:0 5px 0 0}date-input-polyfill button:hover{background:#eee}date-input-polyfill table{border-collapse:separate!important;border-radius:0 0 5px 5px;-moz-border-radius:0 0 5px 5px;-webkit-border-radius:0 0 5px 5px;overflow:hidden;max-width:280px;width:280px}date-input-polyfill td,date-input-polyfill th{width:32px;padding:4px;text-align:center;box-sizing:content-box}date-input-polyfill td[data-day]{cursor:pointer}date-input-polyfill td[data-day]:hover{background:#dadfe1}date-input-polyfill [data-selected]{font-weight:700;background:#d8eaf6}",""]);
},function(t,e){t.exports=function(){var t=[];return t.toString=function(){for(var t=[],e=0;e<this.length;e++){var n=this[e];n[2]?t.push("@media "+n[2]+"{"+n[1]+"}"):t.push(n[1])}return t.join("")},t.i=function(e,n){"string"==typeof e&&(e=[[null,e,""]]);for(var r={},o=0;o<this.length;o++){var i=this[o][0];"number"==typeof i&&(r[i]=!0)}for(o=0;o<e.length;o++){var a=e[o];"number"==typeof a[0]&&r[a[0]]||(n&&!a[2]?a[2]=n:n&&(a[2]="("+a[2]+") and ("+n+")"),t.push(a))}},t}},function(t,e,n){function r(t,e){for(var n=0;n<t.length;n++){var r=t[n],o=p[r.id];if(o){o.refs++;for(var i=0;i<o.parts.length;i++)o.parts[i](r.parts[i]);for(;i<r.parts.length;i++)o.parts.push(c(r.parts[i],e))}else{for(var a=[],i=0;i<r.parts.length;i++)a.push(c(r.parts[i],e));p[r.id]={id:r.id,refs:1,parts:a}}}}function o(t){for(var e=[],n={},r=0;r<t.length;r++){var o=t[r],i=o[0],a=o[1],u=o[2],s=o[3],c={css:a,media:u,sourceMap:s};n[i]?n[i].parts.push(c):e.push(n[i]={id:i,parts:[c]})}return e}function i(t,e){var n=m(),r=g[g.length-1];if("top"===t.insertAt)r?r.nextSibling?n.insertBefore(e,r.nextSibling):n.appendChild(e):n.insertBefore(e,n.firstChild),g.push(e);else{if("bottom"!==t.insertAt)throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");n.appendChild(e)}}function a(t){t.parentNode.removeChild(t);var e=g.indexOf(t);e>=0&&g.splice(e,1)}function u(t){var e=document.createElement("style");return e.type="text/css",i(t,e),e}function s(t){var e=document.createElement("link");return e.rel="stylesheet",i(t,e),e}function c(t,e){var n,r,o;if(e.singleton){var i=b++;n=v||(v=u(e)),r=l.bind(null,n,i,!1),o=l.bind(null,n,i,!0)}else t.sourceMap&&"function"==typeof URL&&"function"==typeof URL.createObjectURL&&"function"==typeof URL.revokeObjectURL&&"function"==typeof Blob&&"function"==typeof btoa?(n=s(e),r=d.bind(null,n),o=function(){a(n),n.href&&URL.revokeObjectURL(n.href)}):(n=u(e),r=f.bind(null,n),o=function(){a(n)});return r(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;r(t=e)}else o()}}function l(t,e,n,r){var o=n?"":r.css;if(t.styleSheet)t.styleSheet.cssText=x(e,o);else{var i=document.createTextNode(o),a=t.childNodes;a[e]&&t.removeChild(a[e]),a.length?t.insertBefore(i,a[e]):t.appendChild(i)}}function f(t,e){var n=e.css,r=e.media;if(r&&t.setAttribute("media",r),t.styleSheet)t.styleSheet.cssText=n;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(n))}}function d(t,e){var n=e.css,r=e.sourceMap;r&&(n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(r))))+" */");var o=new Blob([n],{type:"text/css"}),i=t.href;t.href=URL.createObjectURL(o),i&&URL.revokeObjectURL(i)}var p={},h=function(t){var e;return function(){return"undefined"==typeof e&&(e=t.apply(this,arguments)),e}},y=h(function(){return/msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase())}),m=h(function(){return document.head||document.getElementsByTagName("head")[0]}),v=null,b=0,g=[];t.exports=function(t,e){e=e||{},"undefined"==typeof e.singleton&&(e.singleton=y()),"undefined"==typeof e.insertAt&&(e.insertAt="bottom");var n=o(t);return r(n,e),function(t){for(var i=[],a=0;a<n.length;a++){var u=n[a],s=p[u.id];s.refs--,i.push(s)}if(t){var c=o(t);r(c,e)}for(var a=0;a<i.length;a++){var s=i[a];if(0===s.refs){for(var l=0;l<s.parts.length;l++)s.parts[l]();delete p[s.id]}}}};var x=function(){var t=[];return function(e,n){return t[e]=n,t.filter(Boolean).join("\n")}}()},function(t,e,n){var r=n(81);"string"==typeof r&&(r=[[t.id,r,""]]),n(83)(r,{}),r.locals&&(t.exports=r.locals)}])});

/***/ }),

/***/ "./node_modules/intersection-observer/intersection-observer.js":
/*!*********************************************************************!*\
  !*** ./node_modules/intersection-observer/intersection-observer.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the W3C SOFTWARE AND DOCUMENT NOTICE AND LICENSE.
 *
 *  https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
 *
 */

(function(window, document) {
'use strict';


// Exits early if all IntersectionObserver and IntersectionObserverEntry
// features are natively supported.
if ('IntersectionObserver' in window &&
    'IntersectionObserverEntry' in window &&
    'intersectionRatio' in window.IntersectionObserverEntry.prototype) {

  // Minimal polyfill for Edge 15's lack of `isIntersecting`
  // See: https://github.com/w3c/IntersectionObserver/issues/211
  if (!('isIntersecting' in window.IntersectionObserverEntry.prototype)) {
    Object.defineProperty(window.IntersectionObserverEntry.prototype,
      'isIntersecting', {
      get: function () {
        return this.intersectionRatio > 0;
      }
    });
  }
  return;
}


/**
 * An IntersectionObserver registry. This registry exists to hold a strong
 * reference to IntersectionObserver instances currently observing a target
 * element. Without this registry, instances without another reference may be
 * garbage collected.
 */
var registry = [];


/**
 * Creates the global IntersectionObserverEntry constructor.
 * https://w3c.github.io/IntersectionObserver/#intersection-observer-entry
 * @param {Object} entry A dictionary of instance properties.
 * @constructor
 */
function IntersectionObserverEntry(entry) {
  this.time = entry.time;
  this.target = entry.target;
  this.rootBounds = entry.rootBounds;
  this.boundingClientRect = entry.boundingClientRect;
  this.intersectionRect = entry.intersectionRect || getEmptyRect();
  this.isIntersecting = !!entry.intersectionRect;

  // Calculates the intersection ratio.
  var targetRect = this.boundingClientRect;
  var targetArea = targetRect.width * targetRect.height;
  var intersectionRect = this.intersectionRect;
  var intersectionArea = intersectionRect.width * intersectionRect.height;

  // Sets intersection ratio.
  if (targetArea) {
    // Round the intersection ratio to avoid floating point math issues:
    // https://github.com/w3c/IntersectionObserver/issues/324
    this.intersectionRatio = Number((intersectionArea / targetArea).toFixed(4));
  } else {
    // If area is zero and is intersecting, sets to 1, otherwise to 0
    this.intersectionRatio = this.isIntersecting ? 1 : 0;
  }
}


/**
 * Creates the global IntersectionObserver constructor.
 * https://w3c.github.io/IntersectionObserver/#intersection-observer-interface
 * @param {Function} callback The function to be invoked after intersection
 *     changes have queued. The function is not invoked if the queue has
 *     been emptied by calling the `takeRecords` method.
 * @param {Object=} opt_options Optional configuration options.
 * @constructor
 */
function IntersectionObserver(callback, opt_options) {

  var options = opt_options || {};

  if (typeof callback != 'function') {
    throw new Error('callback must be a function');
  }

  if (options.root && options.root.nodeType != 1) {
    throw new Error('root must be an Element');
  }

  // Binds and throttles `this._checkForIntersections`.
  this._checkForIntersections = throttle(
      this._checkForIntersections.bind(this), this.THROTTLE_TIMEOUT);

  // Private properties.
  this._callback = callback;
  this._observationTargets = [];
  this._queuedEntries = [];
  this._rootMarginValues = this._parseRootMargin(options.rootMargin);

  // Public properties.
  this.thresholds = this._initThresholds(options.threshold);
  this.root = options.root || null;
  this.rootMargin = this._rootMarginValues.map(function(margin) {
    return margin.value + margin.unit;
  }).join(' ');
}


/**
 * The minimum interval within which the document will be checked for
 * intersection changes.
 */
IntersectionObserver.prototype.THROTTLE_TIMEOUT = 100;


/**
 * The frequency in which the polyfill polls for intersection changes.
 * this can be updated on a per instance basis and must be set prior to
 * calling `observe` on the first target.
 */
IntersectionObserver.prototype.POLL_INTERVAL = null;

/**
 * Use a mutation observer on the root element
 * to detect intersection changes.
 */
IntersectionObserver.prototype.USE_MUTATION_OBSERVER = true;


/**
 * Starts observing a target element for intersection changes based on
 * the thresholds values.
 * @param {Element} target The DOM element to observe.
 */
IntersectionObserver.prototype.observe = function(target) {
  var isTargetAlreadyObserved = this._observationTargets.some(function(item) {
    return item.element == target;
  });

  if (isTargetAlreadyObserved) {
    return;
  }

  if (!(target && target.nodeType == 1)) {
    throw new Error('target must be an Element');
  }

  this._registerInstance();
  this._observationTargets.push({element: target, entry: null});
  this._monitorIntersections();
  this._checkForIntersections();
};


/**
 * Stops observing a target element for intersection changes.
 * @param {Element} target The DOM element to observe.
 */
IntersectionObserver.prototype.unobserve = function(target) {
  this._observationTargets =
      this._observationTargets.filter(function(item) {

    return item.element != target;
  });
  if (!this._observationTargets.length) {
    this._unmonitorIntersections();
    this._unregisterInstance();
  }
};


/**
 * Stops observing all target elements for intersection changes.
 */
IntersectionObserver.prototype.disconnect = function() {
  this._observationTargets = [];
  this._unmonitorIntersections();
  this._unregisterInstance();
};


/**
 * Returns any queue entries that have not yet been reported to the
 * callback and clears the queue. This can be used in conjunction with the
 * callback to obtain the absolute most up-to-date intersection information.
 * @return {Array} The currently queued entries.
 */
IntersectionObserver.prototype.takeRecords = function() {
  var records = this._queuedEntries.slice();
  this._queuedEntries = [];
  return records;
};


/**
 * Accepts the threshold value from the user configuration object and
 * returns a sorted array of unique threshold values. If a value is not
 * between 0 and 1 and error is thrown.
 * @private
 * @param {Array|number=} opt_threshold An optional threshold value or
 *     a list of threshold values, defaulting to [0].
 * @return {Array} A sorted list of unique and valid threshold values.
 */
IntersectionObserver.prototype._initThresholds = function(opt_threshold) {
  var threshold = opt_threshold || [0];
  if (!Array.isArray(threshold)) threshold = [threshold];

  return threshold.sort().filter(function(t, i, a) {
    if (typeof t != 'number' || isNaN(t) || t < 0 || t > 1) {
      throw new Error('threshold must be a number between 0 and 1 inclusively');
    }
    return t !== a[i - 1];
  });
};


/**
 * Accepts the rootMargin value from the user configuration object
 * and returns an array of the four margin values as an object containing
 * the value and unit properties. If any of the values are not properly
 * formatted or use a unit other than px or %, and error is thrown.
 * @private
 * @param {string=} opt_rootMargin An optional rootMargin value,
 *     defaulting to '0px'.
 * @return {Array<Object>} An array of margin objects with the keys
 *     value and unit.
 */
IntersectionObserver.prototype._parseRootMargin = function(opt_rootMargin) {
  var marginString = opt_rootMargin || '0px';
  var margins = marginString.split(/\s+/).map(function(margin) {
    var parts = /^(-?\d*\.?\d+)(px|%)$/.exec(margin);
    if (!parts) {
      throw new Error('rootMargin must be specified in pixels or percent');
    }
    return {value: parseFloat(parts[1]), unit: parts[2]};
  });

  // Handles shorthand.
  margins[1] = margins[1] || margins[0];
  margins[2] = margins[2] || margins[0];
  margins[3] = margins[3] || margins[1];

  return margins;
};


/**
 * Starts polling for intersection changes if the polling is not already
 * happening, and if the page's visibility state is visible.
 * @private
 */
IntersectionObserver.prototype._monitorIntersections = function() {
  if (!this._monitoringIntersections) {
    this._monitoringIntersections = true;

    // If a poll interval is set, use polling instead of listening to
    // resize and scroll events or DOM mutations.
    if (this.POLL_INTERVAL) {
      this._monitoringInterval = setInterval(
          this._checkForIntersections, this.POLL_INTERVAL);
    }
    else {
      addEvent(window, 'resize', this._checkForIntersections, true);
      addEvent(document, 'scroll', this._checkForIntersections, true);

      if (this.USE_MUTATION_OBSERVER && 'MutationObserver' in window) {
        this._domObserver = new MutationObserver(this._checkForIntersections);
        this._domObserver.observe(document, {
          attributes: true,
          childList: true,
          characterData: true,
          subtree: true
        });
      }
    }
  }
};


/**
 * Stops polling for intersection changes.
 * @private
 */
IntersectionObserver.prototype._unmonitorIntersections = function() {
  if (this._monitoringIntersections) {
    this._monitoringIntersections = false;

    clearInterval(this._monitoringInterval);
    this._monitoringInterval = null;

    removeEvent(window, 'resize', this._checkForIntersections, true);
    removeEvent(document, 'scroll', this._checkForIntersections, true);

    if (this._domObserver) {
      this._domObserver.disconnect();
      this._domObserver = null;
    }
  }
};


/**
 * Scans each observation target for intersection changes and adds them
 * to the internal entries queue. If new entries are found, it
 * schedules the callback to be invoked.
 * @private
 */
IntersectionObserver.prototype._checkForIntersections = function() {
  var rootIsInDom = this._rootIsInDom();
  var rootRect = rootIsInDom ? this._getRootRect() : getEmptyRect();

  this._observationTargets.forEach(function(item) {
    var target = item.element;
    var targetRect = getBoundingClientRect(target);
    var rootContainsTarget = this._rootContainsTarget(target);
    var oldEntry = item.entry;
    var intersectionRect = rootIsInDom && rootContainsTarget &&
        this._computeTargetAndRootIntersection(target, rootRect);

    var newEntry = item.entry = new IntersectionObserverEntry({
      time: now(),
      target: target,
      boundingClientRect: targetRect,
      rootBounds: rootRect,
      intersectionRect: intersectionRect
    });

    if (!oldEntry) {
      this._queuedEntries.push(newEntry);
    } else if (rootIsInDom && rootContainsTarget) {
      // If the new entry intersection ratio has crossed any of the
      // thresholds, add a new entry.
      if (this._hasCrossedThreshold(oldEntry, newEntry)) {
        this._queuedEntries.push(newEntry);
      }
    } else {
      // If the root is not in the DOM or target is not contained within
      // root but the previous entry for this target had an intersection,
      // add a new record indicating removal.
      if (oldEntry && oldEntry.isIntersecting) {
        this._queuedEntries.push(newEntry);
      }
    }
  }, this);

  if (this._queuedEntries.length) {
    this._callback(this.takeRecords(), this);
  }
};


/**
 * Accepts a target and root rect computes the intersection between then
 * following the algorithm in the spec.
 * TODO(philipwalton): at this time clip-path is not considered.
 * https://w3c.github.io/IntersectionObserver/#calculate-intersection-rect-algo
 * @param {Element} target The target DOM element
 * @param {Object} rootRect The bounding rect of the root after being
 *     expanded by the rootMargin value.
 * @return {?Object} The final intersection rect object or undefined if no
 *     intersection is found.
 * @private
 */
IntersectionObserver.prototype._computeTargetAndRootIntersection =
    function(target, rootRect) {

  // If the element isn't displayed, an intersection can't happen.
  if (window.getComputedStyle(target).display == 'none') return;

  var targetRect = getBoundingClientRect(target);
  var intersectionRect = targetRect;
  var parent = getParentNode(target);
  var atRoot = false;

  while (!atRoot) {
    var parentRect = null;
    var parentComputedStyle = parent.nodeType == 1 ?
        window.getComputedStyle(parent) : {};

    // If the parent isn't displayed, an intersection can't happen.
    if (parentComputedStyle.display == 'none') return;

    if (parent == this.root || parent == document) {
      atRoot = true;
      parentRect = rootRect;
    } else {
      // If the element has a non-visible overflow, and it's not the <body>
      // or <html> element, update the intersection rect.
      // Note: <body> and <html> cannot be clipped to a rect that's not also
      // the document rect, so no need to compute a new intersection.
      if (parent != document.body &&
          parent != document.documentElement &&
          parentComputedStyle.overflow != 'visible') {
        parentRect = getBoundingClientRect(parent);
      }
    }

    // If either of the above conditionals set a new parentRect,
    // calculate new intersection data.
    if (parentRect) {
      intersectionRect = computeRectIntersection(parentRect, intersectionRect);

      if (!intersectionRect) break;
    }
    parent = getParentNode(parent);
  }
  return intersectionRect;
};


/**
 * Returns the root rect after being expanded by the rootMargin value.
 * @return {Object} The expanded root rect.
 * @private
 */
IntersectionObserver.prototype._getRootRect = function() {
  var rootRect;
  if (this.root) {
    rootRect = getBoundingClientRect(this.root);
  } else {
    // Use <html>/<body> instead of window since scroll bars affect size.
    var html = document.documentElement;
    var body = document.body;
    rootRect = {
      top: 0,
      left: 0,
      right: html.clientWidth || body.clientWidth,
      width: html.clientWidth || body.clientWidth,
      bottom: html.clientHeight || body.clientHeight,
      height: html.clientHeight || body.clientHeight
    };
  }
  return this._expandRectByRootMargin(rootRect);
};


/**
 * Accepts a rect and expands it by the rootMargin value.
 * @param {Object} rect The rect object to expand.
 * @return {Object} The expanded rect.
 * @private
 */
IntersectionObserver.prototype._expandRectByRootMargin = function(rect) {
  var margins = this._rootMarginValues.map(function(margin, i) {
    return margin.unit == 'px' ? margin.value :
        margin.value * (i % 2 ? rect.width : rect.height) / 100;
  });
  var newRect = {
    top: rect.top - margins[0],
    right: rect.right + margins[1],
    bottom: rect.bottom + margins[2],
    left: rect.left - margins[3]
  };
  newRect.width = newRect.right - newRect.left;
  newRect.height = newRect.bottom - newRect.top;

  return newRect;
};


/**
 * Accepts an old and new entry and returns true if at least one of the
 * threshold values has been crossed.
 * @param {?IntersectionObserverEntry} oldEntry The previous entry for a
 *    particular target element or null if no previous entry exists.
 * @param {IntersectionObserverEntry} newEntry The current entry for a
 *    particular target element.
 * @return {boolean} Returns true if a any threshold has been crossed.
 * @private
 */
IntersectionObserver.prototype._hasCrossedThreshold =
    function(oldEntry, newEntry) {

  // To make comparing easier, an entry that has a ratio of 0
  // but does not actually intersect is given a value of -1
  var oldRatio = oldEntry && oldEntry.isIntersecting ?
      oldEntry.intersectionRatio || 0 : -1;
  var newRatio = newEntry.isIntersecting ?
      newEntry.intersectionRatio || 0 : -1;

  // Ignore unchanged ratios
  if (oldRatio === newRatio) return;

  for (var i = 0; i < this.thresholds.length; i++) {
    var threshold = this.thresholds[i];

    // Return true if an entry matches a threshold or if the new ratio
    // and the old ratio are on the opposite sides of a threshold.
    if (threshold == oldRatio || threshold == newRatio ||
        threshold < oldRatio !== threshold < newRatio) {
      return true;
    }
  }
};


/**
 * Returns whether or not the root element is an element and is in the DOM.
 * @return {boolean} True if the root element is an element and is in the DOM.
 * @private
 */
IntersectionObserver.prototype._rootIsInDom = function() {
  return !this.root || containsDeep(document, this.root);
};


/**
 * Returns whether or not the target element is a child of root.
 * @param {Element} target The target element to check.
 * @return {boolean} True if the target element is a child of root.
 * @private
 */
IntersectionObserver.prototype._rootContainsTarget = function(target) {
  return containsDeep(this.root || document, target);
};


/**
 * Adds the instance to the global IntersectionObserver registry if it isn't
 * already present.
 * @private
 */
IntersectionObserver.prototype._registerInstance = function() {
  if (registry.indexOf(this) < 0) {
    registry.push(this);
  }
};


/**
 * Removes the instance from the global IntersectionObserver registry.
 * @private
 */
IntersectionObserver.prototype._unregisterInstance = function() {
  var index = registry.indexOf(this);
  if (index != -1) registry.splice(index, 1);
};


/**
 * Returns the result of the performance.now() method or null in browsers
 * that don't support the API.
 * @return {number} The elapsed time since the page was requested.
 */
function now() {
  return window.performance && performance.now && performance.now();
}


/**
 * Throttles a function and delays its execution, so it's only called at most
 * once within a given time period.
 * @param {Function} fn The function to throttle.
 * @param {number} timeout The amount of time that must pass before the
 *     function can be called again.
 * @return {Function} The throttled function.
 */
function throttle(fn, timeout) {
  var timer = null;
  return function () {
    if (!timer) {
      timer = setTimeout(function() {
        fn();
        timer = null;
      }, timeout);
    }
  };
}


/**
 * Adds an event handler to a DOM node ensuring cross-browser compatibility.
 * @param {Node} node The DOM node to add the event handler to.
 * @param {string} event The event name.
 * @param {Function} fn The event handler to add.
 * @param {boolean} opt_useCapture Optionally adds the even to the capture
 *     phase. Note: this only works in modern browsers.
 */
function addEvent(node, event, fn, opt_useCapture) {
  if (typeof node.addEventListener == 'function') {
    node.addEventListener(event, fn, opt_useCapture || false);
  }
  else if (typeof node.attachEvent == 'function') {
    node.attachEvent('on' + event, fn);
  }
}


/**
 * Removes a previously added event handler from a DOM node.
 * @param {Node} node The DOM node to remove the event handler from.
 * @param {string} event The event name.
 * @param {Function} fn The event handler to remove.
 * @param {boolean} opt_useCapture If the event handler was added with this
 *     flag set to true, it should be set to true here in order to remove it.
 */
function removeEvent(node, event, fn, opt_useCapture) {
  if (typeof node.removeEventListener == 'function') {
    node.removeEventListener(event, fn, opt_useCapture || false);
  }
  else if (typeof node.detatchEvent == 'function') {
    node.detatchEvent('on' + event, fn);
  }
}


/**
 * Returns the intersection between two rect objects.
 * @param {Object} rect1 The first rect.
 * @param {Object} rect2 The second rect.
 * @return {?Object} The intersection rect or undefined if no intersection
 *     is found.
 */
function computeRectIntersection(rect1, rect2) {
  var top = Math.max(rect1.top, rect2.top);
  var bottom = Math.min(rect1.bottom, rect2.bottom);
  var left = Math.max(rect1.left, rect2.left);
  var right = Math.min(rect1.right, rect2.right);
  var width = right - left;
  var height = bottom - top;

  return (width >= 0 && height >= 0) && {
    top: top,
    bottom: bottom,
    left: left,
    right: right,
    width: width,
    height: height
  };
}


/**
 * Shims the native getBoundingClientRect for compatibility with older IE.
 * @param {Element} el The element whose bounding rect to get.
 * @return {Object} The (possibly shimmed) rect of the element.
 */
function getBoundingClientRect(el) {
  var rect;

  try {
    rect = el.getBoundingClientRect();
  } catch (err) {
    // Ignore Windows 7 IE11 "Unspecified error"
    // https://github.com/w3c/IntersectionObserver/pull/205
  }

  if (!rect) return getEmptyRect();

  // Older IE
  if (!(rect.width && rect.height)) {
    rect = {
      top: rect.top,
      right: rect.right,
      bottom: rect.bottom,
      left: rect.left,
      width: rect.right - rect.left,
      height: rect.bottom - rect.top
    };
  }
  return rect;
}


/**
 * Returns an empty rect object. An empty rect is returned when an element
 * is not in the DOM.
 * @return {Object} The empty rect.
 */
function getEmptyRect() {
  return {
    top: 0,
    bottom: 0,
    left: 0,
    right: 0,
    width: 0,
    height: 0
  };
}

/**
 * Checks to see if a parent element contains a child element (including inside
 * shadow DOM).
 * @param {Node} parent The parent element.
 * @param {Node} child The child element.
 * @return {boolean} True if the parent node contains the child node.
 */
function containsDeep(parent, child) {
  var node = child;
  while (node) {
    if (node == parent) return true;

    node = getParentNode(node);
  }
  return false;
}


/**
 * Gets the parent node of an element or its host element if the parent node
 * is a shadow root.
 * @param {Node} node The node whose parent to get.
 * @return {Node|null} The parent node or null if no parent exists.
 */
function getParentNode(node) {
  var parent = node.parentNode;

  if (parent && parent.nodeType == 11 && parent.host) {
    // If the parent is a shadow root, return the host element.
    return parent.host;
  }

  if (parent && parent.assignedSlot) {
    // If the parent is distributed in a <slot>, return the parent of a slot.
    return parent.assignedSlot.parentNode;
  }

  return parent;
}


// Exposes the constructors globally.
window.IntersectionObserver = IntersectionObserver;
window.IntersectionObserverEntry = IntersectionObserverEntry;

}(window, document));


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! intersection-observer */ "./node_modules/intersection-observer/intersection-observer.js");

window.smoothScroll = __webpack_require__(/*! ./smoothscroll.min */ "./resources/js/smoothscroll.min.js"); // require('./bootstrap');

__webpack_require__(/*! ./scroller */ "./resources/js/scroller.js");

__webpack_require__(/*! date-input-polyfill */ "./node_modules/date-input-polyfill/date-input-polyfill.dist.js"); // const geoLocationButton = document.querySelector('.geolocation-button');
// if(geoLocationButton) {
//   geoLocationButton.onclick = function() {
//     var startPos;
//     var nudge = document.getElementById("nudge");
//
//     var showNudgeBanner = function() {
//       nudge.style.display = "block";
//     };
//
//     var hideNudgeBanner = function() {
//       nudge.style.display = "none";
//     };
//
//     var nudgeTimeoutId = setTimeout(showNudgeBanner, 5000);
//
//     var geoSuccess = function(position) {
//       hideNudgeBanner();
//       // We have the location, don't display banner
//       clearTimeout(nudgeTimeoutId);
// console.log('success');
//       // Do magic with location
//       startPos = position;
//       document.getElementById('startLat').innerHTML = startPos.coords.latitude;
//       document.getElementById('startLon').innerHTML = startPos.coords.longitude;
//     };
//     var geoError = function(error) {
//       nudge.innerHTML = 'Error code ' + error.code;
//       switch(error.code) {
//         case error.TIMEOUT:
//           // The user didn't accept the callout
//           showNudgeBanner();
//           break;
//       }
//     };
//
//     navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
//   };
//
// }


var footerElement = document.querySelector('.primary-footer');

if (footerElement && 'IntersectionObserver' in window) {
  document.body.classList.remove('intersectionless-footer');
  createObserver();
}

function createObserver() {
  var observer = new IntersectionObserver(handleIntersect, {
    root: null,
    rootMargin: '0px',
    threshold: [0.5, 1]
  });
  observer.observe(footerElement);
}

function handleIntersect(entry) {
  if (entry[0].intersectionRatio > 0.5) {
    document.body.classList.add('has-visible-footer');
  } else {
    document.body.classList.remove('has-visible-footer');
  }
} //  Close buttons


var closeButton = document.querySelector('.alert .close');

if (closeButton) {
  closeButton.addEventListener('click', function (e) {
    var alert = e.target.parentNode.parentNode;
    alert.parentNode.removeChild(alert);
  });
} // Prevent form submit on enter


function stopReturnKey(evt) {
  if (evt.keyCode == 13) {
    if (evt.target.type == "text" || evt.target.type == "email" || evt.target.type == "password") {
      return false;
    }
  }
}

var formsThatDontSubmitOnEnter = document.querySelector('.do-not-submit-on-return');

if (formsThatDontSubmitOnEnter) {
  for (var i = 0; i < formsThatDontSubmitOnEnter.length; i++) {
    formsThatDontSubmitOnEnter[i].onkeydown = stopReturnKey;
  }
}

var filterHeadings = document.querySelectorAll('.filter-heading');

if (filterHeadings) {
  for (var i = 0; i < filterHeadings.length; i++) {
    filterHeadings[i].addEventListener('click', function (e) {
      if (e.target.nextElementSibling.classList.contains('expanded')) {
        e.target.nextElementSibling.classList.remove('expanded');
      } else {
        var currentPanel = document.querySelector('.expanded');
        if (currentPanel) currentPanel.classList.remove('expanded');
        e.target.nextElementSibling.classList.add('expanded');
      }
    });
  }
}

function smoothScroll(distance, duration) {
  var app = document.querySelector('#app');
  var i = 0;
  var frameRate = 16;
  var frames = duration / 16;
  var distancePerFrame = distance / frames;
  setInterval(function () {
    i = i + distancePerFrame;

    if (i < distance) {
      app.scroll(0, i);
    }
  }, frameRate);
}

;
var recordButton = document.querySelector('#record-screen');

if (recordButton) {
  recordButton.addEventListener('click', function () {
    smoothScroll(1000, 4000);
  });
}

/***/ }),

/***/ "./resources/js/scroller.js":
/*!**********************************!*\
  !*** ./resources/js/scroller.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var scrollers = document.querySelectorAll('.scroller-outer');

var _loop = function _loop() {
  var scrollerInner = scrollers[i].querySelector('.scroller-inner');
  var nextButton = scrollers[i].querySelector('.scroller-next');
  var prevButton = scrollers[i].querySelector('.scroller-previous'); // let margin = scrollerInner.firstElementChild.offsetLeft;

  var margin = scrollerInner.firstElementChild.offsetLeft - scrollerInner.offsetLeft;
  var slideBy = scrollers[i].dataset.slideby || .5;

  function themeScroll(direction) {
    var dir = 1;

    if (direction == 'backwards') {
      dir = -1;
    } // let newScroll = scrollerInner.scrollLeft - scrollerInner.clientWidth * .5 * dir;


    var newScroll = scrollerInner.scrollLeft - (scrollerInner.clientWidth * slideBy - margin * slideBy) * dir;
    smoothScroll(newScroll, 500, null, scrollerInner, 'horizontal');
  }

  if (scrollerInner && nextButton) {
    body = document.querySelector('body');
    dragging = false;
    scrollerInner.addEventListener('scroll', function (e) {
      if (this.scrollWidth - this.clientWidth - this.scrollLeft === 0) {
        nextButton.setAttribute('tabindex', '-1');
        prevButton.removeAttribute('tabindex');
      } else if (this.scrollLeft == 0) {
        prevButton.setAttribute('tabindex', '-1');
        nextButton.removeAttribute('tabindex');
      } else {
        nextButton.removeAttribute('tabindex');
        prevButton.removeAttribute('tabindex');
      }
    });
    scrollerInner.addEventListener('mousemove', function mouseMoveScroller(e) {
      if (curDown) {
        dragging = true;
        scrollerInner.classList.add('grabbing'); //curXPos is where the click begins

        scrollerInner.scrollLeft = curLeft - 1.35 * (e.pageX - curXPos);

        if (Math.abs(e.pageY - curYPos) > 60) {
          curDown = false;
        }
      }
    });
    scrollerInner.addEventListener('mousedown', function mouseDownScroller(e) {
      curXPos = e.pageX;
      curYPos = e.pageY;
      curDown = true;
      curLeft = scrollerInner.scrollLeft;
      dragging = false;
    });
    scrollerInner.addEventListener('mouseup', function mouseUpScroller(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });
    scrollerInner.addEventListener('mouseleave', function mouseLeaveScroller(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });
    window.addEventListener('touchstart', function setHasTouch() {
      hasTouch = true; // Remove event listener once fired, otherwise it'll kill scrolling
      // performance

      window.removeEventListener('touchstart', setHasTouch);
      scrollerInner.removeEventListener('mousemove', mouseMoveScroller);
      scrollerInner.removeEventListener('mousedown', mouseDownScroller);
      scrollerInner.removeEventListener('mouseup', mouseUpScroller);
      scrollerInner.removeEventListener('mouseleave', mouseLeaveScroller);
    }, false);
    nextButton.addEventListener('click', function () {
      themeScroll('backwards');
    });
    prevButton.addEventListener('click', function () {
      themeScroll();
    });
  }
};

for (var i = 0; i < scrollers.length; i++) {
  var body;
  var curYPos, curXPos, curDown, dragging;
  var hasTouch;

  _loop();
}

/***/ }),

/***/ "./resources/js/smoothscroll.min.js":
/*!******************************************!*\
  !*** ./resources/js/smoothscroll.min.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (root, smoothScroll) {
  'use strict'; // Support RequireJS and CommonJS/NodeJS module formats.
  // Attach smoothScroll to the `window` when executed as a <script>.
  // RequireJS

  if (true) {
    !(__WEBPACK_AMD_DEFINE_FACTORY__ = (smoothScroll),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)); // CommonJS
  } else {}
})(this, function () {
  'use strict'; // Do not initialize smoothScroll when running server side, handle it in client:

  if ((typeof window === "undefined" ? "undefined" : _typeof(window)) !== 'object') return; // We do not want this script to be applied in browsers that do not support those
  // That means no smoothscroll on IE9 and below.

  if (document.querySelectorAll === void 0 || window.pageYOffset === void 0 || history.pushState === void 0) {
    return;
  } // Get the top position of an element in the document


  var getTop = function getTop(element, start) {
    // return value of html.getBoundingClientRect().top ... IE : 0, other browsers : -pageYOffset
    if (element.nodeName === 'HTML') return -start;
    return element.getBoundingClientRect().top + start;
  }; // Get the top position of an element in the document


  var getLeft = function getLeft(element, start) {
    // return value of html.getBoundingClientRect().top ... IE : 0, other browsers : -pageYOffset
    if (element.nodeName === 'HTML') return -start;
    return element.getBoundingClientRect().left + start;
  }; // ease in out function thanks to:
  // http://blog.greweb.fr/2012/02/bezier-curve-based-easing-functions-from-concept-to-implementation/


  var easeInOutCubic = function easeInOutCubic(t) {
    return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
  }; // calculate the scroll position we should be in
  // given the start and end point of the scroll
  // the time elapsed from the beginning of the scroll
  // and the total duration of the scroll (default 500ms)


  var position = function position(start, end, elapsed, duration) {
    if (elapsed > duration) return end;
    return start + (end - start) * easeInOutCubic(elapsed / duration); // <-- you can change the easing funtion there
    // return start + (end - start) * (elapsed / duration); // <-- this would give a linear scroll
  }; // we use requestAnimationFrame to be called by the browser before every repaint
  // if the first argument is an element then scroll to the top of this element
  // if the first argument is numeric then scroll to this location
  // if the callback exist, it is called when the scrolling is finished
  // if context is set then scroll that element, else scroll window


  var smoothScroll = function smoothScroll(el, duration, callback, context, direction, offset) {
    duration = duration || 500;
    context = context || window;
    offset = offset || 0;

    if (direction === 'horizontal') {
      var start = context.scrollLeft || window.pageXOffset;
    } else {
      var start = context.scrollTop || window.pageYOffset;
    }

    if (typeof el === 'number') {
      var end = parseInt(el);
    } else {
      if (direction === 'horizontal') {
        var end = getLeft(el, start) + offset;
      } else {
        var end = getTop(el, start) + offset;
      }
    }

    var clock = Date.now();

    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || function (fn) {
      window.setTimeout(fn, 15);
    };

    var step = function step() {
      var elapsed = Date.now() - clock;

      if (context !== window) {
        if (direction === 'horizontal') {
          context.scrollLeft = position(start, end, elapsed, duration);
        } else {
          context.scrollTop = position(start, end, elapsed, duration);
        }
      } else {
        if (direction === 'horizontal') {
          window.scroll(position(start, end, elapsed, duration), 0);
        } else {
          window.scroll(0, position(start, end, elapsed, duration));
        }
      }

      if (elapsed > duration) {
        if (typeof callback === 'function') {
          callback(el);
        }
      } else {
        requestAnimationFrame(step);
      }
    };

    step();
  };

  var linkHandler = function linkHandler(ev) {
    ev.preventDefault();
    if (location.hash !== this.hash) window.history.pushState(null, null, this.hash); // using the history api to solve issue #1 - back doesn't work
    // most browser don't update :target when the history api is used:
    // THIS IS A BUG FROM THE BROWSERS.
    // change the scrolling duration in this call

    var node = document.getElementById(this.hash.substring(1));
    if (!node) return; // Do not scroll to non-existing node

    smoothScroll(node, 500, function (el) {
      location.replace('#' + el.id); // this will cause the :target to be activated.
    });
  }; // We look for all the internal links in the documents and attach the smoothscroll function


  document.addEventListener("DOMContentLoaded", function () {
    var internal = document.querySelectorAll('a[href^="#"]:not([href="#"])'),
        a;

    for (var i = internal.length; a = internal[--i];) {
      if (!a.dataset.noscroll) {
        a.addEventListener("click", linkHandler, false);
      }
    }
  }); // return smoothscroll API

  return smoothScroll;
});

/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/admin.scss ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/johnpuddephatt/Sites/volunteer/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/johnpuddephatt/Sites/volunteer/resources/sass/app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! /Users/johnpuddephatt/Sites/volunteer/resources/sass/admin.scss */"./resources/sass/admin.scss");


/***/ })

/******/ });