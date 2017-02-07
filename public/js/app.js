/*! jQuery v3.0.0 | (c) jQuery Foundation | jquery.org/license */
!function(a,b){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){"use strict";var c=[],d=a.document,e=Object.getPrototypeOf,f=c.slice,g=c.concat,h=c.push,i=c.indexOf,j={},k=j.toString,l=j.hasOwnProperty,m=l.toString,n=m.call(Object),o={};function p(a,b){b=b||d;var c=b.createElement("script");c.text=a,b.head.appendChild(c).parentNode.removeChild(c)}var q="3.0.0",r=function(a,b){return new r.fn.init(a,b)},s=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,t=/^-ms-/,u=/-([a-z])/g,v=function(a,b){return b.toUpperCase()};r.fn=r.prototype={jquery:q,constructor:r,length:0,toArray:function(){return f.call(this)},get:function(a){return null!=a?0>a?this[a+this.length]:this[a]:f.call(this)},pushStack:function(a){var b=r.merge(this.constructor(),a);return b.prevObject=this,b},each:function(a){return r.each(this,a)},map:function(a){return this.pushStack(r.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(f.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(0>a?b:0);return this.pushStack(c>=0&&b>c?[this[c]]:[])},end:function(){return this.prevObject||this.constructor()},push:h,sort:c.sort,splice:c.splice},r.extend=r.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||r.isFunction(g)||(g={}),h===i&&(g=this,h--);i>h;h++)if(null!=(a=arguments[h]))for(b in a)c=g[b],d=a[b],g!==d&&(j&&d&&(r.isPlainObject(d)||(e=r.isArray(d)))?(e?(e=!1,f=c&&r.isArray(c)?c:[]):f=c&&r.isPlainObject(c)?c:{},g[b]=r.extend(j,f,d)):void 0!==d&&(g[b]=d));return g},r.extend({expando:"jQuery"+(q+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===r.type(a)},isArray:Array.isArray,isWindow:function(a){return null!=a&&a===a.window},isNumeric:function(a){var b=r.type(a);return("number"===b||"string"===b)&&!isNaN(a-parseFloat(a))},isPlainObject:function(a){var b,c;return a&&"[object Object]"===k.call(a)?(b=e(a))?(c=l.call(b,"constructor")&&b.constructor,"function"==typeof c&&m.call(c)===n):!0:!1},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?j[k.call(a)]||"object":typeof a},globalEval:function(a){p(a)},camelCase:function(a){return a.replace(t,"ms-").replace(u,v)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b){var c,d=0;if(w(a)){for(c=a.length;c>d;d++)if(b.call(a[d],d,a[d])===!1)break}else for(d in a)if(b.call(a[d],d,a[d])===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(s,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(w(Object(a))?r.merge(c,"string"==typeof a?[a]:a):h.call(c,a)),c},inArray:function(a,b,c){return null==b?-1:i.call(b,a,c)},merge:function(a,b){for(var c=+b.length,d=0,e=a.length;c>d;d++)a[e++]=b[d];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;g>f;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,e,f=0,h=[];if(w(a))for(d=a.length;d>f;f++)e=b(a[f],f,c),null!=e&&h.push(e);else for(f in a)e=b(a[f],f,c),null!=e&&h.push(e);return g.apply([],h)},guid:1,proxy:function(a,b){var c,d,e;return"string"==typeof b&&(c=a[b],b=a,a=c),r.isFunction(a)?(d=f.call(arguments,2),e=function(){return a.apply(b||this,d.concat(f.call(arguments)))},e.guid=a.guid=a.guid||r.guid++,e):void 0},now:Date.now,support:o}),"function"==typeof Symbol&&(r.fn[Symbol.iterator]=c[Symbol.iterator]),r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(a,b){j["[object "+b+"]"]=b.toLowerCase()});function w(a){var b=!!a&&"length"in a&&a.length,c=r.type(a);return"function"===c||r.isWindow(a)?!1:"array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a}var x=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=ha(),z=ha(),A=ha(),B=function(a,b){return a===b&&(l=!0),0},C={}.hasOwnProperty,D=[],E=D.pop,F=D.push,G=D.push,H=D.slice,I=function(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return c;return-1},J="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",K="[\\x20\\t\\r\\n\\f]",L="(?:\\\\.|[\\w-]|[^\x00-\\xa0])+",M="\\["+K+"*("+L+")(?:"+K+"*([*^$|!~]?=)"+K+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+L+"))|)"+K+"*\\]",N=":("+L+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+M+")*)|.*)\\)|)",O=new RegExp(K+"+","g"),P=new RegExp("^"+K+"+|((?:^|[^\\\\])(?:\\\\.)*)"+K+"+$","g"),Q=new RegExp("^"+K+"*,"+K+"*"),R=new RegExp("^"+K+"*([>+~]|"+K+")"+K+"*"),S=new RegExp("="+K+"*([^\\]'\"]*?)"+K+"*\\]","g"),T=new RegExp(N),U=new RegExp("^"+L+"$"),V={ID:new RegExp("^#("+L+")"),CLASS:new RegExp("^\\.("+L+")"),TAG:new RegExp("^("+L+"|[*])"),ATTR:new RegExp("^"+M),PSEUDO:new RegExp("^"+N),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+K+"*(even|odd|(([+-]|)(\\d*)n|)"+K+"*(?:([+-]|)"+K+"*(\\d+)|))"+K+"*\\)|)","i"),bool:new RegExp("^(?:"+J+")$","i"),needsContext:new RegExp("^"+K+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+K+"*((?:-\\d)?\\d*)"+K+"*\\)|)(?=[^-]|$)","i")},W=/^(?:input|select|textarea|button)$/i,X=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,$=/[+~]/,_=new RegExp("\\\\([\\da-f]{1,6}"+K+"?|("+K+")|.)","ig"),aa=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:0>d?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},ba=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,ca=function(a,b){return b?"\x00"===a?"\ufffd":a.slice(0,-1)+"\\"+a.charCodeAt(a.length-1).toString(16)+" ":"\\"+a},da=function(){m()},ea=ta(function(a){return a.disabled===!0},{dir:"parentNode",next:"legend"});try{G.apply(D=H.call(v.childNodes),v.childNodes),D[v.childNodes.length].nodeType}catch(fa){G={apply:D.length?function(a,b){F.apply(a,H.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function ga(a,b,d,e){var f,h,j,k,l,o,r,s=b&&b.ownerDocument,w=b?b.nodeType:9;if(d=d||[],"string"!=typeof a||!a||1!==w&&9!==w&&11!==w)return d;if(!e&&((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,p)){if(11!==w&&(l=Z.exec(a)))if(f=l[1]){if(9===w){if(!(j=b.getElementById(f)))return d;if(j.id===f)return d.push(j),d}else if(s&&(j=s.getElementById(f))&&t(b,j)&&j.id===f)return d.push(j),d}else{if(l[2])return G.apply(d,b.getElementsByTagName(a)),d;if((f=l[3])&&c.getElementsByClassName&&b.getElementsByClassName)return G.apply(d,b.getElementsByClassName(f)),d}if(c.qsa&&!A[a+" "]&&(!q||!q.test(a))){if(1!==w)s=b,r=a;else if("object"!==b.nodeName.toLowerCase()){(k=b.getAttribute("id"))?k=k.replace(ba,ca):b.setAttribute("id",k=u),o=g(a),h=o.length;while(h--)o[h]="#"+k+" "+sa(o[h]);r=o.join(","),s=$.test(a)&&qa(b.parentNode)||b}if(r)try{return G.apply(d,s.querySelectorAll(r)),d}catch(x){}finally{k===u&&b.removeAttribute("id")}}}return i(a.replace(P,"$1"),b,d,e)}function ha(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ia(a){return a[u]=!0,a}function ja(a){var b=n.createElement("fieldset");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function ka(a,b){var c=a.split("|"),e=c.length;while(e--)d.attrHandle[c[e]]=b}function la(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&a.sourceIndex-b.sourceIndex;if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function ma(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function na(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function oa(a){return function(b){return"label"in b&&b.disabled===a||"form"in b&&b.disabled===a||"form"in b&&b.disabled===!1&&(b.isDisabled===a||b.isDisabled!==!a&&("label"in b||!ea(b))!==a)}}function pa(a){return ia(function(b){return b=+b,ia(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function qa(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=ga.support={},f=ga.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return b?"HTML"!==b.nodeName:!1},m=ga.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=n.documentElement,p=!f(n),v!==n&&(e=n.defaultView)&&e.top!==e&&(e.addEventListener?e.addEventListener("unload",da,!1):e.attachEvent&&e.attachEvent("onunload",da)),c.attributes=ja(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=ja(function(a){return a.appendChild(n.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=Y.test(n.getElementsByClassName),c.getById=ja(function(a){return o.appendChild(a).id=u,!n.getElementsByName||!n.getElementsByName(u).length}),c.getById?(d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c?[c]:[]}},d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){return a.getAttribute("id")===b}}):(delete d.find.ID,d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){return"undefined"!=typeof b.getElementsByClassName&&p?b.getElementsByClassName(a):void 0},r=[],q=[],(c.qsa=Y.test(n.querySelectorAll))&&(ja(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\r\\' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+K+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+K+"*(?:value|"+J+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),ja(function(a){a.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var b=n.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+K+"*[*^$|!~]?="),2!==a.querySelectorAll(":enabled").length&&q.push(":enabled",":disabled"),o.appendChild(a).disabled=!0,2!==a.querySelectorAll(":disabled").length&&q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=Y.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&ja(function(a){c.disconnectedMatch=s.call(a,"*"),s.call(a,"[s!='']:x"),r.push("!=",N)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=Y.test(o.compareDocumentPosition),t=b||Y.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===n||a.ownerDocument===v&&t(v,a)?-1:b===n||b.ownerDocument===v&&t(v,b)?1:k?I(k,a)-I(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,g=[a],h=[b];if(!e||!f)return a===n?-1:b===n?1:e?-1:f?1:k?I(k,a)-I(k,b):0;if(e===f)return la(a,b);c=a;while(c=c.parentNode)g.unshift(c);c=b;while(c=c.parentNode)h.unshift(c);while(g[d]===h[d])d++;return d?la(g[d],h[d]):g[d]===v?-1:h[d]===v?1:0},n):n},ga.matches=function(a,b){return ga(a,null,null,b)},ga.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(S,"='$1']"),c.matchesSelector&&p&&!A[b+" "]&&(!r||!r.test(b))&&(!q||!q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return ga(b,n,null,[a]).length>0},ga.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},ga.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&C.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},ga.escape=function(a){return(a+"").replace(ba,ca)},ga.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},ga.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=ga.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=ga.selectors={cacheLength:50,createPseudo:ia,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(_,aa),a[3]=(a[3]||a[4]||a[5]||"").replace(_,aa),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||ga.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&ga.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return V.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&T.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(_,aa).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+K+")"+a+"("+K+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=ga.attr(d,a);return null==e?"!="===b:b?(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(O," ")+" ").indexOf(c)>-1:"|="===b?e===c||e.slice(0,c.length+1)===c+"-":!1):!0}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h,t=!1;if(q){if(f){while(p){m=b;while(m=m[p])if(h?m.nodeName.toLowerCase()===r:1===m.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){m=q,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n&&j[2],m=n&&q.childNodes[n];while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if(1===m.nodeType&&++t&&m===b){k[a]=[w,n,t];break}}else if(s&&(m=b,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n),t===!1)while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if((h?m.nodeName.toLowerCase()===r:1===m.nodeType)&&++t&&(s&&(l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),k[a]=[w,t]),m===b))break;return t-=e,t===d||t%d===0&&t/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||ga.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ia(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=I(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ia(function(a){var b=[],c=[],d=h(a.replace(P,"$1"));return d[u]?ia(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ia(function(a){return function(b){return ga(a,b).length>0}}),contains:ia(function(a){return a=a.replace(_,aa),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ia(function(a){return U.test(a||"")||ga.error("unsupported lang: "+a),a=a.replace(_,aa).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:oa(!1),disabled:oa(!0),checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return X.test(a.nodeName)},input:function(a){return W.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:pa(function(){return[0]}),last:pa(function(a,b){return[b-1]}),eq:pa(function(a,b,c){return[0>c?c+b:c]}),even:pa(function(a,b){for(var c=0;b>c;c+=2)a.push(c);return a}),odd:pa(function(a,b){for(var c=1;b>c;c+=2)a.push(c);return a}),lt:pa(function(a,b,c){for(var d=0>c?c+b:c;--d>=0;)a.push(d);return a}),gt:pa(function(a,b,c){for(var d=0>c?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=ma(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=na(b);function ra(){}ra.prototype=d.filters=d.pseudos,d.setFilters=new ra,g=ga.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){c&&!(e=Q.exec(h))||(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=R.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(P," ")}),h=h.slice(c.length));for(g in d.filter)!(e=V[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?ga.error(a):z(a,i).slice(0)};function sa(a){for(var b=0,c=a.length,d="";c>b;b++)d+=a[b].value;return d}function ta(a,b,c){var d=b.dir,e=b.next,f=e||d,g=c&&"parentNode"===f,h=x++;return b.first?function(b,c,e){while(b=b[d])if(1===b.nodeType||g)return a(b,c,e)}:function(b,c,i){var j,k,l,m=[w,h];if(i){while(b=b[d])if((1===b.nodeType||g)&&a(b,c,i))return!0}else while(b=b[d])if(1===b.nodeType||g)if(l=b[u]||(b[u]={}),k=l[b.uniqueID]||(l[b.uniqueID]={}),e&&e===b.nodeName.toLowerCase())b=b[d]||b;else{if((j=k[f])&&j[0]===w&&j[1]===h)return m[2]=j[2];if(k[f]=m,m[2]=a(b,c,i))return!0}}}function ua(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function va(a,b,c){for(var d=0,e=b.length;e>d;d++)ga(a,b[d],c);return c}function wa(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;i>h;h++)(f=a[h])&&(c&&!c(f,d,e)||(g.push(f),j&&b.push(h)));return g}function xa(a,b,c,d,e,f){return d&&!d[u]&&(d=xa(d)),e&&!e[u]&&(e=xa(e,f)),ia(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||va(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:wa(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=wa(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?I(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=wa(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):G.apply(g,r)})}function ya(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=ta(function(a){return a===b},h,!0),l=ta(function(a){return I(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];f>i;i++)if(c=d.relative[a[i].type])m=[ta(ua(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;f>e;e++)if(d.relative[a[e].type])break;return xa(i>1&&ua(m),i>1&&sa(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(P,"$1"),c,e>i&&ya(a.slice(i,e)),f>e&&ya(a=a.slice(e)),f>e&&sa(a))}m.push(c)}return ua(m)}function za(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,o,q,r=0,s="0",t=f&&[],u=[],v=j,x=f||e&&d.find.TAG("*",k),y=w+=null==v?1:Math.random()||.1,z=x.length;for(k&&(j=g===n||g||k);s!==z&&null!=(l=x[s]);s++){if(e&&l){o=0,g||l.ownerDocument===n||(m(l),h=!p);while(q=a[o++])if(q(l,g||n,h)){i.push(l);break}k&&(w=y)}c&&((l=!q&&l)&&r--,f&&t.push(l))}if(r+=s,c&&s!==r){o=0;while(q=b[o++])q(t,u,g,h);if(f){if(r>0)while(s--)t[s]||u[s]||(u[s]=E.call(i));u=wa(u)}G.apply(i,u),k&&!f&&u.length>0&&r+b.length>1&&ga.uniqueSort(i)}return k&&(w=y,j=v),t};return c?ia(f):f}return h=ga.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=ya(b[c]),f[u]?d.push(f):e.push(f);f=A(a,za(e,d)),f.selector=a}return f},i=ga.select=function(a,b,e,f){var i,j,k,l,m,n="function"==typeof a&&a,o=!f&&g(a=n.selector||a);if(e=e||[],1===o.length){if(j=o[0]=o[0].slice(0),j.length>2&&"ID"===(k=j[0]).type&&c.getById&&9===b.nodeType&&p&&d.relative[j[1].type]){if(b=(d.find.ID(k.matches[0].replace(_,aa),b)||[])[0],!b)return e;n&&(b=b.parentNode),a=a.slice(j.shift().value.length)}i=V.needsContext.test(a)?0:j.length;while(i--){if(k=j[i],d.relative[l=k.type])break;if((m=d.find[l])&&(f=m(k.matches[0].replace(_,aa),$.test(j[0].type)&&qa(b.parentNode)||b))){if(j.splice(i,1),a=f.length&&sa(j),!a)return G.apply(e,f),e;break}}}return(n||h(a,o))(f,b,!p,e,!b||$.test(a)&&qa(b.parentNode)||b),e},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=ja(function(a){return 1&a.compareDocumentPosition(n.createElement("fieldset"))}),ja(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||ka("type|href|height|width",function(a,b,c){return c?void 0:a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&ja(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||ka("value",function(a,b,c){return c||"input"!==a.nodeName.toLowerCase()?void 0:a.defaultValue}),ja(function(a){return null==a.getAttribute("disabled")})||ka(J,function(a,b,c){var d;return c?void 0:a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),ga}(a);r.find=x,r.expr=x.selectors,r.expr[":"]=r.expr.pseudos,r.uniqueSort=r.unique=x.uniqueSort,r.text=x.getText,r.isXMLDoc=x.isXML,r.contains=x.contains,r.escapeSelector=x.escape;var y=function(a,b,c){var d=[],e=void 0!==c;while((a=a[b])&&9!==a.nodeType)if(1===a.nodeType){if(e&&r(a).is(c))break;d.push(a)}return d},z=function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c},A=r.expr.match.needsContext,B=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,C=/^.[^:#\[\.,]*$/;function D(a,b,c){if(r.isFunction(b))return r.grep(a,function(a,d){return!!b.call(a,d,a)!==c});if(b.nodeType)return r.grep(a,function(a){return a===b!==c});if("string"==typeof b){if(C.test(b))return r.filter(b,a,c);b=r.filter(b,a)}return r.grep(a,function(a){return i.call(b,a)>-1!==c&&1===a.nodeType})}r.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?r.find.matchesSelector(d,a)?[d]:[]:r.find.matches(a,r.grep(b,function(a){return 1===a.nodeType}))},r.fn.extend({find:function(a){var b,c,d=this.length,e=this;if("string"!=typeof a)return this.pushStack(r(a).filter(function(){for(b=0;d>b;b++)if(r.contains(e[b],this))return!0}));for(c=this.pushStack([]),b=0;d>b;b++)r.find(a,e[b],c);return d>1?r.uniqueSort(c):c},filter:function(a){return this.pushStack(D(this,a||[],!1))},not:function(a){return this.pushStack(D(this,a||[],!0))},is:function(a){return!!D(this,"string"==typeof a&&A.test(a)?r(a):a||[],!1).length}});var E,F=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,G=r.fn.init=function(a,b,c){var e,f;if(!a)return this;if(c=c||E,"string"==typeof a){if(e="<"===a[0]&&">"===a[a.length-1]&&a.length>=3?[null,a,null]:F.exec(a),!e||!e[1]&&b)return!b||b.jquery?(b||c).find(a):this.constructor(b).find(a);if(e[1]){if(b=b instanceof r?b[0]:b,r.merge(this,r.parseHTML(e[1],b&&b.nodeType?b.ownerDocument||b:d,!0)),B.test(e[1])&&r.isPlainObject(b))for(e in b)r.isFunction(this[e])?this[e](b[e]):this.attr(e,b[e]);return this}return f=d.getElementById(e[2]),f&&(this[0]=f,this.length=1),this}return a.nodeType?(this[0]=a,this.length=1,this):r.isFunction(a)?void 0!==c.ready?c.ready(a):a(r):r.makeArray(a,this)};G.prototype=r.fn,E=r(d);var H=/^(?:parents|prev(?:Until|All))/,I={children:!0,contents:!0,next:!0,prev:!0};r.fn.extend({has:function(a){var b=r(a,this),c=b.length;return this.filter(function(){for(var a=0;c>a;a++)if(r.contains(this,b[a]))return!0})},closest:function(a,b){var c,d=0,e=this.length,f=[],g="string"!=typeof a&&r(a);if(!A.test(a))for(;e>d;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&r.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?r.uniqueSort(f):f)},index:function(a){return a?"string"==typeof a?i.call(r(a),this[0]):i.call(this,a.jquery?a[0]:a):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(r.uniqueSort(r.merge(this.get(),r(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function J(a,b){while((a=a[b])&&1!==a.nodeType);return a}r.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return y(a,"parentNode")},parentsUntil:function(a,b,c){return y(a,"parentNode",c)},next:function(a){return J(a,"nextSibling")},prev:function(a){return J(a,"previousSibling")},nextAll:function(a){return y(a,"nextSibling")},prevAll:function(a){return y(a,"previousSibling")},nextUntil:function(a,b,c){return y(a,"nextSibling",c)},prevUntil:function(a,b,c){return y(a,"previousSibling",c)},siblings:function(a){return z((a.parentNode||{}).firstChild,a)},children:function(a){return z(a.firstChild)},contents:function(a){return a.contentDocument||r.merge([],a.childNodes)}},function(a,b){r.fn[a]=function(c,d){var e=r.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=r.filter(d,e)),this.length>1&&(I[a]||r.uniqueSort(e),H.test(a)&&e.reverse()),this.pushStack(e)}});var K=/\S+/g;function L(a){var b={};return r.each(a.match(K)||[],function(a,c){b[c]=!0}),b}r.Callbacks=function(a){a="string"==typeof a?L(a):r.extend({},a);var b,c,d,e,f=[],g=[],h=-1,i=function(){for(e=a.once,d=b=!0;g.length;h=-1){c=g.shift();while(++h<f.length)f[h].apply(c[0],c[1])===!1&&a.stopOnFalse&&(h=f.length,c=!1)}a.memory||(c=!1),b=!1,e&&(f=c?[]:"")},j={add:function(){return f&&(c&&!b&&(h=f.length-1,g.push(c)),function d(b){r.each(b,function(b,c){r.isFunction(c)?a.unique&&j.has(c)||f.push(c):c&&c.length&&"string"!==r.type(c)&&d(c)})}(arguments),c&&!b&&i()),this},remove:function(){return r.each(arguments,function(a,b){var c;while((c=r.inArray(b,f,c))>-1)f.splice(c,1),h>=c&&h--}),this},has:function(a){return a?r.inArray(a,f)>-1:f.length>0},empty:function(){return f&&(f=[]),this},disable:function(){return e=g=[],f=c="",this},disabled:function(){return!f},lock:function(){return e=g=[],c||b||(f=c=""),this},locked:function(){return!!e},fireWith:function(a,c){return e||(c=c||[],c=[a,c.slice?c.slice():c],g.push(c),b||i()),this},fire:function(){return j.fireWith(this,arguments),this},fired:function(){return!!d}};return j};function M(a){return a}function N(a){throw a}function O(a,b,c){var d;try{a&&r.isFunction(d=a.promise)?d.call(a).done(b).fail(c):a&&r.isFunction(d=a.then)?d.call(a,b,c):b.call(void 0,a)}catch(a){c.call(void 0,a)}}r.extend({Deferred:function(b){var c=[["notify","progress",r.Callbacks("memory"),r.Callbacks("memory"),2],["resolve","done",r.Callbacks("once memory"),r.Callbacks("once memory"),0,"resolved"],["reject","fail",r.Callbacks("once memory"),r.Callbacks("once memory"),1,"rejected"]],d="pending",e={state:function(){return d},always:function(){return f.done(arguments).fail(arguments),this},"catch":function(a){return e.then(null,a)},pipe:function(){var a=arguments;return r.Deferred(function(b){r.each(c,function(c,d){var e=r.isFunction(a[d[4]])&&a[d[4]];f[d[1]](function(){var a=e&&e.apply(this,arguments);a&&r.isFunction(a.promise)?a.promise().progress(b.notify).done(b.resolve).fail(b.reject):b[d[0]+"With"](this,e?[a]:arguments)})}),a=null}).promise()},then:function(b,d,e){var f=0;function g(b,c,d,e){return function(){var h=this,i=arguments,j=function(){var a,j;if(!(f>b)){if(a=d.apply(h,i),a===c.promise())throw new TypeError("Thenable self-resolution");j=a&&("object"==typeof a||"function"==typeof a)&&a.then,r.isFunction(j)?e?j.call(a,g(f,c,M,e),g(f,c,N,e)):(f++,j.call(a,g(f,c,M,e),g(f,c,N,e),g(f,c,M,c.notifyWith))):(d!==M&&(h=void 0,i=[a]),(e||c.resolveWith)(h,i))}},k=e?j:function(){try{j()}catch(a){r.Deferred.exceptionHook&&r.Deferred.exceptionHook(a,k.stackTrace),b+1>=f&&(d!==N&&(h=void 0,i=[a]),c.rejectWith(h,i))}};b?k():(r.Deferred.getStackHook&&(k.stackTrace=r.Deferred.getStackHook()),a.setTimeout(k))}}return r.Deferred(function(a){c[0][3].add(g(0,a,r.isFunction(e)?e:M,a.notifyWith)),c[1][3].add(g(0,a,r.isFunction(b)?b:M)),c[2][3].add(g(0,a,r.isFunction(d)?d:N))}).promise()},promise:function(a){return null!=a?r.extend(a,e):e}},f={};return r.each(c,function(a,b){var g=b[2],h=b[5];e[b[1]]=g.add,h&&g.add(function(){d=h},c[3-a][2].disable,c[0][2].lock),g.add(b[3].fire),f[b[0]]=function(){return f[b[0]+"With"](this===f?void 0:this,arguments),this},f[b[0]+"With"]=g.fireWith}),e.promise(f),b&&b.call(f,f),f},when:function(a){var b=arguments.length,c=b,d=Array(c),e=f.call(arguments),g=r.Deferred(),h=function(a){return function(c){d[a]=this,e[a]=arguments.length>1?f.call(arguments):c,--b||g.resolveWith(d,e)}};if(1>=b&&(O(a,g.done(h(c)).resolve,g.reject),"pending"===g.state()||r.isFunction(e[c]&&e[c].then)))return g.then();while(c--)O(e[c],h(c),g.reject);return g.promise()}});var P=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;r.Deferred.exceptionHook=function(b,c){a.console&&a.console.warn&&b&&P.test(b.name)&&a.console.warn("jQuery.Deferred exception: "+b.message,b.stack,c)};var Q=r.Deferred();r.fn.ready=function(a){return Q.then(a),this},r.extend({isReady:!1,readyWait:1,holdReady:function(a){a?r.readyWait++:r.ready(!0)},ready:function(a){(a===!0?--r.readyWait:r.isReady)||(r.isReady=!0,a!==!0&&--r.readyWait>0||Q.resolveWith(d,[r]))}}),r.ready.then=Q.then;function R(){d.removeEventListener("DOMContentLoaded",R),a.removeEventListener("load",R),r.ready()}"complete"===d.readyState||"loading"!==d.readyState&&!d.documentElement.doScroll?a.setTimeout(r.ready):(d.addEventListener("DOMContentLoaded",R),a.addEventListener("load",R));var S=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===r.type(c)){e=!0;for(h in c)S(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,r.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){
return j.call(r(a),c)})),b))for(;i>h;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},T=function(a){return 1===a.nodeType||9===a.nodeType||!+a.nodeType};function U(){this.expando=r.expando+U.uid++}U.uid=1,U.prototype={cache:function(a){var b=a[this.expando];return b||(b={},T(a)&&(a.nodeType?a[this.expando]=b:Object.defineProperty(a,this.expando,{value:b,configurable:!0}))),b},set:function(a,b,c){var d,e=this.cache(a);if("string"==typeof b)e[r.camelCase(b)]=c;else for(d in b)e[r.camelCase(d)]=b[d];return e},get:function(a,b){return void 0===b?this.cache(a):a[this.expando]&&a[this.expando][r.camelCase(b)]},access:function(a,b,c){return void 0===b||b&&"string"==typeof b&&void 0===c?this.get(a,b):(this.set(a,b,c),void 0!==c?c:b)},remove:function(a,b){var c,d=a[this.expando];if(void 0!==d){if(void 0!==b){r.isArray(b)?b=b.map(r.camelCase):(b=r.camelCase(b),b=b in d?[b]:b.match(K)||[]),c=b.length;while(c--)delete d[b[c]]}(void 0===b||r.isEmptyObject(d))&&(a.nodeType?a[this.expando]=void 0:delete a[this.expando])}},hasData:function(a){var b=a[this.expando];return void 0!==b&&!r.isEmptyObject(b)}};var V=new U,W=new U,X=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,Y=/[A-Z]/g;function Z(a,b,c){var d;if(void 0===c&&1===a.nodeType)if(d="data-"+b.replace(Y,"-$&").toLowerCase(),c=a.getAttribute(d),"string"==typeof c){try{c="true"===c?!0:"false"===c?!1:"null"===c?null:+c+""===c?+c:X.test(c)?JSON.parse(c):c}catch(e){}W.set(a,b,c)}else c=void 0;return c}r.extend({hasData:function(a){return W.hasData(a)||V.hasData(a)},data:function(a,b,c){return W.access(a,b,c)},removeData:function(a,b){W.remove(a,b)},_data:function(a,b,c){return V.access(a,b,c)},_removeData:function(a,b){V.remove(a,b)}}),r.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=W.get(f),1===f.nodeType&&!V.get(f,"hasDataAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=r.camelCase(d.slice(5)),Z(f,d,e[d])));V.set(f,"hasDataAttrs",!0)}return e}return"object"==typeof a?this.each(function(){W.set(this,a)}):S(this,function(b){var c;if(f&&void 0===b){if(c=W.get(f,a),void 0!==c)return c;if(c=Z(f,a),void 0!==c)return c}else this.each(function(){W.set(this,a,b)})},null,b,arguments.length>1,null,!0)},removeData:function(a){return this.each(function(){W.remove(this,a)})}}),r.extend({queue:function(a,b,c){var d;return a?(b=(b||"fx")+"queue",d=V.get(a,b),c&&(!d||r.isArray(c)?d=V.access(a,b,r.makeArray(c)):d.push(c)),d||[]):void 0},dequeue:function(a,b){b=b||"fx";var c=r.queue(a,b),d=c.length,e=c.shift(),f=r._queueHooks(a,b),g=function(){r.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return V.get(a,c)||V.access(a,c,{empty:r.Callbacks("once memory").add(function(){V.remove(a,[b+"queue",c])})})}}),r.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?r.queue(this[0],a):void 0===b?this:this.each(function(){var c=r.queue(this,a,b);r._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&r.dequeue(this,a)})},dequeue:function(a){return this.each(function(){r.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=r.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=V.get(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var $=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,_=new RegExp("^(?:([+-])=|)("+$+")([a-z%]*)$","i"),aa=["Top","Right","Bottom","Left"],ba=function(a,b){return a=b||a,"none"===a.style.display||""===a.style.display&&r.contains(a.ownerDocument,a)&&"none"===r.css(a,"display")},ca=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};function da(a,b,c,d){var e,f=1,g=20,h=d?function(){return d.cur()}:function(){return r.css(a,b,"")},i=h(),j=c&&c[3]||(r.cssNumber[b]?"":"px"),k=(r.cssNumber[b]||"px"!==j&&+i)&&_.exec(r.css(a,b));if(k&&k[3]!==j){j=j||k[3],c=c||[],k=+i||1;do f=f||".5",k/=f,r.style(a,b,k+j);while(f!==(f=h()/i)&&1!==f&&--g)}return c&&(k=+k||+i||0,e=c[1]?k+(c[1]+1)*c[2]:+c[2],d&&(d.unit=j,d.start=k,d.end=e)),e}var ea={};function fa(a){var b,c=a.ownerDocument,d=a.nodeName,e=ea[d];return e?e:(b=c.body.appendChild(c.createElement(d)),e=r.css(b,"display"),b.parentNode.removeChild(b),"none"===e&&(e="block"),ea[d]=e,e)}function ga(a,b){for(var c,d,e=[],f=0,g=a.length;g>f;f++)d=a[f],d.style&&(c=d.style.display,b?("none"===c&&(e[f]=V.get(d,"display")||null,e[f]||(d.style.display="")),""===d.style.display&&ba(d)&&(e[f]=fa(d))):"none"!==c&&(e[f]="none",V.set(d,"display",c)));for(f=0;g>f;f++)null!=e[f]&&(a[f].style.display=e[f]);return a}r.fn.extend({show:function(){return ga(this,!0)},hide:function(){return ga(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){ba(this)?r(this).show():r(this).hide()})}});var ha=/^(?:checkbox|radio)$/i,ia=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,ja=/^$|\/(?:java|ecma)script/i,ka={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ka.optgroup=ka.option,ka.tbody=ka.tfoot=ka.colgroup=ka.caption=ka.thead,ka.th=ka.td;function la(a,b){var c="undefined"!=typeof a.getElementsByTagName?a.getElementsByTagName(b||"*"):"undefined"!=typeof a.querySelectorAll?a.querySelectorAll(b||"*"):[];return void 0===b||b&&r.nodeName(a,b)?r.merge([a],c):c}function ma(a,b){for(var c=0,d=a.length;d>c;c++)V.set(a[c],"globalEval",!b||V.get(b[c],"globalEval"))}var na=/<|&#?\w+;/;function oa(a,b,c,d,e){for(var f,g,h,i,j,k,l=b.createDocumentFragment(),m=[],n=0,o=a.length;o>n;n++)if(f=a[n],f||0===f)if("object"===r.type(f))r.merge(m,f.nodeType?[f]:f);else if(na.test(f)){g=g||l.appendChild(b.createElement("div")),h=(ia.exec(f)||["",""])[1].toLowerCase(),i=ka[h]||ka._default,g.innerHTML=i[1]+r.htmlPrefilter(f)+i[2],k=i[0];while(k--)g=g.lastChild;r.merge(m,g.childNodes),g=l.firstChild,g.textContent=""}else m.push(b.createTextNode(f));l.textContent="",n=0;while(f=m[n++])if(d&&r.inArray(f,d)>-1)e&&e.push(f);else if(j=r.contains(f.ownerDocument,f),g=la(l.appendChild(f),"script"),j&&ma(g),c){k=0;while(f=g[k++])ja.test(f.type||"")&&c.push(f)}return l}!function(){var a=d.createDocumentFragment(),b=a.appendChild(d.createElement("div")),c=d.createElement("input");c.setAttribute("type","radio"),c.setAttribute("checked","checked"),c.setAttribute("name","t"),b.appendChild(c),o.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,b.innerHTML="<textarea>x</textarea>",o.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue}();var pa=d.documentElement,qa=/^key/,ra=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,sa=/^([^.]*)(?:\.(.+)|)/;function ta(){return!0}function ua(){return!1}function va(){try{return d.activeElement}catch(a){}}function wa(a,b,c,d,e,f){var g,h;if("object"==typeof b){"string"!=typeof c&&(d=d||c,c=void 0);for(h in b)wa(a,h,c,d,b[h],f);return a}if(null==d&&null==e?(e=c,d=c=void 0):null==e&&("string"==typeof c?(e=d,d=void 0):(e=d,d=c,c=void 0)),e===!1)e=ua;else if(!e)return a;return 1===f&&(g=e,e=function(a){return r().off(a),g.apply(this,arguments)},e.guid=g.guid||(g.guid=r.guid++)),a.each(function(){r.event.add(this,b,e,d,c)})}r.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=V.get(a);if(q){c.handler&&(f=c,c=f.handler,e=f.selector),e&&r.find.matchesSelector(pa,e),c.guid||(c.guid=r.guid++),(i=q.events)||(i=q.events={}),(g=q.handle)||(g=q.handle=function(b){return"undefined"!=typeof r&&r.event.triggered!==b.type?r.event.dispatch.apply(a,arguments):void 0}),b=(b||"").match(K)||[""],j=b.length;while(j--)h=sa.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n&&(l=r.event.special[n]||{},n=(e?l.delegateType:l.bindType)||n,l=r.event.special[n]||{},k=r.extend({type:n,origType:p,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&r.expr.match.needsContext.test(e),namespace:o.join(".")},f),(m=i[n])||(m=i[n]=[],m.delegateCount=0,l.setup&&l.setup.call(a,d,o,g)!==!1||a.addEventListener&&a.addEventListener(n,g)),l.add&&(l.add.call(a,k),k.handler.guid||(k.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,k):m.push(k),r.event.global[n]=!0)}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=V.hasData(a)&&V.get(a);if(q&&(i=q.events)){b=(b||"").match(K)||[""],j=b.length;while(j--)if(h=sa.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n){l=r.event.special[n]||{},n=(d?l.delegateType:l.bindType)||n,m=i[n]||[],h=h[2]&&new RegExp("(^|\\.)"+o.join("\\.(?:.*\\.|)")+"(\\.|$)"),g=f=m.length;while(f--)k=m[f],!e&&p!==k.origType||c&&c.guid!==k.guid||h&&!h.test(k.namespace)||d&&d!==k.selector&&("**"!==d||!k.selector)||(m.splice(f,1),k.selector&&m.delegateCount--,l.remove&&l.remove.call(a,k));g&&!m.length&&(l.teardown&&l.teardown.call(a,o,q.handle)!==!1||r.removeEvent(a,n,q.handle),delete i[n])}else for(n in i)r.event.remove(a,n+b[j],c,d,!0);r.isEmptyObject(i)&&V.remove(a,"handle events")}},dispatch:function(a){var b=r.event.fix(a),c,d,e,f,g,h,i=new Array(arguments.length),j=(V.get(this,"events")||{})[b.type]||[],k=r.event.special[b.type]||{};for(i[0]=b,c=1;c<arguments.length;c++)i[c]=arguments[c];if(b.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,b)!==!1){h=r.event.handlers.call(this,b,j),c=0;while((f=h[c++])&&!b.isPropagationStopped()){b.currentTarget=f.elem,d=0;while((g=f.handlers[d++])&&!b.isImmediatePropagationStopped())b.rnamespace&&!b.rnamespace.test(g.namespace)||(b.handleObj=g,b.data=g.data,e=((r.event.special[g.origType]||{}).handle||g.handler).apply(f.elem,i),void 0!==e&&(b.result=e)===!1&&(b.preventDefault(),b.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,b),b.result}},handlers:function(a,b){var c,d,e,f,g=[],h=b.delegateCount,i=a.target;if(h&&i.nodeType&&("click"!==a.type||isNaN(a.button)||a.button<1))for(;i!==this;i=i.parentNode||this)if(1===i.nodeType&&(i.disabled!==!0||"click"!==a.type)){for(d=[],c=0;h>c;c++)f=b[c],e=f.selector+" ",void 0===d[e]&&(d[e]=f.needsContext?r(e,this).index(i)>-1:r.find(e,this,null,[i]).length),d[e]&&d.push(f);d.length&&g.push({elem:i,handlers:d})}return h<b.length&&g.push({elem:this,handlers:b.slice(h)}),g},addProp:function(a,b){Object.defineProperty(r.Event.prototype,a,{enumerable:!0,configurable:!0,get:r.isFunction(b)?function(){return this.originalEvent?b(this.originalEvent):void 0}:function(){return this.originalEvent?this.originalEvent[a]:void 0},set:function(b){Object.defineProperty(this,a,{enumerable:!0,configurable:!0,writable:!0,value:b})}})},fix:function(a){return a[r.expando]?a:new r.Event(a)},special:{load:{noBubble:!0},focus:{trigger:function(){return this!==va()&&this.focus?(this.focus(),!1):void 0},delegateType:"focusin"},blur:{trigger:function(){return this===va()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return"checkbox"===this.type&&this.click&&r.nodeName(this,"input")?(this.click(),!1):void 0},_default:function(a){return r.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}}},r.removeEvent=function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c)},r.Event=function(a,b){return this instanceof r.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?ta:ua,this.target=a.target&&3===a.target.nodeType?a.target.parentNode:a.target,this.currentTarget=a.currentTarget,this.relatedTarget=a.relatedTarget):this.type=a,b&&r.extend(this,b),this.timeStamp=a&&a.timeStamp||r.now(),void(this[r.expando]=!0)):new r.Event(a,b)},r.Event.prototype={constructor:r.Event,isDefaultPrevented:ua,isPropagationStopped:ua,isImmediatePropagationStopped:ua,isSimulated:!1,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=ta,a&&!this.isSimulated&&a.preventDefault()},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=ta,a&&!this.isSimulated&&a.stopPropagation()},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=ta,a&&!this.isSimulated&&a.stopImmediatePropagation(),this.stopPropagation()}},r.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(a){var b=a.button;return null==a.which&&qa.test(a.type)?null!=a.charCode?a.charCode:a.keyCode:!a.which&&void 0!==b&&ra.test(a.type)?1&b?1:2&b?3:4&b?2:0:a.which}},r.event.addProp),r.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){r.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return e&&(e===d||r.contains(d,e))||(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),r.fn.extend({on:function(a,b,c,d){return wa(this,a,b,c,d)},one:function(a,b,c,d){return wa(this,a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,r(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return b!==!1&&"function"!=typeof b||(c=b,b=void 0),c===!1&&(c=ua),this.each(function(){r.event.remove(this,a,c,b)})}});var xa=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,ya=/<script|<style|<link/i,za=/checked\s*(?:[^=]|=\s*.checked.)/i,Aa=/^true\/(.*)/,Ba=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Ca(a,b){return r.nodeName(a,"table")&&r.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a:a}function Da(a){return a.type=(null!==a.getAttribute("type"))+"/"+a.type,a}function Ea(a){var b=Aa.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function Fa(a,b){var c,d,e,f,g,h,i,j;if(1===b.nodeType){if(V.hasData(a)&&(f=V.access(a),g=V.set(b,f),j=f.events)){delete g.handle,g.events={};for(e in j)for(c=0,d=j[e].length;d>c;c++)r.event.add(b,e,j[e][c])}W.hasData(a)&&(h=W.access(a),i=r.extend({},h),W.set(b,i))}}function Ga(a,b){var c=b.nodeName.toLowerCase();"input"===c&&ha.test(a.type)?b.checked=a.checked:"input"!==c&&"textarea"!==c||(b.defaultValue=a.defaultValue)}function Ha(a,b,c,d){b=g.apply([],b);var e,f,h,i,j,k,l=0,m=a.length,n=m-1,q=b[0],s=r.isFunction(q);if(s||m>1&&"string"==typeof q&&!o.checkClone&&za.test(q))return a.each(function(e){var f=a.eq(e);s&&(b[0]=q.call(this,e,f.html())),Ha(f,b,c,d)});if(m&&(e=oa(b,a[0].ownerDocument,!1,a,d),f=e.firstChild,1===e.childNodes.length&&(e=f),f||d)){for(h=r.map(la(e,"script"),Da),i=h.length;m>l;l++)j=e,l!==n&&(j=r.clone(j,!0,!0),i&&r.merge(h,la(j,"script"))),c.call(a[l],j,l);if(i)for(k=h[h.length-1].ownerDocument,r.map(h,Ea),l=0;i>l;l++)j=h[l],ja.test(j.type||"")&&!V.access(j,"globalEval")&&r.contains(k,j)&&(j.src?r._evalUrl&&r._evalUrl(j.src):p(j.textContent.replace(Ba,""),k))}return a}function Ia(a,b,c){for(var d,e=b?r.filter(b,a):a,f=0;null!=(d=e[f]);f++)c||1!==d.nodeType||r.cleanData(la(d)),d.parentNode&&(c&&r.contains(d.ownerDocument,d)&&ma(la(d,"script")),d.parentNode.removeChild(d));return a}r.extend({htmlPrefilter:function(a){return a.replace(xa,"<$1></$2>")},clone:function(a,b,c){var d,e,f,g,h=a.cloneNode(!0),i=r.contains(a.ownerDocument,a);if(!(o.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||r.isXMLDoc(a)))for(g=la(h),f=la(a),d=0,e=f.length;e>d;d++)Ga(f[d],g[d]);if(b)if(c)for(f=f||la(a),g=g||la(h),d=0,e=f.length;e>d;d++)Fa(f[d],g[d]);else Fa(a,h);return g=la(h,"script"),g.length>0&&ma(g,!i&&la(a,"script")),h},cleanData:function(a){for(var b,c,d,e=r.event.special,f=0;void 0!==(c=a[f]);f++)if(T(c)){if(b=c[V.expando]){if(b.events)for(d in b.events)e[d]?r.event.remove(c,d):r.removeEvent(c,d,b.handle);c[V.expando]=void 0}c[W.expando]&&(c[W.expando]=void 0)}}}),r.fn.extend({detach:function(a){return Ia(this,a,!0)},remove:function(a){return Ia(this,a)},text:function(a){return S(this,function(a){return void 0===a?r.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=a)})},null,a,arguments.length)},append:function(){return Ha(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ca(this,a);b.appendChild(a)}})},prepend:function(){return Ha(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ca(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return Ha(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return Ha(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},empty:function(){for(var a,b=0;null!=(a=this[b]);b++)1===a.nodeType&&(r.cleanData(la(a,!1)),a.textContent="");return this},clone:function(a,b){return a=null==a?!1:a,b=null==b?a:b,this.map(function(){return r.clone(this,a,b)})},html:function(a){return S(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a&&1===b.nodeType)return b.innerHTML;if("string"==typeof a&&!ya.test(a)&&!ka[(ia.exec(a)||["",""])[1].toLowerCase()]){a=r.htmlPrefilter(a);try{for(;d>c;c++)b=this[c]||{},1===b.nodeType&&(r.cleanData(la(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=[];return Ha(this,arguments,function(b){var c=this.parentNode;r.inArray(this,a)<0&&(r.cleanData(la(this)),c&&c.replaceChild(b,this))},a)}}),r.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){r.fn[a]=function(a){for(var c,d=[],e=r(a),f=e.length-1,g=0;f>=g;g++)c=g===f?this:this.clone(!0),r(e[g])[b](c),h.apply(d,c.get());return this.pushStack(d)}});var Ja=/^margin/,Ka=new RegExp("^("+$+")(?!px)[a-z%]+$","i"),La=function(b){var c=b.ownerDocument.defaultView;return c&&c.opener||(c=a),c.getComputedStyle(b)};!function(){function b(){if(i){i.style.cssText="box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",i.innerHTML="",pa.appendChild(h);var b=a.getComputedStyle(i);c="1%"!==b.top,g="2px"===b.marginLeft,e="4px"===b.width,i.style.marginRight="50%",f="4px"===b.marginRight,pa.removeChild(h),i=null}}var c,e,f,g,h=d.createElement("div"),i=d.createElement("div");i.style&&(i.style.backgroundClip="content-box",i.cloneNode(!0).style.backgroundClip="",o.clearCloneStyle="content-box"===i.style.backgroundClip,h.style.cssText="border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute",h.appendChild(i),r.extend(o,{pixelPosition:function(){return b(),c},boxSizingReliable:function(){return b(),e},pixelMarginRight:function(){return b(),f},reliableMarginLeft:function(){return b(),g}}))}();function Ma(a,b,c){var d,e,f,g,h=a.style;return c=c||La(a),c&&(g=c.getPropertyValue(b)||c[b],""!==g||r.contains(a.ownerDocument,a)||(g=r.style(a,b)),!o.pixelMarginRight()&&Ka.test(g)&&Ja.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0!==g?g+"":g}function Na(a,b){return{get:function(){return a()?void delete this.get:(this.get=b).apply(this,arguments)}}}var Oa=/^(none|table(?!-c[ea]).+)/,Pa={position:"absolute",visibility:"hidden",display:"block"},Qa={letterSpacing:"0",fontWeight:"400"},Ra=["Webkit","Moz","ms"],Sa=d.createElement("div").style;function Ta(a){if(a in Sa)return a;var b=a[0].toUpperCase()+a.slice(1),c=Ra.length;while(c--)if(a=Ra[c]+b,a in Sa)return a}function Ua(a,b,c){var d=_.exec(b);return d?Math.max(0,d[2]-(c||0))+(d[3]||"px"):b}function Va(a,b,c,d,e){for(var f=c===(d?"border":"content")?4:"width"===b?1:0,g=0;4>f;f+=2)"margin"===c&&(g+=r.css(a,c+aa[f],!0,e)),d?("content"===c&&(g-=r.css(a,"padding"+aa[f],!0,e)),"margin"!==c&&(g-=r.css(a,"border"+aa[f]+"Width",!0,e))):(g+=r.css(a,"padding"+aa[f],!0,e),"padding"!==c&&(g+=r.css(a,"border"+aa[f]+"Width",!0,e)));return g}function Wa(a,b,c){var d,e=!0,f=La(a),g="border-box"===r.css(a,"boxSizing",!1,f);if(a.getClientRects().length&&(d=a.getBoundingClientRect()[b]),0>=d||null==d){if(d=Ma(a,b,f),(0>d||null==d)&&(d=a.style[b]),Ka.test(d))return d;e=g&&(o.boxSizingReliable()||d===a.style[b]),d=parseFloat(d)||0}return d+Va(a,b,c||(g?"border":"content"),e,f)+"px"}r.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Ma(a,"opacity");return""===c?"1":c}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=r.camelCase(b),i=a.style;return b=r.cssProps[h]||(r.cssProps[h]=Ta(h)||h),g=r.cssHooks[b]||r.cssHooks[h],void 0===c?g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b]:(f=typeof c,"string"===f&&(e=_.exec(c))&&e[1]&&(c=da(a,b,e),f="number"),null!=c&&c===c&&("number"===f&&(c+=e&&e[3]||(r.cssNumber[h]?"":"px")),o.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),g&&"set"in g&&void 0===(c=g.set(a,c,d))||(i[b]=c)),void 0)}},css:function(a,b,c,d){var e,f,g,h=r.camelCase(b);return b=r.cssProps[h]||(r.cssProps[h]=Ta(h)||h),g=r.cssHooks[b]||r.cssHooks[h],g&&"get"in g&&(e=g.get(a,!0,c)),void 0===e&&(e=Ma(a,b,d)),"normal"===e&&b in Qa&&(e=Qa[b]),""===c||c?(f=parseFloat(e),c===!0||isFinite(f)?f||0:e):e}}),r.each(["height","width"],function(a,b){r.cssHooks[b]={get:function(a,c,d){return c?!Oa.test(r.css(a,"display"))||a.getClientRects().length&&a.getBoundingClientRect().width?Wa(a,b,d):ca(a,Pa,function(){return Wa(a,b,d)}):void 0},set:function(a,c,d){var e,f=d&&La(a),g=d&&Va(a,b,d,"border-box"===r.css(a,"boxSizing",!1,f),f);return g&&(e=_.exec(c))&&"px"!==(e[3]||"px")&&(a.style[b]=c,c=r.css(a,b)),Ua(a,c,g)}}}),r.cssHooks.marginLeft=Na(o.reliableMarginLeft,function(a,b){return b?(parseFloat(Ma(a,"marginLeft"))||a.getBoundingClientRect().left-ca(a,{marginLeft:0},function(){return a.getBoundingClientRect().left}))+"px":void 0}),r.each({margin:"",padding:"",border:"Width"},function(a,b){r.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];4>d;d++)e[a+aa[d]+b]=f[d]||f[d-2]||f[0];return e}},Ja.test(a)||(r.cssHooks[a+b].set=Ua)}),r.fn.extend({css:function(a,b){return S(this,function(a,b,c){var d,e,f={},g=0;if(r.isArray(b)){for(d=La(a),e=b.length;e>g;g++)f[b[g]]=r.css(a,b[g],!1,d);return f}return void 0!==c?r.style(a,b,c):r.css(a,b)},a,b,arguments.length>1)}});function Xa(a,b,c,d,e){return new Xa.prototype.init(a,b,c,d,e)}r.Tween=Xa,Xa.prototype={constructor:Xa,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||r.easing._default,this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(r.cssNumber[c]?"":"px")},cur:function(){var a=Xa.propHooks[this.prop];return a&&a.get?a.get(this):Xa.propHooks._default.get(this)},run:function(a){var b,c=Xa.propHooks[this.prop];return this.options.duration?this.pos=b=r.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):this.pos=b=a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):Xa.propHooks._default.set(this),this}},Xa.prototype.init.prototype=Xa.prototype,Xa.propHooks={_default:{get:function(a){var b;return 1!==a.elem.nodeType||null!=a.elem[a.prop]&&null==a.elem.style[a.prop]?a.elem[a.prop]:(b=r.css(a.elem,a.prop,""),b&&"auto"!==b?b:0)},set:function(a){r.fx.step[a.prop]?r.fx.step[a.prop](a):1!==a.elem.nodeType||null==a.elem.style[r.cssProps[a.prop]]&&!r.cssHooks[a.prop]?a.elem[a.prop]=a.now:r.style(a.elem,a.prop,a.now+a.unit)}}},Xa.propHooks.scrollTop=Xa.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},r.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2},_default:"swing"},r.fx=Xa.prototype.init,r.fx.step={};var Ya,Za,$a=/^(?:toggle|show|hide)$/,_a=/queueHooks$/;function ab(){Za&&(a.requestAnimationFrame(ab),r.fx.tick())}function bb(){return a.setTimeout(function(){Ya=void 0}),Ya=r.now()}function cb(a,b){var c,d=0,e={height:a};for(b=b?1:0;4>d;d+=2-b)c=aa[d],e["margin"+c]=e["padding"+c]=a;return b&&(e.opacity=e.width=a),e}function db(a,b,c){for(var d,e=(gb.tweeners[b]||[]).concat(gb.tweeners["*"]),f=0,g=e.length;g>f;f++)if(d=e[f].call(c,b,a))return d}function eb(a,b,c){var d,e,f,g,h,i,j,k,l="width"in b||"height"in b,m=this,n={},o=a.style,p=a.nodeType&&ba(a),q=V.get(a,"fxshow");c.queue||(g=r._queueHooks(a,"fx"),null==g.unqueued&&(g.unqueued=0,h=g.empty.fire,g.empty.fire=function(){g.unqueued||h()}),g.unqueued++,m.always(function(){m.always(function(){g.unqueued--,r.queue(a,"fx").length||g.empty.fire()})}));for(d in b)if(e=b[d],$a.test(e)){if(delete b[d],f=f||"toggle"===e,e===(p?"hide":"show")){if("show"!==e||!q||void 0===q[d])continue;p=!0}n[d]=q&&q[d]||r.style(a,d)}if(i=!r.isEmptyObject(b),i||!r.isEmptyObject(n)){l&&1===a.nodeType&&(c.overflow=[o.overflow,o.overflowX,o.overflowY],j=q&&q.display,null==j&&(j=V.get(a,"display")),k=r.css(a,"display"),"none"===k&&(j?k=j:(ga([a],!0),j=a.style.display||j,k=r.css(a,"display"),ga([a]))),("inline"===k||"inline-block"===k&&null!=j)&&"none"===r.css(a,"float")&&(i||(m.done(function(){o.display=j}),null==j&&(k=o.display,j="none"===k?"":k)),o.display="inline-block")),c.overflow&&(o.overflow="hidden",m.always(function(){o.overflow=c.overflow[0],o.overflowX=c.overflow[1],o.overflowY=c.overflow[2]})),i=!1;for(d in n)i||(q?"hidden"in q&&(p=q.hidden):q=V.access(a,"fxshow",{display:j}),f&&(q.hidden=!p),p&&ga([a],!0),m.done(function(){p||ga([a]),V.remove(a,"fxshow");for(d in n)r.style(a,d,n[d])})),i=db(p?q[d]:0,d,m),d in q||(q[d]=i.start,p&&(i.end=i.start,i.start=0))}}function fb(a,b){var c,d,e,f,g;for(c in a)if(d=r.camelCase(c),e=b[d],f=a[c],r.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=r.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function gb(a,b,c){var d,e,f=0,g=gb.prefilters.length,h=r.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=Ya||bb(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;i>g;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),1>f&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:r.extend({},b),opts:r.extend(!0,{specialEasing:{},easing:r.easing._default},c),originalProperties:b,originalOptions:c,startTime:Ya||bb(),duration:c.duration,tweens:[],createTween:function(b,c){var d=r.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;d>c;c++)j.tweens[c].run(1);return b?(h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j,b])):h.rejectWith(a,[j,b]),this}}),k=j.props;for(fb(k,j.opts.specialEasing);g>f;f++)if(d=gb.prefilters[f].call(j,a,k,j.opts))return r.isFunction(d.stop)&&(r._queueHooks(j.elem,j.opts.queue).stop=r.proxy(d.stop,d)),d;return r.map(k,db,j),r.isFunction(j.opts.start)&&j.opts.start.call(a,j),r.fx.timer(r.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}r.Animation=r.extend(gb,{tweeners:{"*":[function(a,b){var c=this.createTween(a,b);return da(c.elem,a,_.exec(b),c),c}]},tweener:function(a,b){r.isFunction(a)?(b=a,a=["*"]):a=a.match(K);for(var c,d=0,e=a.length;e>d;d++)c=a[d],gb.tweeners[c]=gb.tweeners[c]||[],gb.tweeners[c].unshift(b)},prefilters:[eb],prefilter:function(a,b){b?gb.prefilters.unshift(a):gb.prefilters.push(a)}}),r.speed=function(a,b,c){var e=a&&"object"==typeof a?r.extend({},a):{complete:c||!c&&b||r.isFunction(a)&&a,duration:a,easing:c&&b||b&&!r.isFunction(b)&&b};return r.fx.off||d.hidden?e.duration=0:e.duration="number"==typeof e.duration?e.duration:e.duration in r.fx.speeds?r.fx.speeds[e.duration]:r.fx.speeds._default,null!=e.queue&&e.queue!==!0||(e.queue="fx"),e.old=e.complete,e.complete=function(){r.isFunction(e.old)&&e.old.call(this),e.queue&&r.dequeue(this,e.queue)},e},r.fn.extend({fadeTo:function(a,b,c,d){return this.filter(ba).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=r.isEmptyObject(a),f=r.speed(b,c,d),g=function(){var b=gb(this,r.extend({},a),f);(e||V.get(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=r.timers,g=V.get(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&_a.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));!b&&c||r.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=V.get(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=r.timers,g=d?d.length:0;for(c.finish=!0,r.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;g>b;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),r.each(["toggle","show","hide"],function(a,b){var c=r.fn[b];r.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(cb(b,!0),a,d,e)}}),r.each({slideDown:cb("show"),slideUp:cb("hide"),slideToggle:cb("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){r.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),r.timers=[],r.fx.tick=function(){var a,b=0,c=r.timers;for(Ya=r.now();b<c.length;b++)a=c[b],a()||c[b]!==a||c.splice(b--,1);c.length||r.fx.stop(),Ya=void 0},r.fx.timer=function(a){r.timers.push(a),a()?r.fx.start():r.timers.pop()},r.fx.interval=13,r.fx.start=function(){Za||(Za=a.requestAnimationFrame?a.requestAnimationFrame(ab):a.setInterval(r.fx.tick,r.fx.interval))},r.fx.stop=function(){a.cancelAnimationFrame?a.cancelAnimationFrame(Za):a.clearInterval(Za),Za=null},r.fx.speeds={slow:600,fast:200,_default:400},r.fn.delay=function(b,c){return b=r.fx?r.fx.speeds[b]||b:b,c=c||"fx",this.queue(c,function(c,d){var e=a.setTimeout(c,b);d.stop=function(){a.clearTimeout(e)}})},function(){var a=d.createElement("input"),b=d.createElement("select"),c=b.appendChild(d.createElement("option"));a.type="checkbox",o.checkOn=""!==a.value,o.optSelected=c.selected,a=d.createElement("input"),a.value="t",a.type="radio",o.radioValue="t"===a.value}();var hb,ib=r.expr.attrHandle;r.fn.extend({attr:function(a,b){return S(this,r.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){r.removeAttr(this,a)})}}),r.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return"undefined"==typeof a.getAttribute?r.prop(a,b,c):(1===f&&r.isXMLDoc(a)||(e=r.attrHooks[b.toLowerCase()]||(r.expr.match.bool.test(b)?hb:void 0)),void 0!==c?null===c?void r.removeAttr(a,b):e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:(a.setAttribute(b,c+""),c):e&&"get"in e&&null!==(d=e.get(a,b))?d:(d=r.find.attr(a,b),null==d?void 0:d))},attrHooks:{type:{set:function(a,b){if(!o.radioValue&&"radio"===b&&r.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}},removeAttr:function(a,b){var c,d=0,e=b&&b.match(K);if(e&&1===a.nodeType)while(c=e[d++])a.removeAttribute(c);
}}),hb={set:function(a,b,c){return b===!1?r.removeAttr(a,c):a.setAttribute(c,c),c}},r.each(r.expr.match.bool.source.match(/\w+/g),function(a,b){var c=ib[b]||r.find.attr;ib[b]=function(a,b,d){var e,f,g=b.toLowerCase();return d||(f=ib[g],ib[g]=e,e=null!=c(a,b,d)?g:null,ib[g]=f),e}});var jb=/^(?:input|select|textarea|button)$/i,kb=/^(?:a|area)$/i;r.fn.extend({prop:function(a,b){return S(this,r.prop,a,b,arguments.length>1)},removeProp:function(a){return this.each(function(){delete this[r.propFix[a]||a]})}}),r.extend({prop:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return 1===f&&r.isXMLDoc(a)||(b=r.propFix[b]||b,e=r.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=r.find.attr(a,"tabindex");return b?parseInt(b,10):jb.test(a.nodeName)||kb.test(a.nodeName)&&a.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),o.optSelected||(r.propHooks.selected={get:function(a){var b=a.parentNode;return b&&b.parentNode&&b.parentNode.selectedIndex,null},set:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex)}}),r.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){r.propFix[this.toLowerCase()]=this});var lb=/[\t\r\n\f]/g;function mb(a){return a.getAttribute&&a.getAttribute("class")||""}r.fn.extend({addClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).addClass(a.call(this,b,mb(this)))});if("string"==typeof a&&a){b=a.match(K)||[];while(c=this[i++])if(e=mb(c),d=1===c.nodeType&&(" "+e+" ").replace(lb," ")){g=0;while(f=b[g++])d.indexOf(" "+f+" ")<0&&(d+=f+" ");h=r.trim(d),e!==h&&c.setAttribute("class",h)}}return this},removeClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).removeClass(a.call(this,b,mb(this)))});if(!arguments.length)return this.attr("class","");if("string"==typeof a&&a){b=a.match(K)||[];while(c=this[i++])if(e=mb(c),d=1===c.nodeType&&(" "+e+" ").replace(lb," ")){g=0;while(f=b[g++])while(d.indexOf(" "+f+" ")>-1)d=d.replace(" "+f+" "," ");h=r.trim(d),e!==h&&c.setAttribute("class",h)}}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):r.isFunction(a)?this.each(function(c){r(this).toggleClass(a.call(this,c,mb(this),b),b)}):this.each(function(){var b,d,e,f;if("string"===c){d=0,e=r(this),f=a.match(K)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else void 0!==a&&"boolean"!==c||(b=mb(this),b&&V.set(this,"__className__",b),this.setAttribute&&this.setAttribute("class",b||a===!1?"":V.get(this,"__className__")||""))})},hasClass:function(a){var b,c,d=0;b=" "+a+" ";while(c=this[d++])if(1===c.nodeType&&(" "+mb(c)+" ").replace(lb," ").indexOf(b)>-1)return!0;return!1}});var nb=/\r/g,ob=/[\x20\t\r\n\f]+/g;r.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=r.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,r(this).val()):a,null==e?e="":"number"==typeof e?e+="":r.isArray(e)&&(e=r.map(e,function(a){return null==a?"":a+""})),b=r.valHooks[this.type]||r.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=r.valHooks[e.type]||r.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(nb,""):null==c?"":c)}}}),r.extend({valHooks:{option:{get:function(a){var b=r.find.attr(a,"value");return null!=b?b:r.trim(r.text(a)).replace(ob," ")}},select:{get:function(a){for(var b,c,d=a.options,e=a.selectedIndex,f="select-one"===a.type,g=f?null:[],h=f?e+1:d.length,i=0>e?h:f?e:0;h>i;i++)if(c=d[i],(c.selected||i===e)&&!c.disabled&&(!c.parentNode.disabled||!r.nodeName(c.parentNode,"optgroup"))){if(b=r(c).val(),f)return b;g.push(b)}return g},set:function(a,b){var c,d,e=a.options,f=r.makeArray(b),g=e.length;while(g--)d=e[g],(d.selected=r.inArray(r.valHooks.option.get(d),f)>-1)&&(c=!0);return c||(a.selectedIndex=-1),f}}}}),r.each(["radio","checkbox"],function(){r.valHooks[this]={set:function(a,b){return r.isArray(b)?a.checked=r.inArray(r(a).val(),b)>-1:void 0}},o.checkOn||(r.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var pb=/^(?:focusinfocus|focusoutblur)$/;r.extend(r.event,{trigger:function(b,c,e,f){var g,h,i,j,k,m,n,o=[e||d],p=l.call(b,"type")?b.type:b,q=l.call(b,"namespace")?b.namespace.split("."):[];if(h=i=e=e||d,3!==e.nodeType&&8!==e.nodeType&&!pb.test(p+r.event.triggered)&&(p.indexOf(".")>-1&&(q=p.split("."),p=q.shift(),q.sort()),k=p.indexOf(":")<0&&"on"+p,b=b[r.expando]?b:new r.Event(p,"object"==typeof b&&b),b.isTrigger=f?2:3,b.namespace=q.join("."),b.rnamespace=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=e),c=null==c?[b]:r.makeArray(c,[b]),n=r.event.special[p]||{},f||!n.trigger||n.trigger.apply(e,c)!==!1)){if(!f&&!n.noBubble&&!r.isWindow(e)){for(j=n.delegateType||p,pb.test(j+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),i=h;i===(e.ownerDocument||d)&&o.push(i.defaultView||i.parentWindow||a)}g=0;while((h=o[g++])&&!b.isPropagationStopped())b.type=g>1?j:n.bindType||p,m=(V.get(h,"events")||{})[b.type]&&V.get(h,"handle"),m&&m.apply(h,c),m=k&&h[k],m&&m.apply&&T(h)&&(b.result=m.apply(h,c),b.result===!1&&b.preventDefault());return b.type=p,f||b.isDefaultPrevented()||n._default&&n._default.apply(o.pop(),c)!==!1||!T(e)||k&&r.isFunction(e[p])&&!r.isWindow(e)&&(i=e[k],i&&(e[k]=null),r.event.triggered=p,e[p](),r.event.triggered=void 0,i&&(e[k]=i)),b.result}},simulate:function(a,b,c){var d=r.extend(new r.Event,c,{type:a,isSimulated:!0});r.event.trigger(d,null,b)}}),r.fn.extend({trigger:function(a,b){return this.each(function(){r.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];return c?r.event.trigger(a,b,c,!0):void 0}}),r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(a,b){r.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),r.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),o.focusin="onfocusin"in a,o.focusin||r.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){r.event.simulate(b,a.target,r.event.fix(a))};r.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=V.access(d,b);e||d.addEventListener(a,c,!0),V.access(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=V.access(d,b)-1;e?V.access(d,b,e):(d.removeEventListener(a,c,!0),V.remove(d,b))}}});var qb=a.location,rb=r.now(),sb=/\?/;r.parseXML=function(b){var c;if(!b||"string"!=typeof b)return null;try{c=(new a.DOMParser).parseFromString(b,"text/xml")}catch(d){c=void 0}return c&&!c.getElementsByTagName("parsererror").length||r.error("Invalid XML: "+b),c};var tb=/\[\]$/,ub=/\r?\n/g,vb=/^(?:submit|button|image|reset|file)$/i,wb=/^(?:input|select|textarea|keygen)/i;function xb(a,b,c,d){var e;if(r.isArray(b))r.each(b,function(b,e){c||tb.test(a)?d(a,e):xb(a+"["+("object"==typeof e&&null!=e?b:"")+"]",e,c,d)});else if(c||"object"!==r.type(b))d(a,b);else for(e in b)xb(a+"["+e+"]",b[e],c,d)}r.param=function(a,b){var c,d=[],e=function(a,b){var c=r.isFunction(b)?b():b;d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(null==c?"":c)};if(r.isArray(a)||a.jquery&&!r.isPlainObject(a))r.each(a,function(){e(this.name,this.value)});else for(c in a)xb(c,a[c],b,e);return d.join("&")},r.fn.extend({serialize:function(){return r.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=r.prop(this,"elements");return a?r.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!r(this).is(":disabled")&&wb.test(this.nodeName)&&!vb.test(a)&&(this.checked||!ha.test(a))}).map(function(a,b){var c=r(this).val();return null==c?null:r.isArray(c)?r.map(c,function(a){return{name:b.name,value:a.replace(ub,"\r\n")}}):{name:b.name,value:c.replace(ub,"\r\n")}}).get()}});var yb=/%20/g,zb=/#.*$/,Ab=/([?&])_=[^&]*/,Bb=/^(.*?):[ \t]*([^\r\n]*)$/gm,Cb=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Db=/^(?:GET|HEAD)$/,Eb=/^\/\//,Fb={},Gb={},Hb="*/".concat("*"),Ib=d.createElement("a");Ib.href=qb.href;function Jb(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(K)||[];if(r.isFunction(c))while(d=f[e++])"+"===d[0]?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Kb(a,b,c,d){var e={},f=a===Gb;function g(h){var i;return e[h]=!0,r.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Lb(a,b){var c,d,e=r.ajaxSettings.flatOptions||{};for(c in b)void 0!==b[c]&&((e[c]?a:d||(d={}))[c]=b[c]);return d&&r.extend(!0,a,d),a}function Mb(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===d&&(d=a.mimeType||b.getResponseHeader("Content-Type"));if(d)for(e in h)if(h[e]&&h[e].test(d)){i.unshift(e);break}if(i[0]in c)f=i[0];else{for(e in c){if(!i[0]||a.converters[e+" "+i[0]]){f=e;break}g||(g=e)}f=f||g}return f?(f!==i[0]&&i.unshift(f),c[f]):void 0}function Nb(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}r.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:qb.href,type:"GET",isLocal:Cb.test(qb.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Hb,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":r.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Lb(Lb(a,r.ajaxSettings),b):Lb(r.ajaxSettings,a)},ajaxPrefilter:Jb(Fb),ajaxTransport:Jb(Gb),ajax:function(b,c){"object"==typeof b&&(c=b,b=void 0),c=c||{};var e,f,g,h,i,j,k,l,m,n,o=r.ajaxSetup({},c),p=o.context||o,q=o.context&&(p.nodeType||p.jquery)?r(p):r.event,s=r.Deferred(),t=r.Callbacks("once memory"),u=o.statusCode||{},v={},w={},x="canceled",y={readyState:0,getResponseHeader:function(a){var b;if(k){if(!h){h={};while(b=Bb.exec(g))h[b[1].toLowerCase()]=b[2]}b=h[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return k?g:null},setRequestHeader:function(a,b){return null==k&&(a=w[a.toLowerCase()]=w[a.toLowerCase()]||a,v[a]=b),this},overrideMimeType:function(a){return null==k&&(o.mimeType=a),this},statusCode:function(a){var b;if(a)if(k)y.always(a[y.status]);else for(b in a)u[b]=[u[b],a[b]];return this},abort:function(a){var b=a||x;return e&&e.abort(b),A(0,b),this}};if(s.promise(y),o.url=((b||o.url||qb.href)+"").replace(Eb,qb.protocol+"//"),o.type=c.method||c.type||o.method||o.type,o.dataTypes=(o.dataType||"*").toLowerCase().match(K)||[""],null==o.crossDomain){j=d.createElement("a");try{j.href=o.url,j.href=j.href,o.crossDomain=Ib.protocol+"//"+Ib.host!=j.protocol+"//"+j.host}catch(z){o.crossDomain=!0}}if(o.data&&o.processData&&"string"!=typeof o.data&&(o.data=r.param(o.data,o.traditional)),Kb(Fb,o,c,y),k)return y;l=r.event&&o.global,l&&0===r.active++&&r.event.trigger("ajaxStart"),o.type=o.type.toUpperCase(),o.hasContent=!Db.test(o.type),f=o.url.replace(zb,""),o.hasContent?o.data&&o.processData&&0===(o.contentType||"").indexOf("application/x-www-form-urlencoded")&&(o.data=o.data.replace(yb,"+")):(n=o.url.slice(f.length),o.data&&(f+=(sb.test(f)?"&":"?")+o.data,delete o.data),o.cache===!1&&(f=f.replace(Ab,""),n=(sb.test(f)?"&":"?")+"_="+rb++ +n),o.url=f+n),o.ifModified&&(r.lastModified[f]&&y.setRequestHeader("If-Modified-Since",r.lastModified[f]),r.etag[f]&&y.setRequestHeader("If-None-Match",r.etag[f])),(o.data&&o.hasContent&&o.contentType!==!1||c.contentType)&&y.setRequestHeader("Content-Type",o.contentType),y.setRequestHeader("Accept",o.dataTypes[0]&&o.accepts[o.dataTypes[0]]?o.accepts[o.dataTypes[0]]+("*"!==o.dataTypes[0]?", "+Hb+"; q=0.01":""):o.accepts["*"]);for(m in o.headers)y.setRequestHeader(m,o.headers[m]);if(o.beforeSend&&(o.beforeSend.call(p,y,o)===!1||k))return y.abort();if(x="abort",t.add(o.complete),y.done(o.success),y.fail(o.error),e=Kb(Gb,o,c,y)){if(y.readyState=1,l&&q.trigger("ajaxSend",[y,o]),k)return y;o.async&&o.timeout>0&&(i=a.setTimeout(function(){y.abort("timeout")},o.timeout));try{k=!1,e.send(v,A)}catch(z){if(k)throw z;A(-1,z)}}else A(-1,"No Transport");function A(b,c,d,h){var j,m,n,v,w,x=c;k||(k=!0,i&&a.clearTimeout(i),e=void 0,g=h||"",y.readyState=b>0?4:0,j=b>=200&&300>b||304===b,d&&(v=Mb(o,y,d)),v=Nb(o,v,y,j),j?(o.ifModified&&(w=y.getResponseHeader("Last-Modified"),w&&(r.lastModified[f]=w),w=y.getResponseHeader("etag"),w&&(r.etag[f]=w)),204===b||"HEAD"===o.type?x="nocontent":304===b?x="notmodified":(x=v.state,m=v.data,n=v.error,j=!n)):(n=x,!b&&x||(x="error",0>b&&(b=0))),y.status=b,y.statusText=(c||x)+"",j?s.resolveWith(p,[m,x,y]):s.rejectWith(p,[y,x,n]),y.statusCode(u),u=void 0,l&&q.trigger(j?"ajaxSuccess":"ajaxError",[y,o,j?m:n]),t.fireWith(p,[y,x]),l&&(q.trigger("ajaxComplete",[y,o]),--r.active||r.event.trigger("ajaxStop")))}return y},getJSON:function(a,b,c){return r.get(a,b,c,"json")},getScript:function(a,b){return r.get(a,void 0,b,"script")}}),r.each(["get","post"],function(a,b){r[b]=function(a,c,d,e){return r.isFunction(c)&&(e=e||d,d=c,c=void 0),r.ajax(r.extend({url:a,type:b,dataType:e,data:c,success:d},r.isPlainObject(a)&&a))}}),r._evalUrl=function(a){return r.ajax({url:a,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},r.fn.extend({wrapAll:function(a){var b;return this[0]&&(r.isFunction(a)&&(a=a.call(this[0])),b=r(a,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstElementChild)a=a.firstElementChild;return a}).append(this)),this},wrapInner:function(a){return r.isFunction(a)?this.each(function(b){r(this).wrapInner(a.call(this,b))}):this.each(function(){var b=r(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=r.isFunction(a);return this.each(function(c){r(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(a){return this.parent(a).not("body").each(function(){r(this).replaceWith(this.childNodes)}),this}}),r.expr.pseudos.hidden=function(a){return!r.expr.pseudos.visible(a)},r.expr.pseudos.visible=function(a){return!!(a.offsetWidth||a.offsetHeight||a.getClientRects().length)},r.ajaxSettings.xhr=function(){try{return new a.XMLHttpRequest}catch(b){}};var Ob={0:200,1223:204},Pb=r.ajaxSettings.xhr();o.cors=!!Pb&&"withCredentials"in Pb,o.ajax=Pb=!!Pb,r.ajaxTransport(function(b){var c,d;return o.cors||Pb&&!b.crossDomain?{send:function(e,f){var g,h=b.xhr();if(h.open(b.type,b.url,b.async,b.username,b.password),b.xhrFields)for(g in b.xhrFields)h[g]=b.xhrFields[g];b.mimeType&&h.overrideMimeType&&h.overrideMimeType(b.mimeType),b.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest");for(g in e)h.setRequestHeader(g,e[g]);c=function(a){return function(){c&&(c=d=h.onload=h.onerror=h.onabort=h.onreadystatechange=null,"abort"===a?h.abort():"error"===a?"number"!=typeof h.status?f(0,"error"):f(h.status,h.statusText):f(Ob[h.status]||h.status,h.statusText,"text"!==(h.responseType||"text")||"string"!=typeof h.responseText?{binary:h.response}:{text:h.responseText},h.getAllResponseHeaders()))}},h.onload=c(),d=h.onerror=c("error"),void 0!==h.onabort?h.onabort=d:h.onreadystatechange=function(){4===h.readyState&&a.setTimeout(function(){c&&d()})},c=c("abort");try{h.send(b.hasContent&&b.data||null)}catch(i){if(c)throw i}},abort:function(){c&&c()}}:void 0}),r.ajaxPrefilter(function(a){a.crossDomain&&(a.contents.script=!1)}),r.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(a){return r.globalEval(a),a}}}),r.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET")}),r.ajaxTransport("script",function(a){if(a.crossDomain){var b,c;return{send:function(e,f){b=r("<script>").prop({charset:a.scriptCharset,src:a.url}).on("load error",c=function(a){b.remove(),c=null,a&&f("error"===a.type?404:200,a.type)}),d.head.appendChild(b[0])},abort:function(){c&&c()}}}});var Qb=[],Rb=/(=)\?(?=&|$)|\?\?/;r.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=Qb.pop()||r.expando+"_"+rb++;return this[a]=!0,a}}),r.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(Rb.test(b.url)?"url":"string"==typeof b.data&&0===(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&Rb.test(b.data)&&"data");return h||"jsonp"===b.dataTypes[0]?(e=b.jsonpCallback=r.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(Rb,"$1"+e):b.jsonp!==!1&&(b.url+=(sb.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||r.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){void 0===f?r(a).removeProp(e):a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,Qb.push(e)),g&&r.isFunction(f)&&f(g[0]),g=f=void 0}),"script"):void 0}),o.createHTMLDocument=function(){var a=d.implementation.createHTMLDocument("").body;return a.innerHTML="<form></form><form></form>",2===a.childNodes.length}(),r.parseHTML=function(a,b,c){if("string"!=typeof a)return[];"boolean"==typeof b&&(c=b,b=!1);var e,f,g;return b||(o.createHTMLDocument?(b=d.implementation.createHTMLDocument(""),e=b.createElement("base"),e.href=d.location.href,b.head.appendChild(e)):b=d),f=B.exec(a),g=!c&&[],f?[b.createElement(f[1])]:(f=oa([a],b,g),g&&g.length&&r(g).remove(),r.merge([],f.childNodes))},r.fn.load=function(a,b,c){var d,e,f,g=this,h=a.indexOf(" ");return h>-1&&(d=r.trim(a.slice(h)),a=a.slice(0,h)),r.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(e="POST"),g.length>0&&r.ajax({url:a,type:e||"GET",dataType:"html",data:b}).done(function(a){f=arguments,g.html(d?r("<div>").append(r.parseHTML(a)).find(d):a)}).always(c&&function(a,b){g.each(function(){c.apply(this,f||[a.responseText,b,a])})}),this},r.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){r.fn[b]=function(a){return this.on(b,a)}}),r.expr.pseudos.animated=function(a){return r.grep(r.timers,function(b){return a===b.elem}).length};function Sb(a){return r.isWindow(a)?a:9===a.nodeType&&a.defaultView}r.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=r.css(a,"position"),l=r(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=r.css(a,"top"),i=r.css(a,"left"),j=("absolute"===k||"fixed"===k)&&(f+i).indexOf("auto")>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),r.isFunction(b)&&(b=b.call(a,c,r.extend({},h))),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},r.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){r.offset.setOffset(this,a,b)});var b,c,d,e,f=this[0];if(f)return f.getClientRects().length?(d=f.getBoundingClientRect(),d.width||d.height?(e=f.ownerDocument,c=Sb(e),b=e.documentElement,{top:d.top+c.pageYOffset-b.clientTop,left:d.left+c.pageXOffset-b.clientLeft}):d):{top:0,left:0}},position:function(){if(this[0]){var a,b,c=this[0],d={top:0,left:0};return"fixed"===r.css(c,"position")?b=c.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),r.nodeName(a[0],"html")||(d=a.offset()),d={top:d.top+r.css(a[0],"borderTopWidth",!0),left:d.left+r.css(a[0],"borderLeftWidth",!0)}),{top:b.top-d.top-r.css(c,"marginTop",!0),left:b.left-d.left-r.css(c,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent;while(a&&"static"===r.css(a,"position"))a=a.offsetParent;return a||pa})}}),r.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c="pageYOffset"===b;r.fn[a]=function(d){return S(this,function(a,d,e){var f=Sb(a);return void 0===e?f?f[b]:a[d]:void(f?f.scrollTo(c?f.pageXOffset:e,c?e:f.pageYOffset):a[d]=e)},a,d,arguments.length)}}),r.each(["top","left"],function(a,b){r.cssHooks[b]=Na(o.pixelPosition,function(a,c){return c?(c=Ma(a,b),Ka.test(c)?r(a).position()[b]+"px":c):void 0})}),r.each({Height:"height",Width:"width"},function(a,b){r.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){r.fn[d]=function(e,f){var g=arguments.length&&(c||"boolean"!=typeof e),h=c||(e===!0||f===!0?"margin":"border");return S(this,function(b,c,e){var f;return r.isWindow(b)?0===d.indexOf("outer")?b["inner"+a]:b.document.documentElement["client"+a]:9===b.nodeType?(f=b.documentElement,Math.max(b.body["scroll"+a],f["scroll"+a],b.body["offset"+a],f["offset"+a],f["client"+a])):void 0===e?r.css(b,c,h):r.style(b,c,e,h)},b,g?e:void 0,g)}})}),r.fn.extend({bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}}),r.parseJSON=JSON.parse,"function"==typeof define&&define.amd&&define("jquery",[],function(){return r});var Tb=a.jQuery,Ub=a.$;return r.noConflict=function(b){return a.$===r&&(a.$=Ub),b&&a.jQuery===r&&(a.jQuery=Tb),r},b||(a.jQuery=a.$=r),r});

