/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */

/**
 * jQuery Skitter Slideshow
 * @name jquery.skitter.js
 * @description Slideshow
 * @author Thiago Silva Ferreira - http://thiagosf.net
 * @version 4.2
 * @date August 04, 2010
 * @update April 14, 2013
 * @copyright (c) 2010 Thiago Silva Ferreira - http://thiagosf.net
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 * @example http://thiagosf.net/projects/jquery/skitter/
 */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(q($){f 2P=0,5G=[];$.2p.3H=q(D){Z c.3I(q(){l($(c).5H(\'5I\')==1X){$(c).5H(\'5I\',2P);5G.5J(2K $3e(c,D,2P));++2P}})};f 5K={1f:1,2L:8d,47:\'\',48:T,49:T,2y:T,N:\'\',k:1x,8e:1x,1m:1x,1s:1x,1P:1x,3f:1x,3g:\'4V\',B:1x,O:1x,1z:1,19:R,2X:R,4a:1x,5L:R,4b:R,3h:R,4c:R,4d:R,2q:R,4e:R,3i:R,3J:R,3K:1x,1Q:0.75,2r:2Q,2z:1M,4W:1x,4X:1x,8f:20,4Y:\'r\',3j:R,2M:R,2R:R,4Z:\'4f\',2Y:R,51:\'4f\',1F:R,2s:{},2A:R,3k:R,3l:R,4g:0,2c:0,2Z:T,5M:R,4h:[],5N:1x,5O:1x,3L:T,4i:\'4j\',52:1x,5P:\'<a 1R="#" 1u="2d">8g</a>\'+\'<a 1R="#" 1u="24">8h</a>\'+\'<2S 1u="1C"></2S>\'+\'<1p 1u="4k">\'+\'<1p 1u="1L">\'+\'<a 1R=""><P 1u="1a" /></a>\'+\'<1p 1u="2e"></1p>\'+\'</1p>\'+\'</1p>\'};$.3H=q(3M,D,5Q){c.k=$(3M);c.31=1x;c.g=$.1S({},5K,D||{});c.2P=5Q;c.5R()};f $3e=$.3H;$3e.2p=$3e.53={};$3e.2p.1S=$.1S;$3e.2p.1S({5R:q(){f h=c;l(c.g.4e){f C=$(32).C();f H=$(32).H();c.k.C(C).H(H);c.k.w({\'2B\':\'54\',\'s\':0,\'r\':0,\'z-5S\':5T});c.g.2Z=R;$(\'55\').w({\'8i\':\'8j\'})}c.g.B=3m(c.k.w(\'C\'));c.g.O=3m(c.k.w(\'H\'));l(!c.g.B||!c.g.O){8k.8l(\'8m 5U H 4l 5V 1x! - 8n 8o\');Z R}l(c.g.52){c.k.3n(\'3H-\'+c.g.52)}c.k.1G(c.g.5P);c.g.N=c.5W(c.g.L);l(c.g.1f>=2)c.g.1f=1.3;l(c.g.1f<=0)c.g.1f=1;c.k.j(\'.1C\').1q();c.k.j(\'.2e\').1q();c.k.j(\'.2d\').1q();c.k.j(\'.24\').1q();c.k.j(\'.4k\').C(c.g.B);c.k.j(\'.4k\').H(c.g.O);f 3K=c.g.3K?c.g.3K:c.g.B;c.k.j(\'.2e\').C(3K);f 4m=\' 33\',u=0;c.g.1m=2K 4n();f 56=q(2T,W,26,2y,28){h.g.1m.5J([W,2T,26,2y,28]);l(h.g.4b){f 4o=\'\';l(h.g.B>h.g.O){4o=\'H="1v"\'}13{4o=\'C="1v"\'}h.k.j(\'.1C\').1G(\'<2S 1u="1Y\'+4m+\'" 3o="\'+(u-1)+\'" 4p="57\'+u+\'58\'+h.2P+\'">\'+\'<P W="\'+W+\'" \'+4o+\' />\'+\'</2S> \')}13{h.k.j(\'.1C\').1G(\'<2S 1u="1Y\'+4m+\'" 3o="\'+(u-1)+\'" 4p="57\'+u+\'58\'+h.2P+\'">\'+u+\'</2S> \')}4m=\'\'};l(c.g.3i){$.8p({4q:\'8q\',5X:c.g.3i,8r:R,8s:\'3i\',8t:q(3i){f 2C=$(\'<2C></2C>\');$(3i).j(\'3H 8u\').3I(q(){++u;f 2T=($(c).j(\'2T\').3p())?$(c).j(\'2T\').3p():\'#\';f W=$(c).j(\'1L\').3p();f 26=$(c).j(\'1L\').U(\'4q\');f 2y=$(c).j(\'2y\').3p();f 28=($(c).j(\'28\').3p())?$(c).j(\'28\').3p():\'4V\';56(2T,W,26,2y,28)})}})}13 l(c.g.8v){}13{c.k.j(\'2C 3q\').3I(q(){++u;f 2T=($(c).j(\'a\').1A)?$(c).j(\'a\').U(\'1R\'):\'#\';f W=$(c).j(\'P\').U(\'W\');f 26=$(c).j(\'P\').U(\'1u\');f 2y=$(c).j(\'.8w\').34();f 28=($(c).j(\'a\').1A&&$(c).j(\'a\').U(\'28\'))?$(c).j(\'a\').U(\'28\'):\'4V\';56(2T,W,26,2y,28)})}l(h.g.4b&&!h.g.4e){h.g.3h={V:0.3};h.g.4c={V:0.5};h.g.4d={V:1};h.k.j(\'.1C\').3n(\'2N\');f 4r=(u+1)*h.k.j(\'.2N .1Y\').C();h.k.j(\'.2N\').C(4r);h.k.w({H:h.k.H()+h.k.j(\'.1C\').H()});h.k.1G(\'<1p 1u="5Y"></1p>\');f 5Z=h.k.j(\'.1C\').8x();h.k.j(\'.1C\').29();h.k.j(\'.5Y\').C(h.g.B).1G(5Z);f 59=0,B=c.g.B,O=c.g.O,3N=0,2N=h.k.j(\'.2N\'),5a=0,60=h.k.3r().s;2N.j(\'.1Y\').3I(q(){59+=$(c).8y()});2N.C(59+\'11\');3N=2N.C();4s=c.g.B;4s=B-1v;l(4r>h.g.B){h.k.8z(q(e){5a=h.k.3r().r+90;f x=e.8A,y=e.8B,35=0;x=x-5a;y=y-60;61=3N-4s;35=-((61*x)/4s);l(35>0)35=0;l(35<-(3N-B))35=-(3N-B);l(y>O){2N.w({r:35})}})}h.k.j(\'.8C\').w({\'r\':10});l(4r<h.g.B){h.k.j(\'.1C\').C(\'36\');h.k.j(\'.8D\').1q();f 1T=\'.1C\';2D(h.g.4Y){J\'4f\':f 18=(h.g.B-h.k.j(1T).C())/2;h.k.j(1T).w({\'r\':18});K;J\'2f\':h.k.j(1T).w({\'r\':\'36\',\'2f\':\'-8E\'});K;J\'r\':h.k.j(1T).w({\'r\':\'8F\'});K}}}13{f 1T=\'.1C\';l(h.g.3J){h.k.j(\'.1C\').3n(\'5b\').5c(\'1C\');1T=\'.5b\'}2D(h.g.4Y){J\'4f\':f 18=(h.g.B-h.k.j(1T).C())/2;h.k.j(1T).w({\'r\':18});K;J\'2f\':h.k.j(1T).w({\'r\':\'36\',\'2f\':\'62\'});K;J\'r\':h.k.j(1T).w({\'r\':\'62\'});K}l(!h.g.3J){l(h.k.j(\'.1C\').H()>20){h.k.j(\'.1C\').1q()}}}c.k.j(\'2C\').1q();l(c.g.5L)c.g.1m.63(q(a,b){Z E.1n()-0.5});c.g.1s=c.g.1m[0][0];c.g.1P=c.g.1m[0][1];c.g.3f=c.g.1m[0][3];c.g.3g=c.g.1m[0][4];l(c.g.1m.1A>1){c.k.j(\'.2d\').2O(q(){l(h.g.19==R){h.g.1z-=2;l(h.g.1z==-2){h.g.1z=h.g.1m.1A-2}13 l(h.g.1z==-1){h.g.1z=h.g.1m.1A-1}h.4t(h.g.1z)}Z R});c.k.j(\'.24\').2O(q(){h.4t(h.g.1z);Z R});h.k.j(\'.24, .2d\').4u(\'5d\',h.g.5N);h.k.j(\'.24, .2d\').4u(\'64\',h.g.5O);c.k.j(\'.1Y\').3s(q(){l($(c).U(\'1u\')!=\'1Y 33\'){l(h.g.4c){$(c).1U().I(h.g.4c,2Q)}}},q(){l($(c).U(\'1u\')!=\'1Y 33\'){l(h.g.3h){$(c).1U().I(h.g.3h,1M)}}});c.k.j(\'.1Y\').2O(q(){l($(c).U(\'1u\')!=\'1Y 33\'){f 4v=3t($(c).U(\'3o\'));h.4t(4v)}Z R});l(h.g.3h){c.k.j(\'.1Y\').w(h.g.3h)}l(h.g.4d){c.k.j(\'.1Y:8G(0)\').w(h.g.4d)}l(h.g.3j&&h.g.3J){f 3j=$(\'<1p 1u="4w"><2C></2C></1p>\');1h(f i=0;i<c.g.1m.1A;i++){f 3q=$(\'<3q></3q>\');f P=$(\'<P />\');P.U(\'W\',c.g.1m[i][0]);3q.1G(P);3j.j(\'2C\').1G(3q)}f 65=3t(c.g.1m.1A*1v);3j.j(\'2C\').C(65);$(1T).1G(3j);h.k.j(1T).j(\'.1Y\').8H(q(){f 66=3m(h.k.j(1T).3r().r);f 67=3m($(c).3r().r);f 68=(67-66)-43;f 3o=3t($(c).U(\'3o\'));f 8I=h.k.j(\'.8J P\').U(\'W\');f 69=-(3o*1v);h.k.j(\'.4w\').j(\'2C\').I({r:69},{4x:1w,3u:R,L:\'6a\'});h.k.j(\'.4w\').1N(1,1).I({r:68},{4x:1w,3u:R})});h.k.j(1T).64(q(){$(\'.4w\').I({V:\'1q\'},{4x:1w,3u:R})})}}l(h.g.2M){h.6b()}l(h.g.2Y){h.6c()}l(h.g.1F&&h.g.3L){h.6d()}l(h.g.2q){h.2q()}l(h.g.5M){h.6e()}c.6f()},6f:q(){f h=c;f 2E=$(\'<1p 1u="2E">8K</1p>\');c.k.1G(2E);f t=c.g.1m.1A;f u=0;$.3I(c.g.1m,q(i){f 6g=c;f 2E=$(\'<2S 1u="4y"></2S>\');2E.w({2B:\'54\',s:\'-8L\'});h.k.1G(2E);f P=2K 8M();$(P).8N(q(){++u;l(u==t){h.k.j(\'.2E\').29();h.k.j(\'.4y\').29();h.6h()}}).8O(q(){h.k.j(\'.2E, .4y, .1Y, .24, .2d\').29();h.k.34(\'<p 2g="8P:8Q;4z:8R;">8S 2E 6i. 8T 5U 8U 6i 8V 8W 8X.</p>\')}).U(\'W\',6g[0])})},6h:q(){f h=c;f 5e=R;l(c.g.48||c.g.4b)c.k.j(\'.1C\').3O(1M);l(c.g.3J)c.k.j(\'.5b\').3O(1M);l(c.g.2y)c.k.j(\'.2e\').S();l(c.g.49){c.k.j(\'.2d\').3O(1M);c.k.j(\'.24\').3O(1M)}l(h.g.3L){h.3P()}h.6j();h.1Z();h.k.j(\'.1L a P\').U({\'W\':h.g.1s});4A=h.k.j(\'.1L a\');4A=h.4B(4A);4A.j(\'P\').3O(8Y);h.3Q();h.5f();l(h.g.3L){h.6k()}f 5g=q(){l(h.g.2Z){5e=T;h.g.2X=T;h.2F(T);h.5h()}};h.k.5d(5g);h.k.j(\'.24\').5d(5g);l(h.g.1m.1A>1&&!5e){l(h.g.3L){h.31=3R(q(){h.4C()},h.g.2L)}}13{h.k.j(\'.2E, .4y, .1Y, .24, .2d\').29()}l($.6l(h.g.4W))h.g.4W(h)},4t:q(4v){l(c.g.19==R){c.g.2c=0;c.k.j(\'.n\').1U();c.2F(T);c.g.1z=E.6m(4v);c.k.j(\'.1L a\').U({\'1R\':c.g.1P});c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.n\').29();c.4C()}},4C:q(){f h=c;3S=[\'6n\',\'6o\',\'6p\',\'6q\',\'6r\',\'6s\',\'6t\',\'6u\',\'6v\',\'6w\',\'6x\',\'6y\',\'6z\',\'6A\',\'6B\',\'6C\',\'6D\',\'6E\',\'6F\',\'6G\',\'6H\',\'6I\',\'6J\',\'6K\',\'6L\',\'6M\',\'6N\',\'6O\',\'6P\',\'6Q\',\'6R\',\'6S\',\'6T\',\'6U\',\'6V\'];l(h.g.1F)h.6W();26=(c.g.47==\'\'&&c.g.1m[c.g.1z][2])?c.g.1m[c.g.1z][2]:(c.g.47==\'\'?\'3a\':c.g.47);l(26==\'8Z\'){l(!c.g.4a){3S.63(q(){Z 0.5-E.1n()});c.g.4a=3S}26=c.g.4a[c.g.1z]}13 l(26==\'1n\'){f 6X=3t(E.1n()*3S.1A);26=3S[6X]}13 l(h.g.4h.1A>0){f 6Y=h.g.4h.1A;l(c.g.3v==1X){c.g.3v=0}26=h.g.4h[c.g.3v];++c.g.3v;l(c.g.3v>=6Y)c.g.3v=0}2D(26){J\'6n\':c.5i();K;J\'6o\':c.5i({1n:T});K;J\'6p\':c.6Z();K;J\'6q\':c.5j();K;J\'6r\':c.5j({1n:T});K;J\'6s\':c.71();K;J\'6t\':c.72();K;J\'6u\':c.73();K;J\'6v\':c.5k();K;J\'6w\':c.5k({1n:T});K;J\'6x\':c.5l();K;J\'6y\':c.74();K;J\'6z\':c.76();K;J\'6A\':c.77();K;J\'6B\':c.78();K;J\'6C\':c.5m({H:T});K;J\'6D\':c.5m({H:R,F:2t,1b:50});K;J\'6E\':c.3T({2u:\'s\'});K;J\'6F\':c.3T({2u:\'3b\'});K;J\'6G\':c.3T({2u:\'2f\',t:5});K;J\'6H\':c.3T({2u:\'r\',t:5});K;J\'6I\':c.79();K;J\'91\':c.7a();K;J\'6J\':c.7b();K;J\'6K\':c.7c();K;J\'6L\':c.7d();K;J\'6M\':c.7e();K;J\'6N\':c.7f();K;J\'6O\':c.7g();K;J\'6P\':c.5n({2u:\'s\'});K;J\'6Q\':c.5n({2u:\'3b\'});K;J\'6R\':c.7h();K;J\'6S\':c.5o();K;J\'6T\':c.5o({L:\'5p\'});K;J\'6U\':c.7i();K;J\'6V\':c.7j();K;3a:c.5l();K}},5i:q(D){f h=c;f D=$.1S({},{1n:R},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=c.g.O+1w;f 1g=c.g.O+1w;f X=0;f 14=0;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X)+(X*5q);f 18=-h.g.B;f 1r=-(A*X);f 1o=-(v*14);f Y=(A*X);f 17=(v*14);f n=c.1y();n.1q();f G=50*(i);l(D.1n){G=40*(14);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A})}13{F=1M;n.w({r:(c.g.B)+(v*i),s:c.g.O+(A*i),C:v,H:A})}c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.S().1b(G).I({s:Y+\'11\',r:17+\'11\'},F,L,Q);l(D.1n){n.j(\'P\').w({r:1o+1v,s:1r+50});n.j(\'P\').1b(G+(F/2)).I({r:1o,s:1r},5T,\'5p\')}13{n.j(\'P\').w({r:1o,s:1r});n.j(\'P\').1b(G+(F/2)).1N(1v,0.5).1N(2Q,1)}X++;l(X==1j){X=0;14++}}},6Z:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=1M/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/15));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1y();n.w({r:c.g.B+1v,s:0,C:v,H:A});n.j(\'P\').w({r:-(v*i)});c.1d(n);f G=80*(i);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.S().1b(G).I({s:Y,r:17},F,L);n.j(\'P\').1q().1b(G+1v).I({V:\'S\'},F+2Q,L,Q)}},5j:q(D){f h=c;f D=$.1S({},{1n:R},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=2Q/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.B/8));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 1H=c.g.B/16;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-1H;f 17=18-1H;f n=c.1V(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.S();f G=50*i;l(D.1n){F=(2t*(h.3V(2)+1))/c.g.1f;Y=1c;17=18;G=E.M(30*h.3V(30))}l(D.1n&&i==(t-1)){F=2t*3;G=30*30}f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\',s:Y+\'11\',r:17+\'11\'},F,L,Q);X++;l(X==1j){X=0;14++}}},71:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=1M/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-50;f 17=18-50;f n=c.1V(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.S();f G=50*i;G=(i==(t-1))?(t*50):G;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\'},F,L,Q);X++;l(X==1j){X=0;14++}}},7a:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'7k\':c.g.N;f F=2Q/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f u=-1;1h(i=0;i<t;i++){l(14%2!=0){l(X==0){u=u+1j+1}u--}13{l(14>0&&X==0){u=u+2}u++}1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-50;f 17=18-50;f n=c.1V(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.S();f G=(50*i);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({C:\'+=2G\',H:\'+=2G\',s:\'-=7l\',r:\'-=7l\',V:\'1q\'},F,L,Q);X++;l(X==1j){X=0;14++}}},72:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'3d\':c.g.N;f F=7m/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 1H=E.M(c.g.B/6);1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-1H;f 17=18-1H;f n=c.1V(1i);n.w({r:18,s:1c,C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.S();f G=50*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\',C:\'1q\',H:\'1q\',s:1c+(v*1.5),r:18+(A*1.5)},F,L,Q);X++;l(X==1j){X=0;14++}}},73:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/7));f v=(c.g.B);f A=E.M(c.g.O/t);1h(i=0;i<t;i++){f 17=(i%2==0?\'\':\'\')+v;f Y=(i*A);f n=c.1y();n.w({r:17+\'11\',s:Y+\'11\',C:v,H:A});n.j(\'P\').w({r:0,s:-Y});c.1d(n);f G=90*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'S\',s:Y,r:0},F,L,Q)}},5k:q(D){f h=c;f D=$.1S({},{1n:R},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=2t/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1y();n.w({r:17,s:Y-50,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);l(D.1n){f 1n=c.3V(t);f G=50*1n;G=(i==(t-1))?(50*t):G}13{f G=70*(i);F=F-(i*2)}f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\'},F,L,Q)}},5l:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'7n\':c.g.N;f F=7m/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f Y=0;f 1c=A;f 5r=v*i;f n=c.1y();n.w({r:5r,s:1c,H:A,C:v});n.j(\'P\').w({r:-(5r)});c.1d(n);f 1n=c.3V(t);f G=30*1n;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.S().1b(G).I({s:Y},F,L,Q)}},74:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=7o/c.g.1f;c.1l();f v=c.g.B;f A=c.g.O;f t=2;1h(i=0;i<t;i++){f 1c=0;f 18=0;f n=c.1y();n.w({r:18,s:1c,C:v,H:A});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.I({V:\'S\',r:0,s:0},F,L,Q)}},76:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=1M/c.g.1f;c.1l();f v=c.g.B;f A=c.g.O;f t=4;1h(i=0;i<t;i++){l(i==0){f 1c=\'-2G\';f 18=\'-2G\'}13 l(i==1){f 1c=\'-2G\';f 18=\'2G\'}13 l(i==2){f 1c=\'2G\';f 18=\'-2G\'}13 l(i==3){f 1c=\'2G\';f 18=\'2G\'}f n=c.1y();n.w({r:18,s:1c,C:v,H:A});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.I({V:\'S\',r:0,s:0},F,L,Q)}},77:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=2t/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1y();n.w({r:17,s:Y-c.g.O,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G;l(i<=((t/2)-1)){G=7p-(i*1w)}13 l(i>((t/2)-1)){G=((i-(t/2))*1w)}G=G/2.5;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:Y+\'11\',r:17+\'11\',V:\'S\'},F,L,Q)}},78:q(D){f h=c;f D=$.1S({},{H:R},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=2t/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1y();n.w({r:17,s:Y,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G;l(!D.H){l(i<=((t/2)-1)){G=7p-(i*1w)}13 l(i>((t/2)-1)){G=((i-(t/2))*1w)}f Q=(i==(t-1))?q(){h.1k()}:\'\'}13{l(i<=((t/2)-1)){G=1w+(i*1w)}13 l(i>((t/2)-1)){G=(((t/2)-i)*1w)+(t*1v)}f Q=(i==(t/2))?q(){h.1k()}:\'\'}G=G/2.5;l(!D.H){n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\',C:\'S\'},F,L,Q)}13{F=F+(i*2);f L=\'1O\';n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\',H:\'S\'},F,L,Q)}}},5m:q(D){f h=c;f D=$.1S({},{H:T,F:1M,1b:1v},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=D.F/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1y();n.w({r:17,s:Y,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G=D.1b*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';l(!D.H){n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\',C:\'S\'},F,L,Q)}13{f L=\'1O\';n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\',H:\'S\'},F,L,Q)}}},3T:q(D){f h=c;f D=$.1S({},{2u:\'s\',4E:\'4F\',t:7},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'4G\':c.g.N;f F=92/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=D.t;1h(i=0;i<t;i++){2D(D.2u){3a:J\'s\':f v=E.M(c.g.B/t);f A=c.g.O;f 21=0;f 1D=(v*i);f 3w=-A;f 2U=1D;f 3x=A;f 3y=1D;f 3z=0;f 3A=1D;f 1r=0;f 1o=-1D;K;J\'3b\':f v=E.M(c.g.B/t);f A=c.g.O;f 21=0;f 1D=(v*i);f 3w=A;f 2U=1D;f 3x=-A;f 3y=1D;f 3z=0;f 3A=1D;f 1r=0;f 1o=-1D;K;J\'2f\':f v=c.g.B;f A=E.M(c.g.O/t);f 21=(A*i);f 1D=0;f 3w=21;f 2U=v;f 3x=21;f 3y=-2U;f 3z=21;f 3A=0;f 1r=-21;f 1o=0;K;J\'r\':f v=c.g.B;f A=E.M(c.g.O/t);f 21=(A*i);f 1D=0;f 3w=21;f 2U=-v;f 3x=21;f 3y=-2U;f 3z=21;f 3A=0;f 1r=-21;f 1o=0;K}2D(D.4E){J\'7q\':3a:f G=(i%2==0)?0:5q;K;J\'1n\':f G=30*(E.1n()*30);K;J\'4F\':f G=i*1v;K}f n=c.1V(1i);n.j(\'P\').w({r:1o,s:1r});n.w({s:21,r:1D,C:v,H:A});c.1d(n);n.S();n.1b(G).I({s:3w,r:2U},F,L);f 2h=c.1y();2h.j(\'P\').w({r:1o,s:1r});2h.w({s:3x,r:3y,C:v,H:A});c.1d(2h);2h.S();f Q=(i==(t-1))?q(){h.1k()}:\'\';2h.1b(G).I({s:3z,r:3A},F,L,Q)}},79:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=3U/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.B/8));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 4H=2K 4n;f 3B=2K 4n;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));4H[i]=[1c,18];X++;l(X==1j){X=0;14++}}X=0;14=0;1h(i=0;i<t;i++){3B[i]=i};f 3B=h.7r(3B);1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c;f 17=18;1c=4H[3B[i]][0];18=4H[3B[i]][1];f n=c.1y();n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);f G=30*(E.1n()*30);l(i==(t-1))G=30*30;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'S\',s:Y+\'11\',r:17+\'11\'},F,L,Q);X++;l(X==1j){X=0;14++}}},7b:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=1M/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10))*2;f v=E.M(c.g.B/t)*2;f A=(c.g.O)/2;f 14=0;1h(i=0;i<t;i++){4I=(i%2)==0?T:R;f 1I=(v*(14));f 1J=(4I)?-h.g.O:h.g.O;f 2i=(v*(14));f 1H=(4I)?0:(A);f 17=-(v*14);f Y=(4I)?0:-(A);f G=93*14;f n=c.1y();n.w({r:1I,s:1J,C:v,H:A});n.j(\'P\').w({r:17+(v/1.5),s:Y}).1b(G).I({r:17,s:Y},(F*1.9),\'1O\');c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.S().1b(G).I({s:1H,r:2i},F,L,Q);l((i%2)!=0)14++}},7c:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 1I=(v*(i));f 1J=0;f 2i=(v*(i));f 1H=0;f 17=-(v*(i));f Y=0;f G=1v*i;f n=c.1y();n.w({r:1I,s:1J,C:v,H:A});n.j(\'P\').w({r:17+(v/1.5),s:Y}).1b(G).I({r:17,s:Y},(F*1.1),\'3d\');c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1H,r:2i,V:\'S\'},F,L,Q)}},7d:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=1M/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f 1B=1v;f 1E=E.5s(E.3C((c.g.B),2)+E.3C((c.g.O),2));f 1E=E.M(1E);1h(i=0;i<t;i++){f 1I=(h.g.B/2)-(1B/2);f 1J=(h.g.O/2)-(1B/2);f 2i=1I;f 1H=1J;f n=1x;n=c.4J({1L:h.g.1s,r:1I,s:1J,C:1B,H:1B,2B:{s:-1J,r:-1I}}).3W({\'4K-1E\':1E+\'11\'});1B+=1v;c.1d(n);f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1H,r:2i,V:\'S\'},F,L,Q)}},7e:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=1M/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=E.M(c.g.B/(c.g.B/10));f 1E=E.5s(E.3C((c.g.B),2)+E.3C((c.g.O),2));f 1E=E.M(1E);f 1B=1E;1h(i=0;i<t;i++){f 1I=(h.g.B/2)-(1B/2);f 1J=(h.g.O/2)-(1B/2);f 2i=1I;f 1H=1J;f n=1x;n=c.4J({1L:1i,r:1I,s:1J,C:1B,H:1B,2B:{s:-1J,r:-1I}}).3W({\'4K-1E\':1E+\'11\'});1B-=1v;c.1d(n);n.S();f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1H,r:2i,V:\'1q\'},F,L,Q)}},7f:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=1M/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=E.M(c.g.B/(c.g.B/10));f 1E=E.5s(E.3C((c.g.B),2)+E.3C((c.g.O),2));f 1E=E.M(1E);f 1B=1E;1h(i=0;i<t;i++){f 1I=(h.g.B/2)-(1B/2);f 1J=(h.g.O/2)-(1B/2);f 2i=1I;f 1H=1J;f n=1x;l($.94.95){n=c.1V(1i);n.w({r:1I,s:1J,C:1B,H:1B}).3W({\'4K-1E\':1E+\'11\'});n.j(\'P\').w({r:-1I,s:-1J})}13{n=c.4J({1L:1i,r:1I,s:1J,C:1B,H:1B,2B:{s:-1J,r:-1I}}).3W({\'4K-1E\':1E+\'11\'})}1B-=1v;c.1d(n);n.S();f G=1v*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';f 7s=(i%2==0)?\'7t\':\'-7t\';n.1b(G).I({s:1H,r:2i,V:\'1q\',2j:7s},F,L,Q)}},7g:q(D){f h=c;c.g.19=T;f L=(c.g.N==\'\')?\'1O\':c.g.N;f F=2t/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/4));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 96=R;f Y=0;f 17=0;f 3X=0;f 14=0;1h(i=0;i<t;i++){Y=A*3X;17=v*14;f G=30*(i);f n=c.1y();n.w({r:17,s:Y,C:v,H:A}).1q();n.j(\'P\').w({r:-17,s:-Y});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({C:\'S\',H:\'S\'},F,L,Q);3X++;l(3X==1j){3X=0;14++}}},5n:q(D){f h=c;f D=$.1S({},{2u:\'s\'},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'3d\':c.g.N;f F=2t/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=12;f v=E.M(c.g.B/t);f A=c.g.O;f 1H=(D.2u==\'s\')?-A:A;1h(i=0;i<t;i++){f 1c=0;f 18=(v*i);f 1r=0;f 1o=-(v*i);f n=c.1V(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.S();f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1H},F,L,Q)}},7h:q(D){f h=c;f D=$.1S({},{1n:R},D||{});c.g.19=T;f L=(c.g.N==\'\')?\'5t\':c.g.N;f F=3U/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/10));f t=1t;f v=E.M(c.g.B/1t);f A=c.g.O;1h(i=0;i<t;i++){f 1c=0;f 18=v*i;f 1r=0;f 1o=-(v*i);f 2i=\'+=\'+v;f n=c.1V(1i);n.w({r:0,s:0,C:v,H:A});n.j(\'P\').w({r:1o,s:1r});f 3Y=c.1V(1i);3Y.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});3Y.34(n);c.1d(3Y);n.S();3Y.S();f G=50*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({r:2i},F,L,Q)}},5o:q(D){f h=c;f D=$.1S({},{2u:\'s\',4E:\'4F\',t:7,L:\'5t\'},D||{});c.g.19=T;f L=(c.g.N==\'\')?D.L:c.g.N;f F=1M/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=D.t;1h(i=0;i<t;i++){f v=E.M(c.g.B/t);f A=c.g.O;f 21=0;f 1D=(v*i);f 3w=-A;f 2U=1D+v;f 3x=A;f 3y=1D;f 3z=0;f 3A=1D;f 1r=0;f 1o=-1D;2D(D.4E){J\'7q\':3a:f G=(i%2==0)?0:5q;K;J\'1n\':f G=30*(E.1n()*30);K;J\'4F\':f G=i*1v;K}f n=c.1V(1i);n.j(\'P\').w({r:1o,s:0});n.w({s:0,r:0,C:v,H:A});f 2h=c.1y();2h.j(\'P\').w({r:1o,s:0});2h.w({s:0,r:-v,C:v,H:A});f 3Z=c.1y();3Z.34(\'\').1G(n).1G(2h);3Z.w({s:0,r:1D,C:v,H:A});c.1d(3Z);3Z.S();n.S();2h.S();f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({r:v},F,L);2h.1b(G).I({r:0},F,L,Q)}},7i:q(D){f h=c;f D=$.1S({},{2H:\'3d\',2I:\'1O\'},D||{});c.g.19=T;f 2H=(c.g.N==\'\')?D.2H:c.g.N;f 2I=(c.g.N==\'\')?D.2I:c.g.N;f F=7o/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=2;f v=c.g.B;f A=E.M(c.g.O/t);f 22=c.1V(1i),23=c.1V(1i);22.j(\'P\').w({r:0,s:0});22.w({s:0,r:0,C:v,H:A});23.j(\'P\').w({r:0,s:-A});23.w({s:A,r:0,C:v,H:A});f 2k=c.1y(),2l=c.1y();2k.j(\'P\').w({r:0,s:A});2k.w({s:0,r:0,C:v,H:A});2l.j(\'P\').w({r:0,s:-(A*t)});2l.w({s:A,r:0,C:v,H:A});c.1d(2k);c.1d(2l);c.1d(22);c.1d(23);22.S();23.S();2k.S();2l.S();f Q=q(){h.1k()};22.j(\'P\').I({s:A},F,2H,q(){22.29()});23.j(\'P\').I({s:-(A*t)},F,2H,q(){23.29()});2k.j(\'P\').I({s:0},F,2I);2l.j(\'P\').I({s:-A},F,2I,Q)},7j:q(D){f h=c;f D=$.1S({},{2H:\'4G\',2I:\'4G\'},D||{});c.g.19=T;f 2H=(c.g.N==\'\')?D.2H:c.g.N;f 2I=(c.g.N==\'\')?D.2I:c.g.N;f F=97/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Z();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=2;f v=c.g.B;f A=E.M(c.g.O/t);f 22=c.1V(1i),23=c.1V(1i);22.j(\'P\').w({r:0,s:0});22.w({s:0,r:0,C:v,H:A});23.j(\'P\').w({r:0,s:-A});23.w({s:A,r:0,C:v,H:A});f 2k=c.1y(),2l=c.1y();2k.j(\'P\').w({r:0,s:0});2k.w({s:0,r:v,C:v,H:A});2l.j(\'P\').w({r:0,s:-A});2l.w({s:A,r:-v,C:v,H:A});c.1d(2k);c.1d(2l);c.1d(22);c.1d(23);22.S();23.S();2k.S();2l.S();f Q=q(){h.1k()};22.I({r:-v},F,2H,q(){22.29()});23.I({r:v},F,2H,q(){23.29()});2k.I({r:0},F,2I);2l.I({r:0},F,2I,Q)},1k:q(D){f h=c;c.k.j(\'.1a\').S();c.5f();c.g.19=R;c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1L a\').U({\'1R\':c.g.1P});l(!c.g.2X&&!c.g.2A&&!c.g.3k){c.31=3R(q(){h.41()},c.g.2L)}h.3P()},41:q(){c.2F(T);c.k.j(\'.n\').29();l(!c.g.2A&&!c.g.3k)c.4C()},1l:q(){l($.6l(c.g.4X))c.g.4X(c.g.1z,c);c.7u();c.7v();c.7w();c.7x()},7u:q(){f 7y=c.g.1m[c.g.1z][0];f 7z=c.g.1m[c.g.1z][1];f 7A=c.g.1m[c.g.1z][3];f 7B=c.g.1m[c.g.1z][4];c.g.1s=7y;c.g.1P=7z;c.g.3f=7A;c.g.3g=7B},7v:q(){f h=c;c.k.j(\'.33\').5c(\'33\');$(\'#57\'+(c.g.1z+1)+\'58\'+h.2P).3n(\'33\')},7x:q(){c.g.1z++;l(c.g.1z==c.g.1m.1A){c.g.1z=0}},1y:q(){l(c.g.1P!=\'#\'){f 1W=$(\'<a 1R="\'+c.g.1P+\'"><P W="\'+c.g.1s+\'" /></a>\');1W.U({\'28\':c.g.3g})}13{f 1W=$(\'<P W="\'+c.g.1s+\'" />\')}1W=c.4B(1W);f n=$(\'<1p 1u="n"></1p>\');n.1G(1W);Z n},1V:q(1i){l(c.g.1P!=\'#\'){f 1W=$(\'<a 1R="\'+c.g.1P+\'"><P W="\'+1i+\'" /></a>\');1W.U({\'28\':c.g.3g})}13{f 1W=$(\'<P W="\'+1i+\'" />\')}1W=c.4B(1W);f n=$(\'<1p 1u="n"></1p>\');n.1G(1W);Z n},4B:q(1W){l(c.g.4e){1W.j(\'P\').H(c.g.O)}Z 1W},1d:q(n){c.k.j(\'.4k\').1G(n)},5W:q(L){f 7C=[\'4D\',\'1O\',\'3d\',\'99\',\'9a\',\'9b\',\'9c\',\'9d\',\'9e\',\'9f\',\'9g\',\'9h\',\'9i\',\'6a\',\'9j\',\'9k\',\'3c\',\'4G\',\'9l\',\'5t\',\'9m\',\'9n\',\'7n\',\'9o\',\'7k\',\'5p\',\'9p\',\'9q\',\'9r\',\'9s\',];l(4L.9t(L,7C)>0){Z L}13{Z\'\'}},3V:q(i){Z E.6m(E.1n()*i)},3Q:q(){c.k.j(\'.2e\').34(c.g.3f)},5f:q(){f h=c;l(c.g.3f!=1X&&c.g.3f!=\'\'&&h.g.2y){2D(h.g.4i){J\'4j\':3a:h.k.j(\'.2e\').9u(2t);K;J\'r\':J\'2f\':h.k.j(\'.2e\').I({r:0},2t,\'3d\');K;J\'7D\':K}}},7w:q(){f h=c;2D(h.g.4i){J\'4j\':3a:c.k.j(\'.2e\').4j(1w,q(){h.3Q()});K;J\'r\':J\'2f\':f 2v=(h.g.4i==\'r\')?-(h.k.j(\'.2e\').C()):(h.k.j(\'.2e\').C());h.k.j(\'.2e\').I({r:2v},2t,\'3d\',q(){h.3Q()});K;J\'7D\':h.3Q();K}},6k:q(){f h=c;f 1Q=h.g.1Q;f 2r=h.g.2r;f 2z=h.g.2z;l(h.g.2Z){h.k.3s(q(){l(h.g.2Z)h.g.2X=T;l(!h.g.3l){h.4M()}h.42(\'3s\');h.2F(T)},q(){l(h.g.2Z)h.g.2X=R;l(h.g.2c==0&&!h.g.19&&!h.g.2A){h.3P()}13 l(!h.g.2A){h.44()}h.42(\'7E\');h.2F(T);l(!h.g.19&&h.g.1m.1A>1){h.31=3R(q(){h.41()},h.g.2L-h.g.2c);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1L a\').U({\'1R\':h.g.1P})}})}13{h.k.3s(q(){h.42(\'3s\')},q(){h.42(\'7E\')})}},42:q(4q){f h=c;f 1Q=h.g.1Q;f 2r=h.g.2r;f 2z=h.g.2z;l(4q==\'3s\'){l(h.g.2q){l(h.g.48){h.k.j(\'.1C\').S().w({V:0}).I({V:1Q},2r)}l(h.g.49){h.k.j(\'.2d\').S().w({V:0}).I({V:1Q},2r);h.k.j(\'.24\').S().w({V:0}).I({V:1Q},2r)}l(h.g.2M&&!h.g.2R){h.k.j(\'.2a\').1U().S().w({V:0}).I({V:1Q},1w)}l(h.g.2Y){h.k.j(\'.2w\').1U().S().w({V:0}).I({V:1Q},1w)}}l(h.g.2M&&!h.g.2R&&!h.g.2q){h.k.j(\'.2a\').1U().I({V:1},1w)}l(h.g.2Y&&!h.g.2q){h.k.j(\'.2w\').1U().I({V:1},1w)}}13{l(h.g.2q){l(h.g.48){h.k.j(\'.1C\').3u("2b",[]).S().w({V:1Q}).I({V:0},2z)}l(h.g.49){h.k.j(\'.2d\').3u("2b",[]).S().w({V:1Q}).I({V:0},2z);h.k.j(\'.24\').3u("2b",[]).S().w({V:1Q}).I({V:0},2z)}l(h.g.2M&&!h.g.2R){h.k.j(\'.2a\').1U().w({V:1Q}).I({V:0},1w)}l(h.g.2Y){h.k.j(\'.2w\').1U().w({V:1Q}).I({V:0},1w)}}l(h.g.2M&&!h.g.2R&&!h.g.2q){h.k.j(\'.2a\').1U().I({V:0.3},1w)}l(h.g.2Y&&!h.g.2q){h.k.j(\'.2w\').1U().I({V:0.3},1w)}}},2F:q(9v){f h=c;9w(h.31)},1Z:q(){l(c.g.1P!=\'#\'&&c.g.1P!=\'\'){c.k.j(\'.1L a\').U({\'1R\':c.g.1P,\'28\':c.g.3g})}13{c.k.j(\'.1L a\').9x(\'1R\')}},2q:q(){c.k.j(\'.1C\').1N(0,0);c.k.j(\'.2d\').1N(0,0);c.k.j(\'.24\').1N(0,0);c.k.j(\'.2e\').1N(0,0);c.k.j(\'.2a\').1N(0,0);c.k.j(\'.2w\').1N(0,0)},6b:q(){f h=c;f 2a=$(\'<a 1R="#" 1u="2a">2M</a>\');h.k.1G(2a);f 2v=(h.g.B-2a.C())/2;f 3D=0;l(h.g.2Y)2v-=25;l(h.g.51==h.g.4Z)3D=2a.C()+5;f 2m={r:2v};2D(h.g.4Z){J\'7F\':2m={r:5+3D,s:30};K;J\'7G\':2m={2f:5+3D,s:30};K;J\'7H\':2m={r:5+3D,3b:5,s:\'36\'};K;J\'7I\':2m={2f:5+3D,3b:5,s:\'36\'};K}2a.w(2m).I({V:0.3},h.g.2r);$(5u).9y(q(e){f 7J=(e.3E?e.3E:e.9z);l(7J==27)$(\'#4N\').5v(\'2O\')});f 5w=$(\'.k\').3r().s;f 2v=$(\'.k\').3r().r;h.k.j(\'.2a\').2O(q(){l(h.g.2R)Z R;h.g.2R=T;$(c).1U().I({V:0},h.g.2z);f 1p=$(\'<1p 4p="4N"></1p>\').H($(5u).H()).1q().1N(h.g.2r,0.98);f 7K=(($(32).H()-$(\'.k\').H())/2)+$(5u).9A();f 7L=($(32).C()-$(\'.k\').C())/2;h.k.7M(\'<1p 4p="4O"></1p>\');$(\'55\').7N(1p);$(\'55\').7N(h.k);h.k.w({\'s\':5w,\'r\':2v,\'2B\':\'54\',\'z-5S\':9B}).I({\'s\':7K,\'r\':7L},9C,\'3c\');$(\'#4O\').C($(\'.k\').C()).H($(\'.k\').H()).w({\'4z\':\'4P\'}).1N(2Q,0.3);Z R});$(\'#4N\').9D(\'2O\',q(){l($(c).9E(\'7O\'))Z R;h.g.2R=R;$(c).3n(\'7O\');l(!h.g.2q)h.k.j(\'.2a\').I({V:0.3},1w);h.k.1U().I({\'s\':5w,\'r\':2v},1w,\'3c\',q(){$(\'#4O\').7M(h.k);$(c).w({\'2B\':\'9F\',\'s\':0,\'r\':0});$(\'#4O\').29()});$(\'#4N\').1N(h.g.2z,0,q(){$(c).29()});Z R})},6c:q(){f h=c;f 2w=$(\'<a 1R="#" 1u="2w">7P</a>\');h.k.1G(2w);f 2v=(h.g.B-2w.C())/2;l(h.g.2M)2v+=25;f 2m={r:2v};2D(h.g.51){J\'7F\':2m={r:5,s:30};K;J\'7G\':2m={2f:5,s:30};K;J\'7H\':2m={r:5,3b:5,s:\'36\'};K;J\'7I\':2m={2f:5,3b:5,s:\'36\'};K}2w.w(2m).I({V:0.3},h.g.2r);2w.2O(q(){l(!h.g.2A){$(c).34(\'9G\');$(c).1N(1v,0.5).1N(1v,1);$(c).3n(\'7Q\');h.4M();h.g.2A=T;h.2F(T)}13{l(!h.g.19&&!h.k.j(\'.1F\').5V(\':9H\')){h.g.2c=0}13{h.44()}l(!h.g.1F)h.44();h.g.2A=R;$(c).34(\'7P\');$(c).1N(1v,0.5).1N(1v,1);$(c).5c(\'7Q\');l(!h.g.2Z){h.2F(T);l(!h.g.19&&h.g.1m.1A>1){h.31=3R(q(){h.41()},h.g.2L-h.g.2c);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1L a\').U({\'1R\':h.g.1P})}}}Z R})},5x:q(3M){f 4l=0,5y;1h(5y 7R 3M){l(3M.9I(5y))4l++}Z 4l},6d:q(){f h=c;f 1F=$(\'<1p 1u="1F"></1p>\');h.k.1G(1F);l(h.5x(h.g.2s)==0){l(3t(1F.w(\'C\'))>0){h.g.2s.C=3t(1F.w(\'C\'))}13{h.g.2s={C:h.g.B,H:5}}}l(h.5x(h.g.2s)>0&&h.g.2s.C==1X){h.g.2s.C=h.g.B}1F.w(h.g.2s).1q()},7S:q(){f h=c;l(h.g.2X||h.g.2A||h.g.3k||!h.g.1F)Z R;h.k.j(\'.1F\').1q().7T().C(h.g.2s.C).I({C:\'S\'},h.g.2L,\'7U\')},5h:q(){f h=c;l(!h.g.19){h.k.j(\'.1F\').1U()}},7V:q(){f h=c;l(h.g.2X||h.g.2A||!h.g.1F)Z R;h.k.j(\'.1F\').7T().I({C:h.g.2s.C},(h.g.2L-h.g.2c),\'7U\')},6W:q(){f h=c;l(!h.g.1F)Z R;h.k.j(\'.1F\').1U().9J(2Q,q(){$(c).C(h.g.2s.C)})},3P:q(){f h=c;h.g.3l=R;f 3F=2K 5z();h.g.2c=0;h.g.4g=3F.5A();h.7S()},4M:q(){f h=c;l(h.g.3l)Z R;h.g.3l=T;f 3F=2K 5z();h.g.2c+=3F.5A()-h.g.4g;h.5h()},44:q(){f h=c;h.g.3l=R;f 3F=2K 5z();h.g.4g=3F.5A();h.7V()},6e:q(){f h=c;$(32).9K(q(e){l(e.3E==39||e.3E==40){h.k.j(\'.24\').5v(\'2O\')}13 l(e.3E==37||e.3E==38){h.k.j(\'.2d\').5v(\'2O\')}})},4J:q(D){f n=$(\'<1p 1u="n"></1p>\');n.w({\'r\':D.r,\'s\':D.s,\'C\':D.C,\'H\':D.H,\'4z-1L\':\'5X(\'+D.1L+\')\',\'4z-2B\':D.2B.r+\'11 \'+D.2B.s+\'11\'});Z n},7r:q(45){f h=c;f 4Q=2K 4n();f 4R;5B(45.1A>0){4R=h.7W(0,45.1A-1);4Q[4Q.1A]=45[4R];45.9L(4R,1)}Z 4Q},7W:q(5C,7X){f 4S;9M 4S=E.1n();5B(4S==1);Z(4S*(7X-5C+1)+5C)|0},6j:q(){f h=c;$(32).4u(\'9N\',q(){h.g.3k=T;h.4M();h.2F(T)});$(32).4u(\'2M\',q(){l(h.g.1m.1A>1){h.g.3k=R;l(h.g.2c==0){h.3P()}13{h.44()}l(h.g.2c<=h.g.2L){h.2F(T);h.31=3R(q(){h.41()},h.g.2L-h.g.2c);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1L a\').U({\'1R\':h.g.1P})}}})}});$.2p.3W=q(3G){f w={};f 5D=[\'9O\',\'9P\',\'o\',\'9Q\'];1h(f 2x 7R 3G){1h(f i=0;i<5D.1A;i++)w[\'-\'+5D[i]+\'-\'+2x]=3G[2x];w[2x]=3G[2x]}c.w(w);Z c};f 46=\'9R\';$.2p.2j=q(2V){f 2g=$(c).w(\'1K\')||\'4P\';l(2n 2V==\'1X\'){l(2g){f m=2g.4T(/2j\\(([^)]+)\\)/);l(m&&m[1]){Z m[1]}}Z 0}f m=2V.7Y().4T(/^(-?\\d+(\\.\\d+)?)(.+)?$/);l(m){l(m[3])46=m[3];$(c).w(\'1K\',2g.7Z(/4P|2j\\([^)]*\\)/,\'\')+\'2j(\'+m[1]+46+\')\')}Z c};$.2p.2W=q(2V,4x,D){f 2g=$(c).w(\'1K\');l(2n 2V==\'1X\'){l(2g){f m=2g.4T(/2W\\(([^)]+)\\)/);l(m&&m[1]){Z m[1]}}Z 1}$(c).w(\'1K\',2g.7Z(/4P|2W\\([^)]*\\)/,\'\')+\'2W(\'+2V+\')\');Z c};f 81=$.2b.53.82;$.2b.53.82=q(){l(c.2x==\'2j\'){Z 3m($(c.4U).2j())}13 l(c.2x==\'2W\'){Z 3m($(c.4U).2W())}Z 81.5E(c,5F)};$.2b.83.2j=q(2b){$(2b.4U).2j(2b.84+46)};$.2b.83.2W=q(2b){$(2b.4U).2W(2b.84)};f 85=$.2p.I;$.2p.I=q(2x){l(2n 2x[\'2j\']!=\'1X\'){f m=2x[\'2j\'].7Y().4T(/^(([+-]=)?(-?\\d+(\\.\\d+)?))(.+)?$/);l(m&&m[5]){46=m[5]}2x[\'2j\']=m[1]}Z 85.5E(c,5F)};q 86(87){f 88=[\'1K\',\'9S\',\'9T\',\'9U\',\'9V\'];f p;5B(p=88.9W()){l(2n 87.2g[p]!=\'1X\'){Z p}}Z\'1K\'};f 2J=1x;f 89=$.2p.w;$.2p.w=q(2o,2V){l(2J===1x){l(2n $.8a!=\'1X\'){2J=$.8a}13 l(2n $.3G!=\'1X\'){2J=$.3G}13{2J={}}}l(2n 2J[\'1K\']==\'1X\'&&(2o==\'1K\'||(2n 2o==\'8b\'&&2n 2o[\'1K\']!=\'1X\'))){2J[\'1K\']=86(c.8c(0))}l(2J[\'1K\']!=\'1K\'){l(2o==\'1K\'){2o=2J[\'1K\'];l(2n 2V==\'1X\'&&4L.2g){Z 4L.2g(c.8c(0),2o)}}13 l(2n 2o==\'8b\'&&2n 2o[\'1K\']!=\'1X\'){2o[2J[\'1K\']]=2o[\'1K\'];9X 2o[\'1K\']}}Z 89.5E(c,5F)}})(4L);',62,618,'||||||||||||this|||var|settings|self||find|box_skitter|if||box_clone|||function|left|top|total||width_box|css||||height_box|width_skitter|width|options|Math|time_animate|delay_time|height|animate|case|break|easing|ceil|easing_default|height_skitter|img|callback|false|show|true|attr|opacity|src|col_t|_btop|return||px||else|col|||_bleft|_vleft|is_animating|image_main|delay|_vtop|addBoxClone|init_top|velocity|init_left|for|image_old|division_h|finishAnimation|setActualLevel|images_links|random|_vleft_image|div|hide|_vtop_image|image_atual|division_w|class|100|200|null|getBoxClone|image_i|length|size_box|info_slide|_ileftc|radius|progressbar|append|_ftop|_ileft|_itop|transform|image|500|fadeTo|easeOutQuad|link_atual|opacity_elements|href|extend|class_info|stop|getBoxCloneImgOld|img_clone|undefined|image_number|setLinkAtual||_itopc|box_clone1|box_clone2|next_button||animation_type||target|remove|focus_button|fx|elapsedTime|prev_button|label_skitter|right|style|box_clone_next|_fleft|rotate|box_clone_next1|box_clone_next2|cssPosition|typeof|arg|fn|hideTools|interval_in_elements|progressbar_css|400|direction|_left|play_pause_button|prop|label|interval_out_elements|is_paused|position|ul|switch|loading|clearTimer|100px|easing_old|easing_new|_propsObj|new|interval|focus|info_slide_thumb|click|number_skitter|300|foucs_active|span|link|_fleftc|val|scale|is_hover_box_skitter|controls|stop_over||timer|window|image_number_select|html|new_x|auto||||default|bottom|easeOutExpo|easeInOutQuad|sk|label_atual|target_atual|animateNumberOut|xml|preview|is_blur|is_paused_time|parseFloat|addClass|rel|text|li|offset|hover|parseInt|queue|_i_animation|_ftopc|_itopn|_ileftn|_ftopn|_fleftn|spread|pow|_space|keyCode|date|props|skitter|each|dots|width_label|auto_play|obj|w_info_slide_thumb|fadeIn|startTime|setValueBoxText|setTimeout|animations_functions|animationDirection|700|getRandom|css3|line|box_clone_main|box_clone_container||completeMove|setHideTools||resumeTime|arrayOrigem|rotateUnits|animation|numbers|navigation|random_ia|thumbs|animateNumberOver|animateNumberActive|fullscreen|center|timeStart|with_animations|labelAnimation|slideUp|container_skitter|size|initial_select_class|Array|dimension_thumb|id|type|width_info_slide|width_value|jumpToImage|bind|imageNumber|preview_slide|duration|image_loading|background|img_link|resizeImage|nextImage|easeInQuad|delay_type|sequence|easeInOutExpo|order|mod|getBoxCloneBackground|border|jQuery|pauseTime|overlay_skitter|mark_position|none|arrayDestino|indice|numRandom|match|elem|_self|onLoad|imageSwitched|numbers_align|focus_position||controls_position|theme|prototype|absolute|body|addImageLink|image_n_|_|width_image|x_value|info_slide_dots|removeClass|mouseover|init_pause|showBoxText|mouseOverInit|pauseProgressBar|animationCube|animationCubeStop|animationShowBars|animationTube|animationBlindDimension|animationDirectionBars|animationSwapBars|easeOutBack|150|vleft|sqrt|easeOutCirc|document|trigger|_top|objectSize|key|Date|getTime|while|valorIni|prefixes|apply|arguments|skitters|data|skitter_number|push|defaults|show_randomly|enable_navigation_keys|mouseOverButton|mouseOutButton|structure|number|setup|index|1000|or|is|getEasing|url|container_thumbs|copy_info_slide|y_value|novo_width|15px|sort|mouseleave|width_preview_ul|_left_info|_left_image|_left_preview|_left_ul|easeOutSine|focusSkitter|setControls|addProgressBar|enableNavigationKeys|loadImages|self_il|start|images|windowFocusOut|stopOnMouseOver|isFunction|floor|cube|cubeRandom|block|cubeStop|cubeStopRandom|cubeHide|cubeSize|horizontal|showBars|showBarsRandom|tube|fade|fadeFour|paralell|blind|blindHeight|blindWidth|directionTop|directionBottom|directionRight|directionLeft|cubeSpread|glassCube|glassBlock|circles|circlesInside|circlesRotate|cubeShow|upBars|downBars|hideBars|swapBars|swapBarsBack|swapBlocks|cut|hideProgressBar|random_id|total_with_animations|animationBlock||animationCubeHide|animationCubeSize|animationHorizontal|animationFade||animationFadeFour|animationParalell|animationBlind|animationCubeSpread|animationCubeJelly|animationGlassCube|animationGlassBlock|animationCircles|animationCirclesInside|animationCirclesRotate|animationCubeShow|animationHideBars|animationSwapBlocks|animationCut|easeInBack|20px|600|easeOutElastic|800|1400|zebra|shuffleArray|_rotate|20deg|setImageLink|addClassNumber|hideBoxText|increasingImage|name_image|link_image|label_image|target_link|easing_accepts|fixed|out|leftTop|rightTop|leftBottom|rightBottom|code|_topFinal|_leftFinal|before|prepend|finish_overlay_skitter|pause|play_button|in|startProgressBar|dequeue|linear|resumeProgressBar|randomUnique|valorFim|toString|replace||curProxied|cur|step|now|animateProxied|getTransformProperty|element|properties|proxied|cssProps|object|get|2500|time_interval|max_number_height|prev|next|overflown|hidden|console|warn|Width|Skitter|Slideshow|ajax|GET|async|dataType|success|slide|json|label_text|clone|outerWidth|mousemove|pageX|pageY|scroll_thumbs|box_scroll_thumbs|5px|0px|eq|mouseenter|image_current_preview|preview_slide_current|Loading|9999em|Image|load|error|color|white|black|Error|One|more|were|not|found|1500|randomSmart||cubeJelly|1200|120|browser|mozilla|last|900||easeInCubic|easeOutCubic|easeInOutCubic|easeInQuart|easeOutQuart|easeInOutQuart|easeInQuint|easeOutQuint|easeInOutQuint|easeInSine|easeInOutSine|easeInExpo|easeInCirc|easeInOutCirc|easeInElastic|easeInOutElastic|easeInOutBack|easeInBounce|easeOutBounce|easeInOutBounce|inArray|slideDown|force|clearInterval|removeAttr|keypress|which|scrollTop|9999|2000|live|hasClass|relative|play|visible|hasOwnProperty|fadeOut|keydown|splice|do|blur|moz|ms|webkit|deg|WebkitTransform|msTransform|MozTransform|OTransform|shift|delete'.split('|'),0,{}))

$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'center',
				progressbar: false, 
				dots: true, 
				hideTools: true,
				label: false,
				preview: false,
				interval: 10000,
			});
});
(function(){var g=void 0,h=!0,i=null,k=!1,aa=encodeURIComponent,ba=Infinity,ca=setTimeout,l=Math,da=decodeURIComponent;function ea(a,b){return a.name=b}
var n="push",ha="test",ia="slice",p="replace",ja="load",ka="floor",la="charAt",ma="value",q="indexOf",na="match",oa="port",pa="createElement",qa="path",r="name",u="host",v="toString",w="length",x="prototype",ra="clientWidth",y="split",sa="stopPropagation",ta="scope",z="location",ua="search",A="protocol",va="clientHeight",wa="href",B="substring",xa="apply",ya="navigator",C="join",D="toLowerCase",E;function za(a,b){switch(b){case 0:return""+a;case 1:return 1*a;case 2:return!!a;case 3:return 1E3*a}return a}function Aa(a){return"function"==typeof a}function Ba(a){return a!=g&&-1<(a.constructor+"")[q]("String")}function F(a,b){return g==a||"-"==a&&!b||""==a}function Ca(a){if(!a||""==a)return"";for(;a&&-1<" \n\r\t"[q](a[la](0));)a=a[B](1);for(;a&&-1<" \n\r\t"[q](a[la](a[w]-1));)a=a[B](0,a[w]-1);return a}function Da(){return l.round(2147483647*l.random())}function Ea(){}
function G(a,b){if(aa instanceof Function)return b?encodeURI(a):aa(a);H(68);return escape(a)}function I(a){a=a[y]("+")[C](" ");if(da instanceof Function)try{return da(a)}catch(b){H(17)}else H(68);return unescape(a)}var Fa=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,!!d):a.attachEvent&&a.attachEvent("on"+b,c)},Ga=function(a,b,c,d){a.removeEventListener?a.removeEventListener(b,c,!!d):a.detachEvent&&a.detachEvent("on"+b,c)};
function Ha(a,b){if(a){var c=J[pa]("script");c.type="text/javascript";c.async=h;c.src=a;c.id=b;var d=J.getElementsByTagName("script")[0];d.parentNode.insertBefore(c,d);return c}}function K(a){return a&&0<a[w]?a[0]:""}function L(a){var b=a?a[w]:0;return 0<b?a[b-1]:""}var Ja=function(){this.prefix="ga.";this.R={}};Ja[x].set=function(a,b){this.R[this.prefix+a]=b};Ja[x].get=function(a){return this.R[this.prefix+a]};Ja[x].contains=function(a){return this.get(a)!==g};function Ka(a){0==a[q]("www.")&&(a=a[B](4));return a[D]()}function La(a,b){var c,d={url:a,protocol:"http",host:"",path:"",d:new Ja,anchor:""};if(!a)return d;c=a[q]("://");0<=c&&(d.protocol=a[B](0,c),a=a[B](c+3));c=a[ua]("/|\\?|#");if(0<=c)d.host=a[B](0,c)[D](),a=a[B](c);else return d.host=a[D](),d;c=a[q]("#");0<=c&&(d.anchor=a[B](c+1),a=a[B](0,c));c=a[q]("?");0<=c&&(Ma(d.d,a[B](c+1)),a=a[B](0,c));d.anchor&&b&&Ma(d.d,d.anchor);a&&"/"==a[la](0)&&(a=a[B](1));d.path=a;return d}
function Na(a,b){function c(a){var b=(a.hostname||"")[y](":")[0][D](),c=(a[A]||"")[D](),c=1*a[oa]||("http:"==c?80:"https:"==c?443:"");a=a.pathname||"";0==a[q]("/")||(a="/"+a);return[b,""+c,a]}var d=b||J[pa]("a");d.href=J[z][wa];var e=(d[A]||"")[D](),f=c(d),j=d[ua]||"",m=e+"//"+f[0]+(f[1]?":"+f[1]:"");0==a[q]("//")?a=e+a:0==a[q]("/")?a=m+a:!a||0==a[q]("?")?a=m+f[2]+(a||j):0>a[y]("/")[0][q](":")&&(a=m+f[2][B](0,f[2].lastIndexOf("/"))+"/"+a);d.href=a;e=c(d);return{protocol:(d[A]||"")[D](),host:e[0],
port:e[1],path:e[2],Oa:d[ua]||"",url:a||""}}function Ma(a,b){function c(b,c){a.contains(b)||a.set(b,[]);a.get(b)[n](c)}for(var d=Ca(b)[y]("&"),e=0;e<d[w];e++)if(d[e]){var f=d[e][q]("=");0>f?c(d[e],"1"):c(d[e][B](0,f),d[e][B](f+1))}}function Oa(a,b){if(F(a)||"["==a[la](0)&&"]"==a[la](a[w]-1))return"-";var c=J.domain;return a[q](c+(b&&"/"!=b?b:""))==(0==a[q]("http://")?7:0==a[q]("https://")?8:0)?"0":a};var Pa=0;function Qa(a,b,c){!(1<=Pa)&&!(1<=100*l.random())&&(a=["utmt=error","utmerr="+a,"utmwv=5.3.7","utmn="+Da(),"utmsp=1"],b&&a[n]("api="+b),c&&a[n]("msg="+G(c[B](0,100))),M.w&&a[n]("aip=1"),Ra(a[C]("&")),Pa++)};var Sa=0,Ta={};function N(a){return Va("x"+Sa++,a)}function Va(a,b){Ta[a]=!!b;return a}
var Wa=N(),Xa=Va("anonymizeIp"),Ya=N(),Za=N(),$a=N(),ab=N(),O=N(),P=N(),bb=N(),cb=N(),db=N(),eb=N(),fb=N(),gb=N(),ib=N(),jb=N(),kb=N(),lb=N(),mb=N(),nb=N(),ob=N(),pb=N(),qb=N(),rb=N(),sb=N(),tb=N(),ub=N(),vb=N(),wb=N(),xb=N(),yb=N(),zb=N(),Ab=N(),Bb=N(),Cb=N(),Db=N(),Eb=N(h),Fb=Va("currencyCode"),Gb=Va("page"),Hb=Va("title"),Ib=N(),Jb=N(),Kb=N(),Lb=N(),Mb=N(),Nb=N(),Ob=N(),Pb=N(),Qb=N(),Q=N(h),Rb=N(h),Sb=N(h),Tb=N(h),Ub=N(h),Vb=N(h),Xb=N(h),Yb=N(h),Zb=N(h),$b=N(h),ac=N(h),R=N(h),bc=N(h),cc=N(h),dc=
N(h),ec=N(h),fc=N(h),gc=N(h),hc=N(h),S=N(h),ic=N(h),jc=N(h),kc=N(h),lc=N(h),mc=N(h),nc=N(h),oc=N(h),pc=Va("campaignParams"),qc=N(),rc=Va("hitCallback"),sc=N();N();var tc=N(),uc=N(),vc=N(),wc=N(),xc=N(),yc=N(),zc=N(),Ac=N(),Bc=N(),Cc=N(),Dc=N(),Ec=N();N();var Fc=N(),Gc=N(),Kc=N();function Lc(a){var b=this.plugins_;if(b)return b.get(a)}var T=function(a,b,c,d){a[b]=function(){try{return d!=g&&H(d),c[xa](this,arguments)}catch(a){throw Qa("exc",b,a&&a[r]),a;}}},Mc=function(a,b,c,d){U[x][a]=function(){try{return H(c),za(this.a.get(b),d)}catch(e){throw Qa("exc",a,e&&e[r]),e;}}},V=function(a,b,c,d,e){U[x][a]=function(f){try{H(c),e==g?this.a.set(b,za(f,d)):this.a.set(b,e)}catch(j){throw Qa("exc",a,j&&j[r]),j;}}};var Nc=RegExp(/(^|\.)doubleclick\.net$/i),Oc=function(a,b){return Nc[ha](J[z].hostname)?h:"/"!==b?k:(0==a[q]("www.google.")||0==a[q](".google.")||0==a[q]("google."))&&!(-1<a[q]("google.org"))?h:k},Pc=function(a){var b=a.get(ab),c=a.c(P,"/");Oc(b,c)&&a[sa]()};var Vc=function(){var a={},b={},c=new Qc;this.g=function(a,b){c.add(a,b)};var d=new Qc;this.e=function(a,b){d.add(a,b)};var e=k,f=k,j=h;this.T=function(){e=h};this.j=function(a){this[ja]();this.set(qc,a,h);a=new Rc(this);e=k;d.execute(this);e=h;b={};this.n();a.Ja()};this.load=function(){e&&(e=k,this.Ka(),Sc(this),f||(f=h,c.execute(this),Tc(this),Sc(this)),e=h)};this.n=function(){if(e)if(f)e=k,Tc(this),e=h;else this[ja]()};this.get=function(c){Ta[c]&&this[ja]();return b[c]!==g?b[c]:a[c]};this.set=
function(c,d,e){Ta[c]&&this[ja]();e?b[c]=d:a[c]=d;Ta[c]&&this.n()};this.z=function(b){a[b]=this.b(b,0)+1};this.b=function(a,b){var c=this.get(a);return c==g||""===c?b:1*c};this.c=function(a,b){var c=this.get(a);return c==g?b:c+""};this.Ka=function(){if(j){var b=this.c(ab,""),c=this.c(P,"/");Oc(b,c)||(a[O]=a[gb]&&""!=b?Uc(b):1,j=k)}}};Vc[x].stopPropagation=function(){throw"aborted";};
var Rc=function(a){var b=this;this.q=0;var c=a.get(rc);this.Ua=function(){0<b.q&&c&&(b.q--,b.q||c())};this.Ja=function(){!b.q&&c&&ca(c,10)};a.set(sc,b,h)};function Wc(a,b){b=b||[];for(var c=0;c<b[w];c++){var d=b[c];if(""+a==d||0==d[q](a+"."))return d}return"-"}
var Yc=function(a,b,c){c=c?"":a.c(O,"1");b=b[y](".");if(6!==b[w]||Xc(b[0],c))return k;c=1*b[1];var d=1*b[2],e=1*b[3],f=1*b[4];b=1*b[5];if(!(0<=c&&0<d&&0<e&&0<f&&0<=b))return k;a.set(Q,c);a.set(Ub,d);a.set(Vb,e);a.set(Xb,f);a.set(Yb,b);return h},Zc=function(a){var b=a.get(Q),c=a.get(Ub),d=a.get(Vb),e=a.get(Xb),f=a.b(Yb,1);return[a.b(O,1),b!=g?b:"-",c||"-",d||"-",e||"-",f][C](".")},$c=function(a){return[a.b(O,1),a.b(ac,0),a.b(R,1),a.b(bc,0)][C](".")},ad=function(a,b,c){c=c?"":a.c(O,"1");var d=b[y](".");
if(4!==d[w]||Xc(d[0],c))d=i;a.set(ac,d?1*d[1]:0);a.set(R,d?1*d[2]:10);a.set(bc,d?1*d[3]:a.get($a));return d!=i||!Xc(b,c)},bd=function(a,b){var c=G(a.c(Sb,"")),d=[],e=a.get(Eb);if(!b&&e){for(var f=0;f<e[w];f++){var j=e[f];j&&1==j[ta]&&d[n](f+"="+G(j[r])+"="+G(j[ma])+"=1")}0<d[w]&&(c+="|"+d[C]("^"))}return c?a.b(O,1)+"."+c:i},cd=function(a,b,c){c=c?"":a.c(O,"1");b=b[y](".");if(2>b[w]||Xc(b[0],c))return k;b=b[ia](1)[C](".")[y]("|");0<b[w]&&a.set(Sb,I(b[0]));if(1>=b[w])return h;b=b[1][y](-1==b[1][q](",")?
"^":",");for(c=0;c<b[w];c++){var d=b[c][y]("=");if(4==d[w]){var e={};ea(e,I(d[1]));e.value=I(d[2]);e.scope=1;a.get(Eb)[d[0]]=e}}return h},dd=function(a){var b;b=function(b,e){if(!F(a.get(b))){var f=a.c(b,""),f=f[y](" ")[C]("%20"),f=f[y]("+")[C]("%20");c[n](e+"="+f)}};var c=[];b(gc,"utmcid");b(lc,"utmcsr");b(S,"utmgclid");b(ic,"utmgclsrc");b(jc,"utmdclid");b(kc,"utmdsid");b(hc,"utmccn");b(mc,"utmcmd");b(nc,"utmctr");b(oc,"utmcct");return(b=c[C]("|"))?[a.b(O,1),a.b(cc,0),a.b(dc,1),a.b(ec,1),b][C]("."):
""},ed=function(a,b,c){c=c?"":a.c(O,"1");b=b[y](".");if(5>b[w]||Xc(b[0],c))return a.set(cc,g),a.set(dc,g),a.set(ec,g),a.set(gc,g),a.set(hc,g),a.set(lc,g),a.set(mc,g),a.set(nc,g),a.set(oc,g),a.set(S,g),a.set(ic,g),a.set(jc,g),a.set(kc,g),k;a.set(cc,1*b[1]);a.set(dc,1*b[2]);a.set(ec,1*b[3]);var d=b[ia](4)[C](".");b=function(a){return(a=d[na](a+"=(.*?)(?:\\|utm|$)"))&&2==a[w]?a[1]:g};c=function(b,c){c?(c=e?I(c):c[y]("%20")[C](" "),a.set(b,c)):F(a.get(b))||H(110)};-1==d[q]("=")&&(d=I(d));var e="2"==b("utmcvr");
c(gc,b("utmcid"));c(hc,b("utmccn"));c(lc,b("utmcsr"));c(mc,b("utmcmd"));c(nc,b("utmctr"));c(oc,b("utmcct"));c(S,b("utmgclid"));c(ic,b("utmgclsrc"));c(jc,b("utmdclid"));c(kc,b("utmdsid"));return h},Xc=function(a,b){return b?a!=b:!/^\d+$/[ha](a)};var Qc=function(){this.filters=[]};Qc[x].add=function(a,b){this.filters[n]({name:a,s:b})};Qc[x].execute=function(a){try{for(var b=0;b<this.filters[w];b++)this.filters[b].s.call(W,a)}catch(c){}};function fd(a){100!=a.get(ub)&&a.get(Q)%1E4>=100*a.get(ub)&&a[sa]()}function gd(a){hd(a.get(Wa))&&a[sa]()}function id(a){"file:"==J[z][A]&&a[sa]()}function jd(a){a.get(Hb)||a.set(Hb,J.title,h);a.get(Gb)||a.set(Gb,J[z].pathname+J[z][ua],h)};var kd=new function(){var a=[];this.set=function(b){a[b]=h};this.Xa=function(){for(var b=[],c=0;c<a[w];c++)a[c]&&(b[l[ka](c/6)]=b[l[ka](c/6)]^1<<c%6);for(c=0;c<b[w];c++)b[c]="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_"[la](b[c]||0);return b[C]("")+"~"}};function H(a){kd.set(a)};var W=window,J=document,hd=function(a){var b=W._gaUserPrefs;return b&&b.ioo&&b.ioo()||!!a&&W["ga-disable-"+a]===h},ld=function(a){var b=[],c=J.cookie[y](";");a=RegExp("^\\s*"+a+"=\\s*(.*?)\\s*$");for(var d=0;d<c[w];d++){var e=c[d][na](a);e&&b[n](e[1])}return b},X=function(a,b,c,d,e,f){e=hd(e)?k:Oc(d,c)?k:h;if(e){if(b&&0<=W[ya].userAgent[q]("Firefox")){b=b[p](/\n|\r/g," ");e=0;for(var j=b[w];e<j;++e){var m=b.charCodeAt(e)&255;if(10==m||13==m)b=b[B](0,e)+"?"+b[B](e+1)}}b&&2E3<b[w]&&(b=b[B](0,2E3),H(69));
a=a+"="+b+"; path="+c+"; ";f&&(a+="expires="+(new Date((new Date).getTime()+f)).toGMTString()+"; ");d&&(a+="domain="+d+";");J.cookie=a}};var md,nd,od=function(){if(!md){var a={},b=W[ya],c=W.screen;a.Q=c?c.width+"x"+c.height:"-";a.P=c?c.colorDepth+"-bit":"-";a.language=(b&&(b.language||b.browserLanguage)||"-")[D]();a.javaEnabled=b&&b.javaEnabled()?1:0;a.characterSet=J.characterSet||J.charset||"-";try{var d=J.documentElement,e=J.body,f=e&&e[ra]&&e[va],b=[];d&&(d[ra]&&d[va])&&("CSS1Compat"===J.compatMode||!f)?b=[d[ra],d[va]]:f&&(b=[e[ra],e[va]]);a.Wa=b[C]("x")}catch(j){H(135)}md=a}},pd=function(){od();for(var a=md,b=W[ya],a=b.appName+
b.version+a.language+b.platform+b.userAgent+a.javaEnabled+a.Q+a.P+(J.cookie?J.cookie:"")+(J.referrer?J.referrer:""),b=a[w],c=W.history[w];0<c;)a+=c--^b++;return Uc(a)},qd=function(a){od();var b=md;a.set(Kb,b.Q);a.set(Lb,b.P);a.set(Ob,b.language);a.set(Pb,b.characterSet);a.set(Mb,b.javaEnabled);a.set(Qb,b.Wa);if(a.get(ib)&&a.get(jb)){if(!(b=nd)){var c,d,e;d="ShockwaveFlash";if((b=(b=W[ya])?b.plugins:g)&&0<b[w])for(c=0;c<b[w]&&!e;c++)d=b[c],-1<d[r][q]("Shockwave Flash")&&(e=d.description[y]("Shockwave Flash ")[1]);
else{d=d+"."+d;try{c=new ActiveXObject(d+".7"),e=c.GetVariable("$version")}catch(f){}if(!e)try{c=new ActiveXObject(d+".6"),e="WIN 6,0,21,0",c.AllowScriptAccess="always",e=c.GetVariable("$version")}catch(j){}if(!e)try{c=new ActiveXObject(d),e=c.GetVariable("$version")}catch(m){}e&&(e=e[y](" ")[1][y](","),e=e[0]+"."+e[1]+" r"+e[2])}b=e?e:"-"}nd=b;a.set(Nb,nd)}else a.set(Nb,"-")};var rd=function(a){if(Aa(a))this.s=a;else{var b=a[0],c=b.lastIndexOf(":"),d=b.lastIndexOf(".");this.h=this.i=this.l="";-1==c&&-1==d?this.h=b:-1==c&&-1!=d?(this.i=b[B](0,d),this.h=b[B](d+1)):-1!=c&&-1==d?(this.l=b[B](0,c),this.h=b[B](c+1)):c>d?(this.i=b[B](0,d),this.l=b[B](d+1,c),this.h=b[B](c+1)):(this.i=b[B](0,d),this.h=b[B](d+1));this.k=a[ia](1);this.Ma=!this.l&&"_require"==this.h;this.J=!this.i&&!this.l&&"_provide"==this.h}},Y=function(){T(Y[x],"push",Y[x][n],5);T(Y[x],"_getPlugin",Lc,121);T(Y[x],
"_createAsyncTracker",Y[x].Sa,33);T(Y[x],"_getAsyncTracker",Y[x].Ta,34);this.I=new Ja;this.p=[]};E=Y[x];E.Na=function(a,b,c){var d=this.I.get(a);if(!Aa(d))return k;b.plugins_=b.plugins_||new Ja;b.plugins_.set(a,new d(b,c||{}));return h};E.push=function(a){var b=Z.Va[xa](this,arguments),b=Z.p.concat(b);for(Z.p=[];0<b[w]&&!Z.O(b[0])&&!(b.shift(),0<Z.p[w]););Z.p=Z.p.concat(b);return 0};E.Va=function(a){for(var b=[],c=0;c<arguments[w];c++)try{var d=new rd(arguments[c]);d.J?this.O(d):b[n](d)}catch(e){}return b};
E.O=function(a){try{if(a.s)a.s[xa](W);else if(a.J)this.I.set(a.k[0],a.k[1]);else{var b="_gat"==a.i?M:"_gaq"==a.i?Z:M.u(a.i);if(a.Ma){if(!this.Na(a.k[0],b,a.k[2])){if(!a.Pa){var c=Na(""+a.k[1]);var d=c[A],e=J[z][A];var f;if(f="https:"==d||d==e?h:"http:"!=d?k:"http:"==e){var j;a:{var m=Na(J[z][wa]);if(!(c.Oa||0<=c.url[q]("?")||0<=c[qa][q]("://")||c[u]==m[u]&&c[oa]==m[oa]))for(var s="http:"==c[A]?80:443,t=M.S,b=0;b<t[w];b++)if(c[u]==t[b][0]&&(c[oa]||s)==(t[b][1]||s)&&0==c[qa][q](t[b][2])){j=h;break a}j=
k}f=j&&!hd()}f&&(a.Pa=Ha(c.url))}return h}}else a.l&&(b=b.plugins_.get(a.l)),b[a.h][xa](b,a.k)}}catch(Ua){}};E.Sa=function(a,b){return M.r(a,b||"")};E.Ta=function(a){return M.u(a)};var ud=function(){function a(a,b,c,d){g==f[a]&&(f[a]={});g==f[a][b]&&(f[a][b]=[]);f[a][b][c]=d}function b(a,b,c){if(g!=f[a]&&g!=f[a][b])return f[a][b][c]}function c(a,b){if(g!=f[a]&&g!=f[a][b]){f[a][b]=g;var c=h,d;for(d=0;d<j[w];d++)if(g!=f[a][j[d]]){c=k;break}c&&(f[a]=g)}}function d(a){var b="",c=k,d,e;for(d=0;d<j[w];d++)if(e=a[j[d]],g!=e){c&&(b+=j[d]);for(var c=[],f=g,ga=g,ga=0;ga<e[w];ga++)if(g!=e[ga]){f="";ga!=hb&&g==e[ga-1]&&(f+=ga[v]()+Ua);for(var Bd=e[ga],Hc="",Wb=g,Ic=g,Jc=g,Wb=0;Wb<Bd[w];Wb++)Ic=
Bd[la](Wb),Jc=Ia[Ic],Hc+=g!=Jc?Jc:Ic;f+=Hc;c[n](f)}b+=m+c[C](t)+s;c=k}else c=h;return b}var e=this,f=[],j=["k","v"],m="(",s=")",t="*",Ua="!",Ia={"'":"'0"};Ia[s]="'1";Ia[t]="'2";Ia[Ua]="'3";var hb=1;e.Ra=function(a){return g!=f[a]};e.A=function(){for(var a="",b=0;b<f[w];b++)g!=f[b]&&(a+=b[v]()+d(f[b]));return a};e.Qa=function(a){if(a==g)return e.A();for(var b=a.A(),c=0;c<f[w];c++)g!=f[c]&&!a.Ra(c)&&(b+=c[v]()+d(f[c]));return b};e.f=function(b,c,d){if(!sd(d))return k;a(b,"k",c,d);return h};e.o=function(b,
c,d){if(!td(d))return k;a(b,"v",c,d[v]());return h};e.getKey=function(a,c){return b(a,"k",c)};e.N=function(a,c){return b(a,"v",c)};e.L=function(a){c(a,"k")};e.M=function(a){c(a,"v")};T(e,"_setKey",e.f,89);T(e,"_setValue",e.o,90);T(e,"_getKey",e.getKey,87);T(e,"_getValue",e.N,88);T(e,"_clearKey",e.L,85);T(e,"_clearValue",e.M,86)};function sd(a){return"string"==typeof a}function td(a){return"number"!=typeof a&&(g==Number||!(a instanceof Number))||l.round(a)!=a||NaN==a||a==ba?k:h};var vd=function(a){var b=W.gaGlobal;a&&!b&&(W.gaGlobal=b={});return b},wd=function(){var a=vd(h).hid;a==i&&(a=Da(),vd(h).hid=a);return a},xd=function(a){a.set(Jb,wd());var b=vd();if(b&&b.dh==a.get(O)){var c=b.sid;c&&("0"==c&&H(112),a.set(Xb,c),a.get(Rb)&&a.set(Vb,c));b=b.vid;a.get(Rb)&&b&&(b=b[y]("."),1*b[1]||H(112),a.set(Q,1*b[0]),a.set(Ub,1*b[1]))}};var yd,Cd=function(a,b,c){var d=a.c(ab,""),e=a.c(P,"/"),f=a.b(bb,0);a=a.c(Wa,"");X(b,c,e,d,a,f)},Tc=function(a){var b=a.c(ab,"");a.b(O,1);var c=a.c(P,"/"),d=a.c(Wa,"");X("__utma",Zc(a),c,b,d,a.get(bb));X("__utmb",$c(a),c,b,d,a.get(cb));X("__utmc",""+a.b(O,1),c,b,d);var e=dd(a,h);e?X("__utmz",e,c,b,d,a.get(db)):X("__utmz","",c,b,"",-1);(e=bd(a,k))?X("__utmv",e,c,b,d,a.get(bb)):X("__utmv","",c,b,"",-1)},Sc=function(a){var b=a.b(O,1);if(!Yc(a,Wc(b,ld("__utma"))))return a.set(Tb,h),k;var c=!ad(a,Wc(b,
ld("__utmb")));a.set($b,c);ed(a,Wc(b,ld("__utmz")));cd(a,Wc(b,ld("__utmv")));yd=!c;return h},Dd=function(a){!yd&&!(0<ld("__utmb")[w])&&(X("__utmd","1",a.c(P,"/"),a.c(ab,""),a.c(Wa,""),1E4),0==ld("__utmd")[w]&&a[sa]())};var Gd=function(a){a.get(Q)==g?Ed(a):a.get(Tb)&&!a.get(Fc)?Ed(a):a.get($b)&&Fd(a)},Hd=function(a){a.get(fc)&&!a.get(Zb)&&(Fd(a),a.set(dc,a.get(Yb)))},Ed=function(a){var b=a.get($a);a.set(Rb,h);a.set(Q,Da()^pd(a)&2147483647);a.set(Sb,"");a.set(Ub,b);a.set(Vb,b);a.set(Xb,b);a.set(Yb,1);a.set(Zb,h);a.set(ac,0);a.set(R,10);a.set(bc,b);a.set(Eb,[]);a.set(Tb,k);a.set($b,k)},Fd=function(a){a.set(Vb,a.get(Xb));a.set(Xb,a.get($a));a.z(Yb);a.set(Zb,h);a.set(ac,0);a.set(R,10);a.set(bc,a.get($a));a.set($b,k)};var Id="daum:q eniro:search_word naver:query pchome:q images.google:q google:q yahoo:p yahoo:q msn:q bing:q aol:query aol:q lycos:q lycos:query ask:q netscape:query cnn:query about:terms mamma:q voila:rdata virgilio:qs live:q baidu:wd alice:qs yandex:text najdi:q seznam:q rakuten:qt biglobe:q goo.ne:MT wp:szukaj onet:qt yam:k kvasir:q ozu:q terra:query rambler:query conduit:q babylon:q search-results:q avg:q comcast:q incredimail:q startsiden:q go.mail.ru:q search.centrum.cz:q".split(" "),Pd=function(a){if(a.get(kb)&&
!a.get(Fc)){for(var b=!F(a.get(gc))||!F(a.get(lc))||!F(a.get(S))||!F(a.get(jc)),c={},d=0;d<Jd[w];d++){var e=Jd[d];c[e]=a.get(e)}(d=a.get(pc))?(H(149),e=new Ja,Ma(e,d),d=e):d=La(J[z][wa],a.get(fb)).d;if(!("1"==L(d.get(a.get(tb)))&&b)){var f=d,j=function(b,c){c=c||"-";var d=L(f.get(a.get(b)));return d&&"-"!=d?I(d):c},d=L(f.get(a.get(mb)))||"-",e=L(f.get(a.get(pb)))||"-",m=L(f.get(a.get(ob)))||"-",s=L(f.get("gclsrc"))||"-",t=L(f.get("dclid"))||"-",Ua=j(nb,"(not set)"),Ia=j(qb,"(not set)"),hb=j(rb),j=
j(sb);if(F(d)&&F(m)&&F(t)&&F(e))d=k;else{var zd=!F(t)&&F(e),Ad=F(hb);if(zd||Ad){var fa=Kd(a),fa=La(fa,h);if((fa=Ld(a,fa))&&!F(fa[1]&&!fa[2]))zd&&(e=fa[0]),Ad&&(hb=fa[1])}Md(a,d,e,m,s,t,Ua,Ia,hb,j);d=h}d=d||Nd(a);!d&&(!b&&a.get(Zb))&&(Md(a,g,"(direct)",g,g,g,"(direct)","(none)",g,g),d=h);if(d&&(a.set(fc,Od(a,c)),b="(direct)"==a.get(lc)&&"(direct)"==a.get(hc)&&"(none)"==a.get(mc),a.get(fc)||a.get(Zb)&&!b))a.set(cc,a.get($a)),a.set(dc,a.get(Yb)),a.z(ec)}}},Nd=function(a){var b=Kd(a),c=La(b,h);if(!(b!=
g&&b!=i&&""!=b&&"0"!=b&&"-"!=b&&0<=b[q]("://"))||c&&-1<c[u][q]("google")&&c.d.contains("q")&&"cse"==c[qa])return k;if((b=Ld(a,c))&&!b[2])return Md(a,g,b[0],g,g,g,"(organic)","organic",b[1],g),h;if(b||!a.get(Zb))return k;a:{for(var b=a.get(Ab),d=Ka(c[u]),e=0;e<b[w];++e)if(-1<d[q](b[e])){a=k;break a}Md(a,g,d,g,g,g,"(referral)","referral",g,"/"+c[qa]);a=h}return a},Ld=function(a,b){for(var c=a.get(yb),d=0;d<c[w];++d){var e=c[d][y](":");if(-1<b[u][q](e[0][D]())){var f=b.d.get(e[1]);if(f&&(f=K(f),!f&&
-1<b[u][q]("google.")&&(f="(not provided)"),!e[3]||-1<b.url[q](e[3]))){a:{for(var c=f,d=a.get(zb),c=I(c)[D](),j=0;j<d[w];++j)if(c==d[j]){c=h;break a}c=k}return[e[2]||e[0],f,c]}}}return i},Md=function(a,b,c,d,e,f,j,m,s,t){a.set(gc,b);a.set(lc,c);a.set(S,d);a.set(ic,e);a.set(jc,f);a.set(hc,j);a.set(mc,m);a.set(nc,s);a.set(oc,t)},Jd=[hc,gc,S,jc,lc,mc,nc,oc],Od=function(a,b){function c(a){a=(""+a)[y]("+")[C]("%20");return a=a[y](" ")[C]("%20")}function d(c){var d=""+(a.get(c)||"");c=""+(b[c]||"");return 0<
d[w]&&d==c}if(d(S)||d(jc))return H(131),k;for(var e=0;e<Jd[w];e++){var f=Jd[e],j=b[f]||"-",f=a.get(f)||"-";if(c(j)!=c(f))return h}return k},Qd=RegExp(/^https:\/\/(www\.)?google(\.com?)?(\.[a-z]{2}t?)?\/?$/i),Kd=function(a){a=Oa(a.get(Ib),a.get(P));try{if(Qd[ha](a))return H(136),a+"?q="}catch(b){H(145)}return a};var Rd,Sd,Td=function(a){Rd=a.c(S,"");Sd=a.c(ic,"")},Ud=function(a){var b=a.c(S,""),c=a.c(ic,"");b!=Rd&&(-1<c[q]("ds")?a.set(kc,g):!F(Rd)&&-1<Sd[q]("ds")&&a.set(kc,Rd))};var Wd=function(a){Vd(a,J[z][wa])?(a.set(Fc,h),H(12)):a.set(Fc,k)},Vd=function(a,b){if(!a.get(eb))return k;var c=La(b,a.get(fb)),d=K(c.d.get("__utma")),e=K(c.d.get("__utmb")),f=K(c.d.get("__utmc")),j=K(c.d.get("__utmx")),m=K(c.d.get("__utmz")),s=K(c.d.get("__utmv")),c=K(c.d.get("__utmk"));if(Uc(""+d+e+f+j+m+s)!=c){d=I(d);e=I(e);f=I(f);j=I(j);f=Xd(d+e+f+j,m,s,c);if(!f)return k;m=f[0];s=f[1]}if(!Yc(a,d,h))return k;ad(a,e,h);ed(a,m,h);cd(a,s,h);Yd(a,j,h);return h},$d=function(a,b,c){var d;d=Zc(a)||"-";
var e=$c(a)||"-",f=""+a.b(O,1)||"-",j=Zd(a)||"-",m=dd(a,k)||"-";a=bd(a,k)||"-";var s=Uc(""+d+e+f+j+m+a),t=[];t[n]("__utma="+d);t[n]("__utmb="+e);t[n]("__utmc="+f);t[n]("__utmx="+j);t[n]("__utmz="+m);t[n]("__utmv="+a);t[n]("__utmk="+s);d=t[C]("&");if(!d)return b;e=b[q]("#");if(c)return 0>e?b+"#"+d:b+"&"+d;c="";f=b[q]("?");0<e&&(c=b[B](e),b=b[B](0,e));return 0>f?b+"?"+d+c:b+"&"+d+c},Xd=function(a,b,c,d){for(var e=0;3>e;e++){for(var f=0;3>f;f++){if(d==Uc(a+b+c))return H(127),[b,c];var j=b[p](/ /g,"%20"),
m=c[p](/ /g,"%20");if(d==Uc(a+j+m))return H(128),[j,m];j=j[p](/\+/g,"%20");m=m[p](/\+/g,"%20");if(d==Uc(a+j+m))return H(129),[j,m];try{var s=b[na]("utmctr=(.*?)(?:\\|utm|$)");if(s&&2==s[w]&&(j=b[p](s[1],G(I(s[1]))),d==Uc(a+j+c)))return H(139),[j,c]}catch(t){}b=I(b)}c=I(c)}};var ae="|",ce=function(a,b,c,d,e,f,j,m,s){var t=be(a,b);t||(t={},a.get(Bb)[n](t));t.id_=b;t.affiliation_=c;t.total_=d;t.tax_=e;t.shipping_=f;t.city_=j;t.state_=m;t.country_=s;t.items_=t.items_||[];return t},de=function(a,b,c,d,e,f,j){a=be(a,b)||ce(a,b,"",0,0,0,"","","");var m;a:{if(a&&a.items_){m=a.items_;for(var s=0;s<m[w];s++)if(m[s].sku_==c){m=m[s];break a}}m=i}s=m||{};s.transId_=b;s.sku_=c;s.name_=d;s.category_=e;s.price_=f;s.quantity_=j;m||a.items_[n](s);return s},be=function(a,b){for(var c=
a.get(Bb),d=0;d<c[w];d++)if(c[d].id_==b)return c[d];return i};var ee,fe=function(a){if(!ee){var b;b=J[z].hash;var c=W[r],d=/^#?gaso=([^&]*)/;if(c=(b=(b=b&&b[na](d)||c&&c[na](d))?b[1]:K(ld("GASO")))&&b[na](/^(?:[|!]([-0-9a-z.]{1,40})[|!])?([-.\w]{10,1200})$/i))Cd(a,"GASO",""+b),M._gasoDomain=a.get(ab),M._gasoCPath=a.get(P),a=c[1],Ha("https://www.google.com/analytics/web/inpage/pub/inpage.js?"+(a?"prefix="+a+"&":"")+Da(),"_gasojs");ee=h}};var Yd=function(a,b,c){c&&(b=I(b));c=a.b(O,1);b=b[y](".");!(2>b[w])&&/^\d+$/[ha](b[0])&&(b[0]=""+c,Cd(a,"__utmx",b[C](".")))},Zd=function(a,b){var c=Wc(a.get(O),ld("__utmx"));"-"==c&&(c="");return b?G(c):c};var he=function(a,b){var c=l.min(a.b(Bc,0),100);if(a.b(Q,0)%100>=c)return k;a:{if(c=(c=W.performance||W.webkitPerformance)&&c.timing){var d=c.navigationStart;if(0==d)H(133);else{c=[c.loadEventStart-d,c.domainLookupEnd-c.domainLookupStart,c.connectEnd-c.connectStart,c.responseStart-c.requestStart,c.responseEnd-c.responseStart,c.fetchStart-d,c.domInteractive-d,c.domContentLoadedEventStart-d];break a}}c=g}c||(W.top!=W?c=g:(d=(c=W.external)&&c.onloadT,c&&!c.isValidLoadTime&&(d=g),2147483648<d&&(d=g),
0<d&&c.setPageReadyTime(),c=d==g?g:[d]));if(c==g)return k;d=c[0];if(d==g||d==ba||isNaN(d))return k;if(0<d){a:{for(d=1;d<c[w];d++)if(isNaN(c[d])||c[d]==ba||0>c[d]){d=k;break a}d=h}d?b(ge(c)):b(ge(c[ia](0,1)))}else Fa(W,"load",function(){he(a,b)},k);return h},je=function(a,b,c,d){var e=new ud;e.f(14,90,b[B](0,64));e.f(14,91,a[B](0,64));e.f(14,92,""+ie(c));d!=g&&e.f(14,93,d[B](0,64));e.o(14,90,c);return e},ie=function(a){return isNaN(a)||0>a?0:5E3>a?10*l[ka](a/10):5E4>a?100*l[ka](a/100):41E5>a?1E3*l[ka](a/
1E3):41E5},ge=function(a){for(var b=new ud,c=0;c<a[w];c++)b.f(14,c+1,""+ie(a[c])),b.o(14,c+1,a[c]);return b};var U=function(a,b,c){function d(a){return function(b){if((b=b.get(Gc)[a])&&b[w])for(var c={type:a,target:e,stopPropagation:function(){throw"aborted";}},d=0;d<b[w];d++)b[d].call(e,c)}}var e=this;this.a=new Vc;this.get=function(a){return this.a.get(a)};this.set=function(a,b,c){this.a.set(a,b,c)};this.set(Wa,b||"UA-XXXXX-X");this.set(Za,a||"");this.set(Ya,c||"");this.set($a,l.round((new Date).getTime()/1E3));this.set(P,"/");this.set(bb,63072E6);this.set(db,15768E6);this.set(cb,18E5);this.set(eb,k);
this.set(xb,50);this.set(fb,k);this.set(gb,h);this.set(ib,h);this.set(jb,h);this.set(kb,h);this.set(lb,h);this.set(nb,"utm_campaign");this.set(mb,"utm_id");this.set(ob,"gclid");this.set(pb,"utm_source");this.set(qb,"utm_medium");this.set(rb,"utm_term");this.set(sb,"utm_content");this.set(tb,"utm_nooverride");this.set(ub,100);this.set(Bc,1);this.set(Cc,k);this.set(vb,"/__utm.gif");this.set(wb,1);this.set(Bb,[]);this.set(Eb,[]);this.set(yb,Id[ia](0));this.set(zb,[]);this.set(Ab,[]);this.B("auto");this.set(Ib,
J.referrer);a=this.a;try{var f=La(J[z][wa],k),j=da(L(f.d.get("utm_referrer")))||"";j&&a.set(Ib,j);var m=da(K(f.d.get("utm_expid")));m&&a.set(Kc,m)}catch(s){H(146)}this.set(Gc,{hit:[],load:[]});this.a.g("0",Wd);this.a.g("1",Td);this.a.g("2",Gd);this.a.g("3",Pd);this.a.g("4",Ud);this.a.g("5",Hd);this.a.g("6",d("load"));this.a.g("7",fe);this.a.e("A",gd);this.a.e("B",id);this.a.e("C",Gd);this.a.e("D",fd);this.a.e("E",Pc);this.a.e("F",ke);this.a.e("G",Dd);this.a.e("H",jd);this.a.e("I",qd);this.a.e("J",
xd);this.a.e("K",d("hit"));this.a.e("L",le);this.a.e("M",me);0===this.get($a)&&H(111);this.a.T();this.H=g};E=U[x];E.m=function(){var a=this.get(Cb);a||(a=new ud,this.set(Cb,a));return a};E.La=function(a){for(var b in a){var c=a[b];a.hasOwnProperty(b)&&this.set(b,c,h)}};E.K=function(a){if(this.get(Cc))return k;var b=this,c=he(this.a,function(c){b.set(Gb,a,h);b.t(c)});this.set(Cc,c);return c};
E.Fa=function(a){a&&Ba(a)?(H(13),this.set(Gb,a,h)):"object"===typeof a&&a!==i&&this.La(a);this.H=a=this.get(Gb);this.a.j("page");this.K(a)};E.F=function(a,b,c,d,e){if(""==a||(!sd(a)||""==b||!sd(b))||c!=g&&!sd(c)||d!=g&&!td(d))return k;this.set(uc,a,h);this.set(vc,b,h);this.set(wc,c,h);this.set(xc,d,h);this.set(tc,!!e,h);this.a.j("event");return h};
E.Ha=function(a,b,c,d,e){var f=this.a.b(Bc,0);1*e===e&&(f=e);if(this.a.b(Q,0)%100>=f)return k;c=1*(""+c);if(""==a||(!sd(a)||""==b||!sd(b)||!td(c)||isNaN(c)||0>c||0>f||100<f)||d!=g&&(""==d||!sd(d)))return k;this.t(je(a,b,c,d));return h};E.Ga=function(a,b,c,d){if(!a||!b)return k;this.set(yc,a,h);this.set(zc,b,h);this.set(Ac,c||J[z][wa],h);d&&this.set(Gb,d,h);this.a.j("social");return h};E.Ea=function(){this.set(Bc,10);this.K(this.H)};E.Ia=function(){this.a.j("trans")};
E.t=function(a){this.set(Db,a,h);this.a.j("event")};E.ia=function(a){this.v();var b=this;return{_trackEvent:function(c,d,e){H(91);b.F(a,c,d,e)}}};E.ma=function(a){return this.get(a)};E.xa=function(a,b){if(a)if(Ba(a))this.set(a,b);else if("object"==typeof a)for(var c in a)a.hasOwnProperty(c)&&this.set(c,a[c])};E.addEventListener=function(a,b){var c=this.get(Gc)[a];c&&c[n](b)};E.removeEventListener=function(a,b){for(var c=this.get(Gc)[a],d=0;c&&d<c[w];d++)if(c[d]==b){c.splice(d,1);break}};E.qa=function(){return"5.3.7"};
E.B=function(a){this.get(gb);a="auto"==a?Ka(J.domain):!a||"-"==a||"none"==a?"":a[D]();this.set(ab,a)};E.va=function(a){this.set(gb,!!a)};E.na=function(a,b){return $d(this.a,a,b)};E.link=function(a,b){if(this.a.get(eb)&&a){var c=$d(this.a,a,b);J[z].href=c}};E.ua=function(a,b){this.a.get(eb)&&(a&&a.action)&&(a.action=$d(this.a,a.action,b))};
E.za=function(){this.v();var a=this.a,b=J.getElementById?J.getElementById("utmtrans"):J.utmform&&J.utmform.utmtrans?J.utmform.utmtrans:i;if(b&&b[ma]){a.set(Bb,[]);for(var b=b[ma][y]("UTM:"),c=0;c<b[w];c++){b[c]=Ca(b[c]);for(var d=b[c][y](ae),e=0;e<d[w];e++)d[e]=Ca(d[e]);"T"==d[0]?ce(a,d[1],d[2],d[3],d[4],d[5],d[6],d[7],d[8]):"I"==d[0]&&de(a,d[1],d[2],d[3],d[4],d[5],d[6])}}};E.$=function(a,b,c,d,e,f,j,m){return ce(this.a,a,b,c,d,e,f,j,m)};E.Y=function(a,b,c,d,e,f){return de(this.a,a,b,c,d,e,f)};
E.Aa=function(a){ae=a||"|"};E.ea=function(){this.set(Bb,[])};E.wa=function(a,b,c,d){var e=this.a;if(0>=a||a>e.get(xb))a=k;else if(!b||!c||128<b[w]+c[w])a=k;else{1!=d&&2!=d&&(d=3);var f={};ea(f,b);f.value=c;f.scope=d;e.get(Eb)[a]=f;a=h}a&&this.a.n();return a};E.ka=function(a){this.a.get(Eb)[a]=g;this.a.n()};E.ra=function(a){return(a=this.a.get(Eb)[a])&&1==a[ta]?a[ma]:g};E.Ca=function(a,b,c){this.m().f(a,b,c)};E.Da=function(a,b,c){this.m().o(a,b,c)};E.sa=function(a,b){return this.m().getKey(a,b)};
E.ta=function(a,b){return this.m().N(a,b)};E.fa=function(a){this.m().L(a)};E.ga=function(a){this.m().M(a)};E.ja=function(){return new ud};E.W=function(a){a&&this.get(zb)[n](a[D]())};E.ba=function(){this.set(zb,[])};E.X=function(a){a&&this.get(Ab)[n](a[D]())};E.ca=function(){this.set(Ab,[])};E.Z=function(a,b,c,d,e){if(a&&b){a=[a,b[D]()][C](":");if(d||e)a=[a,d,e][C](":");d=this.get(yb);d.splice(c?0:d[w],0,a)}};E.da=function(){this.set(yb,[])};
E.ha=function(a){this.a[ja]();var b=this.get(P),c=Zd(this.a);this.set(P,a);this.a.n();Yd(this.a,c);this.set(P,b)};E.ya=function(a,b){if(0<a&&5>=a&&Ba(b)&&""!=b){var c=this.get(Dc)||[];c[a]=b;this.set(Dc,c)}};E.V=function(a){a=""+a;if(a[na](/^[A-Za-z0-9]{1,5}$/)){var b=this.get(Ec)||[];b[n](a);this.set(Ec,b)}};E.v=function(){this.a[ja]()};E.Ba=function(a){a&&""!=a&&(this.set(Sb,a),this.a.j("var"))};var ke=function(a){"trans"!==a.get(qc)&&500<=a.b(ac,0)&&a[sa]();if("event"===a.get(qc)){var b=(new Date).getTime(),c=a.b(bc,0),d=a.b(Xb,0),c=l[ka](1*((b-(c!=d?c:1E3*c))/1E3));0<c&&(a.set(bc,b),a.set(R,l.min(10,a.b(R,0)+c)));0>=a.b(R,0)&&a[sa]()}},me=function(a){"event"===a.get(qc)&&a.set(R,l.max(0,a.b(R,10)-1))};var ne=function(){var a=[];this.add=function(b,c,d){d&&(c=G(""+c));a[n](b+"="+c)};this.toString=function(){return a[C]("&")}},oe=function(a,b){(b||2!=a.get(wb))&&a.z(ac)},pe=function(a,b){b.add("utmwv","5.3.7");b.add("utms",a.get(ac));b.add("utmn",Da());var c=J[z].hostname;F(c)||b.add("utmhn",c,h);c=a.get(ub);100!=c&&b.add("utmsp",c,h)},qe=function(a,b){b.add("utmac",Ca(a.get(Wa)));a.get(Kc)&&b.add("utmxkey",a.get(Kc),h);a.get(tc)&&b.add("utmni",1);var c=a.get(Ec);c&&0<c[w]&&b.add("utmdid",c[C]("."));
var c=function(a,b){b&&d[n](a+"="+b+";")},d=[];c("__utma",Zc(a));c("__utmz",dd(a,k));c("__utmv",bd(a,h));c("__utmx",Zd(a));b.add("utmcc",d[C]("+"),h);a.get(Xa)!==k&&(a.get(Xa)||M.w)&&b.add("aip",1);b.add("utmu",kd.Xa())},re=function(a,b){for(var c=a.get(Dc)||[],d=[],e=1;e<c[w];e++)c[e]&&d[n](e+":"+G(c[e][p](/%/g,"%25")[p](/:/g,"%3A")[p](/,/g,"%2C")));d[w]&&b.add("utmpg",d[C](","))},se=function(a,b){a.get(ib)&&(b.add("utmcs",a.get(Pb),h),b.add("utmsr",a.get(Kb)),a.get(Qb)&&b.add("utmvp",a.get(Qb)),
b.add("utmsc",a.get(Lb)),b.add("utmul",a.get(Ob)),b.add("utmje",a.get(Mb)),b.add("utmfl",a.get(Nb),h))},te=function(a,b){a.get(lb)&&a.get(Hb)&&b.add("utmdt",a.get(Hb),h);b.add("utmhid",a.get(Jb));b.add("utmr",Oa(a.get(Ib),a.get(P)),h);b.add("utmp",G(a.get(Gb),h),h)},ue=function(a,b){for(var c=a.get(Cb),d=a.get(Db),e=a.get(Eb)||[],f=0;f<e[w];f++){var j=e[f];j&&(c||(c=new ud),c.f(8,f,j[r]),c.f(9,f,j[ma]),3!=j[ta]&&c.f(11,f,""+j[ta]))}!F(a.get(uc))&&!F(a.get(vc),h)&&(c||(c=new ud),c.f(5,1,a.get(uc)),
c.f(5,2,a.get(vc)),e=a.get(wc),e!=g&&c.f(5,3,e),e=a.get(xc),e!=g&&c.o(5,1,e));c?b.add("utme",c.Qa(d),h):d&&b.add("utme",d.A(),h)},ve=function(a,b,c){var d=new ne;oe(a,c);pe(a,d);d.add("utmt","tran");d.add("utmtid",b.id_,h);d.add("utmtst",b.affiliation_,h);d.add("utmtto",b.total_,h);d.add("utmttx",b.tax_,h);d.add("utmtsp",b.shipping_,h);d.add("utmtci",b.city_,h);d.add("utmtrg",b.state_,h);d.add("utmtco",b.country_,h);ue(a,d);se(a,d);te(a,d);(b=a.get(Fb))&&d.add("utmcu",b,h);c||(re(a,d),qe(a,d));return d[v]()},
we=function(a,b,c){var d=new ne;oe(a,c);pe(a,d);d.add("utmt","item");d.add("utmtid",b.transId_,h);d.add("utmipc",b.sku_,h);d.add("utmipn",b.name_,h);d.add("utmiva",b.category_,h);d.add("utmipr",b.price_,h);d.add("utmiqt",b.quantity_,h);ue(a,d);se(a,d);te(a,d);(b=a.get(Fb))&&d.add("utmcu",b,h);c||(re(a,d),qe(a,d));return d[v]()},xe=function(a,b){var c=a.get(qc);if("page"==c)c=new ne,oe(a,b),pe(a,c),ue(a,c),se(a,c),te(a,c),b||(re(a,c),qe(a,c)),c=[c[v]()];else if("event"==c)c=new ne,oe(a,b),pe(a,c),
c.add("utmt","event"),ue(a,c),se(a,c),te(a,c),b||(re(a,c),qe(a,c)),c=[c[v]()];else if("var"==c)c=new ne,oe(a,b),pe(a,c),c.add("utmt","var"),!b&&qe(a,c),c=[c[v]()];else if("trans"==c)for(var c=[],d=a.get(Bb),e=0;e<d[w];++e){c[n](ve(a,d[e],b));for(var f=d[e].items_,j=0;j<f[w];++j)c[n](we(a,f[j],b))}else"social"==c?b?c=[]:(c=new ne,oe(a,b),pe(a,c),c.add("utmt","social"),c.add("utmsn",a.get(yc),h),c.add("utmsa",a.get(zc),h),c.add("utmsid",a.get(Ac),h),ue(a,c),se(a,c),te(a,c),re(a,c),qe(a,c),c=[c[v]()]):
c=[];return c},le=function(a){var b,c=a.get(wb),d=a.get(sc),e=d&&d.Ua,f=0;if(0==c||2==c){var j=a.get(vb)+"?";b=xe(a,h);for(var m=0,s=b[w];m<s;m++)Ra(b[m],e,j,h),f++}if(1==c||2==c){b=xe(a);m=0;for(s=b[w];m<s;m++)try{Ra(b[m],e),f++}catch(t){t&&Qa(t[r],g,t.message)}}d&&(d.q=f)};var ye=function(){return"https:"==J[z][A]||M.G?"https://ssl.google-analytics.com":"http://www.google-analytics.com"},ze=function(a){ea(this,"len");this.message=a+"-8192"},Ae=function(a){ea(this,"ff2post");this.message=a+"-2036"},Ra=function(a,b,c,d){b=b||Ea;if(d||2036>=a[w]){var e=b;b=c||ye()+"/__utm.gif?";var f=new Image(1,1);f.src=b+a;f.onload=function(){f.onload=i;f.onerror=i;e()};f.onerror=function(){f.onload=i;f.onerror=i;e()}}else if(8192>=a[w]){var j=b;if(0<=W[ya].userAgent[q]("Firefox")&&
![].reduce)throw new Ae(a[w]);var m;b=ye()+"/p/__utm.gif";if(c=W.XDomainRequest)m=new c,m.open("POST",b);else if(c=W.XMLHttpRequest)c=new c,"withCredentials"in c&&(m=c,m.open("POST",b,h),m.setRequestHeader("Content-Type","text/plain"));m?(m.onreadystatechange=function(){4==m.readyState&&(j(),m=i)},m.send(a),b=h):b=g;b||Be(a,j)}else throw new ze(a[w]);},Be=function(a,b){if(J.body){a=aa(a);try{var c=J[pa]('<iframe name="'+a+'"></iframe>')}catch(d){c=J[pa]("iframe"),ea(c,a)}c.height="0";c.width="0";
c.style.display="none";c.style.visibility="hidden";var e=J[z],e=ye()+"/u/post_iframe.html#"+aa(e[A]+"//"+e[u]+"/favicon.ico"),f=function(){c.src="";c.parentNode&&c.parentNode.removeChild(c)};Fa(W,"beforeunload",f);var j=k,m=0,s=function(){if(!j){try{if(9<m||c.contentWindow[z][u]==J[z][u]){j=h;f();Ga(W,"beforeunload",f);b();return}}catch(a){}m++;ca(s,200)}};Fa(c,"load",s);J.body.appendChild(c);c.src=e}else ca(function(){Be(a,b)},100)};var $=function(){this.G=this.w=k;this.C={};this.D=[];this.U=0;this.S=[["www.google-analytics.com","","/plugins/"]];this._gasoCPath=this._gasoDomain=g;var a=function(a,c,d){T($[x],a,c,d)};a("_createTracker",$[x].r,55);a("_getTracker",$[x].oa,0);a("_getTrackerByName",$[x].u,51);a("_getTrackers",$[x].pa,130);a("_anonymizeIp",$[x].aa,16);a("_forceSSL",$[x].la,125);a("_getPlugin",Lc,120);a=function(a,c,d){T(U[x],a,c,d)};Mc("_getName",Za,58);Mc("_getAccount",Wa,64);Mc("_visitCode",Q,54);Mc("_getClientInfo",
ib,53,1);Mc("_getDetectTitle",lb,56,1);Mc("_getDetectFlash",jb,65,1);Mc("_getLocalGifPath",vb,57);Mc("_getServiceMode",wb,59);V("_setClientInfo",ib,66,2);V("_setAccount",Wa,3);V("_setNamespace",Ya,48);V("_setAllowLinker",eb,11,2);V("_setDetectFlash",jb,61,2);V("_setDetectTitle",lb,62,2);V("_setLocalGifPath",vb,46,0);V("_setLocalServerMode",wb,92,g,0);V("_setRemoteServerMode",wb,63,g,1);V("_setLocalRemoteServerMode",wb,47,g,2);V("_setSampleRate",ub,45,1);V("_setCampaignTrack",kb,36,2);V("_setAllowAnchor",
fb,7,2);V("_setCampNameKey",nb,41);V("_setCampContentKey",sb,38);V("_setCampIdKey",mb,39);V("_setCampMediumKey",qb,40);V("_setCampNOKey",tb,42);V("_setCampSourceKey",pb,43);V("_setCampTermKey",rb,44);V("_setCampCIdKey",ob,37);V("_setCookiePath",P,9,0);V("_setMaxCustomVariables",xb,0,1);V("_setVisitorCookieTimeout",bb,28,1);V("_setSessionCookieTimeout",cb,26,1);V("_setCampaignCookieTimeout",db,29,1);V("_setReferrerOverride",Ib,49);V("_setSiteSpeedSampleRate",Bc,132);a("_trackPageview",U[x].Fa,1);a("_trackEvent",
U[x].F,4);a("_trackPageLoadTime",U[x].Ea,100);a("_trackSocial",U[x].Ga,104);a("_trackTrans",U[x].Ia,18);a("_sendXEvent",U[x].t,78);a("_createEventTracker",U[x].ia,74);a("_getVersion",U[x].qa,60);a("_setDomainName",U[x].B,6);a("_setAllowHash",U[x].va,8);a("_getLinkerUrl",U[x].na,52);a("_link",U[x].link,101);a("_linkByPost",U[x].ua,102);a("_setTrans",U[x].za,20);a("_addTrans",U[x].$,21);a("_addItem",U[x].Y,19);a("_clearTrans",U[x].ea,105);a("_setTransactionDelim",U[x].Aa,82);a("_setCustomVar",U[x].wa,
10);a("_deleteCustomVar",U[x].ka,35);a("_getVisitorCustomVar",U[x].ra,50);a("_setXKey",U[x].Ca,83);a("_setXValue",U[x].Da,84);a("_getXKey",U[x].sa,76);a("_getXValue",U[x].ta,77);a("_clearXKey",U[x].fa,72);a("_clearXValue",U[x].ga,73);a("_createXObj",U[x].ja,75);a("_addIgnoredOrganic",U[x].W,15);a("_clearIgnoredOrganic",U[x].ba,97);a("_addIgnoredRef",U[x].X,31);a("_clearIgnoredRef",U[x].ca,32);a("_addOrganic",U[x].Z,14);a("_clearOrganic",U[x].da,70);a("_cookiePathCopy",U[x].ha,30);a("_get",U[x].ma,
106);a("_set",U[x].xa,107);a("_addEventListener",U[x].addEventListener,108);a("_removeEventListener",U[x].removeEventListener,109);a("_addDevId",U[x].V);a("_getPlugin",Lc,122);a("_setPageGroup",U[x].ya,126);a("_trackTiming",U[x].Ha,124);a("_initData",U[x].v,2);a("_setVar",U[x].Ba,22);V("_setSessionTimeout",cb,27,3);V("_setCookieTimeout",db,25,3);V("_setCookiePersistence",bb,24,1);a("_setAutoTrackOutbound",Ea,79);a("_setTrackOutboundSubdomains",Ea,81);a("_setHrefExamineLimit",Ea,80)};E=$[x];
E.oa=function(a,b){return this.r(a,g,b)};E.r=function(a,b,c){b&&H(23);c&&H(67);b==g&&(b="~"+M.U++);a=new U(b,a,c);M.C[b]=a;M.D[n](a);return a};E.u=function(a){a=a||"";return M.C[a]||M.r(g,a)};E.pa=function(){return M.D[ia](0)};E.aa=function(){this.w=h};E.la=function(){this.G=h};var Ce=function(a){if("prerender"==J.webkitVisibilityState)return k;a();return h};var M=new $;var De=W._gat;De&&Aa(De._getTracker)?M=De:W._gat=M;var Z=new Y;var Ee=function(){var a=W._gaq,b=k;if(a&&Aa(a[n])&&(b="[object Array]"==Object[x][v].call(Object(a)),!b)){Z=a;return}W._gaq=Z;b&&Z[n][xa](Z,a)};if(!Ce(Ee)){H(123);var Fe=k,Ge=function(){!Fe&&Ce(Ee)&&(Fe=h,Ga(J,"webkitvisibilitychange",Ge))};Fa(J,"webkitvisibilitychange",Ge)};function Uc(a){var b=1,c=0,d;if(a){b=0;for(d=a[w]-1;0<=d;d--)c=a.charCodeAt(d),b=(b<<6&268435455)+c+(c<<14),c=b&266338304,b=0!=c?b^c>>21:b}return b};})();

