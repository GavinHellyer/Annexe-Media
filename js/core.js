/**
 * @ver 1.0
 * jQuery Class System
 */
(function($){Class={create:function(){var s=(arguments.length>0&&arguments[arguments.length-1].constructor==Boolean)?arguments[arguments.length-1]:false;var c=s?{}:function(){this.init.apply(this,arguments);}
  var methods={ns:[],supers:{},init:function(){},namespace:function(ns){if(!ns)return null;var _this=this;if(ns.constructor==Array){$.each(ns,function(){_this.namespace.apply(_this,[this]);});return;}else if(ns.constructor==Object){for(var key in ns){if([Object,Function].indexOf(ns[key].constructor)>-1){if(!this.ns)this.ns=[];this.ns[key]=ns[key];this.namespace.apply(this,[key]);}}
    return;}
    var levels=ns.split(".");var nsobj=this.prototype?this.prototype:this;$.each(levels,function(){nsobj[this]=_this.ns[this]||nsobj[this]||window[this]||Class.create(true);delete _this.ns[this];nsobj=nsobj[this];});return nsobj;},create:function(){var args=Array.prototype.slice.call(arguments);var name=args.shift();var temp=Class.create.apply(Class,args);var ns={};ns[name]=temp;this.namespace(ns);},sup:function(){try{var caller=this.sup.caller.name;this.supers[caller].apply(this,arguments);}catch(noSuper){return false;}}}
  s?delete methods.init:null;$.extend(c,methods);if(!s)$.extend(c.prototype,methods);var extendee=s?c:c.prototype;$.each(arguments,function(){if(this.constructor==Object||typeof this.init!=undefined){for(i in this){if(extendee[i]&&extendee[i].constructor==Function&&['namespace','create','sup'].indexOf(i)==-1){this[i].name=extendee[i].name=i;extendee.supers[i]=extendee[i];}
    extendee[i]=this[i];}}});return c;}};})(jQuery);