/*! UIkit 2.26.3 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
!function(t){if("function"==typeof define&&define.amd&&define("uikit",function(){var i=window.UIkit||t(window,window.jQuery,window.document);return i.load=function(t,e,n,o){var s,a=t.split(","),r=[],l=(o.config&&o.config.uikit&&o.config.uikit.base?o.config.uikit.base:"").replace(/\/+$/g,"");if(!l)throw new Error("Please define base path to UIkit in the requirejs config.");for(s=0;s<a.length;s+=1){var c=a[s].replace(/\./g,"/");r.push(l+"/components/"+c)}e(r,function(){n(i)})},i}),!window.jQuery)throw new Error("UIkit requires jQuery");window&&window.jQuery&&t(window,window.jQuery,window.document)}(function(t,i,e){"use strict";var n={},o=t.UIkit?Object.create(t.UIkit):void 0;if(n.version="2.26.3",n.noConflict=function(){return o&&(t.UIkit=o,i.UIkit=o,i.fn.uk=o.fn),n},n.prefix=function(t){return t},n.$=i,n.$doc=n.$(document),n.$win=n.$(window),n.$html=n.$("html"),n.support={},n.support.transition=function(){var t=function(){var t,i=e.body||e.documentElement,n={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(t in n)if(void 0!==i.style[t])return n[t]}();return t&&{end:t}}(),n.support.animation=function(){var t=function(){var t,i=e.body||e.documentElement,n={WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd oanimationend",animation:"animationend"};for(t in n)if(void 0!==i.style[t])return n[t]}();return t&&{end:t}}(),function(){Date.now=Date.now||function(){return(new Date).getTime()};for(var t=["webkit","moz"],i=0;i<t.length&&!window.requestAnimationFrame;++i){var e=t[i];window.requestAnimationFrame=window[e+"RequestAnimationFrame"],window.cancelAnimationFrame=window[e+"CancelAnimationFrame"]||window[e+"CancelRequestAnimationFrame"]}if(/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var n=0;window.requestAnimationFrame=function(t){var i=Date.now(),e=Math.max(n+16,i);return setTimeout(function(){t(n=e)},e-i)},window.cancelAnimationFrame=clearTimeout}}(),n.support.touch="ontouchstart"in document||t.DocumentTouch&&document instanceof t.DocumentTouch||t.navigator.msPointerEnabled&&t.navigator.msMaxTouchPoints>0||t.navigator.pointerEnabled&&t.navigator.maxTouchPoints>0||!1,n.support.mutationobserver=t.MutationObserver||t.WebKitMutationObserver||null,n.Utils={},n.Utils.isFullscreen=function(){return document.webkitFullscreenElement||document.mozFullScreenElement||document.msFullscreenElement||document.fullscreenElement||!1},n.Utils.str2json=function(t,i){try{return i?JSON.parse(t.replace(/([\$\w]+)\s*:/g,function(t,i){return'"'+i+'":'}).replace(/'([^']+)'/g,function(t,i){return'"'+i+'"'})):new Function("","var json = "+t+"; return JSON.parse(JSON.stringify(json));")()}catch(e){return!1}},n.Utils.debounce=function(t,i,e){var n;return function(){var o=this,s=arguments,a=function(){n=null,e||t.apply(o,s)},r=e&&!n;clearTimeout(n),n=setTimeout(a,i),r&&t.apply(o,s)}},n.Utils.throttle=function(t,i){var e=!1;return function(){e||(t.call(),e=!0,setTimeout(function(){e=!1},i))}},n.Utils.removeCssRules=function(t){var i,e,n,o,s,a,r,l,c,u;t&&setTimeout(function(){try{for(u=document.styleSheets,o=0,r=u.length;r>o;o++){for(n=u[o],e=[],n.cssRules=n.cssRules,i=s=0,l=n.cssRules.length;l>s;i=++s)n.cssRules[i].type===CSSRule.STYLE_RULE&&t.test(n.cssRules[i].selectorText)&&e.unshift(i);for(a=0,c=e.length;c>a;a++)n.deleteRule(e[a])}}catch(h){}},0)},n.Utils.isInView=function(t,e){var o=i(t);if(!o.is(":visible"))return!1;var s=n.$win.scrollLeft(),a=n.$win.scrollTop(),r=o.offset(),l=r.left,c=r.top;return e=i.extend({topoffset:0,leftoffset:0},e),c+o.height()>=a&&c-e.topoffset<=a+n.$win.height()&&l+o.width()>=s&&l-e.leftoffset<=s+n.$win.width()?!0:!1},n.Utils.checkDisplay=function(t,e){var o=n.$("[data-uk-margin], [data-uk-grid-match], [data-uk-grid-margin], [data-uk-check-display]",t||document);return t&&!o.length&&(o=i(t)),o.trigger("display.uk.check"),e&&("string"!=typeof e&&(e='[class*="uk-animation-"]'),o.find(e).each(function(){var t=n.$(this),i=t.attr("class"),e=i.match(/uk\-animation\-(.+)/);t.removeClass(e[0]).width(),t.addClass(e[0])})),o},n.Utils.options=function(t){if("string"!=i.type(t))return t;-1!=t.indexOf(":")&&"}"!=t.trim().substr(-1)&&(t="{"+t+"}");var e=t?t.indexOf("{"):-1,o={};if(-1!=e)try{o=n.Utils.str2json(t.substr(e))}catch(s){}return o},n.Utils.animate=function(t,e){var o=i.Deferred();return t=n.$(t),t.css("display","none").addClass(e).one(n.support.animation.end,function(){t.removeClass(e),o.resolve()}),t.css("display",""),o.promise()},n.Utils.uid=function(t){return(t||"id")+(new Date).getTime()+"RAND"+Math.ceil(1e5*Math.random())},n.Utils.template=function(t,i){for(var e,n,o,s,a=t.replace(/\n/g,"\\n").replace(/\{\{\{\s*(.+?)\s*\}\}\}/g,"{{!$1}}").split(/(\{\{\s*(.+?)\s*\}\})/g),r=0,l=[],c=0;r<a.length;){if(e=a[r],e.match(/\{\{\s*(.+?)\s*\}\}/))switch(r+=1,e=a[r],n=e[0],o=e.substring(e.match(/^(\^|\#|\!|\~|\:)/)?1:0),n){case"~":l.push("for(var $i=0;$i<"+o+".length;$i++) { var $item = "+o+"[$i];"),c++;break;case":":l.push("for(var $key in "+o+") { var $val = "+o+"[$key];"),c++;break;case"#":l.push("if("+o+") {"),c++;break;case"^":l.push("if(!"+o+") {"),c++;break;case"/":l.push("}"),c--;break;case"!":l.push("__ret.push("+o+");");break;default:l.push("__ret.push(escape("+o+"));")}else l.push("__ret.push('"+e.replace(/\'/g,"\\'")+"');");r+=1}return s=new Function("$data",["var __ret = [];","try {","with($data){",c?'__ret = ["Not all blocks are closed correctly."]':l.join(""),"};","}catch(e){__ret = [e.message];}",'return __ret.join("").replace(/\\n\\n/g, "\\n");',"function escape(html) { return String(html).replace(/&/g, '&amp;').replace(/\"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');}"].join("\n")),i?s(i):s},n.Utils.events={},n.Utils.events.click=n.support.touch?"tap":"click",t.UIkit=n,n.fn=function(t,e){var o=arguments,s=t.match(/^([a-z\-]+)(?:\.([a-z]+))?/i),a=s[1],r=s[2];return n[a]?this.each(function(){var t=i(this),s=t.data(a);s||t.data(a,s=n[a](this,r?void 0:e)),r&&s[r].apply(s,Array.prototype.slice.call(o,1))}):(i.error("UIkit component ["+a+"] does not exist."),this)},i.UIkit=n,i.fn.uk=n.fn,n.langdirection="rtl"==n.$html.attr("dir")?"right":"left",n.components={},n.component=function(t,e){var o=function(e,s){var a=this;return this.UIkit=n,this.element=e?n.$(e):null,this.options=i.extend(!0,{},this.defaults,s),this.plugins={},this.element&&this.element.data(t,this),this.init(),(this.options.plugins.length?this.options.plugins:Object.keys(o.plugins)).forEach(function(t){o.plugins[t].init&&(o.plugins[t].init(a),a.plugins[t]=!0)}),this.trigger("init.uk.component",[t,this]),this};return o.plugins={},i.extend(!0,o.prototype,{defaults:{plugins:[]},boot:function(){},init:function(){},on:function(t,i,e){return n.$(this.element||this).on(t,i,e)},one:function(t,i,e){return n.$(this.element||this).one(t,i,e)},off:function(t){return n.$(this.element||this).off(t)},trigger:function(t,i){return n.$(this.element||this).trigger(t,i)},find:function(t){return n.$(this.element?this.element:[]).find(t)},proxy:function(t,i){var e=this;i.split(" ").forEach(function(i){e[i]||(e[i]=function(){return t[i].apply(t,arguments)})})},mixin:function(t,i){var e=this;i.split(" ").forEach(function(i){e[i]||(e[i]=t[i].bind(e))})},option:function(){return 1==arguments.length?this.options[arguments[0]]||void 0:(2==arguments.length&&(this.options[arguments[0]]=arguments[1]),void 0)}},e),this.components[t]=o,this[t]=function(){var e,o;if(arguments.length)switch(arguments.length){case 1:"string"==typeof arguments[0]||arguments[0].nodeType||arguments[0]instanceof jQuery?e=i(arguments[0]):o=arguments[0];break;case 2:e=i(arguments[0]),o=arguments[1]}return e&&e.data(t)?e.data(t):new n.components[t](e,o)},n.domready&&n.component.boot(t),o},n.plugin=function(t,i,e){this.components[t].plugins[i]=e},n.component.boot=function(t){n.components[t].prototype&&n.components[t].prototype.boot&&!n.components[t].booted&&(n.components[t].prototype.boot.apply(n,[]),n.components[t].booted=!0)},n.component.bootComponents=function(){for(var t in n.components)n.component.boot(t)},n.domObservers=[],n.domready=!1,n.ready=function(t){n.domObservers.push(t),n.domready&&t(document)},n.on=function(t,i,e){return t&&t.indexOf("ready.uk.dom")>-1&&n.domready&&i.apply(n.$doc),n.$doc.on(t,i,e)},n.one=function(t,i,e){return t&&t.indexOf("ready.uk.dom")>-1&&n.domready?(i.apply(n.$doc),n.$doc):n.$doc.one(t,i,e)},n.trigger=function(t,i){return n.$doc.trigger(t,i)},n.domObserve=function(t,i){n.support.mutationobserver&&(i=i||function(){},n.$(t).each(function(){var t=this,e=n.$(t);if(!e.data("observer"))try{var o=new n.support.mutationobserver(n.Utils.debounce(function(){i.apply(t,[]),e.trigger("changed.uk.dom")},50),{childList:!0,subtree:!0});o.observe(t,{childList:!0,subtree:!0}),e.data("observer",o)}catch(s){}}))},n.init=function(t){t=t||document,n.domObservers.forEach(function(i){i(t)})},n.on("domready.uk.dom",function(){n.init(),n.domready&&n.Utils.checkDisplay()}),document.addEventListener("DOMContentLoaded",function(){var t=function(){if(n.$body=n.$("body"),n.trigger("beforeready.uk.dom"),n.component.bootComponents(),requestAnimationFrame(function(){var t={dir:{x:0,y:0},x:window.pageXOffset,y:window.pageYOffset},i=function(){var e=window.pageXOffset,o=window.pageYOffset;(t.x!=e||t.y!=o)&&(t.dir.x=e!=t.x?e>t.x?1:-1:0,t.dir.y=o!=t.y?o>t.y?1:-1:0,t.x=e,t.y=o,n.$doc.trigger("scrolling.uk.document",[{dir:{x:t.dir.x,y:t.dir.y},x:e,y:o}])),requestAnimationFrame(i)};return n.support.touch&&n.$html.on("touchmove touchend MSPointerMove MSPointerUp pointermove pointerup",i),(t.x||t.y)&&i(),i}()),n.trigger("domready.uk.dom"),n.support.touch&&navigator.userAgent.match(/(iPad|iPhone|iPod)/g)&&n.$win.on("load orientationchange resize",n.Utils.debounce(function(){var t=function(){return i(".uk-height-viewport").css("height",window.innerHeight),t};return t()}(),100)),n.trigger("afterready.uk.dom"),n.domready=!0,n.support.mutationobserver){var t=n.Utils.debounce(function(){requestAnimationFrame(function(){n.init(document.body)})},10);new n.support.mutationobserver(function(i){var e=!1;i.every(function(t){if("childList"!=t.type)return!0;for(var i,n=0;n<t.addedNodes.length;++n)if(i=t.addedNodes[n],i.outerHTML&&-1!==i.outerHTML.indexOf("data-uk-"))return(e=!0)&&!1;return!0}),e&&t()}).observe(document.body,{childList:!0,subtree:!0})}};return("complete"==document.readyState||"interactive"==document.readyState)&&setTimeout(t),t}()),n.$html.addClass(n.support.touch?"uk-touch":"uk-notouch"),n.support.touch){var s,a=!1,r="uk-hover",l=".uk-overlay, .uk-overlay-hover, .uk-overlay-toggle, .uk-animation-hover, .uk-has-hover";n.$html.on("mouseenter touchstart MSPointerDown pointerdown",l,function(){a&&i("."+r).removeClass(r),a=i(this).addClass(r)}).on("mouseleave touchend MSPointerUp pointerup",function(t){s=i(t.target).parents(l),a&&a.not(s).removeClass(r)})}return n}),function(t){function i(t,i,e,n){return Math.abs(t-i)>=Math.abs(e-n)?t-i>0?"Left":"Right":e-n>0?"Up":"Down"}function e(){c=null,h.last&&(void 0!==h.el&&h.el.trigger("longTap"),h={})}function n(){c&&clearTimeout(c),c=null}function o(){a&&clearTimeout(a),r&&clearTimeout(r),l&&clearTimeout(l),c&&clearTimeout(c),a=r=l=c=null,h={}}function s(t){return t.pointerType==t.MSPOINTER_TYPE_TOUCH&&t.isPrimary}if(!t.fn.swipeLeft){var a,r,l,c,u,h={},d=750;t(function(){var p,f,m,g=0,v=0;"MSGesture"in window&&(u=new MSGesture,u.target=document.body),t(document).on("MSGestureEnd gestureend",function(t){var i=t.originalEvent.velocityX>1?"Right":t.originalEvent.velocityX<-1?"Left":t.originalEvent.velocityY>1?"Down":t.originalEvent.velocityY<-1?"Up":null;i&&void 0!==h.el&&(h.el.trigger("swipe"),h.el.trigger("swipe"+i))}).on("touchstart MSPointerDown pointerdown",function(i){("MSPointerDown"!=i.type||s(i.originalEvent))&&(m="MSPointerDown"==i.type||"pointerdown"==i.type?i:i.originalEvent.touches[0],p=Date.now(),f=p-(h.last||p),h.el=t("tagName"in m.target?m.target:m.target.parentNode),a&&clearTimeout(a),h.x1=m.pageX,h.y1=m.pageY,f>0&&250>=f&&(h.isDoubleTap=!0),h.last=p,c=setTimeout(e,d),!u||"MSPointerDown"!=i.type&&"pointerdown"!=i.type&&"touchstart"!=i.type||u.addPointer(i.originalEvent.pointerId))}).on("touchmove MSPointerMove pointermove",function(t){("MSPointerMove"!=t.type||s(t.originalEvent))&&(m="MSPointerMove"==t.type||"pointermove"==t.type?t:t.originalEvent.touches[0],n(),h.x2=m.pageX,h.y2=m.pageY,g+=Math.abs(h.x1-h.x2),v+=Math.abs(h.y1-h.y2))}).on("touchend MSPointerUp pointerup",function(e){("MSPointerUp"!=e.type||s(e.originalEvent))&&(n(),h.x2&&Math.abs(h.x1-h.x2)>30||h.y2&&Math.abs(h.y1-h.y2)>30?l=setTimeout(function(){void 0!==h.el&&(h.el.trigger("swipe"),h.el.trigger("swipe"+i(h.x1,h.x2,h.y1,h.y2))),h={}},0):"last"in h&&(isNaN(g)||30>g&&30>v?r=setTimeout(function(){var i=t.Event("tap");i.cancelTouch=o,void 0!==h.el&&h.el.trigger(i),h.isDoubleTap?(void 0!==h.el&&h.el.trigger("doubleTap"),h={}):a=setTimeout(function(){a=null,void 0!==h.el&&h.el.trigger("singleTap"),h={}},250)},0):h={},g=v=0))}).on("touchcancel MSPointerCancel",o),t(window).on("scroll",o)}),["swipe","swipeLeft","swipeRight","swipeUp","swipeDown","doubleTap","tap","singleTap","longTap"].forEach(function(i){t.fn[i]=function(e){return t(this).on(i,e)}})}}(jQuery),function(t){"use strict";var i=[];t.component("stackMargin",{defaults:{cls:"uk-margin-small-top",rowfirst:!1,observe:!1},boot:function(){t.ready(function(i){t.$("[data-uk-margin]",i).each(function(){var i=t.$(this);i.data("stackMargin")||t.stackMargin(i,t.Utils.options(i.attr("data-uk-margin")))})})},init:function(){var e=this;t.$win.on("resize orientationchange",function(){var i=function(){e.process()};return t.$(function(){i(),t.$win.on("load",i)}),t.Utils.debounce(i,20)}()),this.on("display.uk.check",function(){this.element.is(":visible")&&this.process()}.bind(this)),this.options.observe&&t.domObserve(this.element,function(){e.element.is(":visible")&&e.process()}),i.push(this)},process:function(){var i=this.element.children();if(t.Utils.stackMargin(i,this.options),!this.options.rowfirst||!i.length)return this;var e={},n=!1;return i.removeClass(this.options.rowfirst).each(function(i,o){o=t.$(this),"none"!=this.style.display&&(i=o.offset().left,((e[i]=e[i]||[])&&e[i]).push(this),n=n===!1?i:Math.min(n,i))}),t.$(e[n]).addClass(this.options.rowfirst),this}}),function(){var i=[],e=function(t){if(t.is(":visible")){var i=t.parent().width(),e=t.data("width"),n=i/e,o=Math.floor(n*t.data("height"));t.css({height:e>i?o:t.data("height")})}};t.component("responsiveElement",{defaults:{},boot:function(){t.ready(function(i){t.$("iframe.uk-responsive-width, [data-uk-responsive]",i).each(function(){var i,e=t.$(this);e.data("responsiveElement")||(i=t.responsiveElement(e,{}))})})},init:function(){var t=this.element;t.attr("width")&&t.attr("height")&&(t.data({width:t.attr("width"),height:t.attr("height")}).on("display.uk.check",function(){e(t)}),e(t),i.push(t))}}),t.$win.on("resize load",t.Utils.debounce(function(){i.forEach(function(t){e(t)})},15))}(),t.Utils.stackMargin=function(i,e){e=t.$.extend({cls:"uk-margin-small-top"},e),i=t.$(i).removeClass(e.cls);var n=!1;i.each(function(i,e,o,s){s=t.$(this),"none"!=s.css("display")&&(i=s.offset(),e=s.outerHeight(),o=i.top+e,s.data({ukMarginPos:o,ukMarginTop:i.top}),(n===!1||i.top<n.top)&&(n={top:i.top,left:i.left,pos:o}))}).each(function(i){i=t.$(this),"none"!=i.css("display")&&i.data("ukMarginTop")>n.top&&i.data("ukMarginPos")>n.pos&&i.addClass(e.cls)})},t.Utils.matchHeights=function(i,e){i=t.$(i).css("min-height",""),e=t.$.extend({row:!0},e);var n=function(i){if(!(i.length<2)){var e=0;i.each(function(){e=Math.max(e,t.$(this).outerHeight())}).each(function(){var i=t.$(this),n=e-("border-box"==i.css("box-sizing")?0:i.outerHeight()-i.height());i.css("min-height",n+"px")})}};e.row?(i.first().width(),setTimeout(function(){var e=!1,o=[];i.each(function(){var i=t.$(this),s=i.offset().top;s!=e&&o.length&&(n(t.$(o)),o=[],s=i.offset().top),o.push(i),e=s}),o.length&&n(t.$(o))},0)):n(i)},function(i){t.Utils.inlineSvg=function(e,n){t.$(e||'img[src$=".svg"]',n||document).each(function(){var e=t.$(this),n=e.attr("src");if(!i[n]){var o=t.$.Deferred();t.$.get(n,{nc:Math.random()},function(i){o.resolve(t.$(i).find("svg"))}),i[n]=o.promise()}i[n].then(function(i){var n=t.$(i).clone();e.attr("id")&&n.attr("id",e.attr("id")),e.attr("class")&&n.attr("class",e.attr("class")),e.attr("style")&&n.attr("style",e.attr("style")),e.attr("width")&&(n.attr("width",e.attr("width")),e.attr("height")||n.removeAttr("height")),e.attr("height")&&(n.attr("height",e.attr("height")),e.attr("width")||n.removeAttr("width")),e.replaceWith(n)})})},t.ready(function(i){t.Utils.inlineSvg("[data-uk-svg]",i)})}({})}(UIkit),function(t){"use strict";function i(i,e){e=t.$.extend({duration:1e3,transition:"easeOutExpo",offset:0,complete:function(){}},e);var n=i.offset().top-e.offset,o=t.$doc.height(),s=window.innerHeight;n+s>o&&(n=o-s),t.$("html,body").stop().animate({scrollTop:n},e.duration,e.transition).promise().done(e.complete)}t.component("smoothScroll",{boot:function(){t.$html.on("click.smooth-scroll.uikit","[data-uk-smooth-scroll]",function(){var i=t.$(this);if(!i.data("smoothScroll")){{t.smoothScroll(i,t.Utils.options(i.attr("data-uk-smooth-scroll")))}i.trigger("click")}return!1})},init:function(){var e=this;this.on("click",function(n){n.preventDefault(),i(t.$(this.hash).length?t.$(this.hash):t.$("body"),e.options)})}}),t.Utils.scrollToElement=i,t.$.easing.easeOutExpo||(t.$.easing.easeOutExpo=function(t,i,e,n,o){return i==o?e+n:n*(-Math.pow(2,-10*i/o)+1)+e})}(UIkit),function(t){"use strict";var i=t.$win,e=t.$doc,n=[],o=function(){for(var t=0;t<n.length;t++)window.requestAnimationFrame.apply(window,[n[t].check])};t.component("scrollspy",{defaults:{target:!1,cls:"uk-scrollspy-inview",initcls:"uk-scrollspy-init-inview",topoffset:0,leftoffset:0,repeat:!1,delay:0},boot:function(){e.on("scrolling.uk.document",o),i.on("load resize orientationchange",t.Utils.debounce(o,50)),t.ready(function(i){t.$("[data-uk-scrollspy]",i).each(function(){var i=t.$(this);if(!i.data("scrollspy")){t.scrollspy(i,t.Utils.options(i.attr("data-uk-scrollspy")))}})})},init:function(){var i,e=this,o=this.options.cls.split(/,/),s=function(){var n=e.options.target?e.element.find(e.options.target):e.element,s=1===n.length?1:0,a=0;n.each(function(){var n=t.$(this),r=n.data("inviewstate"),l=t.Utils.isInView(n,e.options),c=n.data("ukScrollspyCls")||o[a].trim();!l||r||n.data("scrollspy-idle")||(i||(n.addClass(e.options.initcls),e.offset=n.offset(),i=!0,n.trigger("init.uk.scrollspy")),n.data("scrollspy-idle",setTimeout(function(){n.addClass("uk-scrollspy-inview").toggleClass(c).width(),n.trigger("inview.uk.scrollspy"),n.data("scrollspy-idle",!1),n.data("inviewstate",!0)},e.options.delay*s)),s++),!l&&r&&e.options.repeat&&(n.data("scrollspy-idle")&&(clearTimeout(n.data("scrollspy-idle")),n.data("scrollspy-idle",!1)),n.removeClass("uk-scrollspy-inview").toggleClass(c),n.data("inviewstate",!1),n.trigger("outview.uk.scrollspy")),a=o[a+1]?a+1:0})};s(),this.check=s,n.push(this)}});var s=[],a=function(){for(var t=0;t<s.length;t++)window.requestAnimationFrame.apply(window,[s[t].check])};t.component("scrollspynav",{defaults:{cls:"uk-active",closest:!1,topoffset:0,leftoffset:0,smoothscroll:!1},boot:function(){e.on("scrolling.uk.document",a),i.on("resize orientationchange",t.Utils.debounce(a,50)),t.ready(function(i){t.$("[data-uk-scrollspy-nav]",i).each(function(){var i=t.$(this);if(!i.data("scrollspynav")){t.scrollspynav(i,t.Utils.options(i.attr("data-uk-scrollspy-nav")))}})})},init:function(){var e,n=[],o=this.find("a[href^='#']").each(function(){"#"!==this.getAttribute("href").trim()&&n.push(this.getAttribute("href"))}),a=t.$(n.join(",")),r=this.options.cls,l=this.options.closest||this.options.closest,c=this,u=function(){e=[];for(var n=0;n<a.length;n++)t.Utils.isInView(a.eq(n),c.options)&&e.push(a.eq(n));if(e.length){var s,u=i.scrollTop(),h=function(){for(var t=0;t<e.length;t++)if(e[t].offset().top>=u)return e[t]}();if(!h)return;c.options.closest?(o.blur().closest(l).removeClass(r),s=o.filter("a[href='#"+h.attr("id")+"']").closest(l).addClass(r)):s=o.removeClass(r).filter("a[href='#"+h.attr("id")+"']").addClass(r),c.element.trigger("inview.uk.scrollspynav",[h,s])}};this.options.smoothscroll&&t.smoothScroll&&o.each(function(){t.smoothScroll(this,c.options.smoothscroll)}),u(),this.element.data("scrollspynav",this),this.check=u,s.push(this)}})}(UIkit),function(t){"use strict";var i=[];t.component("toggle",{defaults:{target:!1,cls:"uk-hidden",animation:!1,duration:200},boot:function(){t.ready(function(e){t.$("[data-uk-toggle]",e).each(function(){var i=t.$(this);if(!i.data("toggle")){t.toggle(i,t.Utils.options(i.attr("data-uk-toggle")))}}),setTimeout(function(){i.forEach(function(t){t.getToggles()})},0)})},init:function(){var t=this;this.aria=-1!==this.options.cls.indexOf("uk-hidden"),this.getToggles(),this.on("click",function(i){t.element.is('a[href="#"]')&&i.preventDefault(),t.toggle()}),i.push(this)},toggle:function(){if(this.totoggle.length){if(this.options.animation&&t.support.animation){var i=this,e=this.options.animation.split(",");1==e.length&&(e[1]=e[0]),e[0]=e[0].trim(),e[1]=e[1].trim(),this.totoggle.css("animation-duration",this.options.duration+"ms"),this.totoggle.each(function(){var n=t.$(this);n.hasClass(i.options.cls)?(n.toggleClass(i.options.cls),t.Utils.animate(n,e[0]).then(function(){n.css("animation-duration",""),t.Utils.checkDisplay(n)})):t.Utils.animate(this,e[1]+" uk-animation-reverse").then(function(){n.toggleClass(i.options.cls).css("animation-duration",""),t.Utils.checkDisplay(n)})})}else this.totoggle.toggleClass(this.options.cls),t.Utils.checkDisplay(this.totoggle);this.updateAria()}},getToggles:function(){this.totoggle=this.options.target?t.$(this.options.target):[],this.updateAria()},updateAria:function(){this.aria&&this.totoggle.length&&this.totoggle.each(function(){t.$(this).attr("aria-hidden",t.$(this).hasClass("uk-hidden"))})}})}(UIkit),function(t){"use strict";t.component("alert",{defaults:{fade:!0,duration:200,trigger:".uk-alert-close"},boot:function(){t.$html.on("click.alert.uikit","[data-uk-alert]",function(i){var e=t.$(this);if(!e.data("alert")){var n=t.alert(e,t.Utils.options(e.attr("data-uk-alert")));t.$(i.target).is(n.options.trigger)&&(i.preventDefault(),n.close())}})},init:function(){var t=this;this.on("click",this.options.trigger,function(i){i.preventDefault(),t.close()})},close:function(){var t=this.trigger("close.uk.alert"),i=function(){this.trigger("closed.uk.alert").remove()}.bind(this);this.options.fade?t.css("overflow","hidden").css("max-height",t.height()).animate({height:0,opacity:0,"padding-top":0,"padding-bottom":0,"margin-top":0,"margin-bottom":0},this.options.duration,i):i()}})}(UIkit),function(t){"use strict";t.component("buttonRadio",{defaults:{activeClass:"uk-active",target:".uk-button"},boot:function(){t.$html.on("click.buttonradio.uikit","[data-uk-button-radio]",function(i){var e=t.$(this);if(!e.data("buttonRadio")){var n=t.buttonRadio(e,t.Utils.options(e.attr("data-uk-button-radio"))),o=t.$(i.target);o.is(n.options.target)&&o.trigger("click")}})},init:function(){var i=this;this.find(i.options.target).attr("aria-checked","false").filter("."+i.options.activeClass).attr("aria-checked","true"),this.on("click",this.options.target,function(e){var n=t.$(this);n.is('a[href="#"]')&&e.preventDefault(),i.find(i.options.target).not(n).removeClass(i.options.activeClass).blur(),n.addClass(i.options.activeClass),i.find(i.options.target).not(n).attr("aria-checked","false"),n.attr("aria-checked","true"),i.trigger("change.uk.button",[n])})},getSelected:function(){return this.find("."+this.options.activeClass)}}),t.component("buttonCheckbox",{defaults:{activeClass:"uk-active",target:".uk-button"},boot:function(){t.$html.on("click.buttoncheckbox.uikit","[data-uk-button-checkbox]",function(i){var e=t.$(this);if(!e.data("buttonCheckbox")){var n=t.buttonCheckbox(e,t.Utils.options(e.attr("data-uk-button-checkbox"))),o=t.$(i.target);o.is(n.options.target)&&o.trigger("click")}})},init:function(){var i=this;this.find(i.options.target).attr("aria-checked","false").filter("."+i.options.activeClass).attr("aria-checked","true"),this.on("click",this.options.target,function(e){var n=t.$(this);n.is('a[href="#"]')&&e.preventDefault(),n.toggleClass(i.options.activeClass).blur(),n.attr("aria-checked",n.hasClass(i.options.activeClass)),i.trigger("change.uk.button",[n])})},getSelected:function(){return this.find("."+this.options.activeClass)}}),t.component("button",{defaults:{},boot:function(){t.$html.on("click.button.uikit","[data-uk-button]",function(){var i=t.$(this);if(!i.data("button")){{t.button(i,t.Utils.options(i.attr("data-uk-button")))}i.trigger("click")}})},init:function(){var t=this;this.element.attr("aria-pressed",this.element.hasClass("uk-active")),this.on("click",function(i){t.element.is('a[href="#"]')&&i.preventDefault(),t.toggle(),t.trigger("change.uk.button",[t.element.blur().hasClass("uk-active")])})},toggle:function(){this.element.toggleClass("uk-active"),this.element.attr("aria-pressed",this.element.hasClass("uk-active"))}})}(UIkit),function(t){"use strict";function i(i,e,n,o){if(i=t.$(i),e=t.$(e),n=n||window.innerWidth,o=o||i.offset(),e.length){var s=e.outerWidth();if(i.css("min-width",s),"right"==t.langdirection){var a=n-(e.offset().left+s),r=n-(i.offset().left+i.outerWidth());i.css("margin-right",a-r)}else i.css("margin-left",e.offset().left-o.left)}}var e,n=!1,o={x:{"bottom-left":"bottom-right","bottom-right":"bottom-left","bottom-center":"bottom-center","top-left":"top-right","top-right":"top-left","top-center":"top-center","left-top":"right-top","left-bottom":"right-bottom","left-center":"right-center","right-top":"left-top","right-bottom":"left-bottom","right-center":"left-center"},y:{"bottom-left":"top-left","bottom-right":"top-right","bottom-center":"top-center","top-left":"bottom-left","top-right":"bottom-right","top-center":"bottom-center","left-top":"left-bottom","left-bottom":"left-top","left-center":"left-center","right-top":"right-bottom","right-bottom":"right-top","right-center":"right-center"},xy:{"bottom-left":"top-right","bottom-right":"top-left","bottom-center":"top-center","top-left":"bottom-right","top-right":"bottom-left","top-center":"bottom-center","left-top":"right-bottom","left-bottom":"right-top","left-center":"right-center","right-top":"left-bottom","right-bottom":"left-top","right-center":"left-center"}};t.component("dropdown",{defaults:{mode:"hover",pos:"bottom-left",offset:0,remaintime:800,justify:!1,boundary:t.$win,delay:0,dropdownSelector:".uk-dropdown,.uk-dropdown-blank",hoverDelayIdle:250,preventflip:!1},remainIdle:!1,boot:function(){var i=t.support.touch?"click":"mouseenter";t.$html.on(i+".dropdown.uikit","[data-uk-dropdown]",function(e){var n=t.$(this);if(!n.data("dropdown")){var o=t.dropdown(n,t.Utils.options(n.attr("data-uk-dropdown")));("click"==i||"mouseenter"==i&&"hover"==o.options.mode)&&o.element.trigger(i),o.element.find(o.options.dropdownSelector).length&&e.preventDefault()}})},init:function(){var i=this;this.dropdown=this.find(this.options.dropdownSelector),this.offsetParent=this.dropdown.parents().filter(function(){return-1!==t.$.inArray(t.$(this).css("position"),["relative","fixed","absolute"])}).slice(0,1),this.centered=this.dropdown.hasClass("uk-dropdown-center"),this.justified=this.options.justify?t.$(this.options.justify):!1,this.boundary=t.$(this.options.boundary),this.boundary.length||(this.boundary=t.$win),this.dropdown.hasClass("uk-dropdown-up")&&(this.options.pos="top-left"),this.dropdown.hasClass("uk-dropdown-flip")&&(this.options.pos=this.options.pos.replace("left","right")),this.dropdown.hasClass("uk-dropdown-center")&&(this.options.pos=this.options.pos.replace(/(left|right)/,"center")),this.element.attr("aria-haspopup","true"),this.element.attr("aria-expanded",this.element.hasClass("uk-open")),"click"==this.options.mode||t.support.touch?this.on("click.uk.dropdown",function(e){var n=t.$(e.target);n.parents(i.options.dropdownSelector).length||((n.is("a[href='#']")||n.parent().is("a[href='#']")||i.dropdown.length&&!i.dropdown.is(":visible"))&&e.preventDefault(),n.blur()),i.element.hasClass("uk-open")?(!i.dropdown.find(e.target).length||n.is(".uk-dropdown-close")||n.parents(".uk-dropdown-close").length)&&i.hide():i.show()}):this.on("mouseenter",function(){i.trigger("pointerenter.uk.dropdown",[i]),i.remainIdle&&clearTimeout(i.remainIdle),e&&clearTimeout(e),n&&n==i||(e=n&&n!=i?setTimeout(function(){e=setTimeout(i.show.bind(i),i.options.delay)},i.options.hoverDelayIdle):setTimeout(i.show.bind(i),i.options.delay))}).on("mouseleave",function(){e&&clearTimeout(e),i.remainIdle=setTimeout(function(){n&&n==i&&i.hide()},i.options.remaintime),i.trigger("pointerleave.uk.dropdown",[i])}).on("click",function(e){var o=t.$(e.target);return i.remainIdle&&clearTimeout(i.remainIdle),n&&n==i?((!i.dropdown.find(e.target).length||o.is(".uk-dropdown-close")||o.parents(".uk-dropdown-close").length)&&i.hide(),void 0):((o.is("a[href='#']")||o.parent().is("a[href='#']"))&&e.preventDefault(),i.show(),void 0)})},show:function(){t.$html.off("click.outer.dropdown"),n&&n!=this&&n.hide(!0),e&&clearTimeout(e),this.trigger("beforeshow.uk.dropdown",[this]),this.checkDimensions(),this.element.addClass("uk-open"),this.element.attr("aria-expanded","true"),this.trigger("show.uk.dropdown",[this]),t.Utils.checkDisplay(this.dropdown,!0),n=this,this.registerOuterClick()},hide:function(t){this.trigger("beforehide.uk.dropdown",[this,t]),this.element.removeClass("uk-open"),this.remainIdle&&clearTimeout(this.remainIdle),this.remainIdle=!1,this.element.attr("aria-expanded","false"),this.trigger("hide.uk.dropdown",[this,t]),n==this&&(n=!1)},registerOuterClick:function(){var i=this;t.$html.off("click.outer.dropdown"),setTimeout(function(){t.$html.on("click.outer.dropdown",function(o){e&&clearTimeout(e);t.$(o.target);n!=i||i.element.find(o.target).length||(i.hide(!0),t.$html.off("click.outer.dropdown"))})},10)},checkDimensions:function(){if(this.dropdown.length){this.dropdown.removeClass("uk-dropdown-top uk-dropdown-bottom uk-dropdown-left uk-dropdown-right uk-dropdown-stack").css({"top-left":"",left:"","margin-left":"","margin-right":""}),this.justified&&this.justified.length&&this.dropdown.css("min-width","");var e,n=t.$.extend({},this.offsetParent.offset(),{width:this.offsetParent[0].offsetWidth,height:this.offsetParent[0].offsetHeight}),s=this.options.offset,a=this.dropdown,r=(a.show().offset()||{left:0,top:0},a.outerWidth()),l=a.outerHeight(),c=this.boundary.width(),u=(this.boundary[0]!==window&&this.boundary.offset()?this.boundary.offset():{top:0,left:0},this.options.pos),h={"bottom-left":{top:0+n.height+s,left:0},"bottom-right":{top:0+n.height+s,left:0+n.width-r},"bottom-center":{top:0+n.height+s,left:0+n.width/2-r/2},"top-left":{top:0-l-s,left:0},"top-right":{top:0-l-s,left:0+n.width-r},"top-center":{top:0-l-s,left:0+n.width/2-r/2},"left-top":{top:0,left:0-r-s},"left-bottom":{top:0+n.height-l,left:0-r-s},"left-center":{top:0+n.height/2-l/2,left:0-r-s},"right-top":{top:0,left:0+n.width+s},"right-bottom":{top:0+n.height-l,left:0+n.width+s},"right-center":{top:0+n.height/2-l/2,left:0+n.width+s}},d={};if(e=u.split("-"),d=h[u]?h[u]:h["bottom-left"],this.justified&&this.justified.length)i(a.css({left:0}),this.justified,c);else if(this.options.preventflip!==!0){var p;switch(this.checkBoundary(n.left+d.left,n.top+d.top,r,l,c)){case"x":"x"!==this.options.preventflip&&(p=o.x[u]||"right-top");break;case"y":"y"!==this.options.preventflip&&(p=o.y[u]||"top-left");break;case"xy":this.options.preventflip||(p=o.xy[u]||"right-bottom")}p&&(e=p.split("-"),d=h[p]?h[p]:h["bottom-left"],this.checkBoundary(n.left+d.left,n.top+d.top,r,l,c)&&(e=u.split("-"),d=h[u]?h[u]:h["bottom-left"]))}r>c&&(a.addClass("uk-dropdown-stack"),this.trigger("stack.uk.dropdown",[this])),a.css(d).css("display","").addClass("uk-dropdown-"+e[0])
}},checkBoundary:function(i,e,n,o,s){var a="";return(0>i||i-t.$win.scrollLeft()+n>s)&&(a+="x"),(e-t.$win.scrollTop()<0||e-t.$win.scrollTop()+o>window.innerHeight)&&(a+="y"),a}}),t.component("dropdownOverlay",{defaults:{justify:!1,cls:"",duration:200},boot:function(){t.ready(function(i){t.$("[data-uk-dropdown-overlay]",i).each(function(){var i=t.$(this);i.data("dropdownOverlay")||t.dropdownOverlay(i,t.Utils.options(i.attr("data-uk-dropdown-overlay")))})})},init:function(){var e=this;this.justified=this.options.justify?t.$(this.options.justify):!1,this.overlay=this.element.find("uk-dropdown-overlay"),this.overlay.length||(this.overlay=t.$('<div class="uk-dropdown-overlay"></div>').appendTo(this.element)),this.overlay.addClass(this.options.cls),this.on({"beforeshow.uk.dropdown":function(t,n){e.dropdown=n,e.justified&&e.justified.length&&i(e.overlay.css({display:"block","margin-left":"","margin-right":""}),e.justified,e.justified.outerWidth())},"show.uk.dropdown":function(){var i=e.dropdown.dropdown.outerHeight(!0);e.dropdown.element.removeClass("uk-open"),e.overlay.stop().css("display","block").animate({height:i},e.options.duration,function(){e.dropdown.dropdown.css("visibility",""),e.dropdown.element.addClass("uk-open"),t.Utils.checkDisplay(e.dropdown.dropdown,!0)}),e.pointerleave=!1},"hide.uk.dropdown":function(){e.overlay.stop().animate({height:0},e.options.duration)},"pointerenter.uk.dropdown":function(){clearTimeout(e.remainIdle)},"pointerleave.uk.dropdown":function(){e.pointerleave=!0}}),this.overlay.on({mouseenter:function(){e.remainIdle&&(clearTimeout(e.dropdown.remainIdle),clearTimeout(e.remainIdle))},mouseleave:function(){e.pointerleave&&n&&(e.remainIdle=setTimeout(function(){n&&n.hide()},n.options.remaintime))}})}})}(UIkit),function(t){"use strict";var i=[];t.component("gridMatchHeight",{defaults:{target:!1,row:!0,ignorestacked:!1,observe:!1},boot:function(){t.ready(function(i){t.$("[data-uk-grid-match]",i).each(function(){var i,e=t.$(this);e.data("gridMatchHeight")||(i=t.gridMatchHeight(e,t.Utils.options(e.attr("data-uk-grid-match"))))})})},init:function(){var e=this;this.columns=this.element.children(),this.elements=this.options.target?this.find(this.options.target):this.columns,this.columns.length&&(t.$win.on("load resize orientationchange",function(){var i=function(){e.element.is(":visible")&&e.match()};return t.$(function(){i()}),t.Utils.debounce(i,50)}()),this.options.observe&&t.domObserve(this.element,function(){e.element.is(":visible")&&e.match()}),this.on("display.uk.check",function(){this.element.is(":visible")&&this.match()}.bind(this)),i.push(this))},match:function(){var i=this.columns.filter(":visible:first");if(i.length){var e=Math.ceil(100*parseFloat(i.css("width"))/parseFloat(i.parent().css("width")))>=100;return e&&!this.options.ignorestacked?this.revert():t.Utils.matchHeights(this.elements,this.options),this}},revert:function(){return this.elements.css("min-height",""),this}}),t.component("gridMargin",{defaults:{cls:"uk-grid-margin",rowfirst:"uk-row-first"},boot:function(){t.ready(function(i){t.$("[data-uk-grid-margin]",i).each(function(){var i,e=t.$(this);e.data("gridMargin")||(i=t.gridMargin(e,t.Utils.options(e.attr("data-uk-grid-margin"))))})})},init:function(){t.stackMargin(this.element,this.options)}})}(UIkit),function(t){"use strict";function i(i,e){return e?("object"==typeof i?(i=i instanceof jQuery?i:t.$(i),i.parent().length&&(e.persist=i,e.persist.data("modalPersistParent",i.parent()))):i="string"==typeof i||"number"==typeof i?t.$("<div></div>").html(i):t.$("<div></div>").html("UIkit.modal Error: Unsupported data type: "+typeof i),i.appendTo(e.element.find(".uk-modal-dialog")),e):void 0}var e,n=!1,o=0,s=t.$html;t.$win.on("resize orientationchange",t.Utils.debounce(function(){t.$(".uk-modal.uk-open").each(function(){t.$(this).data("modal").resize()})},150)),t.component("modal",{defaults:{keyboard:!0,bgclose:!0,minScrollHeight:150,center:!1,modal:!0},scrollable:!1,transition:!1,hasTransitioned:!0,init:function(){if(e||(e=t.$("body")),this.element.length){var i=this;this.paddingdir="padding-"+("left"==t.langdirection?"right":"left"),this.dialog=this.find(".uk-modal-dialog"),this.active=!1,this.element.attr("aria-hidden",this.element.hasClass("uk-open")),this.on("click",".uk-modal-close",function(t){t.preventDefault(),i.hide()}).on("click",function(e){var n=t.$(e.target);n[0]==i.element[0]&&i.options.bgclose&&i.hide()}),t.domObserve(this.element,function(){i.resize()})}},toggle:function(){return this[this.isActive()?"hide":"show"]()},show:function(){if(this.element.length){var i=this;if(!this.isActive())return this.options.modal&&n&&n.hide(!0),this.element.removeClass("uk-open").show(),this.resize(!0),this.options.modal&&(n=this),this.active=!0,o++,t.support.transition?(this.hasTransitioned=!1,this.element.one(t.support.transition.end,function(){i.hasTransitioned=!0}).addClass("uk-open")):this.element.addClass("uk-open"),s.addClass("uk-modal-page").height(),this.element.attr("aria-hidden","false"),this.element.trigger("show.uk.modal"),t.Utils.checkDisplay(this.dialog,!0),this}},hide:function(i){if(!i&&t.support.transition&&this.hasTransitioned){var e=this;this.one(t.support.transition.end,function(){e._hide()}).removeClass("uk-open")}else this._hide();return this},resize:function(t){if(this.isActive()||t){var i=e.width();if(this.scrollbarwidth=window.innerWidth-i,e.css(this.paddingdir,this.scrollbarwidth),this.element.css("overflow-y",this.scrollbarwidth?"scroll":"auto"),!this.updateScrollable()&&this.options.center){var n=this.dialog.outerHeight(),o=parseInt(this.dialog.css("margin-top"),10)+parseInt(this.dialog.css("margin-bottom"),10);n+o<window.innerHeight?this.dialog.css({top:window.innerHeight/2-n/2-o}):this.dialog.css({top:""})}}},updateScrollable:function(){var t=this.dialog.find(".uk-overflow-container:visible:first");if(t.length){t.css("height",0);var i=Math.abs(parseInt(this.dialog.css("margin-top"),10)),e=this.dialog.outerHeight(),n=window.innerHeight,o=n-2*(20>i?20:i)-e;return t.css({"max-height":o<this.options.minScrollHeight?"":o,height:""}),!0}return!1},_hide:function(){this.active=!1,o>0?o--:o=0,this.element.hide().removeClass("uk-open"),this.element.attr("aria-hidden","true"),o||(s.removeClass("uk-modal-page"),e.css(this.paddingdir,"")),n===this&&(n=!1),this.trigger("hide.uk.modal")},isActive:function(){return this.element.hasClass("uk-open")}}),t.component("modalTrigger",{boot:function(){t.$html.on("click.modal.uikit","[data-uk-modal]",function(i){var e=t.$(this);if(e.is("a")&&i.preventDefault(),!e.data("modalTrigger")){var n=t.modalTrigger(e,t.Utils.options(e.attr("data-uk-modal")));n.show()}}),t.$html.on("keydown.modal.uikit",function(t){n&&27===t.keyCode&&n.options.keyboard&&(t.preventDefault(),n.hide())})},init:function(){var i=this;this.options=t.$.extend({target:i.element.is("a")?i.element.attr("href"):!1},this.options),this.modal=t.modal(this.options.target,this.options),this.on("click",function(t){t.preventDefault(),i.show()}),this.proxy(this.modal,"show hide isActive")}}),t.modal.dialog=function(e,n){var o=t.modal(t.$(t.modal.dialog.template).appendTo("body"),n);return o.on("hide.uk.modal",function(){o.persist&&(o.persist.appendTo(o.persist.data("modalPersistParent")),o.persist=!1),o.element.remove()}),i(e,o),o},t.modal.dialog.template='<div class="uk-modal"><div class="uk-modal-dialog" style="min-height:0;"></div></div>',t.modal.alert=function(i,e){e=t.$.extend(!0,{bgclose:!1,keyboard:!1,modal:!1,labels:t.modal.labels},e);var n=t.modal.dialog(['<div class="uk-margin uk-modal-content">'+String(i)+"</div>",'<div class="uk-modal-footer uk-text-right"><button class="uk-button uk-button-primary uk-modal-close">'+e.labels.Ok+"</button></div>"].join(""),e);return n.on("show.uk.modal",function(){setTimeout(function(){n.element.find("button:first").focus()},50)}),n.show()},t.modal.confirm=function(i,e,n){var o=arguments.length>1&&arguments[arguments.length-1]?arguments[arguments.length-1]:{};e=t.$.isFunction(e)?e:function(){},n=t.$.isFunction(n)?n:function(){},o=t.$.extend(!0,{bgclose:!1,keyboard:!1,modal:!1,labels:t.modal.labels},t.$.isFunction(o)?{}:o);var s=t.modal.dialog(['<div class="uk-margin uk-modal-content">'+String(i)+"</div>",'<div class="uk-modal-footer uk-text-right"><button class="uk-button js-modal-confirm-cancel">'+o.labels.Cancel+'</button> <button class="uk-button uk-button-primary js-modal-confirm">'+o.labels.Ok+"</button></div>"].join(""),o);return s.element.find(".js-modal-confirm, .js-modal-confirm-cancel").on("click",function(){t.$(this).is(".js-modal-confirm")?e():n(),s.hide()}),s.on("show.uk.modal",function(){setTimeout(function(){s.element.find(".js-modal-confirm").focus()},50)}),s.show()},t.modal.prompt=function(i,e,n,o){n=t.$.isFunction(n)?n:function(){},o=t.$.extend(!0,{bgclose:!1,keyboard:!1,modal:!1,labels:t.modal.labels},o);var s=t.modal.dialog([i?'<div class="uk-modal-content uk-form">'+String(i)+"</div>":"",'<div class="uk-margin-small-top uk-modal-content uk-form"><p><input type="text" class="uk-width-1-1"></p></div>','<div class="uk-modal-footer uk-text-right"><button class="uk-button uk-modal-close">'+o.labels.Cancel+'</button> <button class="uk-button uk-button-primary js-modal-ok">'+o.labels.Ok+"</button></div>"].join(""),o),a=s.element.find("input[type='text']").val(e||"").on("keyup",function(t){13==t.keyCode&&s.element.find(".js-modal-ok").trigger("click")});return s.element.find(".js-modal-ok").on("click",function(){n(a.val())!==!1&&s.hide()}),s.on("show.uk.modal",function(){setTimeout(function(){a.focus()},50)}),s.show()},t.modal.blockUI=function(i,e){var n=t.modal.dialog(['<div class="uk-margin uk-modal-content">'+String(i||'<div class="uk-text-center">...</div>')+"</div>"].join(""),t.$.extend({bgclose:!1,keyboard:!1,modal:!1},e));return n.content=n.element.find(".uk-modal-content:first"),n.show()},t.modal.labels={Ok:"Ok",Cancel:"Cancel"}}(UIkit),function(t){"use strict";function i(i){var e=t.$(i),n="auto";if(e.is(":visible"))n=e.outerHeight();else{var o={position:e.css("position"),visibility:e.css("visibility"),display:e.css("display")};n=e.css({position:"absolute",visibility:"hidden",display:"block"}).outerHeight(),e.css(o)}return n}t.component("nav",{defaults:{toggle:">li.uk-parent > a[href='#']",lists:">li.uk-parent > ul",multiple:!1},boot:function(){t.ready(function(i){t.$("[data-uk-nav]",i).each(function(){var i=t.$(this);if(!i.data("nav")){t.nav(i,t.Utils.options(i.attr("data-uk-nav")))}})})},init:function(){var i=this;this.on("click.uk.nav",this.options.toggle,function(e){e.preventDefault();var n=t.$(this);i.open(n.parent()[0]==i.element[0]?n:n.parent("li"))}),this.find(this.options.lists).each(function(){var e=t.$(this),n=e.parent(),o=n.hasClass("uk-active");e.wrap('<div style="overflow:hidden;height:0;position:relative;"></div>'),n.data("list-container",e.parent()[o?"removeClass":"addClass"]("uk-hidden")),n.attr("aria-expanded",n.hasClass("uk-open")),o&&i.open(n,!0)})},open:function(e,n){var o=this,s=this.element,a=t.$(e),r=a.data("list-container");this.options.multiple||s.children(".uk-open").not(e).each(function(){var i=t.$(this);i.data("list-container")&&i.data("list-container").stop().animate({height:0},function(){t.$(this).parent().removeClass("uk-open").end().addClass("uk-hidden")})}),a.toggleClass("uk-open"),a.attr("aria-expanded",a.hasClass("uk-open")),r&&(a.hasClass("uk-open")&&r.removeClass("uk-hidden"),n?(r.stop().height(a.hasClass("uk-open")?"auto":0),a.hasClass("uk-open")||r.addClass("uk-hidden"),this.trigger("display.uk.check")):r.stop().animate({height:a.hasClass("uk-open")?i(r.find("ul:first")):0},function(){a.hasClass("uk-open")?r.css("height",""):r.addClass("uk-hidden"),o.trigger("display.uk.check")}))}})}(UIkit),function(t){"use strict";var i={x:window.scrollX,y:window.scrollY},e=(t.$win,t.$doc,t.$html),n={show:function(n){if(n=t.$(n),n.length){var o=t.$("body"),s=n.find(".uk-offcanvas-bar:first"),a="right"==t.langdirection,r=s.hasClass("uk-offcanvas-bar-flip")?-1:1,l=r*(a?-1:1),c=window.innerWidth-o.width();i={x:window.pageXOffset,y:window.pageYOffset},n.addClass("uk-active"),o.css({width:window.innerWidth-c,height:window.innerHeight}).addClass("uk-offcanvas-page"),o.css(a?"margin-right":"margin-left",(a?-1:1)*s.outerWidth()*l).width(),e.css("margin-top",-1*i.y),s.addClass("uk-offcanvas-bar-show"),this._initElement(n),s.trigger("show.uk.offcanvas",[n,s]),n.attr("aria-hidden","false")}},hide:function(n){var o=t.$("body"),s=t.$(".uk-offcanvas.uk-active"),a="right"==t.langdirection,r=s.find(".uk-offcanvas-bar:first"),l=function(){o.removeClass("uk-offcanvas-page").css({width:"",height:"","margin-left":"","margin-right":""}),s.removeClass("uk-active"),r.removeClass("uk-offcanvas-bar-show"),e.css("margin-top",""),window.scrollTo(i.x,i.y),r.trigger("hide.uk.offcanvas",[s,r]),s.attr("aria-hidden","true")};s.length&&(t.support.transition&&!n?(o.one(t.support.transition.end,function(){l()}).css(a?"margin-right":"margin-left",""),setTimeout(function(){r.removeClass("uk-offcanvas-bar-show")},0)):l())},_initElement:function(i){i.data("OffcanvasInit")||(i.on("click.uk.offcanvas swipeRight.uk.offcanvas swipeLeft.uk.offcanvas",function(i){var e=t.$(i.target);if(!i.type.match(/swipe/)&&!e.hasClass("uk-offcanvas-close")){if(e.hasClass("uk-offcanvas-bar"))return;if(e.parents(".uk-offcanvas-bar:first").length)return}i.stopImmediatePropagation(),n.hide()}),i.on("click","a[href*='#']",function(){var i=t.$(this),e=i.attr("href");"#"!=e&&(t.$doc.one("hide.uk.offcanvas",function(){var n;try{n=t.$(i[0].hash)}catch(o){n=""}n.length||(n=t.$('[name="'+i[0].hash.replace("#","")+'"]')),n.length&&t.Utils.scrollToElement?t.Utils.scrollToElement(n,t.Utils.options(i.attr("data-uk-smooth-scroll")||"{}")):window.location.href=e}),n.hide())}),i.data("OffcanvasInit",!0))}};t.component("offcanvasTrigger",{boot:function(){e.on("click.offcanvas.uikit","[data-uk-offcanvas]",function(i){i.preventDefault();var e=t.$(this);if(!e.data("offcanvasTrigger")){{t.offcanvasTrigger(e,t.Utils.options(e.attr("data-uk-offcanvas")))}e.trigger("click")}}),e.on("keydown.uk.offcanvas",function(t){27===t.keyCode&&n.hide()})},init:function(){var i=this;this.options=t.$.extend({target:i.element.is("a")?i.element.attr("href"):!1},this.options),this.on("click",function(t){t.preventDefault(),n.show(i.options.target)})}}),t.offcanvas=n}(UIkit),function(t){"use strict";function i(i,e,n){var o,s=t.$.Deferred(),a=i,r=i;return n[0]===e[0]?(s.resolve(),s.promise()):("object"==typeof i&&(a=i[0],r=i[1]||i[0]),t.$body.css("overflow-x","hidden"),o=function(){e&&e.hide().removeClass("uk-active "+r+" uk-animation-reverse"),n.addClass(a).one(t.support.animation.end,function(){n.removeClass(""+a).css({opacity:"",display:""}),s.resolve(),t.$body.css("overflow-x",""),e&&e.css({opacity:"",display:""})}.bind(this)).show()},n.css("animation-duration",this.options.duration+"ms"),e&&e.length?(e.css("animation-duration",this.options.duration+"ms"),e.css("display","none").addClass(r+" uk-animation-reverse").one(t.support.animation.end,function(){o()}.bind(this)).css("display","")):(n.addClass("uk-active"),o()),s.promise())}var e;t.component("switcher",{defaults:{connect:!1,toggle:">*",active:0,animation:!1,duration:200,swiping:!0},animating:!1,boot:function(){t.ready(function(i){t.$("[data-uk-switcher]",i).each(function(){var i=t.$(this);if(!i.data("switcher")){t.switcher(i,t.Utils.options(i.attr("data-uk-switcher")))}})})},init:function(){var i=this;if(this.on("click.uk.switcher",this.options.toggle,function(t){t.preventDefault(),i.show(this)}),this.options.connect){this.connect=t.$(this.options.connect),this.connect.children().removeClass("uk-active"),this.connect.length&&(this.connect.children().attr("aria-hidden","true"),this.connect.on("click","[data-uk-switcher-item]",function(e){e.preventDefault();var n=t.$(this).attr("data-uk-switcher-item");if(i.index!=n)switch(n){case"next":case"previous":i.show(i.index+("next"==n?1:-1));break;default:i.show(parseInt(n,10))}}),this.options.swiping&&this.connect.on("swipeRight swipeLeft",function(t){t.preventDefault(),window.getSelection().toString()||i.show(i.index+("swipeLeft"==t.type?1:-1))}));var e=this.find(this.options.toggle),n=e.filter(".uk-active");if(n.length)this.show(n,!1);else{if(this.options.active===!1)return;n=e.eq(this.options.active),this.show(n.length?n:e.eq(0),!1)}e.not(n).attr("aria-expanded","false"),n.attr("aria-expanded","true")}},show:function(n,o){if(!this.animating){if(isNaN(n))n=t.$(n);else{var s=this.find(this.options.toggle);n=0>n?s.length-1:n,n=s.eq(s[n]?n:0)}var a=this,s=this.find(this.options.toggle),r=t.$(n),l=e[this.options.animation]||function(t,n){if(!a.options.animation)return e.none.apply(a);var o=a.options.animation.split(",");return 1==o.length&&(o[1]=o[0]),o[0]=o[0].trim(),o[1]=o[1].trim(),i.apply(a,[o,t,n])};o!==!1&&t.support.animation||(l=e.none),r.hasClass("uk-disabled")||(s.attr("aria-expanded","false"),r.attr("aria-expanded","true"),s.filter(".uk-active").removeClass("uk-active"),r.addClass("uk-active"),this.options.connect&&this.connect.length&&(this.index=this.find(this.options.toggle).index(r),-1==this.index&&(this.index=0),this.connect.each(function(){var i=t.$(this),e=t.$(i.children()),n=t.$(e.filter(".uk-active")),o=t.$(e.eq(a.index));a.animating=!0,l.apply(a,[n,o]).then(function(){n.removeClass("uk-active"),o.addClass("uk-active"),n.attr("aria-hidden","true"),o.attr("aria-hidden","false"),t.Utils.checkDisplay(o,!0),a.animating=!1})})),this.trigger("show.uk.switcher",[r]))}}}),e={none:function(){var i=t.$.Deferred();return i.resolve(),i.promise()},fade:function(t,e){return i.apply(this,["uk-animation-fade",t,e])},"slide-bottom":function(t,e){return i.apply(this,["uk-animation-slide-bottom",t,e])},"slide-top":function(t,e){return i.apply(this,["uk-animation-slide-top",t,e])},"slide-vertical":function(t,e){var n=["uk-animation-slide-top","uk-animation-slide-bottom"];return t&&t.index()>e.index()&&n.reverse(),i.apply(this,[n,t,e])},"slide-left":function(t,e){return i.apply(this,["uk-animation-slide-left",t,e])},"slide-right":function(t,e){return i.apply(this,["uk-animation-slide-right",t,e])},"slide-horizontal":function(t,e){var n=["uk-animation-slide-right","uk-animation-slide-left"];return t&&t.index()>e.index()&&n.reverse(),i.apply(this,[n,t,e])},scale:function(t,e){return i.apply(this,["uk-animation-scale-up",t,e])}},t.switcher.animations=e}(UIkit),function(t){"use strict";t.component("tab",{defaults:{target:">li:not(.uk-tab-responsive, .uk-disabled)",connect:!1,active:0,animation:!1,duration:200,swiping:!0},boot:function(){t.ready(function(i){t.$("[data-uk-tab]",i).each(function(){var i=t.$(this);if(!i.data("tab")){t.tab(i,t.Utils.options(i.attr("data-uk-tab")))}})})},init:function(){var i=this;this.current=!1,this.on("click.uk.tab",this.options.target,function(e){if(e.preventDefault(),!i.switcher||!i.switcher.animating){var n=i.find(i.options.target).not(this);n.removeClass("uk-active").blur(),i.trigger("change.uk.tab",[t.$(this).addClass("uk-active"),i.current]),i.current=t.$(this),i.options.connect||(n.attr("aria-expanded","false"),t.$(this).attr("aria-expanded","true"))}}),this.options.connect&&(this.connect=t.$(this.options.connect)),this.responsivetab=t.$('<li class="uk-tab-responsive uk-active"><a></a></li>').append('<div class="uk-dropdown uk-dropdown-small"><ul class="uk-nav uk-nav-dropdown"></ul><div>'),this.responsivetab.dropdown=this.responsivetab.find(".uk-dropdown"),this.responsivetab.lst=this.responsivetab.dropdown.find("ul"),this.responsivetab.caption=this.responsivetab.find("a:first"),this.element.hasClass("uk-tab-bottom")&&this.responsivetab.dropdown.addClass("uk-dropdown-up"),this.responsivetab.lst.on("click.uk.tab","a",function(e){e.preventDefault(),e.stopPropagation();var n=t.$(this);i.element.children("li:not(.uk-tab-responsive)").eq(n.data("index")).trigger("click")}),this.on("show.uk.switcher change.uk.tab",function(t,e){i.responsivetab.caption.html(e.text())}),this.element.append(this.responsivetab),this.options.connect&&(this.switcher=t.switcher(this.element,{toggle:">li:not(.uk-tab-responsive)",connect:this.options.connect,active:this.options.active,animation:this.options.animation,duration:this.options.duration,swiping:this.options.swiping})),t.dropdown(this.responsivetab,{mode:"click",preventflip:"y"}),i.trigger("change.uk.tab",[this.element.find(this.options.target).not(".uk-tab-responsive").filter(".uk-active")]),this.check(),t.$win.on("resize orientationchange",t.Utils.debounce(function(){i.element.is(":visible")&&i.check()},100)),this.on("display.uk.check",function(){i.element.is(":visible")&&i.check()})},check:function(){var i=this.element.children("li:not(.uk-tab-responsive)").removeClass("uk-hidden");if(!i.length)return this.responsivetab.addClass("uk-hidden"),void 0;var e,n,o,s=i.eq(0).offset().top+Math.ceil(i.eq(0).height()/2),a=!1;if(this.responsivetab.lst.empty(),i.each(function(){t.$(this).offset().top>s&&(a=!0)}),a)for(var r=0;r<i.length;r++)e=t.$(i.eq(r)),n=e.find("a"),"none"==e.css("float")||e.attr("uk-dropdown")||(e.hasClass("uk-disabled")||(o=e[0].outerHTML.replace("<a ",'<a data-index="'+r+'" '),this.responsivetab.lst.append(o)),e.addClass("uk-hidden"));this.responsivetab[this.responsivetab.lst.children("li").length?"removeClass":"addClass"]("uk-hidden")}})}(UIkit),function(t){"use strict";t.component("cover",{defaults:{automute:!0},boot:function(){t.ready(function(i){t.$("[data-uk-cover]",i).each(function(){var i=t.$(this);if(!i.data("cover")){t.cover(i,t.Utils.options(i.attr("data-uk-cover")))}})})},init:function(){if(this.parent=this.element.parent(),t.$win.on("load resize orientationchange",t.Utils.debounce(function(){this.check()}.bind(this),100)),this.on("display.uk.check",function(){this.element.is(":visible")&&this.check()}.bind(this)),this.check(),this.element.is("iframe")&&this.options.automute){var i=this.element.attr("src");this.element.attr("src","").on("load",function(){this.contentWindow.postMessage('{ "event": "command", "func": "mute", "method":"setVolume", "value":0}',"*")}).attr("src",[i,i.indexOf("?")>-1?"&":"?","enablejsapi=1&api=1"].join(""))}},check:function(){this.element.css({width:"",height:""}),this.dimension={w:this.element.width(),h:this.element.height()},this.element.attr("width")&&!isNaN(this.element.attr("width"))&&(this.dimension.w=this.element.attr("width")),this.element.attr("height")&&!isNaN(this.element.attr("height"))&&(this.dimension.h=this.element.attr("height")),this.ratio=this.dimension.w/this.dimension.h;var t,i,e=this.parent.width(),n=this.parent.height();e/this.ratio<n?(t=Math.ceil(n*this.ratio),i=n):(t=e,i=Math.ceil(e/this.ratio)),this.element.css({width:t,height:i})}})}(UIkit);
/*! UIkit 2.26.3 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
(function(addon) {

    var component;

    if (window.UIkit) {
        component = addon(UIkit);
    }

    if (typeof define == "function" && define.amd) {
        define("uikit-grid", ["uikit"], function(){
            return component || addon(UIkit);
        });
    }

})(function(UI){

    "use strict";

    UI.component('grid', {

        defaults: {
            colwidth  : 'auto',
            animation : true,
            duration  : 300,
            gutter    : 0,
            controls  : false,
            filter    : false
        },

        boot:  function() {

            // init code
            UI.ready(function(context) {

                UI.$('[data-uk-grid]', context).each(function(){

                    var ele = UI.$(this);

                    if(!ele.data("grid")) {
                        UI.grid(ele, UI.Utils.options(ele.attr('data-uk-grid')));
                    }
                });
            });
        },

        init: function() {

            var $this = this, gutter = String(this.options.gutter).trim().split(' ');

            this.gutterv  = parseInt(gutter[0], 10);
            this.gutterh  = parseInt((gutter[1] || gutter[0]), 10);

            // make sure parent element has the right position property
            this.element.css({'position': 'relative'});

            this.controls = null;

            if (this.options.controls) {

                this.controls = UI.$(this.options.controls);

                // filter
                this.controls.on('click', '[data-uk-filter]', function(e){
                    e.preventDefault();
                    $this.filter(UI.$(this).attr('data-uk-filter'));
                });

                // sort
                this.controls.on('click', '[data-uk-sort]', function(e){
                    e.preventDefault();
                    var cmd = UI.$(this).attr('data-uk-sort').split(':');
                    $this.sort(cmd[0], cmd[1]);
                });
            }

            UI.$win.on('load resize orientationchange', UI.Utils.debounce(function(){

                if ($this.currentfilter) {
                    $this.filter($this.currentfilter);
                } else {
                    this.updateLayout();
                }

            }.bind(this), 100));

            this.on('display.uk.check', function(){
                if ($this.element.is(":visible"))  $this.updateLayout();
            });

            UI.domObserve(this.element, function(e) {
                $this.updateLayout();
            });

            if (this.options.filter !== false) {
                this.filter(this.options.filter);
            } else {
                this.updateLayout();
            }
        },

        _prepareElements: function() {

            var children = this.element.children(':not([data-grid-prepared])'), css;

            // exit if no already prepared elements found
            if (!children.length) {
                return;
            }

            css = {
                'position'   : 'absolute',
                'box-sizing' : 'border-box',
                'width'      : this.options.colwidth == 'auto' ? '' : this.options.colwidth
            };

            if (this.options.gutter) {

                css['padding-left']   = this.gutterh;
                css['padding-bottom'] = this.gutterv;

                this.element.css('margin-left', this.gutterh * -1);
            }

            children.attr('data-grid-prepared', 'true').css(css);
        },

        updateLayout: function(elements) {

            this._prepareElements();

            elements = elements || this.element.children(':visible');

            var children  = elements,
                maxwidth  = this.element.width() + (2*this.gutterh) + 2,
                left      = 0,
                top       = 0,
                positions = [],

                item, width, height, pos, i, z, max, size;

            this.trigger('beforeupdate.uk.grid', [children]);

            children.each(function(index){

                size   = getElementSize(this);

                item   = UI.$(this);
                width  = size.outerWidth;
                height = size.outerHeight;
                left   = 0;
                top    = 0;

                for (i=0,max=positions.length;i<max;i++) {

                    pos = positions[i];

                    if (left <= pos.aX) { left = pos.aX; }
                    if (maxwidth < (left + width)) { left = 0; }
                    if (top <= pos.aY) { top = pos.aY; }
                }

                positions.push({
                    "ele"    : item,
                    "top"    : top,
                    "left"   : left,
                    "width"  : width,
                    "height" : height,
                    "aY"     : (top  + height),
                    "aX"     : (left + width)
                });
            });

            var posPrev, maxHeight = 0;

            // fix top
            for (i=0,max=positions.length;i<max;i++) {

                pos = positions[i];
                top = 0;

                for (z=0;z<i;z++) {

                    posPrev = positions[z];

                    // (posPrev.left + 1) fixex 1px bug when using % based widths
                    if (pos.left < posPrev.aX && (posPrev.left +1) < pos.aX) {
                        top = posPrev.aY;
                    }
                }

                pos.top = top;
                pos.aY  = top + pos.height;

                maxHeight = Math.max(maxHeight, pos.aY);
            }

            maxHeight = maxHeight - this.gutterv;

            if (this.options.animation) {

                this.element.stop().animate({'height': maxHeight}, 100);

                positions.forEach(function(pos){
                    pos.ele.stop().animate({"top": pos.top, "left": pos.left, opacity: 1}, this.options.duration);
                }.bind(this));

            } else {

                this.element.css('height', maxHeight);

                positions.forEach(function(pos){
                    pos.ele.css({"top": pos.top, "left": pos.left, opacity: 1});
                }.bind(this));
            }

            // make sure to trigger possible scrollpies etc.
            setTimeout(function() {
                UI.$doc.trigger('scrolling.uk.document');
            }, 2 * this.options.duration * (this.options.animation ? 1:0));

            this.trigger('afterupdate.uk.grid', [children]);
        },

        filter: function(filter) {

            this.currentfilter = filter;

            filter = filter || [];

            if (typeof(filter) === 'number') {
                filter = filter.toString();
            }

            if (typeof(filter) === 'string') {
                filter = filter.split(/,/).map(function(item){ return item.trim(); });
            }

            var $this = this, children = this.element.children(), elements = {"visible": [], "hidden": []}, visible, hidden;

            children.each(function(index){

                var ele = UI.$(this), f = ele.attr('data-uk-filter'), infilter = filter.length ? false : true;

                if (f) {

                    f = f.split(/,/).map(function(item){ return item.trim(); });

                    filter.forEach(function(item){
                        if (f.indexOf(item) > -1) infilter = true;
                    });
                }

                elements[infilter ? "visible":"hidden"].push(ele);
            });

            // convert to jQuery collections
            elements.hidden  = UI.$(elements.hidden).map(function () {return this[0];});
            elements.visible = UI.$(elements.visible).map(function () {return this[0];});

            elements.hidden.attr('aria-hidden', 'true').filter(':visible').fadeOut(this.options.duration);
            elements.visible.attr('aria-hidden', 'false').filter(':hidden').css('opacity', 0).show();

            $this.updateLayout(elements.visible);

            if (this.controls && this.controls.length) {
                this.controls.find('[data-uk-filter]').removeClass('uk-active').filter('[data-uk-filter="'+filter+'"]').addClass('uk-active');
            }
        },

        sort: function(by, order){

            order = order || 1;

            // covert from string (asc|desc) to number
            if (typeof(order) === 'string') {
                order = order.toLowerCase() == 'desc' ? -1 : 1;
            }

            var elements = this.element.children();

            elements.sort(function(a, b){

                a = UI.$(a);
                b = UI.$(b);

                return (b.data(by) || '') < (a.data(by) || '') ? order : (order*-1);

            }).appendTo(this.element);

            this.updateLayout(elements.filter(':visible'));

            if (this.controls && this.controls.length) {
                this.controls.find('[data-uk-sort]').removeClass('uk-active').filter('[data-uk-sort="'+by+':'+(order == -1 ? 'desc':'asc')+'"]').addClass('uk-active');
            }
        }
    });


    /*!
    * getSize v1.2.2
    * measure size of elements
    * MIT license
    * https://github.com/desandro/get-size
    */
    var _getSize = (function(){

        var prefixes = 'Webkit Moz ms Ms O'.split(' ');
        var docElemStyle = document.documentElement.style;

        function getStyleProperty( propName ) {
            if ( !propName ) {
                return;
            }

            // test standard property first
            if ( typeof docElemStyle[ propName ] === 'string' ) {
                return propName;
            }

            // capitalize
            propName = propName.charAt(0).toUpperCase() + propName.slice(1);

            // test vendor specific properties
            var prefixed;
            for ( var i=0, len = prefixes.length; i < len; i++ ) {
                prefixed = prefixes[i] + propName;
                if ( typeof docElemStyle[ prefixed ] === 'string' ) {
                    return prefixed;
                }
            }
        }

        // -------------------------- helpers -------------------------- //

        // get a number from a string, not a percentage
        function getStyleSize( value ) {
            var num = parseFloat( value );
            // not a percent like '100%', and a number
            var isValid = value.indexOf('%') === -1 && !isNaN( num );
            return isValid && num;
        }

        function noop() {}

        var logError = typeof console === 'undefined' ? noop : function( message ) {
            console.error( message );
        };

        // -------------------------- measurements -------------------------- //

        var measurements = [
            'paddingLeft',
            'paddingRight',
            'paddingTop',
            'paddingBottom',
            'marginLeft',
            'marginRight',
            'marginTop',
            'marginBottom',
            'borderLeftWidth',
            'borderRightWidth',
            'borderTopWidth',
            'borderBottomWidth'
        ];

        function getZeroSize() {
            var size = {
                width: 0,
                height: 0,
                innerWidth: 0,
                innerHeight: 0,
                outerWidth: 0,
                outerHeight: 0
            };
            for ( var i=0, len = measurements.length; i < len; i++ ) {
                var measurement = measurements[i];
                size[ measurement ] = 0;
            }
            return size;
        }


        // -------------------------- setup -------------------------- //

        var isSetup = false;
        var getStyle, boxSizingProp, isBoxSizeOuter;

        /**
        * setup vars and functions
        * do it on initial getSize(), rather than on script load
        * For Firefox bug https://bugzilla.mozilla.org/show_bug.cgi?id=548397
        */
        function setup() {
            // setup once
            if ( isSetup ) {
                return;
            }
            isSetup = true;

            var getComputedStyle = window.getComputedStyle;
            getStyle = ( function() {
                var getStyleFn = getComputedStyle ?
                function( elem ) {
                    return getComputedStyle( elem, null );
                } :
                function( elem ) {
                    return elem.currentStyle;
                };

                return function getStyle( elem ) {
                    var style = getStyleFn( elem );
                    if ( !style ) {
                        logError( 'Style returned ' + style +
                        '. Are you running this code in a hidden iframe on Firefox? ' +
                        'See http://bit.ly/getsizebug1' );
                    }
                    return style;
                };
            })();

            // -------------------------- box sizing -------------------------- //

            boxSizingProp = getStyleProperty('boxSizing');

            /**
            * WebKit measures the outer-width on style.width on border-box elems
            * IE & Firefox measures the inner-width
            */
            if ( boxSizingProp ) {
                var div = document.createElement('div');
                div.style.width = '200px';
                div.style.padding = '1px 2px 3px 4px';
                div.style.borderStyle = 'solid';
                div.style.borderWidth = '1px 2px 3px 4px';
                div.style[ boxSizingProp ] = 'border-box';

                var body = document.body || document.documentElement;
                body.appendChild( div );
                var style = getStyle( div );

                isBoxSizeOuter = getStyleSize( style.width ) === 200;
                body.removeChild( div );
            }

        }

        // -------------------------- getSize -------------------------- //

        function getSize( elem ) {
            setup();

            // use querySeletor if elem is string
            if ( typeof elem === 'string' ) {
                elem = document.querySelector( elem );
            }

            // do not proceed on non-objects
            if ( !elem || typeof elem !== 'object' || !elem.nodeType ) {
                return;
            }

            var style = getStyle( elem );

            // if hidden, everything is 0
            if ( style.display === 'none' ) {
                return getZeroSize();
            }

            var size = {};
            size.width = elem.offsetWidth;
            size.height = elem.offsetHeight;

            var isBorderBox = size.isBorderBox = !!( boxSizingProp &&
                style[ boxSizingProp ] && style[ boxSizingProp ] === 'border-box' );

            // get all measurements
            for ( var i=0, len = measurements.length; i < len; i++ ) {
                var measurement = measurements[i];
                var value = style[ measurement ];

                var num = parseFloat( value );
                // any 'auto', 'medium' value will be 0
                size[ measurement ] = !isNaN( num ) ? num : 0;
            }

            var paddingWidth = size.paddingLeft + size.paddingRight;
            var paddingHeight = size.paddingTop + size.paddingBottom;
            var marginWidth = size.marginLeft + size.marginRight;
            var marginHeight = size.marginTop + size.marginBottom;
            var borderWidth = size.borderLeftWidth + size.borderRightWidth;
            var borderHeight = size.borderTopWidth + size.borderBottomWidth;

            var isBorderBoxSizeOuter = isBorderBox && isBoxSizeOuter;

            // overwrite width and height if we can get it from style
            var styleWidth = getStyleSize( style.width );
            if ( styleWidth !== false ) {
                size.width = styleWidth +
                // add padding and border unless it's already including it
                ( isBorderBoxSizeOuter ? 0 : paddingWidth + borderWidth );
            }

            var styleHeight = getStyleSize( style.height );
            if ( styleHeight !== false ) {
                size.height = styleHeight +
                // add padding and border unless it's already including it
                ( isBorderBoxSizeOuter ? 0 : paddingHeight + borderHeight );
            }

            size.innerWidth = size.width - ( paddingWidth + borderWidth );
            size.innerHeight = size.height - ( paddingHeight + borderHeight );

            size.outerWidth = size.width + marginWidth;
            size.outerHeight = size.height + marginHeight;

            return size;
        }

        return getSize;

    })();

    function getElementSize(ele) {
        return _getSize(ele);
    }
});