/* ---------------------------------------------
Nested Accordion v.1.4.7.3
Script to create 'accordion' functionality on a hierarchically structured content.
http://www.adipalaz.com/experiments/jquery/nested_accordion.html
Requires: jQuery v1.4.2+
Copyright (c) 2009 Adriana Palazova
Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL (http://www.adipalaz.com/docs/gpl-license.txt) licenses.
------------------------------------------------ */
(function($) {
//$.fn.orphans - http://www.mail-archive.com/jquery-en@googlegroups.com/msg43851.html
$.fn.orphans = function(){
var txt = [];
this.each(function(){$.each(this.childNodes, function() {
  if (this.nodeType == 3 && $.trim(this.nodeValue)) txt.push(this)})}); return $(txt);};
  
$.fn.accordion = function(options) {
    var o = $.extend({}, $.fn.accordion.defaults, options);
    
    return this.each(function() {
      var containerID = o.container ? '#' + this.id : '', objID = o.objID ? o.objID : o.obj + o.objClass,
        Obj = o.container ? containerID + ' ' + objID : '#' + this.id,
        El = Obj + ' ' + o.el,
        hTimeout = null; 

      // build
      if (o.head) $(Obj).find(o.head).addClass('h');
      if (o.head) {
        if ($(El).next('div:not(.outer)').length) {$(El).next('div:not(.outer)').wrap('<div class="outer" />');} 
        $(Obj + ' .h').each(function(){
            var $this = $(this);
            if (o.wrapper == 'div' && !$this.parent('div.new').length) {$this.add( $this.next('div.outer') ).wrapAll('<div class="new"></div>');}
        }); 
      }
      $(El).each(function(){
          var $node = $(this);
          if ($node.find(o.next).length || $node.next(o.next).length) {
            if ($node.find('> a').length) {
                $node.find('> a').addClass("trigger").css('display', "block");
            } else {
                var anchor = '<a class="trigger" style="display:block" href="#" />'
                if (o.elToWrap) {
                  var $t = $node.orphans(), $s = $node.find(o.elToWrap);
                  $t.add($s).wrapAll(anchor);
                } else {
                  $node.orphans().wrap(anchor);
                }
            }
          } else {
            $node.addClass('last-child');
            if (o.lastChild && $node.find('> a').length) {$node.find('> a').addClass("trigger").css('display', "block");}
          }
      });
      // init state
      $(El + ' a.trigger').closest(o.wrapper).find('> ' + o.next).not('.shown').hide().closest(o.wrapper).find('a.open').removeClass('open').data('state', 0);
      if (o.activeLink) {
          var loc,
              fullURL = window.location.href,
              path = window.location.pathname.split( '/' ),
              page = path[path.length-1];
              (o.uri == 'full') ? loc = fullURL : loc = page;
          $(Obj + ' a:not([href $= "#"])[href$="' + loc + '"]').addClass('active').parent().attr('id', 'current').closest(o.obj).addClass('current');
          if (o.shift && $(Obj + ' a.active').closest(o.wrapper).prev(o.wrapper).length) {
            var $currentWrap = $(Obj + ' a.active').closest(o.wrapper),
                $curentStack = $currentWrap.nextAll().andSelf(),
                $siblings = $currentWrap.siblings(o.wrapper),
                $first = $siblings.filter(":first");
            if (o.shift == 'clicked' || (o.shift == 'all' && $siblings.length)) {
                $currentWrap.insertBefore($first).addClass('shown').siblings(o.wrapper).removeClass('shown');
            }
            if (o.shift == 'all' && $siblings.length > 1) {$curentStack.insertBefore($first);}
          }
      }
      if (o.initShow) {
        $(Obj).find(o.initShow).show().addClass('shown')
          .parents(Obj + ' ' + o.next).show().addClass('shown').end()
          .parents(o.wrapper).find('> a.trigger, > ' + o.el + ' a.trigger').addClass('open').data('state', 1);
          if (o.expandSub) {$(Obj + ' ' + o.initShow).children(o.next).show().end().find('> a').addClass('open').data('state', 1 );}
      }
      // event
      if (o.event == 'click') {
          var ev = 'click';
      } else  {
          if (o.focus) {var f = ' focus';} else {var f = '';}
          var ev = 'mouseenter' + f;
      }
      var scrollElem;
      (typeof scrollableElement == 'function') ? (scrollElem = scrollableElement('html', 'body')) : (scrollElem = 'html, body');

      // The event handler is bound to the "accordion" element
      // The event is filtered to only fire when an <a class="trigger"> was clicked on.
      $(Obj).delegate('a.trigger', ev, function(ev) {
          var $thislink = $(this),
              $thisWrapper = $thislink.closest(o.wrapper),
              $nextEl = $thisWrapper.find('> ' + o.next),
              $siblings = $thisWrapper.siblings(o.wrapper),
              $trigger = $(El + ' a.trigger'),
              $shownEl = $thisWrapper.siblings(o.wrapper).find('>' + o.next + ':visible'),
              shownElOffset;
              $shownEl.length ? shownElOffset = $shownEl.offset().top : shownElOffset = false;
              
          function action(obj) {
             if (($nextEl).length && $thislink.data('state') && (o.collapsible)) {
                  $thislink.removeClass('open');
                  $nextEl.filter(':visible')[o.hideMethod](o.hideSpeed, function() {$thislink.data('state', 0);});
              }
              if (($nextEl.length && !$thislink.data('state')) || (!($nextEl).length && $thislink.closest(o.wrapper).not('.shown'))) {
                  if (!o.standardExpansible) {
                    $siblings.find('> a.open, >'+ o.el + ' a.open').removeClass('open').data('state', 0).end()
                    .find('> ' + o.next + ':visible')[o.hideMethod](o.hideSpeed);
                    if (shownElOffset && shownElOffset < $(window).scrollTop()) {$(scrollElem).animate({scrollTop: shownElOffset}, o.scrollSpeed);}
                  }
                  $thislink.addClass('open');
                  $nextEl.filter(':hidden')[o.showMethod](o.showSpeed, function() {$thislink.data('state', 1);});
              }
              if (o.shift && $thisWrapper.prev(o.wrapper).length) {
                var $thisStack = $thisWrapper.nextAll().andSelf(),
                    $first = $siblings.filter(":first");
                if (o.shift == 'clicked' || (o.shift == 'all' && $siblings.length)) {
                  $thisWrapper.insertBefore($first).addClass('shown').siblings(o.wrapper).removeClass('shown');
                }
                if (o.shift == 'all' && $siblings.length > 1) {$thisStack.insertBefore($first);}
              }
          }
          if (o.event == 'click') {
              action($trigger); 
              if ($thislink.is('[href $= "#"]')) {
                  return false;
              } else {
                  if ($.isFunction(o.retFunc)) {
                    return o.retFunc($thislink) 
                  } else {
                    return true;
                  }
              }
          }
          if (o.event != 'click') {
              hTimeout = window.setTimeout(function() {
                  action($trigger);
              }, o.interval);        
              $thislink.click(function() {
                  $thislink.blur();
                  if ($thislink.attr('href')== '#') {
                      $thislink.blur();
                      return false;
                  }
              });
          }
      });
      if (o.event != 'click') {$(Obj).delegate('a.trigger', 'mouseleave', function() {window.clearTimeout(hTimeout); });}
      
      /* -----------------------------------------------
      // http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
      -------------------------------------------------- */
      function scrollableElement(els) {
        for (var i = 0, argLength = arguments.length; i < argLength; i++) {
          var el = arguments[i],
              $scrollElement = $(el);
          if ($scrollElement.scrollTop() > 0) {
            return el;
          } else {
            $scrollElement.scrollTop(1);
            var isScrollable = $scrollElement.scrollTop() > 0;
            $scrollElement.scrollTop(0);
            if (isScrollable) {
              return el;
            }
          }
        };
        return [];
      }; 
      /* ----------------------------------------------- */
});};
$.fn.accordion.defaults = {
  container : true, // {true} if the plugin is called on the closest named container, {false} if the pligin is called on the accordion element
  obj : 'ul', // the element which contains the accordion - 'ul', 'ol', 'div' 
  objClass : '.accordion', // the class name of the accordion - required if you call the accordion on the container
  objID : '', // the ID of the accordion (optional)
  wrapper :'li', // the common parent of 'a.trigger' and 'o.next' - 'li', 'div'
  el : 'li', // the parent of 'a.trigger' - 'li', '.h'
  head : '', // the headings that are parents of 'a.trigger' (if any)
  next : 'ul', // the collapsible element - 'ul', 'ol', 'div'
  initShow : '', // the initially expanded section (optional)
  expandSub : true, // {true} forces the sub-content under the 'current' item to be expanded on page load
  showMethod : 'slideDown', // 'slideDown', 'show', 'fadeIn', or custom
  hideMethod : 'slideUp', // 'slideUp', 'hide', 'fadeOut', or custom
  showSpeed : 400,
  hideSpeed : 800,
  scrollSpeed : 600, //speed of repositioning the newly opened section when it is pushed off screen.
  activeLink : true, //{true} if the accordion is used for site navigation
  event : 'click', //'click', 'hover'
  focus : true, // it is needed for  keyboard accessibility when we use {event:'hover'}
  interval : 400, // time-interval for delayed actions used to prevent the accidental activation of animations when we use {event:hover} (in milliseconds)
  collapsible : true, // {true} - makes the accordion fully collapsible, {false} - forces one section to be open at any time
  standardExpansible : false, //if {true}, the functonality will be standard Expand/Collapse without 'accordion' effect
  lastChild : true, //if {true}, the items without sub-elements will also trigger the 'accordion' animation
  shift: false, // false, 'clicked', 'all'. If 'clicked', the clicked item will be moved to the first position inside its level, 
                // If 'all', the clicked item and all following siblings will be moved to the top
  elToWrap: null, // null, or the element, besides the text node, to be wrapped by the trigger, e.g. 'span:first'
  uri : 'full', // 
  retFunc: null //
};
/* ---------------------------------------------
Feel free to remove the following code if you don't need these custom animations.
------------------------------------------------ */
//credit: http://jquery.malsup.com/fadetest.html
$.fn.slideFadeDown = function(speed, callback) { 
  return this.animate({opacity: 'show', height: 'show'}, speed, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
$.fn.slideFadeUp = function(speed, callback) { 
  return this.animate({opacity: 'hide', height: 'hide'}, speed, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
/* --- end of the optional code --- */
})(jQuery);
///////////////////////////
// The plugin can be called on the ID of the accordion element or on the ID of its closest named container.
// If the plugin is called on a named container, we can initialize all the accordions residing in a given section with just one call.
// EXAMPLES:
/* ---
$(function() {
// If the closest named container = #container1 or the accordion element is <ul id="subnavigation">:
/// Standard nested lists:
  $('#container1').accordion(); // we are calling the plugin on the closest named container
  $('#subnavigation').accordion({container:false}); // we are calling the plugin on the accordion element
  // this will expand the sub-list with "id=current", when the accordion is initialized:
  $('#subnavigation').accordion({container:false, initShow : "#current"});
  // this will expand/collapse the sub-list when the mouse hovers over the trigger element:
  $('#container1').accordion({event : "hover", initShow : "#current"});
 
// If the closest named container = #container2
/// Nested Lists + Headings + DIVs:
  $('#container2').accordion({el: '.h', head: 'h4, h5', next: 'div'});
  $('#container2').accordion({el: '.h', head: 'h4, h5', next: 'div', initShow : 'div.outer:eq(0)'});
  
/// Nested DIVs + Headings:
  $('#container2').accordion({obj: 'div', wrapper: 'div', el: '.h', head: 'h4, h5', next: 'div.outer'});
  $('#container2').accordion({objID: '#acc2', obj: 'div', wrapper: 'div', el: '.h', head: 'h4, h5', next: 'div.outer', initShow : '.shown', shift: 'all'});
});

/// We can globally replace the defaults, for example:
  $.fn.accordion.defaults.initShow = "#current";
--- */
/// Example options for Hover Accordion:
/* ---
$.fn.accordion.defaults.container=false;
$.fn.accordion.defaults.event="hover";
$.fn.accordion.defaults.focus=false; // Optional. If it is possible, use {focus: true}, since {focus: false} will break the keyboard accessibility
$.fn.accordion.defaults.initShow="#current";
$.fn.accordion.defaults.lastChild=false;
--- */
/* ---------------------------------------------
expandAll v.1.3.8.2
http://www.adipalaz.com/experiments/jquery/expand.html
Requires: jQuery v1.3+
Copyright (c) 2009 Adriana Palazova
Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL (http://www.adipalaz.com/docs/gpl-license.txt) licenses
------------------------------------------------ */
(function($) {
$.fn.expandAll = function(options) {
    var o = $.extend({}, $.fn.expandAll.defaults, options);   
    
    return this.each(function(index) {
        var $$ = $(this), $referent, $sw, $cllps, $tr, container, toggleTxt, toggleClass;
               
        // --- functions:
       (o.switchPosition == 'before') ? ($.fn.findSibling = $.fn.prev, $.fn.insrt = $.fn.before) : ($.fn.findSibling = $.fn.next, $.fn.insrt = $.fn.after);
                    
        // --- var container 
        if (this.id.length) { container = '#' + this.id;
        } else if (this.className.length) { container = this.tagName.toLowerCase() + '.' + this.className.split(' ').join('.');
        } else { container = this.tagName.toLowerCase();}
        
        // --- var $referent
        if (o.ref && $$.find(o.ref).length) {
          (o.switchPosition == 'before') ? $referent = $$.find("'" + o.ref + ":first'") : $referent = $$.find("'" + o.ref + ":last'");
        } else { return; }
        
        // end the script if the length of the collapsible element isn't long enough.  
        if (o.cllpsLength && $$.closest(container).find(o.cllpsEl).text().length < o.cllpsLength) {$$.closest(container).find(o.cllpsEl).addClass('dont_touch'); return;}
    
        // --- if expandAll() claims initial state = hidden:
        (o.initTxt == 'show') ? (toggleTxt = o.expTxt, toggleClass='') : (toggleTxt = o.cllpsTxt, toggleClass='open');
        if (o.state == 'hidden') { 
          $$.find(o.cllpsEl + ':not(.shown, .dont_touch)').hide().findSibling().find('> a.open').removeClass('open').data('state', 0); 
        } else {
          $$.find(o.cllpsEl).show().findSibling().find('> a').addClass('open').data('state', 1); 
        }
        
        (o.oneSwitch) ? ($referent.insrt('<p class="switch"><a href="#" class="' + toggleClass + '">' + toggleTxt + '</a></p>')) :
          ($referent.insrt('<p class="switch"><a href="#" class="">' + o.expTxt + '</a>&nbsp;|&nbsp;<a href="#" class="open">' + o.cllpsTxt + '</a></p>'));

        // --- var $sw, $cllps, $tr :
        $sw = $referent.findSibling('p').find('a');
        $cllps = $$.closest(container).find(o.cllpsEl).not('.dont_touch');
        $tr = (o.trigger) ? $$.closest(container).find(o.trigger + ' > a') : $$.closest(container).find('.expand > a');
                
        if (o.child) {
          $$.find(o.cllpsEl + '.shown').show().findSibling().find('> a').addClass('open').text(o.cllpsTxt);
          window.$vrbls = { kt1 : o.expTxt, kt2 : o.cllpsTxt };
        }

        var scrollElem;
        (typeof scrollableElement == 'function') ? (scrollElem = scrollableElement('html', 'body')) : (scrollElem = 'html, body');
        
        $sw.click(function() {
            var $switch = $(this),
                $c = $switch.closest(container).find(o.cllpsEl +':first'),
                cOffset = $c.offset().top - o.offset;
            if (o.parent) {
              var $swChildren = $switch.parent().nextAll().children('p.switch').find('a');
                  kidTxt1 = $vrbls.kt1, kidTxt2 = $vrbls.kt2,
                  kidTxt = ($switch.text() == o.expTxt) ? kidTxt2 : kidTxt1;
              $swChildren.text(kidTxt);
              if ($switch.text() == o.expTxt) {$swChildren.addClass('open');} else {$swChildren.removeClass('open');}
            }
            if ($switch.text() == o.expTxt) {
              if (o.oneSwitch) {$switch.text(o.cllpsTxt).attr('class', 'open');}
              $tr.addClass('open').data('state', 1);
              $cllps[o.showMethod](o.speed);
            } else {
              if (o.oneSwitch) {$switch.text(o.expTxt).attr('class', '');}
              $tr.removeClass('open').data('state', 0);
              if (o.speed == 0 || o.instantHide) {$cllps.hide();} else {$cllps[o.hideMethod](o.speed);}
              if (o.scroll && cOffset < $(window).scrollTop()) {$(scrollElem).animate({scrollTop: cOffset},600);}
          }
          return false;
        });
        /* -----------------------------------------------
        To save file size, feel free to remove the following code if you don't use the option: 'localLinks: true'
        -------------------------------------------------- */
        if (o.localLinks) { 
          var localLink = $(container).find(o.localLinks);
          if (localLink.length) {
            // based on http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
            $(localLink).click(function() {
              var $target = $(this.hash);
              $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
              if ($target.length) {
                var tOffset = $target.offset().top;
                $(scrollElem).animate({scrollTop: tOffset},600);
                return false;
              }
            });
          }
        }
        /* -----------------------------------------------
        Feel free to remove the following function if you don't use the options: 'localLinks: true' or 'scroll: true'
        -------------------------------------------------- */
        //http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
        function scrollableElement(els) {
          for (var i = 0, argLength = arguments.length; i < argLength; i++) {
            var el = arguments[i],
                $scrollElement = $(el);
            if ($scrollElement.scrollTop() > 0) {
              return el;
            } else {
              $scrollElement.scrollTop(1);
              var isScrollable = $scrollElement.scrollTop() > 0;
              $scrollElement.scrollTop(0);
              if (isScrollable) {
                return el;
              }
            }
          };
          return [];
        }; 
      /* --- end of the optional code --- */
});};
$.fn.expandAll.defaults = {
        state : 'hidden', // If 'hidden', the collapsible elements are hidden by default, else they are expanded by default 
        initTxt : 'show', // 'show' - if the initial text of the switch is for expanding, 'hide' - if the initial text of the switch is for collapsing
        expTxt : '[Expand All]', // the text of the switch for expanding
        cllpsTxt : '[Collapse All]', // the text of the switch for collapsing
        oneSwitch : true, // true or false - whether both [Expand All] and [Collapse All] are shown, or they swap
        ref : '.expand', // the switch 'Expand All/Collapse All' is inserted in regards to the element specified by 'ref'
        switchPosition: 'before', //'before' or 'after' - specifies the position of the switch 'Expand All/Collapse All' - before or after the collapsible element
        scroll : false, // false or true. If true, the switch 'Expand All/Collapse All' will be dinamically repositioned to remain in view when the collapsible element closes
        offset : 20,
        showMethod : 'slideDown', // 'show', 'slideDown', 'fadeIn', or custom
        hideMethod : 'slideUp', // 'hide', 'slideUp', 'fadeOut', or custom
        speed : 600, // the speed of the animation in m.s. or 'slow', 'normal', 'fast'
        cllpsEl : '.collapse', // the collapsible element
        trigger : '.expand', // if expandAll() is used in conjunction with toggle() - the elements that contain the trigger of the toggle effect on the individual collapsible sections
        localLinks : null, // null or the selector of the same-page links to which we will apply a smooth-scroll function, e.g. 'a.to_top'
        parent : false, // true, false
        child : false, // true, false
        cllpsLength : null, //null, {Number}. If {Number} (e.g. cllpsLength: 200) - if the number of characters inside the "collapsible element" is less than the given {Number}, the element will be visible all the time
        instantHide : false // {true} fixes hiding content inside hidden elements
};

/* ---------------------------------------------
Toggler v.1.0
http://www.adipalaz.com/experiments/jquery/expand.html
Requires: jQuery v1.3+
Copyright (c) 2009 Adriana Palazova
Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL (http://www.adipalaz.com/docs/gpl-license.txt) licenses
------------------------------------------------ */
$.fn.toggler = function(options) {
    var o = $.extend({}, $.fn.toggler.defaults, options);
    
    var $this = $(this);
    $this.wrapInner('<a style="display:block" href="#" title="Expand/Collapse" />');
    if (o.initShow) {$(o.initShow).addClass('shown');}
    $this.next(o.cllpsEl + ':not(.shown)').hide();
    return this.each(function() {
      var container;
      (o.container) ? container = o.container : container = 'html';
      if ($this.next('div.shown').length) { $this.closest(container).find('.shown').show().prev().find('a').addClass('open'); }
      $(this).click(function() {
        $(this).find('a').toggleClass('open').end().next(o.cllpsEl)[o.method](o.speed);
        return false;
    });
});};
$.fn.toggler.defaults = {
     cllpsEl : 'div.collapse',
     method : 'slideToggle',
     speed : 'slow',
     container : '', //the common container of all groups with collapsible content (optional)
     initShow : '.shown' //the initially expanded sections (optional)
};
/* ---------------------------------------------
Feel free to remove any of the following functions if you don't need it.
------------------------------------------------ */
//credit: http://jquery.malsup.com/fadetest.html
$.fn.fadeToggle = function(speed, callback) {
    return this.animate({opacity: 'toggle'}, speed, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
};
$.fn.slideFadeToggle = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
};
$.fn.slideFadeDown = function(speed, callback) { 
  return this.animate({opacity: 'show', height: 'show'}, speed, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
$.fn.slideFadeUp = function(speed, callback) { 
  return this.animate({opacity: 'hide', height: 'hide'}, speed, function() { 
    if (jQuery.browser.msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
/* --- end of the optional code --- */
})(jQuery);

/**
 * Copyright (c) 2012 Anders Ekdahl (http://coffeescripter.com/)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 1.2.7
 *
 * Demo and documentation: http://coffeescripter.com/code/ad-gallery/
 */
(function($){$.fn.adGallery=function(options){var defaults={loader_image:'loader.gif',start_at_index:0,update_window_hash:true,description_wrapper:false,thumb_opacity:0.7,animate_first_image:false,animation_speed:400,width:false,height:false,display_next_and_prev:true,display_back_and_forward:true,scroll_jump:0,slideshow:{enable:true,autostart:false,speed:5000,start_label:'Start',stop_label:'Stop',stop_on_scroll:true,countdown_prefix:'(',countdown_sufix:')',onStart:false,onStop:false},effect:'slide-hori',enable_keyboard_move:true,cycle:true,hooks:{displayDescription:false},callbacks:{init:false,afterImageVisible:false,beforeImageVisible:false}};var settings=$.extend(false,defaults,options);if(options&&options.slideshow){settings.slideshow=$.extend(false,defaults.slideshow,options.slideshow);};if(!settings.slideshow.enable){settings.slideshow.autostart=false;};var galleries=[];$(this).each(function(){var gallery=new AdGallery(this,settings);galleries[galleries.length]=gallery;});return galleries;};function VerticalSlideAnimation(img_container,direction,desc){var current_top=parseInt(img_container.css('top'),10);if(direction=='left'){var old_image_top='-'+this.image_wrapper_height+'px';img_container.css('top',this.image_wrapper_height+'px');}else{var old_image_top=this.image_wrapper_height+'px';img_container.css('top','-'+this.image_wrapper_height+'px');};if(desc){desc.css('bottom','-'+desc[0].offsetHeight+'px');desc.animate({bottom:0},this.settings.animation_speed*2);};if(this.current_description){this.current_description.animate({bottom:'-'+this.current_description[0].offsetHeight+'px'},this.settings.animation_speed*2);};return{old_image:{top:old_image_top},new_image:{top:current_top}};};function HorizontalSlideAnimation(img_container,direction,desc){var current_left=parseInt(img_container.css('left'),10);if(direction=='left'){var old_image_left='-'+this.image_wrapper_width+'px';img_container.css('left',this.image_wrapper_width+'px');}else{var old_image_left=this.image_wrapper_width+'px';img_container.css('left','-'+this.image_wrapper_width+'px');};if(desc){desc.css('bottom','-'+desc[0].offsetHeight+'px');desc.animate({bottom:0},this.settings.animation_speed*2);};if(this.current_description){this.current_description.animate({bottom:'-'+this.current_description[0].offsetHeight+'px'},this.settings.animation_speed*2);};return{old_image:{left:old_image_left},new_image:{left:current_left}};};function ResizeAnimation(img_container,direction,desc){var image_width=img_container.width();var image_height=img_container.height();var current_left=parseInt(img_container.css('left'),10);var current_top=parseInt(img_container.css('top'),10);img_container.css({width:0,height:0,top:this.image_wrapper_height/2,left:this.image_wrapper_width/2});return{old_image:{width:0,height:0,top:this.image_wrapper_height/2,left:this.image_wrapper_width/2},new_image:{width:image_width,height:image_height,top:current_top,left:current_left}};};function FadeAnimation(img_container,direction,desc){img_container.css('opacity',0);return{old_image:{opacity:0},new_image:{opacity:1}};};function NoneAnimation(img_container,direction,desc){img_container.css('opacity',0);return{old_image:{opacity:0},new_image:{opacity:1},speed:0};};function AdGallery(wrapper,settings){this.init(wrapper,settings);};AdGallery.prototype={wrapper:false,image_wrapper:false,gallery_info:false,nav:false,loader:false,preloads:false,thumbs_wrapper:false,thumbs_wrapper_width:0,scroll_back:false,scroll_forward:false,next_link:false,prev_link:false,slideshow:false,image_wrapper_width:0,image_wrapper_height:0,current_index:-1,current_image:false,current_description:false,nav_display_width:0,settings:false,images:false,in_transition:false,animations:false,init:function(wrapper,settings){var context=this;this.wrapper=$(wrapper);this.settings=settings;this.setupElements();this.setupAnimations();if(this.settings.width){this.image_wrapper_width=this.settings.width;this.image_wrapper.width(this.settings.width);this.wrapper.width(this.settings.width);}else{this.image_wrapper_width=this.image_wrapper.width();};if(this.settings.height){this.image_wrapper_height=this.settings.height;this.image_wrapper.height(this.settings.height);}else{this.image_wrapper_height=this.image_wrapper.height();};this.nav_display_width=this.nav.width();this.current_index=-1;this.current_image=false;this.current_description=false;this.in_transition=false;this.findImages();if(this.settings.display_next_and_prev){this.initNextAndPrev();};var nextimage_callback=function(callback){return context.nextImage(callback);};this.slideshow=new AdGallerySlideshow(nextimage_callback,this.settings.slideshow);this.controls.append(this.slideshow.create());if(this.settings.slideshow.enable){this.slideshow.enable();}else{this.slideshow.disable();};if(this.settings.display_back_and_forward){this.initBackAndForward();};if(this.settings.enable_keyboard_move){this.initKeyEvents();};this.initHashChange();var start_at=parseInt(this.settings.start_at_index,10);if(typeof this.getIndexFromHash()!="undefined"){start_at=this.getIndexFromHash();};this.loading(true);this.showImage(start_at,function(){if(context.settings.slideshow.autostart){context.preloadImage(start_at+1);context.slideshow.start();};});this.fireCallback(this.settings.callbacks.init);},setupAnimations:function(){this.animations={'slide-vert':VerticalSlideAnimation,'slide-hori':HorizontalSlideAnimation,'resize':ResizeAnimation,'fade':FadeAnimation,'none':NoneAnimation};},setupElements:function(){this.controls=this.wrapper.find('.ad-controls');this.gallery_info=$('<p class="ad-info"></p>');this.controls.append(this.gallery_info);this.image_wrapper=this.wrapper.find('.ad-image-wrapper');this.image_wrapper.empty();this.nav=this.wrapper.find('.ad-nav');this.thumbs_wrapper=this.nav.find('.ad-thumbs');this.preloads=$('<div class="ad-preloads"></div>');this.loader=$('<img class="ad-loader" src="'+this.settings.loader_image+'">');this.image_wrapper.append(this.loader);this.loader.hide();$(document.body).append(this.preloads);},loading:function(bool){if(bool){this.loader.show();}else{this.loader.hide();};},addAnimation:function(name,fn){if($.isFunction(fn)){this.animations[name]=fn;};},findImages:function(){var context=this;this.images=[];var thumbs_loaded=0;var thumbs=this.thumbs_wrapper.find('a');var thumb_count=thumbs.length;if(this.settings.thumb_opacity<1){thumbs.find('img').css('opacity',this.settings.thumb_opacity);};thumbs.each(function(i){var link=$(this);link.data("ad-i",i);var image_src=link.attr('href');var thumb=link.find('img');context.whenImageLoaded(thumb[0],function(){var width=thumb[0].parentNode.parentNode.offsetWidth;if(thumb[0].width==0){width=100;};context.thumbs_wrapper_width+=width;thumbs_loaded++;});context._initLink(link);context.images[i]=context._createImageData(link,image_src);});var inter=setInterval(function(){if(thumb_count==thumbs_loaded){context._setThumbListWidth(context.thumbs_wrapper_width);clearInterval(inter);};},100);},_setThumbListWidth:function(wrapper_width){wrapper_width-=100;var list=this.nav.find('.ad-thumb-list');list.css('width',wrapper_width+'px');var i=1;var last_height=list.height();while(i<201){list.css('width',(wrapper_width+i)+'px');if(last_height!=list.height()){break;};last_height=list.height();i++;};if(list.width()<this.nav.width()){list.width(this.nav.width());};},_initLink:function(link){var context=this;link.click(function(){context.showImage(link.data("ad-i"));context.slideshow.stop();return false;}).hover(function(){if(!$(this).is('.ad-active')&&context.settings.thumb_opacity<1){$(this).find('img').fadeTo(300,1);};context.preloadImage(link.data("ad-i"));},function(){if(!$(this).is('.ad-active')&&context.settings.thumb_opacity<1){$(this).find('img').fadeTo(300,context.settings.thumb_opacity);};});},_createImageData:function(thumb_link,image_src){var link=false;var thumb_img=thumb_link.find("img");if(thumb_img.data('ad-link')){link=thumb_link.data('ad-link');}else if(thumb_img.attr('longdesc')&&thumb_img.attr('longdesc').length){link=thumb_img.attr('longdesc');};var desc=false;if(thumb_img.data('ad-desc')){desc=thumb_img.data('ad-desc');}else if(thumb_img.attr('alt')&&thumb_img.attr('alt').length){desc=thumb_img.attr('alt');};var title=false;if(thumb_img.data('ad-title')){title=thumb_img.data('ad-title');}else if(thumb_img.attr('title')&&thumb_img.attr('title').length){title=thumb_img.attr('title');};return{thumb_link:thumb_link,image:image_src,error:false,preloaded:false,desc:desc,title:title,size:false,link:link};},initKeyEvents:function(){var context=this;$(document).keydown(function(e){if(e.keyCode==39){context.nextImage();context.slideshow.stop();}else if(e.keyCode==37){context.prevImage();context.slideshow.stop();};});},getIndexFromHash:function(){if(window.location.hash&&window.location.hash.indexOf('#ad-image-')===0){var id=window.location.hash.replace(/^#ad-image-/g,'');var thumb=this.thumbs_wrapper.find("#"+id);if(thumb.length){return this.thumbs_wrapper.find("a").index(thumb);}else if(!isNaN(parseInt(id,10))){return parseInt(id,10);};};return undefined;},removeImage:function(index){if(index<0||index>=this.images.length){throw"Cannot remove image for index "+index;};var image=this.images[index];this.images.splice(index,1);var thumb_link=image.thumb_link;var thumb_width=thumb_link[0].parentNode.offsetWidth;this.thumbs_wrapper_width-=thumb_width;thumb_link.remove();this._setThumbListWidth(this.thumbs_wrapper_width);this.gallery_info.html((this.current_index+1)+' / '+this.images.length);this.thumbs_wrapper.find('a').each(function(i){$(this).data("ad-i",i);});if(index==this.current_index&&this.images.length!=0){this.showImage(0);};},removeAllImages:function(){for(var i=this.images.length-1;i>=0;i--){this.removeImage(i);};},addImage:function(thumb_url,image_url,image_id,title,description){image_id=image_id||"";title=title||"";description=description||"";var li=$('<li><a href="'+image_url+'" id="'+image_id+'">'+'<img src="'+thumb_url+'" title="'+title+'" alt="'+description+'">'+'</a></li>');var context=this;this.thumbs_wrapper.find("ul").append(li);var link=li.find("a");var thumb=link.find("img");thumb.css('opacity',this.settings.thumb_opacity);this.whenImageLoaded(thumb[0],function(){var thumb_width=thumb[0].parentNode.parentNode.offsetWidth;if(thumb[0].width==0){thumb_width=100;};context.thumbs_wrapper_width+=thumb_width;context._setThumbListWidth(context.thumbs_wrapper_width);});var i=this.images.length;link.data("ad-i",i);this._initLink(link);this.images[i]=context._createImageData(link,image_url);this.gallery_info.html((this.current_index+1)+' / '+this.images.length);},initHashChange:function(){var context=this;if("onhashchange"in window){$(window).bind("hashchange",function(){var index=context.getIndexFromHash();if(typeof index!="undefined"&&index!=context.current_index){context.showImage(index);};});}else{var current_hash=window.location.hash;setInterval(function(){if(window.location.hash!=current_hash){current_hash=window.location.hash;var index=context.getIndexFromHash();if(typeof index!="undefined"&&index!=context.current_index){context.showImage(index);};};},200);};},initNextAndPrev:function(){this.next_link=$('<div class="ad-next"><div class="ad-next-image"></div></div>');this.prev_link=$('<div class="ad-prev"><div class="ad-prev-image"></div></div>');this.image_wrapper.append(this.next_link);this.image_wrapper.append(this.prev_link);var context=this;this.prev_link.add(this.next_link).mouseover(function(e){$(this).css('height',context.image_wrapper_height);$(this).find('div').show();}).mouseout(function(e){$(this).find('div').hide();}).click(function(){if($(this).is('.ad-next')){context.nextImage();context.slideshow.stop();}else{context.prevImage();context.slideshow.stop();};}).find('div').css('opacity',0.7);},initBackAndForward:function(){var context=this;this.scroll_forward=$('<div class="ad-forward"></div>');this.scroll_back=$('<div class="ad-back"></div>');this.nav.append(this.scroll_forward);this.nav.prepend(this.scroll_back);var has_scrolled=0;var thumbs_scroll_interval=false;$(this.scroll_back).add(this.scroll_forward).click(function(){var width=context.nav_display_width-50;if(context.settings.scroll_jump>0){var width=context.settings.scroll_jump;};if($(this).is('.ad-forward')){var left=context.thumbs_wrapper.scrollLeft()+width;}else{var left=context.thumbs_wrapper.scrollLeft()-width;};if(context.settings.slideshow.stop_on_scroll){context.slideshow.stop();};context.thumbs_wrapper.animate({scrollLeft:left+'px'});return false;}).css('opacity',0.6).hover(function(){var direction='left';if($(this).is('.ad-forward')){direction='right';};thumbs_scroll_interval=setInterval(function(){has_scrolled++;if(has_scrolled>30&&context.settings.slideshow.stop_on_scroll){context.slideshow.stop();};var left=context.thumbs_wrapper.scrollLeft()+1;if(direction=='left'){left=context.thumbs_wrapper.scrollLeft()-1;};context.thumbs_wrapper.scrollLeft(left);},10);$(this).css('opacity',1);},function(){has_scrolled=0;clearInterval(thumbs_scroll_interval);$(this).css('opacity',0.6);});},_afterShow:function(){this.gallery_info.html((this.current_index+1)+' / '+this.images.length);if(!this.settings.cycle){this.prev_link.show().css('height',this.image_wrapper_height);this.next_link.show().css('height',this.image_wrapper_height);if(this.current_index==(this.images.length-1)){this.next_link.hide();};if(this.current_index==0){this.prev_link.hide();};};if(this.settings.update_window_hash){var thumb_link=this.images[this.current_index].thumb_link;if(thumb_link.attr("id")){window.location.hash="#ad-image-"+thumb_link.attr("id");}else{window.location.hash="#ad-image-"+this.current_index;};};this.fireCallback(this.settings.callbacks.afterImageVisible);},_getContainedImageSize:function(image_width,image_height){if(image_height>this.image_wrapper_height){var ratio=image_width/image_height;image_height=this.image_wrapper_height;image_width=this.image_wrapper_height*ratio;};if(image_width>this.image_wrapper_width){var ratio=image_height/image_width;image_width=this.image_wrapper_width;image_height=this.image_wrapper_width*ratio;};return{width:image_width,height:image_height};},_centerImage:function(img_container,image_width,image_height){img_container.css('top','0px');if(image_height<this.image_wrapper_height){var dif=this.image_wrapper_height-image_height;img_container.css('top',(dif/2)+'px');};img_container.css('left','0px');if(image_width<this.image_wrapper_width){var dif=this.image_wrapper_width-image_width;img_container.css('left',(dif/2)+'px');};},_getDescription:function(image){var desc=false;if(image.desc.length||image.title.length){var title='';if(image.title.length){title='<strong class="ad-description-title">'+image.title+'</strong>';};var desc='';if(image.desc.length){desc='<span>'+image.desc+'</span>';};desc=$('<p class="ad-image-description">'+title+desc+'</p>');};return desc;},showImage:function(index,callback){if(this.images[index]&&!this.in_transition&&index!=this.current_index){var context=this;var image=this.images[index];this.in_transition=true;if(!image.preloaded){this.loading(true);this.preloadImage(index,function(){context.loading(false);context._showWhenLoaded(index,callback);});}else{this._showWhenLoaded(index,callback);};};},_showWhenLoaded:function(index,callback){if(this.images[index]){var context=this;var image=this.images[index];var img_container=$(document.createElement('div')).addClass('ad-image');var img=$(new Image()).attr('src',image.image);if(image.link){var link=$('<a href="'+image.link+'" target="_blank"></a>');link.append(img);img_container.append(link);}else{img_container.append(img);};this.image_wrapper.prepend(img_container);var size=this._getContainedImageSize(image.size.width,image.size.height);img.attr('width',size.width);img.attr('height',size.height);img_container.css({width:size.width+'px',height:size.height+'px'});this._centerImage(img_container,size.width,size.height);var desc=this._getDescription(image);if(desc){if(!this.settings.description_wrapper&&!this.settings.hooks.displayDescription){img_container.append(desc);var width=size.width-parseInt(desc.css('padding-left'),10)-parseInt(desc.css('padding-right'),10);desc.css('width',width+'px');}else if(this.settings.hooks.displayDescription){this.settings.hooks.displayDescription.call(this,image);}else{var wrapper=this.settings.description_wrapper;wrapper.append(desc);};};this.highLightThumb(this.images[index].thumb_link);var direction='right';if(this.current_index<index){direction='left';};this.fireCallback(this.settings.callbacks.beforeImageVisible);if(this.current_image||this.settings.animate_first_image){var animation_speed=this.settings.animation_speed;var easing='swing';var animation=this.animations[this.settings.effect].call(this,img_container,direction,desc);if(typeof animation.speed!='undefined'){animation_speed=animation.speed;};if(typeof animation.easing!='undefined'){easing=animation.easing;};if(this.current_image){var old_image=this.current_image;var old_description=this.current_description;old_image.animate(animation.old_image,animation_speed,easing,function(){old_image.remove();if(old_description)old_description.remove();});};img_container.animate(animation.new_image,animation_speed,easing,function(){context.current_index=index;context.current_image=img_container;context.current_description=desc;context.in_transition=false;context._afterShow();context.fireCallback(callback);});}else{this.current_index=index;this.current_image=img_container;context.current_description=desc;this.in_transition=false;context._afterShow();this.fireCallback(callback);};};},nextIndex:function(){if(this.current_index==(this.images.length-1)){if(!this.settings.cycle){return false;};var next=0;}else{var next=this.current_index+1;};return next;},nextImage:function(callback){var next=this.nextIndex();if(next===false)return false;this.preloadImage(next+1);this.showImage(next,callback);return true;},prevIndex:function(){if(this.current_index==0){if(!this.settings.cycle){return false;};var prev=this.images.length-1;}else{var prev=this.current_index-1;};return prev;},prevImage:function(callback){var prev=this.prevIndex();if(prev===false)return false;this.preloadImage(prev-1);this.showImage(prev,callback);return true;},preloadAll:function(){var context=this;var i=0;function preloadNext(){if(i<context.images.length){i++;context.preloadImage(i,preloadNext);};};context.preloadImage(i,preloadNext);},preloadImage:function(index,callback){if(this.images[index]){var image=this.images[index];if(!this.images[index].preloaded){var img=$(new Image());img.attr('src',image.image);if(!this.isImageLoaded(img[0])){this.preloads.append(img);var context=this;img.load(function(){image.preloaded=true;image.size={width:this.width,height:this.height};context.fireCallback(callback);}).error(function(){image.error=true;image.preloaded=false;image.size=false;});}else{image.preloaded=true;image.size={width:img[0].width,height:img[0].height};this.fireCallback(callback);};}else{this.fireCallback(callback);};};},whenImageLoaded:function(img,callback){if(this.isImageLoaded(img)){callback&&callback();}else{$(img).load(callback);};},isImageLoaded:function(img){if(typeof img.complete!='undefined'&&!img.complete){return false;};if(typeof img.naturalWidth!='undefined'&&img.naturalWidth==0){return false;};return true;},highLightThumb:function(thumb){this.thumbs_wrapper.find('.ad-active').removeClass('ad-active');thumb.addClass('ad-active');if(this.settings.thumb_opacity<1){this.thumbs_wrapper.find('a:not(.ad-active) img').fadeTo(300,this.settings.thumb_opacity);thumb.find('img').fadeTo(300,1);};var left=thumb[0].parentNode.offsetLeft;left-=(this.nav_display_width/2)-(thumb[0].offsetWidth/2);this.thumbs_wrapper.animate({scrollLeft:left+'px'});},fireCallback:function(fn){if($.isFunction(fn)){fn.call(this);};}};function AdGallerySlideshow(nextimage_callback,settings){this.init(nextimage_callback,settings);};AdGallerySlideshow.prototype={start_link:false,stop_link:false,countdown:false,controls:false,settings:false,nextimage_callback:false,enabled:false,running:false,countdown_interval:false,init:function(nextimage_callback,settings){var context=this;this.nextimage_callback=nextimage_callback;this.settings=settings;},create:function(){this.start_link=$('<span class="ad-slideshow-start">'+this.settings.start_label+'</span>');this.stop_link=$('<span class="ad-slideshow-stop">'+this.settings.stop_label+'</span>');this.countdown=$('<span class="ad-slideshow-countdown"></span>');this.controls=$('<div class="ad-slideshow-controls"></div>');this.controls.append(this.start_link).append(this.stop_link).append(this.countdown);this.countdown.hide();var context=this;this.start_link.click(function(){context.start();});this.stop_link.click(function(){context.stop();});$(document).keydown(function(e){if(e.keyCode==83){if(context.running){context.stop();}else{context.start();};};});return this.controls;},disable:function(){this.enabled=false;this.stop();this.controls.hide();},enable:function(){this.enabled=true;this.controls.show();},toggle:function(){if(this.enabled){this.disable();}else{this.enable();};},start:function(){if(this.running||!this.enabled)return false;var context=this;this.running=true;this.controls.addClass('ad-slideshow-running');this._next();this.fireCallback(this.settings.onStart);return true;},stop:function(){if(!this.running)return false;this.running=false;this.countdown.hide();this.controls.removeClass('ad-slideshow-running');clearInterval(this.countdown_interval);this.fireCallback(this.settings.onStop);return true;},_next:function(){var context=this;var pre=this.settings.countdown_prefix;var su=this.settings.countdown_sufix;clearInterval(context.countdown_interval);this.countdown.show().html(pre+(this.settings.speed/1000)+su);var slide_timer=0;this.countdown_interval=setInterval(function(){slide_timer+=1000;if(slide_timer>=context.settings.speed){var whenNextIsShown=function(){if(context.running){context._next();};slide_timer=0;};if(!context.nextimage_callback(whenNextIsShown)){context.stop();};slide_timer=0;};var sec=parseInt(context.countdown.text().replace(/[^0-9]/g,''),10);sec--;if(sec>0){context.countdown.html(pre+sec+su);};},1000);},fireCallback:function(fn){if($.isFunction(fn)){fn.call(this);};}};})(jQuery);


/*
Masked Input plugin for jQuery
Copyright (c) 2007-2013 Josh Bush (digitalbush.com)
Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
Version: 1.3.1
*/
(function(e){function t(){var e=document.createElement("input"),t="onpaste";return e.setAttribute(t,""),"function"==typeof e[t]?"paste":"input"}var n,a=t()+".mask",r=navigator.userAgent,i=/iphone/i.test(r),o=/android/i.test(r);e.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn",placeholder:"_"},e.fn.extend({caret:function(e,t){var n;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof e?(t="number"==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(n=this.createTextRange(),n.collapse(!0),n.moveEnd("character",t),n.moveStart("character",e),n.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(n=document.selection.createRange(),e=0-n.duplicate().moveStart("character",-1e5),t=e+n.text.length),{begin:e,end:t})},unmask:function(){return this.trigger("unmask")},mask:function(t,r){var c,l,s,u,f,h;return!t&&this.length>0?(c=e(this[0]),c.data(e.mask.dataName)()):(r=e.extend({placeholder:e.mask.placeholder,completed:null},r),l=e.mask.definitions,s=[],u=h=t.length,f=null,e.each(t.split(""),function(e,t){"?"==t?(h--,u=e):l[t]?(s.push(RegExp(l[t])),null===f&&(f=s.length-1)):s.push(null)}),this.trigger("unmask").each(function(){function c(e){for(;h>++e&&!s[e];);return e}function d(e){for(;--e>=0&&!s[e];);return e}function m(e,t){var n,a;if(!(0>e)){for(n=e,a=c(t);h>n;n++)if(s[n]){if(!(h>a&&s[n].test(R[a])))break;R[n]=R[a],R[a]=r.placeholder,a=c(a)}b(),x.caret(Math.max(f,e))}}function p(e){var t,n,a,i;for(t=e,n=r.placeholder;h>t;t++)if(s[t]){if(a=c(t),i=R[t],R[t]=n,!(h>a&&s[a].test(i)))break;n=i}}function g(e){var t,n,a,r=e.which;8===r||46===r||i&&127===r?(t=x.caret(),n=t.begin,a=t.end,0===a-n&&(n=46!==r?d(n):a=c(n-1),a=46===r?c(a):a),k(n,a),m(n,a-1),e.preventDefault()):27==r&&(x.val(S),x.caret(0,y()),e.preventDefault())}function v(t){var n,a,i,l=t.which,u=x.caret();t.ctrlKey||t.altKey||t.metaKey||32>l||l&&(0!==u.end-u.begin&&(k(u.begin,u.end),m(u.begin,u.end-1)),n=c(u.begin-1),h>n&&(a=String.fromCharCode(l),s[n].test(a)&&(p(n),R[n]=a,b(),i=c(n),o?setTimeout(e.proxy(e.fn.caret,x,i),0):x.caret(i),r.completed&&i>=h&&r.completed.call(x))),t.preventDefault())}function k(e,t){var n;for(n=e;t>n&&h>n;n++)s[n]&&(R[n]=r.placeholder)}function b(){x.val(R.join(""))}function y(e){var t,n,a=x.val(),i=-1;for(t=0,pos=0;h>t;t++)if(s[t]){for(R[t]=r.placeholder;pos++<a.length;)if(n=a.charAt(pos-1),s[t].test(n)){R[t]=n,i=t;break}if(pos>a.length)break}else R[t]===a.charAt(pos)&&t!==u&&(pos++,i=t);return e?b():u>i+1?(x.val(""),k(0,h)):(b(),x.val(x.val().substring(0,i+1))),u?t:f}var x=e(this),R=e.map(t.split(""),function(e){return"?"!=e?l[e]?r.placeholder:e:void 0}),S=x.val();x.data(e.mask.dataName,function(){return e.map(R,function(e,t){return s[t]&&e!=r.placeholder?e:null}).join("")}),x.attr("readonly")||x.one("unmask",function(){x.unbind(".mask").removeData(e.mask.dataName)}).bind("focus.mask",function(){clearTimeout(n);var e;S=x.val(),e=y(),n=setTimeout(function(){b(),e==t.length?x.caret(0,e):x.caret(e)},10)}).bind("blur.mask",function(){y(),x.val()!=S&&x.change()}).bind("keydown.mask",g).bind("keypress.mask",v).bind(a,function(){setTimeout(function(){var e=y(!0);x.caret(e),r.completed&&e==x.val().length&&r.completed.call(x)},0)}),y()}))}})})(jQuery);


//JavaScript Document
<!--//--><![CDATA[//><!--
$("html").addClass("js");
$(function() {
  $("#side").accordion({initShow : "#current"});
  $("#main").accordion({
      objID: "#acc1", 
      el: ".h", 
      head: "h4, h5", 
      next: "div", 
      initShow : "div.shown",
      standardExpansible : true,
	  oneOpenAtTime:false

  });
  $("#main").accordion({
      objID: "#acc2", 
      obj: "div", 
      wrapper: "div", 
      el: ".h", 
      head: "h4, h5", 
      next: "div", 
      initShow : "div.shown",
      standardExpansible : true,
    });
  //* ---
  $("#main .accordion").expandAll({
      trigger: ".h", 
      ref: "h4.h", 
      cllpsEl : "div.outer",
      speed: 200,
      oneSwitch : false,
      instantHide: true,
  });
  //--- */
  /* -----------------------  
  $("#side ul.accordion").expandAll({
      trigger: "li", 
      ref: "", 
      cllpsEl : "ul", 
      state : '',
      oneSwitch : false
  });
  ------------------------ */  
  $("html").removeClass("js");
  
  $('a[data-submit]').click(function(){				
	var target = $(this).attr('data-submit');		
	$(target).submit();		
  });
  
  $('.cep').mask("99999-999");	
  $('.phone').mask("(99)9999-9999"); 
  $('.cpf').mask("999.999.999-99");	
        
  $('.ad-gallery').adGallery();
  
  var queryString = function(variavel){
	   var variaveis=location.search.replace(/\x3F/,"").replace(/\x2B/g," ").split("&");
	   var nvar;
	   if(variaveis!=""){
	      var qs=[];
	      var total = variaveis.length;
	      for(var i=0;i<total;i++){
	         nvar=variaveis[i].split("=");
	         qs[nvar[0]]=unescape(nvar[1]);
	      }
	      return qs[variavel];
	   }
	   return null;
  }
  
  var categoria = queryString("categoria");
  if(categoria != null){
	  $('#'+categoria).addClass('active').addClass('open');
  }
  
});
//--><!]]>
<!--<![endif]-->