$( document ).ready(function() {

  var dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content');
      var queue = 1;
      var queueStyle = 1;
  // functions for work with control of image
  //=============================BEGIN========================================
  function addActiveMenuItem(elem) {
    if ($(elem).next().is('.block-view')){
      $(elem).next().removeClass('block-view');
      $(elem).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(elem).next().addClass('block-view');
      $(elem).addClass('active-menu-item');
    }
  }
  function changeURL(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort) {
    queue = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }

  function changeURlStyle(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort) {
    queueStyle = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }
  function addElemForList(dataList, title, where, elem) {
    $('<li class="choose-sort-item" data-list="'+dataList+'" '+
    'data-url="'+$(elem).data('url')+'">'+
    '<span class="name-sort-item">'+title+'</span>' +
    '<i class="close-sort-item">×</i>' +
    '</li>').appendTo(where);
  }
  function ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort) {
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val(),
                'tag': $('input[name=tagSorting]').val()
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        if ((data === 'error_download')) {
          $('.b-next-page').fadeOut();
          $('.info-text-message').fadeIn();
        }else {
          $('.info-text-message').fadeOut();
          $('.b-next-page').fadeIn();
          for(var i=0; i<data.length; i++) {
            $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']"'+
            'class="item-gallery" data-grid-prepared="true"'+
            'style="position:absolute;">'+
            '<div class="uk-panel-box">'+
            '<img src="'+data[i].min_path+'">'+
            '</div>'+
            '</a>').appendTo('#pole');

          }
        }
      }
    });
  }
  //variable


  //==============================END=========================================

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

    if (!($('#placements .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          // if ($('#placements .item-moodal-sidebar').data('queue').length === 3) {

            $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
            $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
            $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
            $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          //
          // } else if (($('#placements .item-moodal-sidebar').data('queue').length === 2)) {
          //
          // } else {
          //
          // }
          var deleteURL = $(this).data('url');
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

            }
          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {

            changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            changeURL(1, '0', deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

          $('#placements .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements .choose-sort-item[data-list=1]').remove();
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);

          addElemForList(3, title, '#placements', this);

          --queue;
          $('input[name=roomSorting]').val(dataURL);
        }
    }
    $('#placements .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val(),
          deleteURL = $(this).data('url');
          // console.log($(this).index +1 );
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);

      }
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // styles sort control
  $('#styles span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#styles .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

    if (!($('#styles .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#styles .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          var deleteURL = $(this).data('url');
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURlStyle(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);
            }
          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {

            changeURlStyle(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);


          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
            console.log(5);

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#styles .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            console.log(6);

            changeURlStyle(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 1) {
            console.log(7);

            changeURlStyle(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 0) {
            console.log(8);

            changeURlStyle(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles .item-moodal-sidebar[data-queue=1]').data('url');

          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;

          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('#styles .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#styles .choose-sort-item[data-list=1]').remove();
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          addElemForList(3, title, '#styles', this);

          --queueStyle;
          $('input[name=styleSorting]').val(dataURL);
          console.log(9);
        }
    }
    $('#styles .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          deleteURL = $(this).data('url')
          tagSort = $('input[name=tagSorting]').val();

      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {
        queueStyle = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queueStyle = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queueStyle = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queueStyle = 3;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);

      }
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tag);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // colors sort control
  $('#colors span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#colors .colors-space-item').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

   if($(this).is('.active-choose-ico')) {
          $('#colors .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);
          $('input[name=colorSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+dataURL+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('#colors .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#colors .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#colors', this);
          $('#colors .choose-sort-item').children('.name-sort-item')
                              .css({
                                'display': 'block',
                                'margin': '2px',
                                'height': '8px',
                                'width': '18px',
                                'background': $(this).data('color'),
                              });
          $('#colors .choose-sort-item').css({
            'width': '40px'
          });
          $('input[name=colorSorting]').val(dataURL);
    }

    $('#colors .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tagSort = $('input[name=tagSorting]').val();

      $('input[name=colorSorting]').val(0);
      history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
      $('#colors .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // order sort control
  $('#orders span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#orders .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

   if($(this).is('.active-choose-ico')) {
          $('#orders .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);
          $('input[name=sortSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+dataURL+'"],tag=['+tagSort+']');
          $('#orders .item-moodal-sidebar').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#orders .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#orders', this);
          $('input[name=sortSorting]').val(dataURL);
    }

    $('#orders .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val();

      $('input[name=sortSorting]').val(0);
      history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
      $('#orders .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
  });

// tags finder
$('.ajax-search').on('submit', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val();
      $('input[name=colorSorting]').val($('input[name=tagSearch]').val());
  var tag = $('input[name=colorSorting]').val();

  $('input[name=tagSorting]').val(tag);
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag
    },
    url:'/load_sort_photo',

    success: function (data) {
      $('#pole').empty();
      if (!(data === 'error_download')) {
        $('.info-text-message').fadeOut();
        $('.b-next-page').fadeIn();
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+tag+'"]');
        for(var i=0; i<data.length; i++) {
          $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
          'class="item-gallery" data-grid-prepared="true"'+
          'style="position:absolute;">'+
          '<div class="uk-panel-box">'+
          '<img src="'+data[i].min_path+'">'+
          '</div>'+
          '</a>').appendTo('#pole');

        }
      }
      else {
        $('.info-text-message').fadeIn();
        $('.b-next-page').fadeOut();
      }
    }
  });
  return false;
});


    $('#foot-about').on('click', function() {
      $('#popup-about').fadeIn();
    });

    $('#foot-feedback').on('click', function() {
      $('#popup-feedback').fadeIn();
    });
    $('.login').on('click', function() {
      $('#login-popup').fadeIn();
    });
    $('#registration').on('click', function() {
      $('#popup-registr').fadeIn();
    });
    $('#recover-pswd').on('click', function () {
      $('.overlay').fadeOut();
      $('#passwd-popup').fadeIn();
    });
    $('.popup-close').on('click', function() {
      $('.overlay').fadeOut();
    });

    $(".owl-carousel").owlCarousel({

        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        items : 1,
        nav : true,
        pagination : false,

    });

    /*
     *  Simple image gallery. Uses default settings
     */
     $(document).ready(function () {
       $('.confirm-form-delete').on('submit', function () {
         if(confirm('Вы уверены?')) {
           $('#userform').submit();
         }
       });
     });

});

$( document ).ready(function() {
  var id = 1;

  function handleFileOneSelect(evt) {
      $('#main-wrap-photo span img').parent('span').remove();
      var files = evt.target.files; // FileList object
      console.log(evt.target.files);
      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="img-full-width" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('main-wrap-photo').insertBefore(span, null);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
      $('#main-wrap-photo').children('.add-photo-ico').css({'display' : 'none'});
      $('#main-wrap-photo').children('.add-photo-text').css({'display' : 'none'});
    }

    document.getElementById('file').addEventListener('change', handleFileOneSelect, false);

// function for download views
  function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }
        console.log(files[i]);
        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.id = id;
            span.className = 'deleteSome';
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'+
                              '<span class="b-hover-add-view">'+
                              '<span class="uk-icon-justify uk-icon-remove vertical-align">'+
                              '</span>'].join('');
            document.getElementById('wrap-d').insertBefore(span, null);
            var lastInp = $('#files').clone().appendTo('#wrap-d');
            lastInp.removeClass('input-dwnld-view-photo')
                   .addClass('new')
                   .css({'display':'none'})
                   .attr('name', 'files[]')
                   .attr('id', id);

            id += 1;
            $('.deleteSome').on('click', function () {
                $(this).remove();
                $('[id = '+$(this).attr("id")+'][class = new]').remove();
            });
          };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }

    $('#files').on('change', handleFileSelect);
});

$( document ).ready(function() {

  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('#pole').children('.item-gallery:last-child').index(),
          sortSorting = $('input[name=sortSorting]').val(),
          styleSorting = $('input[name=styleSorting]').val(),
          roomSorting = $('input[name=roomSorting]').val(),
          colorSorting = $('input[name=colorSorting]').val(),
          tagSorting = $('input[name=tagSorting]').val();

      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken,
                  'sortSorting': sortSorting,
                  'styleSorting': styleSorting,
                  'roomSorting': roomSorting,
                  'colorSorting': colorSorting,
                  'tag': tagSorting
          },
          url:'/pagination_index',

          success: function (data) {
            for(var i=0; i<data.length; i++) {
                  $('<a href="/photo/id=['+data[i].id+
                      '],room=['+roomSorting+
                      '],styles=['+styleSorting+
                      '],colors=['+colorSorting+
                      '],sort=['+sortSorting+
                      '],tag=['+tagSorting+']" class="item-gallery" '+
                      'data-grid-prepared="true"style="position:absolute;">' +
                      '<div class="uk-panel-box">' +
                        '<img src="'+data[i].min_path+'">'+
                       '</div>' +
                     '</a>').appendTo('.uk-grid-width-small-1-2');
            }
          }
      });
  });
});

$( document ).ready(function() {
  $('.remove-comment').on('click', function(){
    var csrftoken = $('meta[name=_token]').attr('content'),
        id = $(this).children('.delete_comment_id').data('id'),
        positive = false;
        $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'delete_comment_id' : id,
            },
            url:'/delete_comment',
        });
        $(this).parent('.b-comment-wrap').remove();

  });
  $('.comment-add-form').on('submit', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          comment = $('.input-comment').val(),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val();

      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'comment' : comment,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:'/comment',

          success: function (data) {
            $('.input-comment').val('');
                  if (data[0].user_quadro_ava === null) {
                    $('<div class="b-comment-wrap">' +
                      '<span class="remove-comment uk-icon-justify uk-icon-remove">'+
                      '<span class="delete_comment_id" data-id="'+data[0].id+'"></span>'+
                      '</span>'+
                      '<a href="/profile/'+data[0].user_id +
                      '" class="b-photo-comment">'+
                      '<img src="/img/user.png" alt=""></a>' +
                      '<div class="b-comment">' +
                        '<a href="/profile/'+
                        data[0].user_id +'" class="b-name-comment"> ' +
                          data[0].user_name +
                        '</a>' +
                        '<div class="b-text-comment">' +
                          data[0].text_comment +
                        '</div>' +
                        '<div class="b-date-comment">' +
                          data[0].rus_date +
                        '</div>'+
                      '</div>'+
                    '</div>').appendTo('.b-all-comment');
                  }else {

                  $('<div class="b-comment-wrap">' +
                    '<span class="remove-comment uk-icon-justify uk-icon-remove">'+
                    '<span class="delete_comment_id" data-id="'+data.id+'"></span>'+
                    '</span>'+
                    '<a href="/profile/'+data[0].user_id +
                    '" class="b-photo-comment">'+
                    '<img src="'+data[0].user_quadro_ava+'"></a>' +
                    '<div class="b-comment">' +
                      '<a href="/profile/'+
                      data[0].user_id +'" class="b-name-comment"> ' +
                        data[0].user_name +
                      '</a>' +
                      '<div class="b-text-comment">' +
                        data[0].text_comment +
                      '</div>' +
                      '<div class="b-date-comment">' +
                        data[0].rus_date +
                      '</div>'+
                    '</div>'+
                  '</div>').appendTo('.b-all-comment');
                }
                  $('.remove-comment').click( function(){
                    var csrftoken = $('meta[name=_token]').attr('content'),
                        id = $(this).children('.delete_comment_id').data('id'),
                        positive = false;
                        $.ajax({
                            type:'POST',
                            data: {
                                      '_token'  : csrftoken,
                                      'delete_comment_id' : id,
                            },
                            url:'/delete_comment',
                        });
                        $(this).parent('.b-comment-wrap').remove();

                  });
          }
      });
      return false;
  });
});

$( document ).ready(function() {
  $('div.like').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val();
          url = $('input[name=url-like]').val();
      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:url,

          success: function (data) {
                if ( url === '/like') {
                  $('.uk-icon-heart').addClass('active-like');
                  $('#value-like').text(data);
                  $('input[name=url-like]').val();
                  $('input[name=url-like]').val('/delete_like');
                }else {
                  $('.uk-icon-heart').removeClass('active-like');
                  $('#value-like').text( $('#value-like').text() - 1) ;
                  $('input[name=url-like]').val('/like');
                }
          }
      });
  });
});

$( document ).ready(function() {
  $('#close-modal-views').on('click', function() {
    $('#modalViewsZoom').fadeOut();
  });

  function openModalView(el) {
    $(el).on('click', function () {
      $('#modalViewsZoom').fadeIn();
    });
  }

  openModalView('.item-view-min');

  $('.min-nav-views').on('click', function () {
    if ($(this).data('direction') === 'prev') {
      if ($('.item-view-min:first').hasClass('active-view-min')) {
        $('.item-view-min:not(.item-view-min:last)')
                  .addClass('left-view-min')
                  .removeClass('active-view-min')
                  .removeClass('right-view-min');
        $('.item-view-min:last')
              .addClass('active-view-min')
              .removeClass('right-view-min');
      }else {
        $('.active-view-min')
          .prev()
          .addClass('active-view-min')
          .removeClass('left-view-min');
        $('.active-view-min:last')
          .removeClass('active-view-min')
          .addClass('right-view-min');
      }
    }else {
      if ($('.item-view-min:last').hasClass('active-view-min')) {
        $('.item-view-min:not(.item-view-min:first)')
                  .addClass('right-view-min')
                  .removeClass('active-view-min')
                  .removeClass('left-view-min');
        $('.item-view-min:first')
              .addClass('active-view-min')
              .removeClass('left-view-min');
      }else {
        $('.active-view-min')
          .next()
          .addClass('active-view-min')
          .removeClass('right-view-min');
        $('.active-view-min:first')
          .removeClass('active-view-min')
          .addClass('left-view-min');
      }
    }
  });

  $('.nav-zoom-views').on('click', function () {
    if ($(this).data('direction') === 'prev') {
      if ($('.item-views-zoom:first').hasClass('active-slide-zoom-views')) {
        $('.item-views-zoom:not(.item-views-zoom:last)')
                  .addClass('left-slide-zoom-views')
                  .removeClass('active-slide-zoom-views')
                  .removeClass('right-slide-zoom-views');
        $('.item-views-zoom:last')
              .addClass('active-slide-zoom-views')
              .removeClass('right-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle:first').removeClass('active-cicle');

      }
      else {
        $('.active-slide-zoom-views')
          .prev()
          .addClass('active-slide-zoom-views')
          .removeClass('left-slide-zoom-views');
        $('.active-slide-zoom-views:last')
          .removeClass('active-slide-zoom-views')
          .addClass('right-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle').next().removeClass('active-cicle');
      }
    } else {
      if ($('.item-views-zoom:last').hasClass('active-slide-zoom-views')) {
        $('.item-views-zoom:not(.item-views-zoom:first)')
                  .addClass('right-slide-zoom-views')
                  .removeClass('active-slide-zoom-views')
                  .removeClass('left-slide-zoom-views');
        $('.item-views-zoom:first')
              .addClass('active-slide-zoom-views')
              .removeClass('left-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle:last').removeClass('active-cicle');

      }else {
        $('.active-slide-zoom-views')
          .next()
          .addClass('active-slide-zoom-views')
          .removeClass('right-slide-zoom-views');
        $('.active-slide-zoom-views:first')
          .removeClass('active-slide-zoom-views')
          .addClass('left-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle').prev().removeClass('active-cicle');

      }
    }
  });
});

$( document ).ready(function() {
  $('#current-position, #current-position-zoom').text($('.active-slide').index()+1);
  var id, newLocal;
    function loadAllPhoto (btn) {
      $(btn).on('click', function () {
        $('.b-comment-wrap').fadeIn();
        $(btn).fadeOut();
      });
    }
    loadAllPhoto('.btn-all-comments');
  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function commentDownload() {
      var id = $('.active-slide').data('id'),
          authID = $('meta[name=authID]').attr('content'),
          csrftoken = $('meta[name=_token]').attr('content');
      $.ajax({
        type:'POST',
        data: {
                  '_token'  : csrftoken,
                  'id': id
        },
        url:'/load_comments',

        success: function (data) {
          var btn, quadro_ava, style;
          $('.btn-all-comments').remove();
          if (data.length == 0){
            $('.b-all-comment').empty();
          }else {
            $('.b-all-comment').empty();
            $('<div></div>').appendTo('.b-all-comment');
            for(var i=0; i<data.length; i++) {
              if (parseInt(authID) === parseInt(data[i].user_id)) {
                btn = '<span class="remove-comment uk-icon-justify '+
                      'uk-icon-remove"><span class="delete_comment_id" '+
                      'data-id="'+data[i].id+'"></span></span>';
              } else {
                btn = '';
              }
              if ( data[i].user_quadro_ava !== null) {
                quadro_ava = data[i].user_quadro_ava;
              } else {
                quadro_ava = '/img/user.png';
              }
              if ( i >= 2 ) {
                style = 'style="display:none"';
                btnTwo = '<div class="btn-all-comments">Показать все комментарии</div>';
              } else {
                style = '';
                btnTwo = '';
              }
              $('<div class="b-comment-wrap" '+style+'>'+ btn +
                '<a href="/profile/'+data[i].user_id+
                '" class="b-photo-comment">'+
                '<img src="'+quadro_ava+'"></a>'+
                '<div class="b-comment">'+
                '<a href="/profile/'+data[i].user_id+'" class="b-name-comment" '+
                ' >'+
                data[i].user_name+
                '</a><div class="b-text-comment">'+
                data[i].text_comment+
                '</div><div class="b-date-comment">'+
                data[i].rus_date+
                '</div></div></div>').appendTo('.b-all-comment');
            }

            $('<div class="clear"></div>').appendTo('.b-all-comment');
            $(btnTwo).appendTo('.b-all-comment');
            loadAllPhoto('.btn-all-comments');
          }
        }
      });
  }
  function openModalView(el) {
    $(el).on('click', function () {
      $('#modalViewsZoom').fadeIn();
    });
  }
  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function tagsDownload() {
      var id = $('.active-slide').data('id'),
      csrftoken = $('meta[name=_token]').attr('content');
      $.ajax({
        type:'POST',
        data: {
                  '_token'  : csrftoken,
                  'id': id
        },
        url:'/load_tags',

        success: function (data) {
          if (data === 'error_tags') {
            $('.pole-tag').empty();
            $('.pole-tag').fadeOut();
            $('#tag').fadeOut();

          }else {
            $('.pole-tag').empty();
            $('.pole-tag').fadeIn();
            $('#tag').fadeIn();
              for(var i=0; i<data.length; i++) {
                if (data[i].length != 0) {
                $('<div class="tag-item"></div').appendTo('.pole-tag').text(data[i]);
              }
            }
          }
        }
      });
  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function viewsDownload() {
    var id = $('.active-slide').data('id'),
    csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_views',

      success: function (data) {
        if (data.length === 1) {
          $('#views-pole').fadeIn();
          $('#views').fadeIn();
          $('.b-change-photo').empty();
          $('.min-nav-views').fadeOut()
          $('<li class="item-views-zoom active-slide-zoom-views">'+
                    '<img class="img-views-zoom" src="'+data[0].path_full+'"></li>')
                    .appendTo('.views-zoom-list');
          $('<div class="item-view-min active-view-min"><img src="'+data[0].path_min+'"></div>').appendTo('.b-change-photo');
          openModalView('.item-view-min');
        }else if (data.length === 0) {
          $('#views-pole').fadeIn();
          $('#views').fadeIn();
          $('.b-change-photo').empty();
          $('#views').fadeOut();
          $('#views-pole').fadeOut();
        }else {
          $('.b-change-photo').empty();
          $('.min-nav-views').fadeIn()
          $('#views').fadeIn();
          $('#views-pole').fadeIn();

            for(var i=0; i<data.length; i++) {
              if (data[i] === data[0]) {
                $('<div class="item-view-min active-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                $('<li class="item-views-zoom active-slide-zoom-views">'+
                          '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                          .appendTo('.views-zoom-list');
              }else {
                $('<div class="item-view-min right-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                $('<li class="item-views-zoom right-slide-zoom-views">'+
                          '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                          .appendTo('.views-zoom-list');
              }
            }

        }
        openModalView('.item-view-min');
      }
    });
  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function infoPhotoDownload() {
    var id = $('.active-slide').data('id'),
    csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_info_slide',

      success: function (data) {
        if (!data.views_count) {
          $('#num_views').text(0);
          $('#num_views_zoom').text(0);

        }else {
          $('#num_views').text(data.views_count);
          $('#num_views_zoom').text(data.views_count);
        }
        if (!data.comments_count) {
          $('#num_comment').text(0);
          $('#num_comment_zoom').text(0);

        }else {
          $('#num_comment').text(data.comments_count);
          $('#num_comment_zoom').text(data.comments_count);
        }
        if (!data.full_path) {
        }else{
          $('img.img-max-center').attr("src",data.full_path);
        }
        if (!data.likes_count) {
          $('#value-like').text(0);
        }else {
          $('#value-like').text(data.likes_count);
        }
        if ((!data.title)&&(!data.description)) {
          $('#description-pole').fadeOut();
          $('#description').fadeOut();
        }else {
          if (!data.description) {
            $('#description-pole').fadeIn();
            $('#description').fadeIn();
            $('.view-photo-slide p').text(0);
          }else {
            $('#description-pole').fadeIn();
            $('#description').fadeIn();
            $('.view-photo-slide p').text(data.description);
          }
          if (!data.title) {
            $('#description-pole').fadeIn();
            $('#description').fadeIn();
            $('.view-photo-slide h3').text(0);
          }else {
            $('#description-pole').fadeIn();
            $('#description').fadeIn();
            $('.view-photo-slide h3').text(data.title);
          }
        }
      }
    });
  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function userInfoDownload() {
    var id = $('.active-slide').data('id'),
    csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_user',

      success: function (data) {
        if (data === 'error_user') {
          $('.author-portret').empty();
          $('.author-name').empty();
        }else {
          $('.b-pretense a').attr('href','/profile/'+data.author_id);
          if (!('path_min' in data)) {
            $('.author-portret').empty();
          }else {
            $('<img src="'+data.userPhoto+'">').appendTo('.author-portret');
            $('<img src="'+data.userPhoto+'">').appendTo('.author-portret-zoom');
          }
          $('.author-name').text(data.userName);
          $('.author-name-zoom').text(data.userName);
        }
      }
    });

  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */
  function newPhotoDownload(direction){
    var id = $('.active-slide').data('id'),
        sortSort = $('input[name=sortSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tag = $('input[name=tagSorting]').val(),
        currentPosition = +$('#current-position').text()+1,
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id,
                'direction': direction,
                'sortSort': sortSort,
                'roomSort': roomSort,
                'styleSort': styleSort,
                'colorSort': colorSort,
                'tag': tag,
                'currentPosition' : currentPosition
      },
      url:'/load_slides ',
      async:false,
      success: function (data) {
        if (data === 'error_download') {
          return data;
        }else {
          if (direction === 'left') {
            data = data.reverse();
            for(var i=0; i<data.length; i++) {
              $('<div class="photo-item left-slide" data-id="'+data[i].id+'">'+
              '<img class="img-slider" src="'+data[i].full_path+'"></div>')
              .prependTo('.wrap-slider');
            }
          }else {
            for(var i=0; i<data.length; i++) {
              $('<div class="photo-item right-slide" data-id="'+data[i].id+'">'+
              '<img class="img-slider" src="'+data[i].full_path+'"></div>')
              .insertAfter('.right-slide:last');
            }
          }
        }
      }
    });
  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function likeWhom() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_like',

      success: function (data) {
        if (data === 'error_like') {
          $('#like-whom-pole').empty();
        }else {
          $('#like-whom-pole').empty();
          for(var i=0; i<data.length; i++) {
            $('<a class="mini-avatar"'+
              'href="/user/'+data[i].id+'"'+
              'title="'+data[i].name+'">'+
              '<img src="'+data[i].quadro_ava+'"></a>').appendTo('#like-whom-pole');
          }
        }
      }
    });

  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function activeLike() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_active_like',

      success: function (data) {
        if (data ===  'success') {
          $('.uk-icon-heart').addClass('active-like');
        }else {
          $('.uk-icon-heart').removeClass('active-like');
        }
      }
    });
  }

  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */

  function activeLiked() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_active_favorite',

      success: function (data) {
        if (data ===  'success') {
          $('.uk-icon-star').addClass('active-favorite');
        }else {
          $('.uk-icon-star').removeClass('active-favorite');
        }
      }
    });
  }
  /**
   * Represents a book.
   * @constructor
   * @param {string} title - The title of the book.
   * @param {string} author - The author of the book.
   */
function loadZoomPhoto() {
  var id = $('.active-slide').data('id'),
      csrftoken = $('meta[name=_token]').attr('content');
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'id': id
    },
    url:'/load_zoom_photo',

    success: function (data) {
        $('.img-max-center').attr('src', data);
    }
  });
}


  $('.btn-nav, .nav-zoom').on('click', function () {
    var ret,direction = $(this).data('direction');
    if (direction === 'right') {
      if ($('.active-slide').index()+1 === $('.photo-item:last').index()) {
        newPhotoDownload(direction);
          $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
          $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
          $('#current-position').text($('.active-slide').index()+1);
          $('#current-position-zoom').text($('.active-slide').index()+1);
          $('input[name=post_id]').val($('.active-slide').data('id'));
          id = 'id=['+$('.active-slide').data('id')+']';
          newLocal = window.location.href;
          newLocal = newLocal.replace('id=['+$('.active-slide').prev().data('id')+']', id);
          history.pushState('', '', newLocal);
          commentDownload();
          likeWhom();
          tagsDownload();
          viewsDownload();
          infoPhotoDownload();
          userInfoDownload();
          activeLike();
          loadZoomPhoto();
          activeLiked();
      }else if ($('.active-slide').index() === $('.photo-item:last').index()) {

        $('#popup-error-slider').fadeIn();


      }else {

        $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
        $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
        $('#current-position').text($('.active-slide').index()+1);
        $('#current-position-zoom').text($('.active-slide').index()+1);
        $('input[name=post_id]').val($('.active-slide').data('id'));
        id = 'id=['+$('.active-slide').data('id')+']';
        newLocal = window.location.href;
        newLocal = newLocal.replace('id=['+$('.active-slide').prev().data('id')+']', id);
        history.pushState('', '', newLocal);

        commentDownload();
        tagsDownload();
        likeWhom();
        viewsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        loadZoomPhoto();
        activeLiked();
      }
    } else if (direction === 'left') {
      if ($('.active-slide').index()=== $('.photo-item:first').index()) {
        newPhotoDownload(direction,ret);
        if ( $('.active-slide').index()=== $('.photo-item:first').index() ) {
          $('#popup-error-slider').fadeIn();
        }else {
          $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
          $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
          $('#current-position').text($('.active-slide').index()+1);
          $('#current-position-zoom').text($('.active-slide').index()+1);
          $('input[name=post_id]').val($('.active-slide').data('id'));
          id = 'id=['+$('.active-slide').data('id')+']';

          newLocal = window.location.href;
          newLocal = newLocal.replace('id=['+$('.active-slide').next().data('id')+']', id);
          history.pushState('', '', newLocal);
          commentDownload();
          tagsDownload();
          viewsDownload();
          infoPhotoDownload();
          userInfoDownload();
          likeWhom();
          activeLike();
          loadZoomPhoto();
          activeLiked();
        }
     }else {
        $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
        $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
        $('#current-position').text($('.active-slide').index()+1);
        $('#current-position-zoom').text($('.active-slide').index()+1);
        $('input[name=post_id]').val($('.active-slide').data('id'));
        id = 'id=['+$('.active-slide').data('id')+']';

        newLocal = window.location.href;
        newLocal = newLocal.replace('id=['+$('.active-slide').next().data('id')+']', id);
        history.pushState('', '', newLocal);

        commentDownload();
        likeWhom();
        viewsDownload();
        tagsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        loadZoomPhoto();
        activeLiked();
      }
    }
  });

  $('.popup-error-close').on('click', function () {
    $('#popup-error-slider').fadeOut();
  });
  $('.full-scrn').on('click', function () {
    $('#zoom-slider').fadeIn();
  });
  $('.slider-close').on('click', function () {
    $('#zoom-slider').fadeOut();
  });
});

$( document ).ready(function() {
  var dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content');
      var queue = 1;
      var queueStyle = 1;




        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function commentDownload() {
            var id = $('.active-slide').data('id'),
                authID = $('meta[name=authID]').attr('content'),
                csrftoken = $('meta[name=_token]').attr('content');
            $.ajax({
              type:'POST',
              data: {
                        '_token'  : csrftoken,
                        'id': id
              },
              url:'/load_comments',

              success: function (data) {
                var btn;
                if (data === 'error_comments'){
                  $('.b-all-comment').empty();
                }else {
                  $('.b-all-comment').empty();
                  for(var i=0; i<data.length; i++) {
                    if (parseInt(authID) === parseInt(data[i].user_id)) {
                       $('<div class="b-comment-wrap">'+
                         '<span class="remove-comment uk-icon-justify '+
                         'uk-icon-remove"><span class="delete_comment_id" '+
                         'data-id="'+data[i].id+'"></span></span> '+
                         '<a style="background:url('+data[i].userPhoto+
                         ')center no-repeat;background-size:cover;'+
                         ')" href="/profile/'+data[i].author_id+
                         '" class="b-photo-comment"></a>'+
                         '<div class="b-comment">'+
                         '<a href="/profile/'+data[i].author_id+'" class="b-name-comment" '+
                         ' >'+
                         data[i].userName+
                         '</a><div class="b-text-comment">'+
                         data[i].text_comment+
                         '</div><div class="b-date-comment">'+
                         data[i].date+
                         '</div></div></div>').appendTo('.b-all-comment');
                    }
                    else {
                      $('<div class="b-comment-wrap">'+
                      '<a style="background:url('+data[i].userPhoto+
                      ')center no-repeat;background-size:cover;'+
                      +')" href="/profile/'+data[i].author_id+
                      '" class="b-photo-comment"></a>'+
                      '<div class="b-comment">'+
                      '<a href="/profile/'+data[i].author_id+'" class="b-name-comment" '+
                      ' >'+
                      data[i].userName+
                      '</a><div class="b-text-comment">'+
                      data[i].text_comment+
                      '</div><div class="b-date-comment">'+
                      data[i].date+
                      '</div></div></div>').appendTo('.b-all-comment');
                    }
                  }
                }
              }
            });
        }
        function openModalView(el) {
          $(el).on('click', function () {
            $('#modalViewsZoom').fadeIn();
          });
        }
        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function tagsDownload() {
            var id = $('.active-slide').data('id'),
            csrftoken = $('meta[name=_token]').attr('content');
            $.ajax({
              type:'POST',
              data: {
                        '_token'  : csrftoken,
                        'id': id
              },
              url:'/load_tags',

              success: function (data) {
                if (data === 'error_tags') {
                  $('.pole-tag').empty();
                  $('.pole-tag').fadeOut();
                  $('#tag').fadeOut();

                }else {
                  $('.pole-tag').empty();
                  $('.pole-tag').fadeIn();
                  $('#tag').fadeIn();
                    for(var i=0; i<data.length; i++) {
                      if (data[i].length != 0) {
                      $('<div class="tag-item"></div').appendTo('.pole-tag').text(data[i]);
                    }
                  }
                }
              }
            });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function viewsDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_views',

            success: function (data) {
              if (data.length === 1) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeOut()
                $('<li class="item-views-zoom active-slide-zoom-views">'+
                          '<img class="img-views-zoom" src="'+data[0].path_full+'"></li>')
                          .appendTo('.views-zoom-list');
                $('<div class="item-view-min active-view-min"><img src="'+data[0].path_min+'"></div>').appendTo('.b-change-photo');
                openModalView('.item-view-min');
              }else if (data.length === 0) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('#views').fadeOut();
                $('#views-pole').fadeOut();
              }else {
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeIn()
                $('#views').fadeIn();
                $('#views-pole').fadeIn();

                  for(var i=0; i<data.length; i++) {
                    if (data[i] === data[0]) {
                      $('<div class="item-view-min active-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                      $('<li class="item-views-zoom active-slide-zoom-views">'+
                                '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                                .appendTo('.views-zoom-list');
                    }else {
                      $('<div class="item-view-min right-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                      $('<li class="item-views-zoom right-slide-zoom-views">'+
                                '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                                .appendTo('.views-zoom-list');
                    }
                  }

              }
              openModalView('.item-view-min');
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function infoPhotoDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_info_slide',

            success: function (data) {
              if (!data.views_count) {
                $('#num_views').text(0);
                $('#num_views_zoom').text(0);

              }else {
                $('#num_views').text(data.views_count);
                $('#num_views_zoom').text(data.views_count);
              }
              if (!data.comments_count) {
                $('#num_comment').text(0);
                $('#num_comment_zoom').text(0);

              }else {
                $('#num_comment').text(data.comments_count);
                $('#num_comment_zoom').text(data.comments_count);
              }
              if (!data.full_path) {
              }else{
                $('img.img-max-center').attr("src",data.full_path);
              }
              if (!data.likes_count) {
                $('#value-like').text(0);
              }else {
                $('#value-like').text(data.likes_count);
              }
              if ((!data.title)&&(!data.description)) {
                $('#description-pole').fadeOut();
                $('#description').fadeOut();
              }else {
                if (!data.description) {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide p').text(0);
                }else {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide p').text(data.description);
                }
                if (!data.title) {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide h3').text(0);
                }else {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide h3').text(data.title);
                }
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function userInfoDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_user',

            success: function (data) {
              if (data === 'error_user') {
                $('.author-portret').empty();
                $('.author-name').empty();
              }else {
                $('.b-pretense a').attr('href','/profile/'+data.author_id);
                if (!('path_min' in data)) {
                  $('.author-portret').empty();
                }else {
                  $('<img src="'+data.userPhoto+'">').appendTo('.author-portret');
                  $('<img src="'+data.userPhoto+'">').appendTo('.author-portret-zoom');
                }
                $('.author-name').text(data.userName);
                $('.author-name-zoom').text(data.userName);
              }
            }
          });

        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */
        function newPhotoDownload(direction){
          var id = $('.active-slide').data('id'),
              sortSort = $('meta[name=sortSorting]').attr('content'),
              roomSort = $('meta[name=roomSorting]').attr('content'),
              styleSort = $('meta[name=styleSorting]').attr('content'),
              colorSort = $('meta[name=colorSorting]').attr('content'),
              tag = $('meta[name=tagSorting]').attr('content'),
              currentPosition = +$('#current-position').text()+1,
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id,
                      'direction': direction,
                      'sortSort': sortSort,
                      'roomSort': roomSort,
                      'styleSort': styleSort,
                      'colorSort': colorSort,
                      'tag': tag,
                      'currentPosition' : currentPosition
            },
            url:'/load_slides ',
            async:false,
            success: function (data) {
              if (data === 'error_download') {
                return data;
              }else {
                if (direction === 'left') {
                  data = data.reverse();
                  for(var i=0; i<data.length; i++) {
                    $('<div class="photo-item left-slide" data-id="'+data[i].id+'">'+
                    '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                    .prependTo('.wrap-slider');
                  }
                }else {
                  for(var i=0; i<data.length; i++) {
                    $('<div class="photo-item right-slide" data-id="'+data[i].id+'">'+
                    '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                    .insertAfter('.right-slide:last');
                  }
                }
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function likeWhom() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_like',

            success: function (data) {
              if (data === 'error_like') {
                $('#like-whom-pole').empty();
              }else {
                $('#like-whom-pole').empty();
                for(var i=0; i<data.length; i++) {
                  $('<a class="mini-avatar"'+
                    'href="/user/'+data[i].id+'"'+
                    'title="'+data[i].name+'">'+
                    '<img src="'+data[i].path_min+'"></a>').appendTo('#like-whom-pole');
                }
              }
            }
          });

        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function activeLike() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_active_like',

            success: function (data) {
              if (data ===  'success') {
                $('.uk-icon-heart').addClass('active-like');
              }else {
                $('.uk-icon-heart').removeClass('active-like');
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function actveLiked() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_active_favorite',

            success: function (data) {
              if (data ===  'success') {
                $('.uk-icon-star').addClass('active-favorite');
              }else {
                $('.uk-icon-star').removeClass('active-favorite');
              }
            }
          });
        }
        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */
      function loadZoomPhoto() {
        var id = $('.active-slide').data('id'),
            csrftoken = $('meta[name=_token]').attr('content');
        $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'id': id
          },
          url:'/load_zoom_photo',

          success: function (data) {
              $('.img-max-center').attr('src', data);
          }
        });
      }



  // functions for work with control of image
  //=============================BEGIN========================================
  function addActiveMenuItem(elem) {
    if ($(elem).next().is('.block-view')){
      $(elem).next().removeClass('block-view');
      $(elem).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(elem).next().addClass('block-view');
      $(elem).addClass('active-menu-item');
    }
  }
  function changeURL(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id) {
    queue = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }

  function changeURlStyle(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id) {
    queueStyle = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }
  function addElemForList(dataList, title, where, elem) {
    $('<li class="choose-sort-item" data-list="'+dataList+'" '+
    'data-url="'+$(elem).data('url')+'">'+
    '<span class="name-sort-item">'+title+'</span>' +
    '<i class="close-sort-item">×</i>' +
    '</li>').appendTo(where);
  }
  function ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort) {
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val(),
                'tag': $('input[name=tagSorting]').val(),
                'id':$('input[name=IdPhoto]').val()
      },
      url:'/load_sort_photo_slider',

      success: function (data) {
        $('.photo-item').remove();
        if ((data === 'error_download')) {
          $('.control-slide').fadeOut();
          $('<div class="pole-error-dwnld"><span class="error-text-dwnld">'+
             'По вашему запросу ничего не найдено</span></div>')
             .appendTo('.wrap-slider');
          $('.info-text-message').fadeIn();
          $('#tag').fadeOut();
          $('.pole-tag').fadeOut();
          $('#views').fadeOut();
          $('#views-pole').fadeOut();
          $('#description').fadeOut();
          $('#description-pole').fadeOut();
        }else {
          $('.control-slide').fadeIn();

          $('.pole-error-dwnld').remove();
          for(var i=0; i<data.length; i++) {
            if (data[i] === data[0]) {
              $( '<div class="photo-item active-slide" data-id="'+data[i].id+'">'+
                 '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                 .prependTo('.wrap-slider');
                 $('input[name=IdPhoto]').val(data[i].id);
                 history.pushState(null, null, 'id=['
                 +$('input[name=IdPhoto]').val()
                 +'],room=['+$('input[name=roomSorting]').val()+'],styles=['
                 +$('input[name=styleSorting]').val()+'],colors=['
                 +$('input[name=colorSorting]').val()
                 +'],sort=['+$('input[name=sortSorting]').val()+'],tag=['
                 +$('input[name=tagSorting]').val()+']');
            }else {
              $( '<div class="photo-item right-slide" data-id="'+data[i].id+'">'+
                 '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                 .prependTo('.wrap-slider');
            }
          }
          commentDownload();
          likeWhom();
          viewsDownload();
          tagsDownload();
          infoPhotoDownload();
          userInfoDownload();
          activeLike();
          loadZoomPhoto();
          activeLiked();
        }
      }
    });
  }
  //variable


  //==============================END=========================================

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  // placements-slider sort control
  $('#placements-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();
    var id = $('input[name=IdPhoto]').val();

    if (!($('#placements-slider .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#placements-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          // if ($('#placements-slider .item-moodal-sidebar').data('queue').length === 3) {

            $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
            $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
            $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
            $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          //
          // } else if (($('#placements-slider .item-moodal-sidebar').data('queue').length === 2)) {
          //
          // } else {
          //
          // }
          var deleteURL = $(this).data('url');
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {
              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

            }
          }else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 1) {

            changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 0) {

            changeURL(1, '0', deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements-slider', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements-slider', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#placements-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2){

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements-slider .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

          $('#placements-slider .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements-slider .choose-sort-item[data-list=1]').remove();
          $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);

          addElemForList(3, title, '#placements-slider', this);

          --queue;
          $('input[name=roomSorting]').val(dataURL);
        }
    }
    $('#placements-slider .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val(),
          deleteURL = $(this).data('url'),
          id = $('input[name=IdPhoto]').val();

      $('#placements-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#placements-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);

      }
      $('#placements-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort);

    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);

  });



  // styles sort control
  $('#styles-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#styles-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


    if (!($('#styles-slider .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#styles-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          var deleteURL = $(this).data('url');
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURlStyle(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);
            }
          }else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 1) {

            changeURlStyle(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);


          }else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 0) {

            changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles-slider', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
            console.log(5);

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles-slider', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#styles-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2){
            console.log(6);

            changeURlStyle(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length  === 1) {
            console.log(7);

            changeURlStyle(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length  === 0) {
            console.log(8);

            changeURlStyle(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles-slider .item-moodal-sidebar[data-queue=1]').data('url');

          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;

          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('#styles-slider .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#styles-slider .choose-sort-item[data-list=1]').remove();
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          addElemForList(3, title, '#styles-slider', this);

          --queueStyle;
          $('input[name=styleSorting]').val(dataURL);
          console.log(9);
        }
    }
    $('#styles-slider .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          deleteURL = $(this).data('url')
          tagSort = $('input[name=tagSorting]').val(),
          id = $('input[name=IdPhoto]').val();


      $('#styles-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 1) {
        queueStyle = 1;
        dataURL = 0;
        history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);
      } else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queueStyle = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queueStyle = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }
      } else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queueStyle = 3;
        history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);

      }
      $('#styles-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tag);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // colors sort control
  $('#colors-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#colors-slider .colors-space-item').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


   if($(this).is('.active-choose-ico')) {
          $('#colors-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort,id);
          $('input[name=colorSorting]').val(0);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+dataURL+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('#colors-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#colors-slider .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#colors-slider', this);
          $('#colors-slider .choose-sort-item').children('.name-sort-item')
                              .css({
                                'display': 'block',
                                'margin': '2px',
                                'height': '8px',
                                'width': '18px',
                                'background': $(this).data('color'),
                              });
          $('#colors-slider .choose-sort-item').css({
            'width': '40px'
          });
          $('input[name=colorSorting]').val(dataURL);
    }

    $('#colors-slider .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tagSort = $('input[name=tagSorting]').val();

      $('input[name=colorSorting]').val(0);
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=['+sortSort+'],tag=['+tagSort+']');
      $('#colors-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // order sort control
  $('#orders-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#orders-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


   if($(this).is('.active-choose-ico')) {
          $('#orders-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);
          $('input[name=sortSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+dataURL+'"],tag=['+tagSort+']');
          $('#orders-slider .item-moodal-sidebar').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#orders-slider .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#orders-slider', this);
          $('input[name=sortSorting]').val(dataURL);
    }

    $('#orders-slider .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val();

      $('input[name=sortSorting]').val(0);
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=['+sortSort+'],tag=['+tagSort+']');
      $('#orders-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
  });

// tags finder
$('.ajax-search-slider').on('submit', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val();
      $('input[name=tagSorting]').val($('.active-drop-item').text());
      tag = $('input[name=tagSorting]').val(),
      id = $('input[name=IdPhoto]').val();


  $('input[name=tagSorting]').val(tag);
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag,
              'id' : id
    },
    url:'/load_sort_photo_slider',

    success: function (data) {
      commentDownload();
      likeWhom();
      viewsDownload();
      tagsDownload();
      infoPhotoDownload();
      userInfoDownload();
      activeLike();
      loadZoomPhoto();
      // activeLiked();
      $('#pole').empty();
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]');
      if (data.length > 1) {
        for(var i=0; i<data.length; i++) {
          $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
          'class="item-gallery" data-grid-prepared="true"'+
          'style="position:absolute;">'+
          '<div class="uk-panel-box">'+
          '<img src="'+data[i].min_path+'">'+
          '</div>'+
          '</a>').appendTo('#pole');

        }
      }else {
          $('.photo-item').remove();
          $('.b-comment-wrap').empty();
          $('#description-pole').empty().fadeOut();
          $('#description').fadeOut();
          $('#views-pole b-change').empty();
          $('#views-pole').fadeOut();
          $('#views').fadeOut();
          $('#tag').fadeOut();
          $('.pole-tag').empty().fadeOut();


      }
    }
  });
  return false;
});

$('.ajax-input-search').keydown( function(e) {
  if ((e === 13) && ($('li').is('.active-drop-item'))) {
    e.preventDefault();
    var sortSort = $('input[name=sortSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val();

    $.ajax({
      type:'POST',
      async:false,
      data: {
                '_token'  : $('meta[name=_token]').attr('content'),
                'sortSort': sortSort,
                'styleSort': styleSort,
                'roomSort': roomSort,
                'colorSort': colorSort,
                'tag': $('input[name=tagSorting]').val()
      },
      url:'/load_sort_photo_slider',

      success: function (data) {
          $('.popup-search-tag').fadeOut().empty();
          if (data === 'error_download') {
            $('.info-text-message').fadeIn();
            $('.b-next-page').fadeOut();
          }else {
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+$('input[name=tagSorting]').val()+'"]');
            for(var i=0; i<data.length; i++) {
              commentDownload();
              likeWhom();
              viewsDownload();
              tagsDownload();
              infoPhotoDownload();
              userInfoDownload();
              activeLike();
              loadZoomPhoto();
              activeLiked();
              $('#pole').empty();
              history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]');
              for(var i=0; i<data.length; i++) {
              $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
                    'class="item-gallery" data-grid-prepared="true"'+
                    'style="position:absolute;">'+
                   '<div class="uk-panel-box">'+
                     '<img src="'+data[i].min_path+'">'+
                   '</div>'+
                 '</a>').appendTo('#pole');

              }
            }
          }
      }
    });
    return false;
}
});

$('.tag-item').on('click', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tag = $(this).text(),
      thisI = $(this);

  $.ajax({
    type:'POST',
    async:false,
    data: {
              '_token'  : $('meta[name=_token]').attr('content'),
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag,
              'id': $('.active-slide').data('id'),
    },
    url:'/load_sort_photo_slider',

    success: function (data) {
        $('.popup-search-tag').fadeOut().empty();
        if (data === 'error_download') {
          $('.title-tag').fadeIn();

          $('.title-tag').children('.tag-item').text(tag);

          $('.photo-item').remove();
          $('.b-comment-wrap').empty();
          $('#description-pole').empty().fadeOut();
          $('#description').fadeOut();
          $('#views-pole b-change').empty();
          $('#views-pole').fadeOut();
          $('#views').fadeOut();
          $('#tag').fadeOut();
          $('.pole-tag').empty().fadeOut();
          $('.info-text-message').fadeIn();
        }else {
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+tag+'"]');
            commentDownload();
            likeWhom();
            viewsDownload();
            tagsDownload();
            infoPhotoDownload();
            userInfoDownload();
            activeLike();
            loadZoomPhoto();
            // activeLiked();
            $('.title-tag').fadeIn();
            $('.title-tag').children('.tag-item').text(tag);
            $('.photo-item').remove();
            $('tag-item').removeClass('active-tag-right');
            thisI.addClass('.active-tag-right');
            for(var i=0; i<data.length; i++) {
            $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
                  'class="item-gallery" data-grid-prepared="true"'+
                  'style="position:absolute;">'+
                 '<div class="uk-panel-box">'+
                   '<img src="'+data[i].min_path+'">'+
                 '</div>'+
               '</a>').appendTo('#pole');

            }
          }
    }
  });
});
$('.wrap-slider').change(function () {
  alert('d');
});
});

$( document ).ready(function() {
  $('div.liked').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val(),
          url = $('input[name=url-liked]').val();
      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:url,

          success: function (data) {
            if ( data === 'liked') {
              $('#num_liked').removeClass('active-favorite');
              $('input[name=url-liked]').val('/liked');
            }else{
              $('#num_liked').addClass('active-favorite');
              $('input[name=url-liked]').val('/delete_liked');
            }

          }
      });
  });
});

$(function() {
  $('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
  });
  $('.popup-close-news').on('click', function(){
    $('.modal-news').fadeOut();
  });

  var height = parseInt($('pre').css('height'));
  if (height > 119){
    $('.b-about-person').append(
    '<span class="to-bottom ico uk-icon-justify uk-icon-chevron-down"></span>'
    );
  }
  $('.to-bottom').on('click', function () {
    if ($(this).hasClass('uk-icon-chevron-down')) {
      $('.b-about-person').css({'height':'auto'});
      $(this).removeClass('uk-icon-chevron-down')
             .addClass('uk-icon-chevron-up');
    } else {
      $('.b-about-person').css({'height':'105px'});
      $(this).removeClass('uk-icon-chevron-up')
             .addClass('uk-icon-chevron-down');
    }
  });
});

$( document ).ready(function() {
  $('.btn-add-tag').on('click', function() {
    $('input[name=data-tags]').val($('input[name=data-tags]').val()+$('.input-tag-name').val()+';');
    $('<span class="item-tag-show">'+
      $('.input-tag-name').val()
    +'</span>').appendTo('.wrap-add-tag');
    $('.input-tag-name').val("");
    $('.item-tag-show').click(function () {
      var replaceString = $('input[name=data-tags]').val();
      $('input[name=data-tags]').val(replaceString.replace($(this).text()+';', ''));
      $(this).remove();
    });
    return false;
  });

  $('.input-tag-name').keyup(function(e) {
    if(e.keyCode==13)
     {
          e.preventDefault();
          $('input[name=data-tags]').val($('input[name=data-tags]').val()+$('.input-tag-name').val()+';');
          $('<span class="item-tag-show">'+
            $('.input-tag-name').val()
            +'</span>').appendTo('.wrap-add-tag');
          $('.input-tag-name').val("");
          $('.item-tag-show').click(function () {
            var replaceString = $('input[name=data-tags]').val();
            $('input[name=data-tags]').val(replaceString.replace($(this).text()+';', ''));
            $(this).remove();
          });
          return false;
     }
   });

});
$(document).mouseup(function (e) {
    var container = $(".overlay");
    if (container.has(e.target).length === 0){
        container.fadeOut();
    }
});

// $(document).mouseup(function (e) {
//   var container = $(".sidebar-modal");
//   if (container.has(e.target).length === 0){
//       container.toggleClass('block-view');
//   }
// });

$( document ).ready(function() {
  $('.delete-view-edit').on('click', function() {
    var csrftoken = $('meta[name=_token]').attr('content'),
    id = $('input[name=id]').val();
    $.ajax({
      type:'POST',
      data: {
        '_token'  : csrftoken,
        'id'      : id
      },
      url: '/delete_view',

    });
    $(this).empty().remove();

  });
});

$( document ).ready(function() {
  $('.btn-dwnld-new').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('.b-person-post').length;
      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken

          },
          url:'/pagination_news',

          success: function (data) {
            var icoEvent, textAboutEvent, quadro_ava_add,
                quadro_ava_user_event, views_count, likes_count, favs_count;
            for (var i = 0; i < data.length; i++) {
              if (data[i].type === 'favorite'){
                icoEvent = '<span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>';
                if (data[i].sex_user_event === 1 ){
                  textAboutEvent = ' добавил фотографию в избранное';
                }
                else if (data[i].sex_user_event === 2){
                  textAboutEvent = ' добавила фотографию в избранное';
                }
                else{
                  textAboutEvent = ' добавил(а) фотографию в избранное';
                }
              } else if (data[i].type === 'like'){
                icoEvent = '<span class="ico ico-news ico-news-star uk-icon-justify uk-icon-heart"></span>';
                if (data[i].sex_user_event === 1 ){
                  textAboutEvent = ' оценил фотографию';
                }
                else if (data[i].sex_user_event === 2){
                  textAboutEvent = ' оценилa фотографию';
                }
                else{
                  textAboutEvent = ' оценил(a) фотографию';
                }
              }

              if (data[i].quadro_ava_add !== null) {
                quadro_ava_add = data[i].quadro_ava_add;
              }else {
                quadro_ava_add = '/img/user.png';
              }
              if (data[i].quadro_ava_user_event != null) {
                  quadro_ava_user_event = data[i].quadro_ava_user_event;
              } else {
                  quadro_ava_user_event = '/img/user.png';
              }
              if (data[i].views_count !== null) {
                views_count = data[i].views_count;
              } else {
                views_count = '0';
              }
              if (data[i].likes_count !== null) {
                likes_count = data[i].likes_count;
              } else {
                likes_count = '0';
              }
              if (data[i].favs_count !== null) {
                favs_count = data[i].favs_count;
              } else {
                favs_count = '0';
              }

              $('<div class="b-person-post"><div class="col-news-min">'+
              '<div class="b-portret-blogger"><img src="'+ quadro_ava_add +'"/>'+
              '</div></div><div class="col-news-big">'+
              '<div class="b-name-redactor">'+
              '<a href="/profile/'+data[i].user_id_add+'">'+data[i].name_user_add+'</a></div>'+
              '<div class="b-post-body"><div class="b-photo-post">'+
              '<img src="'+data[i].img_photo+'" class="img-post" alt="" />'+
              '</div><div class="b-iformation"><div class="b-date">'+
              data[i].date_event+'</div><div class="b-statistics">'+
              '<div class="b-item-stat"><span class="ico uk-icon-justify uk-icon-eye"></span>'+
              '<span class="num-stat">'+ views_count +'</span>'+
              '<span class="tooltip-stat margin-num-comment-tooltip">'+
              '<span class="text-tooltip-stat">количество просмотров</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-heart"></span>'+
              '<span class="num-stat">'+ likes_count +'</span>'+
              '<span class="tooltip-stat margin-like-tooltip">'+
              '<span class="text-tooltip-stat">понравилось</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-star"></span>'+
              '<span class="num-stat">'+ favs_count +'</span>'+
              '<span class="tooltip-stat margin-liked-tooltip">'+
              '<span class="text-tooltip-stat">избранное</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div></div></div><div class="clear"></div>'+
              '</div><div class="clear"></div></div>'+
              '<div class="col-news-min">'+
              '<div class="b-portret-blogger"><img src="'+ quadro_ava_user_event +'"/>'+icoEvent+'</div></div>'+
              '<div class="col-news-big"><div class="b-name-redactor">'+
              '<a href="/profile/data[i].id_user_event">'+data[i].user_name_event+
              '</a><span class="event-text">'+textAboutEvent+'</span>'+
              '<p class="date-event-text">'+data[i].date_event+
              '</p></div></div><div class="clear"></div></div>')
              .appendTo('.b-personal-news');
            }

          }
      });
  });
});

$( document ).ready(function() {

  $('#closeLink').on('click', function () {
    $('#dialogLinkAdd').fadeOut();
  });


    function save () {
      $('#save-link-form').submit(function (e) {
          e.preventDefault();
          var csrftoken = $('meta[name=_token]').attr('content'),
              link = $('input[name=link]').val(),
              user_id = $('input[name=user_id]').val();
              old_link = $('input[name=old_link]').val();

          $.ajax({
              type:'POST',
              data: {
                   '_token'  : csrftoken,
                   'link' : link,
                   'old_link' : old_link,
                   'user_id' : user_id
              },
              url:'/edit_links',
              success: function () {
                $('input[name=link]').val('');
                $('#dialogLinkAdd').fadeOut();
                $('.uk-alert').remove();
                $('#editUser').prepend(
                   '<div class="uk-alert uk-alert-success" data-uk-alert=""'+
                   'style="display: block;">'+
                   '<a href="" class="uk-alert-close uk-close"></a>'+
                   '<p>Ссылка изменена</p></div>');
                  $('li.item-links[data-id='+$('#save-link-form').data('id')+']')
                             .children('input.soc-set-edit')
                             .val(link);
                 setTimeout(function(){$('.uk-alert').css({'height':'0'}).remove()}, 10000)

              }
          });
          return false;
      });
    }
    function deleteLink () {
      $('#delete-btn').on('click', function () {
        var csrftoken = $('meta[name=_token]').attr('content'),
            link = $('input[name=link]').val(),
            user_id = $('input[name=user_id]').val();

        $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'link' : link,
                      'user_id' : user_id
            },
            url:'/delete_links',

            success: function () {
              $('input[name=link]').val('');
              $('#dialogLinkAdd').fadeOut();
              $('#editUser').prepend(
                 '<div class="uk-alert uk-alert-success" data-uk-alert=""'+
                 'style="display: block;">'+
                 '<a href="" class="uk-alert-close uk-close"></a>'+
                 '<p>Ссылка удалена</p></div>');
             $('li[data-id='+$('#save-link-form').data('id')+']').remove();
             setTimeout(function(){$('.uk-alert').css({'height':'0'}).remove()}, 10000)

            }
        });
    });
  }
  function openModalLink (){
    $('.open-modal-link').on('click', function () {

        $('.links-control').removeAttr('id')
                           .attr('id', 'save-link-form');
        $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
        $('input[name=link]').val($(this).children('input.soc-set-edit').val())
        $('#save-link-form').attr('data-id', $(this).data('id'));

        $('h3.title-form').empty()
                          .append('Изменить ссылку для '+
                          $(this).children('input.soc-set-edit').val()+' или '+
                '<span id="delete-btn" class="remove-this-links">удалить</span>');

        $('.mini-modal-submit').removeClass('uk-icon-plus')
                               .addClass('uk-icon-save')
      $('#dialogLinkAdd').fadeIn();
      deleteLink();
    });
  }
  $('.open-modal-link').on('click', function () {
    if ($(this).data('action') === 'addLinks') {

      $('h3.title-form').empty()
                        .text('Добавить ссылку');
      $('.mini-modal-submit').removeClass('uk-icon-save')
                             .addClass('uk-icon-plus');
      $('.links-control').removeAttr('id')
                         .attr('id', 'add-link-form');

      $('#add-link-form').submit(function (e) {
         e.preventDefault();
         var csrftoken = $('meta[name=_token]').attr('content'),
             link = $('input[name=link]').val(),
             user_id = $('input[name=user_id]').val();

         $.ajax({
           type:'POST',
           data: {
                '_token'  : csrftoken,
                'link' : link,
                'user_id' : user_id
           },
           url:'/add_links',
           success: function (data) {
             $('input[name=link]').val('');
             $('#dialogLinkAdd').fadeOut();
             $('.open-di-link').before(
               '<li class="item-links uk-icon-external-link '+
                'open-modal-link" data-action="editLinks"data-id="'+data.id+'">'+
               '<input class="contact-item-value soc-set-edit" name="soc_net'+data.id+'"'+
               'value="'+link+'" type="hidden"></li>');
             $('.uk-alert').remove();
             $('#editUser').prepend(
                '<div class="uk-alert uk-alert-success" data-uk-alert=""'+
                'style="display: block;">'+
                '<a href="" class="uk-alert-close uk-close"></a>'+
                '<p>Ссылка добавлена</p></div>');
                save();
                openModalLink();
             setTimeout(function(){$('.uk-alert').css({'height':'0'}).remove()}, 10000);
           }
         });
         return false;
     });
    }else {
      $('.links-control').removeAttr('id')
                         .attr('id', 'save-link-form');
      $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
      $('input[name=link]').val($(this).children('input.soc-set-edit').val())
      $('#save-link-form').attr('data-id', $(this).data('id'));

      $('h3.title-form').empty()
                        .append('Изменить ссылку для '+
                        $(this).children('input.soc-set-edit').val()+' или '+
              '<span id="delete-btn" class="remove-this-links">удалить</span>');

      $('.mini-modal-submit').removeClass('uk-icon-plus')
                             .addClass('uk-icon-save')

      deleteLink();
      save();
      openModalLink();
    }
    $('#dialogLinkAdd').fadeIn();
  });

});

$( document ).ready(function() {
  $('#close-modal-law').on('click', function() {
    $('#modalLaw').fadeOut();
  });

  $('.b-pretense').on('click', function() {
    $('#modalLaw').fadeIn();
  });

  $('#pretense-file').on('change', function (){
    $('.wrap-file-modal-law').addClass('uk-icon-thumbs-o-up');
    $('.wrap-file-modal-law').removeClass('uk-icon-plus');
  });

  $('#formPretense').on('submit', function (e){
    e.preventDefault();
    var csrftoken = $('input[name=_token]').val(),
        postId = $('.active-slide').data('id'),
        textPretense = $('input[name=text_pretense]').val(),
        filePretense = new FormData($(this).get(0));
        // filePretense.append('img', $('input[name=file_pretense]').prop('files')[0]);
        // filePretense.append('img' , $('input[name=file_pretense]').prop('files')[0]);
    $.ajax({
        type:'POST',
        data: filePretense,
        url: '/add_copyright',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
          $('#modalLaw').fadeOut();
          $('.b-pretense').text('OK');
        }
    });
    return false;
  });
});

$( document ).ready(function() {








  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  $('.popup-tag').keydown( function(e){
    if (e.which === 27) {
        $('.popup-search-tag').empty();
        $('.popup-search-tag').fadeOut();
    }
  });

  $('.popup-tag').keydown( function(e) {
    if (e.which === 38) {  // клавиша вверх
      if ($('.drop-item-tag:first').hasClass('active-drop-item')) {
          $('.drop-item-tag:last').addClass('active-drop-item');
          $('.drop-item-tag:first').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
          $('.drop-item-tag:last').addClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());

      }else {
          $('.active-drop-item').prev().addClass('active-drop-item');
          $('.active-drop-item:last').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }
    } else if (e.which === 40) { // клавиша вниз
      if ($('.drop-item-tag:last').hasClass('active-drop-item')) {
          $('.drop-item-tag:first').addClass('active-drop-item');
          $('.drop-item-tag:last').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
          $('.drop-item-tag:first').addClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else {
          $('.active-drop-item').next().addClass('active-drop-item');
          $('.active-drop-item:first').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }
    }
  });

  $('.ajax-input-search').keydown( function(e) {
    if ((e === 13) && ($('li').is('.active-drop-item'))) {
      e.preventDefault();
      var sortSort = $('input[name=sortSorting]').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val();

      $.ajax({
        type:'POST',
        async:false,
        data: {
                  '_token'  : $('meta[name=_token]').attr('content'),
                  'sortSort': sortSort,
                  'styleSort': styleSort,
                  'roomSort': roomSort,
                  'colorSort': colorSort,
                  'tag': $('input[name=tagSorting]').val()
        },
        url:'/load_sort_photo',

        success: function (data) {
            $('.popup-search-tag').fadeOut().empty();
            if (data === 'error_download') {
              $('.info-text-message').fadeIn();
              $('.b-next-page').fadeOut();
            }else {
              history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+$('input[name=tagSorting]').val()+'"]');
              for(var i=0; i<data.length; i++) {
              $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+$('input[name=tagSorting]').val()+'"]"'+
                    ' class="item-gallery" data-grid-prepared="true"'+
                    'style="position:absolute;">'+
                   '<div class="uk-panel-box">'+
                     '<img src="'+data[i].min_path+'">'+
                   '</div>'+
                 '</a>').appendTo('#pole');
              }
            }
        }
      });
      return false;
  }
  });

  $('.popup-tag').on('input', function(){
    $.ajax({
      type:'POST',
      data: {
                '_token'  : $('meta[name=_token]').attr('content'),
                'current': $(this).val(),
      },
      url:'/load_tags_mask',

      success: function (data) {
          $('.popup-search-tag').empty();
          var length;
          if ((data.length <= 7) && (data.length != 0) ) {
            length = data.length;
            for(var i=0; i<length; i++) {
              if (data[i].title != '') {
                $('<li class="drop-item-tag">'+data[i].title+'</li>')
                .appendTo('.popup-search-tag');
              }
            }
            $('.popup-search-tag').fadeIn();
          }else if(data.length === 0) {
            $('.popup-search-tag').fadeOut();
          }else {
            length = 7;
            for(var i=0; i<length; i++) {
              if (data[i].title != '') {
                $('<li class="drop-item-tag">'+data[i].title+'</li>')
                .appendTo('.popup-search-tag');
              }
            }
            $('.popup-search-tag').fadeIn();
          }
      }
    });
  });

});

$( document ).ready(function() {
  $('#description-pole h3').on('click', function(){
    $('<h3 class="title-description-popup"></h3>')
                  .appendTo('.description-scroll-place')
                  .text($(this).text());
    $('<p></p>').appendTo('.description-scroll-place')
                .text($('#description-pole p').text());
    $('#modalDescriptionFull').fadeIn();
  });
  $('#close-modal-description').on('click', function(){
    $('#modalDescriptionFull').fadeOut();
    $('.description-scroll-place').empty();
  });
});

$(document).ready(function() {
  $('#enter').on('submit', function(e) {
    $('#p-info').remove();
    if (($('.modal-login-inp').val() === '')) {
          e.preventDefault();
           $('<p id="p-info" style="color:red">Не верно введен логин или пароль</p>')
               .prependTo(this);
           return false;
    }else {
      return true;
    }
  });
});

$(document).ready(function(){
  $('#feedback').on('submit', function (e) {
    if (($('.input-feedback').val() === '')
       || $('.textarea-feddback').val() === '') {
         e.preventDefault();
         $(this).children().addClass('error');
         return false;
    }else {
      return true;
    }
  });
  $('#feedback').children().on('click', function() {
    $(this).removeClass('error');
  });
});

$(document).ready(function(){
  $('#recovery-pass').on('submit', function (e) {
    e.preventDefault();
    if ($(this).children('.recover-text-inp').val() === ""){
      $('<p id="p-info" style="color:red">Введите свой логин</p>')
      .prependTo(this);
      return false;
    } else {
      return true;
    }
  });
});

$(document).ready(function(){
  $('#registr').on('submit', function (e) {
    if ($('.input-reg').val() === "") {
          e.preventDefault();
          $('<p id="p-info" style="color:red">Заполните все поля формы</p>')
          .prependTo('#registr');
          return false;
    } else {
      return true;
    }
  });
});

$(document).ready(function () {
  $('.nav-slide-about').on('click', function () {
    if ($(this).data('direction') === 'prev') {
      if ($('.item:first').hasClass('active-about')) {
        $('.item:not(.item:last)')
                  .addClass('left-about')
                  .removeClass('active-about')
                  .removeClass('right-about');
        $('.item:last')
              .addClass('active-about')
              .removeClass('right-about');
      }else {
        $('.active-about')
          .prev()
          .addClass('active-about')
          .removeClass('left-about');
        $('.active-about:last')
          .removeClass('active-about')
          .addClass('right-about');
      }
    }else {
      if ($('.item:last').hasClass('active-about')) {
        $('.item:not(.item:first)')
                  .addClass('right-about')
                  .removeClass('active-about')
                  .removeClass('left-about');
        $('.item:first')
              .addClass('active-about')
              .removeClass('left-about');
      }else {
        $('.active-about')
          .next()
          .addClass('active-about')
          .removeClass('right-about');
        $('.active-about:first')
          .removeClass('active-about')
          .addClass('left-about');
      }
    }
  });
});

$(document).ready(function () {
  $('.item-admin-row').on('click', function () {
    var csrftoken = $('meta[name=_token]').attr('content'),
        commentId = parseInt($(this).children('.id-cell').text());
    $.ajax({
        type:'POST',

        data: {
                  '_token'  : csrftoken,
                  'id' : commentId,
        },
        url: '/read_new_comment',

        success: function () {
          $('.id-cell:contains("'+commentId+'")').parent().removeClass('none-check');
        }
    });
  });
});

$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});

  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });

  $('#close-modal-likes').on('click', function(){
    $('#allPhotoLikes').fadeOut();
  });

  $('.like').hover(function(){
    $('.margin-like-tooltip').show();
  });

  $('.like').mouseleave(function(){
    $('.margin-like-tooltip').show();
  });

  $('footer').on('click', function () {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_all_likes',

      success: function (data) {
          $('.place-likes').empty();
          $('#allPhotoLikes').fadeIn();
          for(var i=0; i<data.length; i++) {
            if (data[i].quadro_ava === null) {
                portret = '/img/user.png';
            }else {
                portret = data[i].quadro_ava;
            }
            $('<div class="item-like">'+
              '<a href="/profile/'+data[i].id+'" class="like-portret">'+
                '<img src="'+portret+'"></a>'+
              '<a href="/profile/'+data[i].id+'" class="name-like">'+
                data[i].name+'</a></div>').appendTo('.place-likes');
          }
      }
    });
  });
});

//# sourceMappingURL=app.js.map
